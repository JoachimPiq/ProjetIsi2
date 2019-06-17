<?php


namespace App\Metier;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class User implements AuthenticatableContract
{
    private $id;
    private $name;
    private $email;
    private $email_verified_at;
    private $password;
    private $remember_token;
    private $created_at;
    private $updated_at;

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token=$value;
    }

    public function getRememberTokenName()
    {
        return $this->name;
    }

    public function getAuthIdentifierName()
    {
        return $this->name;
    }

    public function getAuthEmail($email)
    {
        return $this->email;
    }

    public function setAuthIdentifier($id)
    {
        return $this->id=$id;
    }

    public function setAuthName($name)
    {
        return $this->name=$name;
    }

    public function setAuthEmail($email)
    {
        return $this->email=$email;
    }

    public function setAuthPassword($password)
    {
        return $this->password=$password;
    }

}