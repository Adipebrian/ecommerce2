<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;

class Utility extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    /*
    * Utility
    */
    public function index()
    {
        $data = [
            'uri' => $this->uri,
        ];
        return view('utility/index', $data);
    }
    public function menu()
    {
        $result = $this->db->table('menu')->join('kategori', 'kategori.kd_cat = menu.kd_cat')->get()->getResult();
        $cat = $this->db->table('kategori')->get()->getResult();
        $jns = $this->db->table('jenis')->get()->getResult();
        $menu = $this->db->table('list_menu')->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'result' => $result,
            'menu' => $menu,
            'cat' => $cat,
            'jns' => $jns,
        ];
        return view('utility/menu', $data);
    }
    public function menu_add()
    {
        $data = [
            'menu' => $this->request->getVar('menu'),
        ];
        $this->db->table('list_menu')->insert($data);

        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/menu');
    }
    public function menu_edit()
    {
        $id = $this->request->getVar('id');
        $data = [
            'menu' => $this->request->getVar('menu'),
        ];
        $this->db->table('list_menu')->where(['id' => $id])->update($data);

        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/menu');
    }
    public function menu_delete()
    {
        $id = $this->request->getVar('id');
        $this->db->table('list_menu')->where(['id' => $id])->delete();
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/menu');
    }
    public function submenu_add()
    {
        $jns = $this->request->getVar('jns');
        $jns = implode(',', $jns);
        $data = [
            'menu_id' => $this->request->getVar('menu'),
            'kd_cat' => $this->request->getVar('cat'),
            'kd_jns' => $jns
        ];
        $this->db->table('menu')->insert($data);

        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/menu');
    }
    public function submenu_edit()
    {
        $id = $this->request->getVar('id');
        $jns = $this->request->getVar('jns');
        $jns = implode(',', $jns);
        $data = [
            'menu_id' => $this->request->getVar('menu'),
            'kd_cat' => $this->request->getVar('cat'),
            'kd_jns' => $jns
        ];
        $this->db->table('menu')->where(['id' => $id])->update($data);

        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/menu');
    }
    public function submenu_delete()
    {
        $id = $this->request->getVar('id');
        $this->db->table('menu')->where(['id' => $id])->delete();
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/menu');
    }
    public function banner()
    {
        $result = $this->db->table('banner')->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'result' => $result
        ];
        return view('utility/banner', $data);
    }
    public function banner_add()
    {
        $fileFoto = $this->request->getFile('foto');

        // generate nama file
        $namaFoto = $fileFoto->getRandomName();
        // pindahkan gambar
        $fileFoto->move('assets/img/banner', $namaFoto);
        $data = [
            'img' => $namaFoto,
            'text' => $this->request->getVar('text'),
            'created_at' => $this->time
        ];
        $this->db->table('banner')->insert($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/banner');
    }
    public function banner_edit()
    {
        $id = $this->request->getVar('id');
        $fileFoto = $this->request->getFile('foto');

        // cek gambar apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            // generate nama file
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan gambar
            $fileFoto->move('assets/img/banner', $namaFoto);
            // hapus gambar lama
            if ($this->request->getVar('fotoLama') != 'default.png') {
                unlink('assets/img/banner/' . $this->request->getVar('fotoLama'));
            }
        }
        $data = [
            'img' => $namaFoto,
            'text' => $this->request->getVar('text'),
            'updated_at' => $this->time
        ];
        $this->db->table('banner')->where(['id' => $id])->update($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/banner');
    }
    public function banner_delete()
    {
        $id = $this->request->getVar('id');
        if ($this->request->getVar('fotoLama') != 'default.png') {
            unlink('assets/img/banner/' . $this->request->getVar('fotoLama'));
        }
        $this->db->table('banner')->where(['id' => $id])->delete();
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/banner');
    }
    public function promo()
    {
        $result = $this->db->table('promo')->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'result' => $result
        ];
        return view('utility/promo', $data);
    }
    public function promo_add()
    {
        $data = [
            'noemail' => $this->request->getVar('noemail'),
            'created_at' => $this->time
        ];
        $this->db->table('promo')->insert($data);
        session()->setFlashdata('success', 'Terimakasih data anda sudah terkirim, tunggu proses selanjutnya ya!');
        return redirect()->to('home/index');
    }
    public function promo_delete()
    {
        $id = $this->request->getVar('id');
        $this->db->table('promo')->where(['id' => $id])->delete();
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/promo');
    }
    public function info()
    {
        $result = $this->db->table('info')->get()->getRow();
        $data = [
            'uri' => $this->uri,
            'result' => $result,
        ];
        return view('utility/info', $data);
    }
    public function info_edit()
    {
        $id = $this->request->getVar('id');
        $fileFoto = $this->request->getFile('foto');

        // cek gambar apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            // generate nama file
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan gambar
            $fileFoto->move('assets/img/info', $namaFoto);
            // hapus gambar lama
            if ($this->request->getVar('fotoLama') != 'logo.png') {
                unlink('assets/img/info/' . $this->request->getVar('fotoLama'));
            }
        }
        $data = [
            'logo' => $namaFoto,
            'kontak1' => $this->request->getVar('kontak1'),
            'kontak2' => $this->request->getVar('kontak2'),
            'kontak3' => $this->request->getVar('kontak3'),
            'fb' => $this->request->getVar('fb'),
            'ig' => $this->request->getVar('ig'),
            'tw' => $this->request->getVar('tw'),
        ];
        $this->db->table('info')->where(['id' => $id])->update($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/info');
    }
    public function info_delete()
    {
        $id = $this->request->getVar('id');
        $this->db->table('info')->where(['id' => $id])->delete();
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/info');
    }
    public function sales()
    {
        $result = $this->db->table('sales')->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'result' => $result
        ];
        return view('utility/sales', $data);
    }
    public function sales_add()
    {
        $data = [
            'sales' => $this->request->getVar('sales'),
            'shopee' => $this->request->getVar('shopee'),
            'lazada' => $this->request->getVar('lazada'),
            'tokped' => $this->request->getVar('tokped'),
        ];
        $this->db->table('sales')->insert($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/sales');
    }
    public function sales_edit()
    {
        $id = $this->request->getVar('id');
        $data = [
            'sales' => $this->request->getVar('sales'),
            'shopee' => $this->request->getVar('shopee'),
            'lazada' => $this->request->getVar('lazada'),
            'tokped' => $this->request->getVar('tokped'),
        ];
        $this->db->table('sales')->where(['id' => $id])->update($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/sales');
    }
    public function sales_delete()
    {
        $id = $this->request->getVar('id');
        $this->db->table('sales')->where(['id' => $id])->delete();
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/sales');
    }
    public function lokasi()
    {
        $result = $this->db->table('list_lokasi')->join('d_lokasi', 'd_lokasi.lokasi_id = list_lokasi.id')->get()->getResult();
        $lokasi = $this->db->table('list_lokasi')->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'result' => $result,
            'lokasi' => $lokasi
        ];
        return view('utility/lokasi', $data);
    }
    public function lokasi_add()
    {
        $data = [
            'lokasi' => $this->request->getVar('lokasi'),
        ];
        $this->db->table('list_lokasi')->insert($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/lokasi');
    }
    public function lokasi_add_tempat()
    {
        $data = [
            'lokasi_id' => $this->request->getVar('lokasi'),
            'alamat' => $this->request->getVar('alamat'),
            'tempat' => $this->request->getVar('tempat'),
            'wa' => $this->request->getVar('wa'),
            'telp' => $this->request->getVar('telp'),
            'wkt_kerja' => $this->request->getVar('waktu'),
            'maps' => $this->request->getVar('maps'),
            'created_at' => $this->time,
        ];
        $this->db->table('d_lokasi')->insert($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/lokasi');
    }
    public function lokasi_edit_tempat()
    {
        $id = $this->request->getVar('lokasi');
        $data = [
            'lokasi_id' => $this->request->getVar('lokasi'),
            'alamat' => $this->request->getVar('alamat'),
            'tempat' => $this->request->getVar('tempat'),
            'wa' => $this->request->getVar('wa'),
            'telp' => $this->request->getVar('telp'),
            'wkt_kerja' => $this->request->getVar('waktu'),
            'maps' => $this->request->getVar('maps'),
            'created_at' => $this->time,
        ];
        $this->db->table('d_lokasi')->where(['id' => $id])->update($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/lokasi');
    }
    public function lokasi_edit()
    {
        $id = $this->request->getVar('id');
        $data = [
            'lokasi' => $this->request->getVar('lokasi'),
        ];
        $this->db->table('list_lokasi')->where(['id' => $id])->update($data);
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/lokasi');
    }
    public function lokasi_delete()
    {
        $id = $this->request->getVar('id');
        $this->db->table('list_lokasi')->where(['id' => $id])->delete();
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/lokasi');
    }
    public function lokasi_delete_tempat()
    {
        $id = $this->request->getVar('id');
        $this->db->table('d_lokasi')->where(['id' => $id])->delete();
        session()->setFlashdata('success', 'Success!');
        return redirect()->to('utility/lokasi');
    }
}
