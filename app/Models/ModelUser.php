<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table                = 'users';
    protected $protectFields        = true;
    protected $allowedFields        = ['username', 'image'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';
    protected $useSoftDeletes = true;


    public function getUser($username)
    {
        $result = $this->where(['username' => $username])->first();
        if ($result) {
            return $result['username'];
        }
        return false;
    }
    public function userActive()
    {
        return $this->where(['active' => 1])->findAll();
    }
}
