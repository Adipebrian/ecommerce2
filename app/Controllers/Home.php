<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function index()
    {
        $banner = $this->db->table('banner')->get()->getResult();
        $wcu = $this->db->table('wcu')->get()->getResult();
        $sales = $this->db->table('sales')->get()->getResult();
        $info = $this->db->table('info')->get()->getRow();
        $lokasi = $this->db->table('list_lokasi')->get()->getResult();
        $lokasi2 = $this->db->table('d_lokasi')->join('list_lokasi', 'list_lokasi.id = d_lokasi.lokasi_id')->get()->getResult();
        $lokasi_awal = $this->db->table('d_lokasi')->where(['lokasi_id' => 1])->get()->getResult();
        $laris = $this->db->table('barang')->limit(10)->get()->getResult();
        $data = [
            'banner' => $banner,
            'wcu' => $wcu,
            'info' => $info,
            'sales' => $sales,
            'lokasi' => $lokasi,
            'lokasi2' => $lokasi2,
            'lokasi_awal' => $lokasi_awal,
            'laris' => $laris,
        ];
        return view('home/index', $data);
    }
    public function about()
    {
        $banner = $this->db->table('banner')->get()->getResult();
        $wcu = $this->db->table('wcu')->get()->getResult();
        $sales = $this->db->table('sales')->get()->getResult();
        $info = $this->db->table('info')->get()->getRow();
        $lokasi = $this->db->table('list_lokasi')->get()->getResult();
        $lokasi2 = $this->db->table('d_lokasi')->join('list_lokasi', 'list_lokasi.id = d_lokasi.lokasi_id')->get()->getResult();
        $lokasi_awal = $this->db->table('d_lokasi')->where(['lokasi_id' => 1])->get()->getResult();
        $result = $this->db->table('page_about')->get()->getRow();
        $data = [
            'banner' => $banner,
            'wcu' => $wcu,
            'info' => $info,
            'sales' => $sales,
            'lokasi' => $lokasi,
            'lokasi2' => $lokasi2,
            'lokasi_awal' => $lokasi_awal,
            'result' => $result,
        ];
        return view('home/about', $data);
    }
    public function sk()
    {
        $banner = $this->db->table('banner')->get()->getResult();
        $wcu = $this->db->table('wcu')->get()->getResult();
        $sales = $this->db->table('sales')->get()->getResult();
        $info = $this->db->table('info')->get()->getRow();
        $lokasi = $this->db->table('list_lokasi')->get()->getResult();
        $lokasi2 = $this->db->table('d_lokasi')->join('list_lokasi', 'list_lokasi.id = d_lokasi.lokasi_id')->get()->getResult();
        $lokasi_awal = $this->db->table('d_lokasi')->where(['lokasi_id' => 1])->get()->getResult();
        $result = $this->db->table('page_about')->get()->getRow(1);
        $data = [
            'banner' => $banner,
            'wcu' => $wcu,
            'info' => $info,
            'sales' => $sales,
            'lokasi' => $lokasi,
            'lokasi2' => $lokasi2,
            'lokasi_awal' => $lokasi_awal,
            'result' => $result,
        ];
        return view('home/sk', $data);
    }
    public function kp()
    {
        $banner = $this->db->table('banner')->get()->getResult();
        $wcu = $this->db->table('wcu')->get()->getResult();
        $sales = $this->db->table('sales')->get()->getResult();
        $info = $this->db->table('info')->get()->getRow();
        $lokasi = $this->db->table('list_lokasi')->get()->getResult();
        $lokasi2 = $this->db->table('d_lokasi')->join('list_lokasi', 'list_lokasi.id = d_lokasi.lokasi_id')->get()->getResult();
        $lokasi_awal = $this->db->table('d_lokasi')->where(['lokasi_id' => 1])->get()->getResult();
        $result = $this->db->table('page_about')->get()->getRow(2);
        $data = [
            'banner' => $banner,
            'wcu' => $wcu,
            'info' => $info,
            'sales' => $sales,
            'lokasi' => $lokasi,
            'lokasi2' => $lokasi2,
            'lokasi_awal' => $lokasi_awal,
            'result' => $result,
        ];
        return view('home/kp', $data);
    }
    public function bank()
    {
        $banner = $this->db->table('banner')->get()->getResult();
        $wcu = $this->db->table('wcu')->get()->getResult();
        $sales = $this->db->table('sales')->get()->getResult();
        $info = $this->db->table('info')->get()->getRow();
        $lokasi = $this->db->table('list_lokasi')->get()->getResult();
        $lokasi2 = $this->db->table('d_lokasi')->join('list_lokasi', 'list_lokasi.id = d_lokasi.lokasi_id')->get()->getResult();
        $lokasi_awal = $this->db->table('d_lokasi')->where(['lokasi_id' => 1])->get()->getResult();
        $result = $this->db->table('info_bank')->get()->getResult();
        $data = [
            'banner' => $banner,
            'wcu' => $wcu,
            'info' => $info,
            'sales' => $sales,
            'lokasi' => $lokasi,
            'lokasi2' => $lokasi2,
            'lokasi_awal' => $lokasi_awal,
            'result' => $result,
        ];
        return view('home/bank', $data);
    }
    public function kontak()
    {
        $banner = $this->db->table('banner')->get()->getResult();
        $wcu = $this->db->table('wcu')->get()->getResult();
        $sales = $this->db->table('sales')->get()->getResult();
        $info = $this->db->table('info')->get()->getRow();
        $lokasi = $this->db->table('list_lokasi')->get()->getResult();
        $lokasi2 = $this->db->table('d_lokasi')->join('list_lokasi', 'list_lokasi.id = d_lokasi.lokasi_id')->get()->getResult();
        $lokasi_awal = $this->db->table('d_lokasi')->where(['lokasi_id' => 1])->get()->getResult();
        $result = $this->db->table('page_kontak')->get()->getRow();
        $data = [
            'banner' => $banner,
            'wcu' => $wcu,
            'info' => $info,
            'sales' => $sales,
            'lokasi' => $lokasi,
            'lokasi2' => $lokasi2,
            'lokasi_awal' => $lokasi_awal,
            'result' => $result,
        ];
        return view('home/kontak', $data);
    }
    public function produk()
    {
        $banner = $this->db->table('banner')->get()->getResult();
        $kategori = $this->db->table('kategori')->get()->getResult();
        $jenis = $this->db->table('jenis')->get()->getResult();
        $wcu = $this->db->table('wcu')->get()->getResult();
        $sales = $this->db->table('sales')->get()->getResult();
        $info = $this->db->table('info')->get()->getRow();
        $lokasi = $this->db->table('list_lokasi')->get()->getResult();
        $lokasi2 = $this->db->table('d_lokasi')->join('list_lokasi', 'list_lokasi.id = d_lokasi.lokasi_id')->get()->getResult();
        $lokasi_awal = $this->db->table('d_lokasi')->where(['lokasi_id' => 1])->get()->getResult();
        $barang = $this->db->table('barang')->get()->getResult();
        $data = [
            'banner' => $banner,
            'barang' => $barang,
            'kategori' => $kategori,
            'jenis' => $jenis,
            'wcu' => $wcu,
            'info' => $info,
            'sales' => $sales,
            'lokasi' => $lokasi,
            'lokasi2' => $lokasi2,
            'lokasi_awal' => $lokasi_awal,
            'kd_jns' => false,
            'kd_cat' => false,
            'key' => false,
        ];
        return view('home/produk', $data);
    }
    public function cat($id)
    {
        $banner = $this->db->table('banner')->get()->getResult();
        $kategori = $this->db->table('kategori')->get()->getResult();
        $jenis = $this->db->table('jenis')->get()->getResult();
        $wcu = $this->db->table('wcu')->get()->getResult();
        $sales = $this->db->table('sales')->get()->getResult();
        $info = $this->db->table('info')->get()->getRow();
        $lokasi = $this->db->table('list_lokasi')->get()->getResult();
        $lokasi2 = $this->db->table('d_lokasi')->join('list_lokasi', 'list_lokasi.id = d_lokasi.lokasi_id')->get()->getResult();
        $lokasi_awal = $this->db->table('d_lokasi')->where(['lokasi_id' => 1])->get()->getResult();
        $barang = $this->db->table('barang')->getWhere(['kd_cat' => $id])->getResult();
        $data = [
            'banner' => $banner,
            'barang' => $barang,
            'kategori' => $kategori,
            'jenis' => $jenis,
            'wcu' => $wcu,
            'info' => $info,
            'sales' => $sales,
            'lokasi' => $lokasi,
            'lokasi2' => $lokasi2,
            'lokasi_awal' => $lokasi_awal,
            'kd_jns' => false,
            'kd_cat' => false,
            'key' => false,
        ];
        return view('home/cat', $data);
    }
    public function jns($id)
    {
        $banner = $this->db->table('banner')->get()->getResult();
        $kategori = $this->db->table('kategori')->get()->getResult();
        $jenis = $this->db->table('jenis')->get()->getResult();
        $wcu = $this->db->table('wcu')->get()->getResult();
        $sales = $this->db->table('sales')->get()->getResult();
        $info = $this->db->table('info')->get()->getRow();
        $lokasi = $this->db->table('list_lokasi')->get()->getResult();
        $lokasi2 = $this->db->table('d_lokasi')->join('list_lokasi', 'list_lokasi.id = d_lokasi.lokasi_id')->get()->getResult();
        $lokasi_awal = $this->db->table('d_lokasi')->where(['lokasi_id' => 1])->get()->getResult();
        $barang = $this->db->table('barang')->getWhere(['kd_jns' => $id])->getResult();
        $data = [
            'banner' => $banner,
            'barang' => $barang,
            'kategori' => $kategori,
            'jenis' => $jenis,
            'wcu' => $wcu,
            'info' => $info,
            'sales' => $sales,
            'lokasi' => $lokasi,
            'lokasi2' => $lokasi2,
            'lokasi_awal' => $lokasi_awal,
            'kd_jns' => false,
            'kd_cat' => false,
            'key' => false,
        ];
        return view('home/jns', $data);
    }
    public function detail($kode)
    {
        $banner = $this->db->table('banner')->get()->getResult();
        $wcu = $this->db->table('wcu')->get()->getResult();
        $sales = $this->db->table('sales')->get()->getResult();
        $info = $this->db->table('info')->get()->getRow();
        $lokasi = $this->db->table('list_lokasi')->get()->getResult();
        $lokasi2 = $this->db->table('d_lokasi')->join('list_lokasi', 'list_lokasi.id = d_lokasi.lokasi_id')->get()->getResult();
        $lokasi_awal = $this->db->table('d_lokasi')->where(['lokasi_id' => 1])->get()->getResult();
        $barang = $this->db->table('barang')->getWhere(['kode' => $kode])->getRow();
        $data = [
            'banner' => $banner,
            'result' => $barang,
            'wcu' => $wcu,
            'info' => $info,
            'sales' => $sales,
            'lokasi' => $lokasi,
            'lokasi2' => $lokasi2,
            'lokasi_awal' => $lokasi_awal,
        ];
        return view('home/detail', $data);
    }
    public function search()
    {
        $wcu = $this->db->table('wcu')->get()->getResult();
        $sales = $this->db->table('sales')->get()->getResult();
        $info = $this->db->table('info')->get()->getRow();
        $lokasi = $this->db->table('list_lokasi')->get()->getResult();
        $lokasi2 = $this->db->table('d_lokasi')->join('list_lokasi', 'list_lokasi.id = d_lokasi.lokasi_id')->get()->getResult();
        $lokasi_awal = $this->db->table('d_lokasi')->where(['lokasi_id' => 1])->get()->getResult();
        $kategori = $this->db->table('kategori')->get()->getResult();
        $jenis = $this->db->table('jenis')->get()->getResult();


        $key = $this->request->getVar('key');
        $cat = $this->request->getVar('kategori');
        $jns = $this->request->getVar('jenis');
        $builder = $this->db->table('barang');
        $builder->select('*');
        if ($key) {
            $builder->like('nm_barang', $key);
        }
        if ($cat != null && $jns != null) {
            $builder->where('kd_cat', $cat);
            $builder->where('kd_jns', $jns);
        } elseif ($cat == null && $jns != null) {
            $builder->where('kd_jns', $jns);
        } elseif ($cat != null && $jns == null) {
            $builder->where('kd_cat', $cat);
        }
        $result = $builder->get()->getResult();
        $data = [
            'barang' => $result,
            'wcu' => $wcu,
            'info' => $info,
            'sales' => $sales,
            'lokasi' => $lokasi,
            'lokasi2' => $lokasi2,
            'lokasi_awal' => $lokasi_awal,
            'kategori' => $kategori,
            'jenis' => $jenis,
            'kd_jns' => $jns,
            'kd_cat' => $cat,
            'key' => $key,
        ];
        return view('home/produk', $data);
    }
}
