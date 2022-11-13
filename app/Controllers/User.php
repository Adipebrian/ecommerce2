<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
        $this->userModel = new ModelUser();
    }
    public function index()
    {
        $id = user_id();
        $this->builder = $this->db->table('users');
        $this->builder->select('*');
        $this->builder->where('users.id', $id);
        $this->builder->join('user_info', 'user_info.user_id = users.id');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data = [
            'title' => 'User',
            'uri' => $this->uri,
            'user' => $query->getRow(),
            'validation' => \Config\Services::validation(),
        ];
        return view('user/index', $data);
    }
    public function cart()
    {
        $id = user_id();
        $this->builder = $this->db->table('cart');
        $this->builder->select('*');
        $this->builder->where('cart.id', $id);
        $this->builder->join('barang', 'barang.kode = cart.barang_id');
        $result = $this->builder->get()->getResult();

        $data = [
            'title' => 'Cart',
            'uri' => $this->uri,
            'result' => $result,
        ];
        return view('user/cart', $data);
    }
    public function update()
    {
        $usernameLama = $this->userModel->getUser($this->mRequest->getVar('usernameLama'));
        if ($usernameLama) {
            if ($usernameLama == $this->mRequest->getVar('username')) {
                $rule_username = 'required';
            } else {
                $rule_username = 'required|is_unique[users.username]|alpha_dash';
            }
        } else {
            $rule_username = 'required|is_unique[users.username]|alpha_dash';
        }

        if (!$this->validate([
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => ' username harus diisi.',
                    'is_unique' => ' username sudah ada',
                    'alpha_dash' => 'jangan spasi(ganti dengan -,_)'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/JPG]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/user')->withInput();
        };

        $fileFoto = $this->mRequest->getFile('foto');

        // cek gambar apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->mRequest->getVar('fotoLama');
        } else {
            // generate nama file
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan gambar
            $fileFoto->move('assets/img/user', $namaFoto);
            // hapus gambar lama
            if ($this->mRequest->getVar('fotoLama') != 'default.png') {
                unlink('assets/img/user/' . $this->mRequest->getVar('fotoLama'));
            }
        }
        $data = [
            'username' => $this->mRequest->getVar('username'),
            'image' => $namaFoto
        ];
        $data2 = [
            'nohp' => $this->mRequest->getVar('nohp'),
            'tgl_lahir' => $this->mRequest->getVar('tgl_lahir'),
            'alamat' => $this->mRequest->getVar('alamat'),
            'npwp' => $this->mRequest->getVar('npwp'),
            'nm_bank' => $this->mRequest->getVar('nm_bank'),
            'norek' => $this->mRequest->getVar('norek'),
            'nm_inst' => $this->mRequest->getVar('nm_inst'),
            'alamat_inst' => $this->mRequest->getVar('alamat_inst'),
            'nohp_inst' => $this->mRequest->getVar('nohp_inst'),
            'pkp' => $this->mRequest->getVar('pkp'),
            'email_inst' => $this->mRequest->getVar('email_inst'),
            'updated_at' => $this->time,
        ];
        $this->db->table('users')->where('id', $this->mRequest->getVar('id'))->update($data);
        $this->db->table('user_info')->where('user_id', $this->mRequest->getVar('id'))->update($data2);
        session()->setFlashdata('success', 'Data berhasil di ubah');
        return redirect()->to('/user');
    }
    public function change_akun()
    {
        $data = [
            'jns_akun' => $this->mRequest->getVar('jns_akun')
        ];
        $this->db->table('user_info')->where('user_id', $this->mRequest->getVar('id'))->update($data);
        session()->setFlashdata('success', 'Data berhasil di ubah');
        return redirect()->to('/user');
    }
}