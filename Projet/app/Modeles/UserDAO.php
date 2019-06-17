<?php

namespace App\Modeles;

use DB;
use App\Metier\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class UserDAO extends Dao implements UserProvider
{
    //
    public function retrieveById($identifier)
    {
        $user=DB::table('users')->where('id','=',$identifier)->first();
        if($user) {
            $leUser=$this->creerObjetMetier($user);
            return $leUser;
        }
        else
            return null;
    }

    public function retrieveByToken($identifier, $token)
    {
        // TODO: Implement retrieveByToken() method.
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // TODO: Implement updateRememberToken() method.
    }

    public function retrieveByCredentials(array $credentials)
    {
        // TODO: Implement retrieveByCredentials() method.
    }
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // TODO: Implement validateCredentials() method.
    }
    protected function creerObjetMetier(\stdClass $objet)
    {
        $leUser = new User();
        $leUser->setAuthIdentifier($objet->id);
        $leUser->setAuthName($objet->name);
        $leUser->setAuthEmail($objet->email);
        $leUser->setAuthPassword($objet->password);
        return $leUser;
    }
}
