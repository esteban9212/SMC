<?php
namespace App\Http\Controllers\Api;
use App\Models\UserCip;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;
use JWTAuthException;
class AuthController extends Controller
{
    private $user;
    private $jwtauth;
    public function __construct(UserCip $user, JWTAuth $jwtauth)
    {
        $this->user = $user;
        $this->jwtauth = $jwtauth;
    }
    public function register(RegisterRequest $request)
    {
        $newUser = $this->user->create([
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
        $credentials = $request->only('LOGIN', 'PASSWORD_USER');
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
