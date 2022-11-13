<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class Transaksi extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    /*
    * Transaksi
    */
    public function index()
    {
        $this->builder = $this->db->table('h_trans');
        $this->builder->select('*')
            ->join('users', 'users.id = h_trans.cust_id');
        $result = $this->builder->get()->getResult();

        $data = [
            'uri' => $this->uri,
            'result' => $result,
            'validation' => \Config\Services::validation(),
        ];
        return view('transaksi/index', $data);
    }
}
