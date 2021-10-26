<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'user';
    protected $primaryKey           = 'user_id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'App\Entities\User';
    protected $useSoftDeletes       = true;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'street_id', 
        'user_type', 
        'active',
        'user_name',
        'cpf',
        'email',
        'password',
        'address_number',
        'address_complement'
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'street_id' => 'numeric|permit_empty',
        'user_type' => 'string|permit_empty',
        'active' => 'integer|permit_empty',
        'user_name' => 'required|alpha_space|min_length[5]|max_length[100]',
        'cpf' => 'min_length[5]|max_length[100]|is_unique|permit_empty',
        'email' => 'required|valid_email|is_unique[user.email]',
        'password' => 'required|min_length[8]',
        'address_number' => 'max_length[10]|permit_empty',
        'address_complement' => 'max_length[10]|alpha_numeric_space|permit_empty'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];
}
