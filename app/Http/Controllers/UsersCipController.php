<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCip;
use App\Models\RoleCip;
use App\Models\UserCipRoleCip;
use Illuminate\support\Facades\Response;
use App\Models\UserCipBasic;

class UsersCipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of usercip.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllUserCip()
    {

        $users = UserCip::all();
        $users2 = array();

        for ($i = 0; $i < $users->count(); $i++) {

            $userId = $users[$i]->ID_USER;
            $nameUser = $users[$i]->NAME_USER;
            $emailUser = $users[$i]->EMAIL;
            $rolesUser = UserCipRoleCip::where('USER_CIP_ID_USER', '=', $userId)->get();
            $nameRoles = "";

            for ($j = 0; $j < $rolesUser->count(); $j++) {
                $idrol = $rolesUser[$j]->ROLE_CIP_ID_ROLE;
                $rol = RoleCip::where('ID_ROLE', '=', $idrol)->first();
                $nameRoles = $nameRoles . $rol->NAME . " / ";
            }
            $userCipBasic = new UserCipBasic($userId, $nameUser, $emailUser, $nameRoles);

            $users2[$i] = $userCipBasic;
        }
        $response = Response::json($users2, 200);
        //      header("Access-Control-Allow-Origin: *");
        return $response;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
