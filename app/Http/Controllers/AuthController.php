<?php
namespace App\Http\Controllers;
use App\Models\UserCip;
use App\User;
use App\Http\Requests\RegisterRequest;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Auth;
use JWTAuthException;
use Response;

class AuthController extends Controller
{
    private $user;
    private $userC;
    private $jwtauth;
    public function __construct(UserCip $userC, User $user, JWTAuth $jwtauth)
    {
        $this->user = $user;
        $this->userC = $userC;
        $this->jwtauth = $jwtauth;
        $this->middleware('auth:api', ['except' => ['login', 'register', 'me']]);
    }

    public function register($name, $last_name, $username, $email, $password, $identification)
    {
        $newUser = $this->user->create([
            'name' => $name,
            'last_name' => $last_name,
            'username' => $username,
            'email' => $email,
            'password' => bcrypt($password),
            'identification' => $identification
        ]);

        $newUserC = $this->userC->create([
            'NAME_USER' => $name,
            'LAST_NAME' => $last_name,
            'LOGIN' => $username,
            'EMAIL' => $email,
            'PASSWORD_USER' => bcrypt($password),
            'IDENTIFICATION' => $identification,
            'STATE_ID_STATE' => '3'

        ]);

        if (!$newUser) {
            return response()->json(['failed_to_create_new_user'], 500);
        }
        return response()->json(['token' => $this->jwtauth->fromUser($newUser)]);
    }


    public function login()
    {
        $credentials = request(['username', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $user = $this->guard()->user();
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard('api')->factory()->getTTL() * 60,
            'user' => $user
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}
