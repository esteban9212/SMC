<?php
/**
 * Created by PhpStorm.
 * User: Esteban Aguirre
 * Date: 28/04/2018
 * Time: 9:57 AM
 */

namespace App\Models;


class UserCipBasic
{


    public $IdUserCip;
    public $NameUserCip;
    public $EmailUser;
    public $RolsUser;


    // Constructor
    public function __construct($IdUserCip, $NameUserCip, $EmailUser, $RolsUser)
    {
        $this->IdUserCip = $IdUserCip;
        $this->NameUserCip = $NameUserCip;
        $this->EmailUser = $EmailUser;
        $this->RolsUser = $RolsUser;

    }
}