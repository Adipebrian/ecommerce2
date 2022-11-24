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
    public function produk($cat = null)
    {
        $id = $this->db->table('kategori')->where('kategori', $cat)->get()->getRow();
        if ($cat) {
            $result = $this->db->table('barang')->where('kd_cat', $id->kd_cat)->get()->getResult();
            $jns = $this->db->table('barang')->where('kd_cat', $id->kd_cat)->groupBy('kd_jns')->get()->getResult();
            $merk = $this->db->table('barang')->where('kd_cat', $id->kd_cat)->groupBy('merk_id')->get()->getResult();
        } else {
            $result = $this->db->table('barang')->get()->getResult();
            $jns = null;
            $merk = null;
        }
        $wcu = $this->db->table('wcu')->get()->getResult();
        $sales = $this->db->table('sales')->get()->getResult();
        $info = $this->db->table('info')->get()->getRow();
        $lokasi = $this->db->table('list_lokasi')->get()->getResult();
        $lokasi2 = $this->db->table('d_lokasi')->join('list_lokasi', 'list_lokasi.id = d_lokasi.lokasi_id')->get()->getResult();
        $lokasi_awal = $this->db->table('d_lokasi')->where(['lokasi_id' => 1])->get()->getResult();
        $kategori = $this->db->table('kategori')->get()->getResult();
        $jenis = $this->db->table('jenis')->get()->getResult();

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
            'jns' => $jns,
            'merk' => $merk,
            'key' => $cat,
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
    public function search()
    {
        return redirect()->to('home/search_product/' . $this->request->getVar('key') . '/all/all/all');
    }
    public function search_product($key, $cat = null, $jns = null, $merk = null, $limit = 2)
    {
        $jns_exp = explode('--', $jns);
        $jns_where = '';
        foreach ($jns_exp as $x => $j) {
            $jns_where = $jns_where . " And kd_jns = ".$j."";
        }
        $merk_exp = explode('--', $merk);
        $merk_where = '';
        foreach ($merk_exp as $x => $j) {
            $merk_where = $merk_where . " And merk_id = ".$j."";
        }
        if ($key != 'all' && $cat == 'all' && $jns == 'all' && $merk == 'all') {
            $id = $this->db->table('kategori')->where('kd_cat', $cat)->get()->getRow();
            $result = $this->db->table('barang')
                ->limit($limit)
                ->like('nm_barang', $key)
                ->get()
                ->getResult();
                $jml_barang = $this->db->query('SELECT Count(nm_barang) as jml FROM barang WHERE nm_barang LIKE "%'.$key.'%" LIMIT '.$limit)->getResult();
            $jns_result = $this->db->table('barang')->like('nm_barang', $key)->groupBy('kd_jns')->get()->getResult();
            $merk_result = $this->db->table('barang')->like('nm_barang', $key)->groupBy('merk_id')->get()->getResult();
        } else if ($key != 'all' && $cat != 'all' && $jns == 'all' && $merk == 'all') {
            $id = $this->db->table('kategori')->where('kd_cat', $cat)->get()->getRow();
            $result = $this->db->table('barang')
                ->limit($limit)
                ->like('nm_barang', $key)
                ->where('kd_cat', $cat)
                ->get()
                ->getResult();
                $jml_barang = $this->db->query('SELECT Count(nm_barang) as jml FROM barang WHERE kd_cat = '.$cat.' AND nm_barang LIKE "%'.$key.'%" LIMIT '.$limit)->getResult();
            $jns_result = $this->db->table('barang')->like('nm_barang', $key)->where('kd_cat', $id->kd_cat)->groupBy('kd_jns')->get()->getResult();
            $merk_result = $this->db->table('barang')->like('nm_barang', $key)->where('kd_cat', $id->kd_cat)->groupBy('merk_id')->get()->getResult();
        } else if ($key != 'all' && $cat == 'all' && $jns != 'all' && $merk == 'all') {
            $id = $this->db->table('kategori')->where('kd_cat', $cat)->get()->getRow();
            $result = $this->db->query('SELECT * FROM barang WHERE kd_cat != " "'.$jns_where.' AND nm_barang LIKE "%'.$key.'%" LIMIT '.$limit)->getResult();
            $jml_barang = $this->db->query('SELECT Count(nm_barang) as jml FROM barang WHERE kd_cat != " "'.$jns_where.' AND nm_barang LIKE "%'.$key.'%" LIMIT '.$limit)->getResult();
            $jns_result = $this->db->table('barang')->like('nm_barang', $key)->groupBy('kd_jns')->get()->getResult();
            $merk_result = $this->db->table('barang')->like('nm_barang', $key)->groupBy('merk_id')->get()->getResult();
        } else if ($key != 'all' && $cat != 'all' && $jns != 'all' && $merk == 'all') {
            $id = $this->db->table('kategori')->where('kd_cat', $cat)->get()->getRow();
            $result = $this->db->query('SELECT * FROM barang WHERE kd_cat = '.$cat.$jns_where.' AND nm_barang LIKE "%'.$key.'%"')->getResult();
            $jml_barang = $this->db->query('SELECT Count(nm_barang) as jml FROM barang WHERE kd_cat = '.$cat.$jns_where.' AND nm_barang LIKE "%'.$key.'%"')->getResult();
            $jns_result = $this->db->table('barang')->like('nm_barang', $key)->where('kd_cat', $id->kd_cat)->groupBy('kd_jns')->get()->getResult();
            $merk_result = $this->db->table('barang')->like('nm_barang', $key)->where('kd_cat', $id->kd_cat)->groupBy('merk_id')->get()->getResult();
        } else if ($key != 'all' && $cat == 'all' && $jns == 'all' && $merk != 'all') {
        } else if ($key != 'all' && $cat != 'all' && $jns == 'all' && $merk != 'all') {
            $id = $this->db->table('kategori')->where('kd_cat', $cat)->get()->getRow();
            $result = $this->db->query('SELECT * FROM barang WHERE kd_cat != " " '.$merk_where.' AND nm_barang LIKE "%'.$key.'%"')->getResult();
            $jml_barang = $this->db->query('SELECT Count(nm_barang) as jml FROM barang WHERE kd_cat != " " '.$merk_where.' AND nm_barang LIKE "%'.$key.'%"')->getResult();
            $jns_result = $this->db->table('barang')->like('nm_barang', $key)->groupBy('kd_jns')->get()->getResult();
            $merk_result = $this->db->table('barang')->like('nm_barang', $key)->groupBy('merk_id')->get()->getResult();
        } else {
            $id = $this->db->table('kategori')->where('kd_cat', $cat)->get()->getRow();
            $result = $this->db->query('SELECT * FROM barang WHERE kd_cat = '.$cat.$jns_where.$merk_where.' AND nm_barang LIKE "%'.$key.'%"')->getResult();
            $jml_barang = $this->db->query('SELECT Count(nm_barang) as jml FROM barang WHERE kd_cat = '.$cat.$jns_where.$merk_where.' AND nm_barang LIKE "%'.$key.'%"')->getResult();
            $jns_result = $this->db->table('barang')->like('nm_barang', $key)->where('kd_cat', $id->kd_cat)->groupBy('kd_jns')->get()->getResult();
            $merk_result = $this->db->table('barang')->like('nm_barang', $key)->where('kd_cat', $id->kd_cat)->groupBy('merk_id')->get()->getResult();
        }


        $wcu = $this->db->table('wcu')->get()->getResult();
        $sales = $this->db->table('sales')->get()->getResult();
        $info = $this->db->table('info')->get()->getRow();
        $lokasi = $this->db->table('list_lokasi')->get()->getResult();
        $lokasi2 = $this->db->table('d_lokasi')->join('list_lokasi', 'list_lokasi.id = d_lokasi.lokasi_id')->get()->getResult();
        $lokasi_awal = $this->db->table('d_lokasi')->where(['lokasi_id' => 1])->get()->getResult();
        $kategori = $this->db->table('kategori')->get()->getResult();
        $jenis = $this->db->table('jenis')->get()->getResult();

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
            'jns_key' => $jns,
            'cat_key' => $cat,
            'merk_key' => $merk,
            'jml' => $limit,
            'jml_barang' => $jml_barang[0]->jml,
            'jns' => $jns_result,
            'merk' => $merk_result,
            'key' => $key,
        ];
        return view('home/produk', $data);
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
}
