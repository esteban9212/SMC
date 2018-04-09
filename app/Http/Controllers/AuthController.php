<?php
namespace App\Http\Controllers;
use App\Models\UserCip;
use App\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;
use JWTAuthException;
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
    }
    public function register(RegisterRequest $request)
    {
        $newUser = $this->user->create([
            'name' => $request->get('NAME_USER'),
            'last_name' => $request->get('LAST_NAME'),
            'username' => $request->get('LOGIN'),
            'email' => $request->get('EMAIL'),
            'password' => bcrypt($request->get('PASSWORD_USER')),
            'identification' => $request->get('IDENTIFICATION'),
        ]);

        $newUserC = $this->userC->create([
            'NAME_USER' => $request->get('NAME_USER'),
            'LAST_NAME' => $request->get('LAST_NAME'),
            'EMAIL' => $request->get('EMAIL'),
            'IDENTIFICATION' => $request->get('IDENTIFICATION'),
            'LOGIN' => $request->get('LOGIN'),
            'PASSWORD_USER' => bcrypt($request->get('PASSWORD_USER')),
            'STATE_ID_STATE' => '3'
        ]);

        if (!$newUser) {
            return response()->json(['failed_to_create_new_user'], 500);
        }
        return response()->json(['token' => $this->jwtauth->fromUser($newUser)]);
    }


    public function login(LoginRequest $request)
    {
        // get user credentials: login, password
        $credentials = $request->only('username', 'password');
        $token = null;
        try {
            $token = $this->jwtauth->attempt($credentials);
            if (!$token) {
                return response()->json(['invalid_login_or_password'], 422);
            }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        return response()->json(compact('token'));
    }
}
