<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts   = [];

    public function setPassword(String $password): User{
        $this->attributes['password'] = password_hash($password, PASSWORD_DEFAULT);
        return $this;
    }
}
