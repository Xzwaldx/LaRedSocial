<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user'; 

    protected $primaryKey = 'id'; 
    
    protected $allowedFields = ['name', 'login', 'password']; 

    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    public function login($data)
    {
        return $this->asArray()->where($data)->first();
    }
}