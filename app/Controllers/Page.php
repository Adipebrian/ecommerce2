<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;

class Page extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function home()
    {
        $data = [
            'uri' => $this->uri,
        ];
        return view('page/home', $data);
    }
    public function wcu()
    {
        $result = $this->db->table('wcu')->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'result' => $result
        ];
        return view('page/wcu', $data);
    }
    public function wcu_add()
    {
        $fileFoto = $this->mRequest->getFile('foto');

        // generate nama file
        $namaFoto = $fileFoto->getRandomName();
        // pindahkan gambar
        $fileFoto->move('assets/img/wcu', $namaFoto);
        $data = [
            'img' => $namaFoto,
            'text' => $this->request->getVar('text'),
            'created_at' => $this->time
        ];
        $this->db->table('wcu')->insert($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('page/wcu');
    }
    public function wcu_edit()
    {
        $id = $this->request->getVar('id');
        $fileFoto = $this->mRequest->getFile('foto');

        // cek gambar apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->mRequest->getVar('fotoLama');
        } else {
            // generate nama file
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan gambar
            $fileFoto->move('assets/img/wcu', $namaFoto);
            // hapus gambar lama
            if ($this->mRequest->getVar('fotoLama') != 'default.png') {
                unlink('assets/img/wcu/' . $this->mRequest->getVar('fotoLama'));
            }
        }
        $data = [
            'img' => $namaFoto,
            'text' => $this->request->getVar('text'),
            'updated_at' => $this->time
        ];
        $this->db->table('wcu')->where(['id' => $id])->update($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('page/wcu');
    }
    public function wcu_delete()
    {
        $id = $this->request->getVar('id');
        if ($this->mRequest->getVar('fotoLama') != 'default.png') {
            unlink('assets/img/wcu/' . $this->mRequest->getVar('fotoLama'));
        }
        $this->db->table('wcu')->where(['id' => $id])->delete();
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('page/wcu');
    }

    public function about()
    {
        $result = $this->db->table('page_about')->get()->getRow();
        $data = [
            'uri' => $this->uri,
            'result' => $result
        ];
        return view('page/about', $data);
    }
    public function about_edit()
    {
        $data = [
            'text' => $this->request->getVar('about'),
            'updated_at' => $this->time
        ];
        $this->db->table('page_about')->where(['id' => 1])->update($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('page/about');
    }
    public function sk()
    {
        $result = $this->db->table('page_about')->get()->getRow(1);
        $data = [
            'uri' => $this->uri,
            'result' => $result
        ];
        return view('page/sk', $data);
    }
    public function sk_edit()
    {
        $data = [
            'text' => $this->request->getVar('sk'),
            'updated_at' => $this->time
        ];
        $this->db->table('page_about')->where(['id' => 2])->update($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('page/sk');
    }
    public function kp()
    {
        $result = $this->db->table('page_about')->get()->getRow(2);
        $data = [
            'uri' => $this->uri,
            'result' => $result
        ];
        return view('page/kp', $data);
    }
    public function kp_edit()
    {
        $data = [
            'text' => $this->request->getVar('kp'),
            'updated_at' => $this->time
        ];
        $this->db->table('page_about')->where(['id' => 3])->update($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('page/kp');
    }
    public function kontak()
    {
        $result = $this->db->table('page_kontak')->get()->getRow();
        $data = [
            'uri' => $this->uri,
            'result' => $result
        ];
        return view('page/kontak', $data);
    }
    public function kontak_edit()
    {
        $data = [
            'email' => $this->request->getVar('email'),
            'wa' => $this->request->getVar('wa'),
            'cs' => $this->request->getVar('cs'),
            'updated_at' => $this->time
        ];
        $this->db->table('page_kontak')->where(['id' => 1])->update($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('page/kontak');
    }
    public function bank()
    {
        $result = $this->db->table('info_bank')->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'result' => $result
        ];
        return view('page/bank', $data);
    }
    public function bank_add()
    {
        $data = [
            'bank' => $this->request->getVar('bank'),
            'norek' => $this->request->getVar('norek'),
            'an' => $this->request->getVar('norek'),
            'cabang' => $this->request->getVar('norek'),
            'updated_at' => $this->time
        ];
        $this->db->table('info_bank')->insert($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('page/bank');
    }
    public function bank_edit()
    {
        $id = $this->request->getVar('id');
        $data = [
            'bank' => $this->request->getVar('bank'),
            'norek' => $this->request->getVar('norek'),
            'an' => $this->request->getVar('norek'),
            'cabang' => $this->request->getVar('norek'),
            'updated_at' => $this->time
        ];
        $this->db->table('info_bank')->where(['id' => $id])->update($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('page/bank');
    }
    public function bank_delete()
    {
        $id = $this->request->getVar('id');
        $this->db->table('info_bank')->where(['id' => $id])->delete();
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('page/bank');
    }
}
