<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;
// use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

class Stock extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    /*
    * Stock
    */
    public function index()
    {
        $this->builder = $this->db->table('barang');
        $this->builder->select('*')
            ->orderBy('kode', 'DESC');
        $result = $this->builder->get()->getResult();

        $data = [
            'uri' => $this->uri,
            'result' => $result,
            'validation' => \Config\Services::validation(),
        ];
        return view('stock/index', $data);
    }

    public function edit_stock()
    {
        $kode = $this->request->getVar('kode');

        $data = [
            'stok' => $this->request->getVar('stok'),
            'updated_at' => $this->time
        ];
        $this->builder = $this->db->table('barang');
        $this->builder->select('*')
            ->where('kode', $kode)
            ->update($data);
        session()->setFlashdata('success', 'Stock berhasil diupdate!');
        return redirect()->to('stock/index');
    }

    /*
    * Barang
    */
    public function barang()
    {
        $this->builder = $this->db->table('barang');
        $this->builder->select('*')
            ->orderBy('kode', 'DESC');
        $result = $this->builder->get()->getResult();

        $cat = $this->db->table('kategori')->get()->getResult();
        $jns = $this->db->table('jenis')->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'result' => $result,
            'cat' => $cat,
            'jns' => $jns,
            'validation' => \Config\Services::validation(),
        ];
        return view('stock/barang', $data);
    }

    public function import_barang()
    {
        $progress = [];

        $file_excel = $this->request->getFile('fileexcel');
        $fileimg = $this->request->getFile('fileimg');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } elseif ($ext == 'xlsx') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        } else {
            session()->setFlashdata('failed', 'file gagal di import!');
            return redirect()->to('stock/barang');
        }

        $zip = new \ZipArchive;
        $res = $zip->open($fileimg);
        if ($res === TRUE) {
            $extractpath = "assets/img/barang";
            $zip->extractTo($extractpath);
            $zip->close();
        } else {
            session()->setFlashdata('failed', 'file gambar gagal di import!');
            return redirect()->to('stock/barang');
        }

        $spreadsheet = $render->load($file_excel);
        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $x => $row) {
            if ($x <= 2) {
                if ($x == 2) {
                    if ($row[0] != 'Kode Item' || $row[1] != 'Nama Barang' || $row[2] != 'Kode Jenis'  || $row[3] != 'Kode Kategori' || $row[4] != 'Merk Id' || $row[5] != 'Satuan' || $row[6] != 'Berat (Kg)' || $row[7] != 'Harga Jual' || $row[8] != 'Stok Awal' || $row[9] != 'Keterangan' || $row[10] != 'Image 1' || $row[11] != 'Image 2' || $row[12] != 'Image 3' || $row[13] != 'Image 4') {
                        session()->setFlashdata('failed', 'Format tidak falid!');
                        return redirect()->to('/stock/barang');
                    }
                }
                continue;
            }
            $kode = $row[0];
            if (!$kode) {
                continue;
            }
            $cekKode = $this->db->table('barang')->getWhere(['kode' => $kode])->getResult();

            if (count($cekKode) > 0) {
                $obj = [
                    'sts' => 0,
                    'note' => 'Record gagal diupload! (data sudah ada)',
                ];
                array_push($progress, $obj);
            } else {
                if (!file_exists('assets/img/barang/' . $row[11]) && !file_exists('assets/img/barang/' . $row[12]) && !file_exists('assets/img/barang/' . $row[13])) {
                    $image2 = null;
                    $image3 = null;
                    $image4 = null;
                } elseif (file_exists('assets/img/barang/' . $row[11]) && file_exists('assets/img/barang/' . $row[12]) && !file_exists('assets/img/barang/' . $row[13])) {
                    $image2 = $row[11];
                    $image3 = $row[12];
                    $image4 = null;
                } elseif (file_exists('assets/img/barang/' . $row[11]) && !file_exists('assets/img/barang/' . $row[12]) && file_exists('assets/img/barang/' . $row[13])) {
                    $image2 = $row[11];
                    $image3 = null;
                    $image4 = $row[13];
                } elseif (!file_exists('assets/img/barang/' . $row[11]) && file_exists('assets/img/barang/' . $row[12]) && file_exists('assets/img/barang/' . $row[13])) {
                    $image2 = null;
                    $image3 = $row[12];
                    $image4 = $row[11];
                } elseif (file_exists('assets/img/barang/' . $row[11]) && file_exists('assets/img/barang/' . $row[12]) && file_exists('assets/img/barang/' . $row[13])) {
                    $image2 = $row[11];
                    $image3 = $row[12];
                    $image4 = $row[13];
                } elseif (file_exists('assets/img/barang/' . $row[11]) && !file_exists('assets/img/barang/' . $row[12]) && !file_exists('assets/img/barang/' . $row[13])) {
                    $image2 = $row[11];
                    $image3 = null;
                    $image4 = null;
                } elseif (!file_exists('assets/img/barang/' . $row[11]) && file_exists('assets/img/barang/' . $row[12]) && !file_exists('assets/img/barang/' . $row[13])) {
                    $image2 = null;
                    $image3 = $row[12];
                    $image4 = null;
                } elseif (!file_exists('assets/img/barang/' . $row[11]) && !file_exists('assets/img/barang/' . $row[12]) && file_exists('assets/img/barang/' . $row[13])) {
                    $image2 = null;
                    $image3 = null;
                    $image4 = $row[13];
                }


                $simpandata = [
                    'kode' => $kode,
                    'nm_barang' => $row[1],
                    'kd_jns' => $row[2],
                    'kd_cat' => $row[3],
                    'merk_id' => $row[4],
                    'satuan' => $row[5],
                    'berat' => $row[6],
                    'harga' => $row[7],
                    'stok' => $row[8],
                    'ket' => $row[9],
                    'image1' => $row[10],
                    'image2' => $image2,
                    'image3' => $image3,
                    'image4' => $image4,
                    'created_at' => $this->time
                ];
                if (file_exists('assets/img/barang/' . $row[10])) {
                    if (!file_exists('assets/img/barang/' . $row[11])) {
                        $this->db->table('barang')->insert($simpandata);
                        $obj = [
                            'sts' => 1,
                            'note' => 'Record berhasil ditambahkan! (image 2 tidak ditemukan)',
                        ];
                        array_push($progress, $obj);
                    } else if (!file_exists('assets/img/barang/' . $row[12])) {
                        $this->db->table('barang')->insert($simpandata);
                        $obj = [
                            'sts' => 1,
                            'note' => 'Record berhasil ditambahkan! (image 3 tidak ditemukan)',
                        ];
                        array_push($progress, $obj);
                    } else if (!file_exists('assets/img/barang/' . $row[13])) {
                        $this->db->table('barang')->insert($simpandata);
                        $obj = [
                            'sts' => 1,
                            'note' => 'Record berhasil ditambahkan! (image 4 tidak ditemukan)',
                        ];
                        array_push($progress, $obj);
                    } else {
                        $this->db->table('barang')->insert($simpandata);
                        $obj = [
                            'sts' => 1,
                            'note' => 'Record berhasil ditambahkan!',
                        ];
                        array_push($progress, $obj);
                    }
                } else {
                    $obj = [
                        'sts' => 0,
                        'note' => 'Record gagal ditambahkan! (image 1 tidak ditemukan)',
                    ];
                    array_push($progress, $obj);
                }
            }
        }

        $str = json_encode($progress);
        session()->setFlashdata('sts', $str);
        return redirect()->to('/stock/barang');
    }

    public function add_barang()
    {
        $cat = $this->db->table('kategori')->get()->getResult();
        $jns = $this->db->table('jenis')->get()->getResult();
        $merk = $this->db->table('merk')->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'cat' => $cat,
            'jns' => $jns,
            'merk' => $merk,
            'validation' => \Config\Services::validation(),
        ];
        return view('stock/addBarang', $data);
    }
    public function edit_barang($kode)
    {
        $result = $this->db->table('barang')->where('kode', $kode)->get()->getRow();
        $cat = $this->db->table('kategori')->get()->getResult();
        $jns = $this->db->table('jenis')->get()->getResult();
        $merk = $this->db->table('merk')->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'cat' => $cat,
            'jns' => $jns,
            'merk' => $merk,
            'result' => $result,
            'validation' => \Config\Services::validation(),
        ];
        return view('stock/editBarang', $data);
    }
    public function add_barang_action()
    {
        $kode = $this->request->getVar('kode');
        $fileFoto = $this->mRequest->getFile('foto');
        $fileFoto2 = $this->mRequest->getFile('foto2');
        $fileFoto3 = $this->mRequest->getFile('foto3');
        $fileFoto4 = $this->mRequest->getFile('foto4');
        $namaFoto2 = null;
        $namaFoto3 = null;
        $namaFoto4 = null;

        if (!$this->validate([
            'kode' => [
                'rules' => 'is_unique[barang.kode]',
                'errors' => [
                    'is_unique' => 'Kode sudah dipakai',
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/JPG]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'foto2' => [
                'rules' => 'max_size[foto2,1024]|is_image[foto2]|mime_in[foto2,image/jpg,image/jpeg,image/png,image/JPG]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'foto3' => [
                'rules' => 'max_size[foto3,1024]|is_image[foto3]|mime_in[foto3,image/jpg,image/jpeg,image/png,image/JPG]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'foto4' => [
                'rules' => 'max_size[foto4,1024]|is_image[foto4]|mime_in[foto4,image/jpg,image/jpeg,image/png,image/JPG]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
        ])) {
            return redirect()->to('/stock/add_barang')->withInput();
        };

        $namaFoto = 'img_' . $kode . '_1.png';
        $fileFoto->move('assets/img/barang', $namaFoto);
        if (!$fileFoto2->getError() == 4) {
            $namaFoto2 = 'img_' . $kode . '_2.png';
            $fileFoto2->move('assets/img/barang', $namaFoto2);
        }

        if (!$fileFoto3->getError() == 4) {
            $namaFoto3 = 'img_' . $kode . '_3.png';
            $fileFoto3->move('assets/img/barang', $namaFoto3);
        }

        if (!$fileFoto4->getError() == 4) {
            $namaFoto4 = 'img_' . $kode . '_4.png';
            $fileFoto4->move('assets/img/barang', $namaFoto4);
        }

        $data = [
            'kode' => $this->request->getVar('kode'),
            'nm_barang' => $this->request->getVar('nm_barang'),
            'kd_jns' => $this->request->getVar('jenis'),
            'kd_cat' => $this->request->getVar('kategori'),
            'merk_id' => $this->request->getVar('merk_id'),
            'satuan' => $this->request->getVar('satuan'),
            'berat' => $this->request->getVar('berat'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'ket' => $this->request->getVar('ket'),
            'image1' => $namaFoto,
            'image2' => $namaFoto2,
            'image3' => $namaFoto3,
            'image4' => $namaFoto4,
            'updated_at' => $this->time
        ];
        $res = $this->db->table('barang')->getWhere(['kode' => $kode])->getResult();
        if ($res) {
            session()->setFlashdata('failed', 'Barang sudah ada! (kode sama)');
            return redirect()->to('stock/barang');
        }
        $this->builder = $this->db->table('barang');
        $this->builder->select('*')
            ->insert($data);
        session()->setFlashdata('success', 'Barang berhasil ditambahkan!');
        return redirect()->to('stock/barang');
    }

    public function edit_barang_action()
    {
        $kode = $this->request->getVar('kode');
        $fileFoto = $this->mRequest->getFile('foto');
        $fileFoto2 = $this->mRequest->getFile('foto2');
        $fileFoto3 = $this->mRequest->getFile('foto3');
        $fileFoto4 = $this->mRequest->getFile('foto4');
        $result_barang = $this->db->table('barang')->where('kode',$kode)->get()->getRow();
        if (!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/JPG]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'foto2' => [
                'rules' => 'max_size[foto2,1024]|is_image[foto2]|mime_in[foto2,image/jpg,image/jpeg,image/png,image/JPG]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'foto3' => [
                'rules' => 'max_size[foto3,1024]|is_image[foto3]|mime_in[foto3,image/jpg,image/jpeg,image/png,image/JPG]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'foto4' => [
                'rules' => 'max_size[foto4,1024]|is_image[foto4]|mime_in[foto4,image/jpg,image/jpeg,image/png,image/JPG]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
        ])) {
            return redirect()->to('/stock/edit_barang')->withInput();
        };

        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->mRequest->getVar('fotoLama1');
        } else {
            if($result_barang->image1){
                unlink('assets/img/barang/' . $this->mRequest->getVar('fotoLama1'));
            }
            $namaFoto = 'img' . $kode . '.png';
            $fileFoto->move('assets/img/barang', $namaFoto);
        }
        if ($fileFoto2->getError() == 4) {
            $namaFoto2 = $this->mRequest->getVar('fotoLama2');
        } else {
            if($result_barang->image2){
                unlink('assets/img/barang/' . $this->mRequest->getVar('fotoLama2'));
            }
            $namaFoto2 = 'img' . $kode . '_2.png';
            $fileFoto2->move('assets/img/barang', $namaFoto2);
        }
        if ($fileFoto3->getError() == 4) {
            $namaFoto3 = $this->mRequest->getVar('fotoLama3');
        } else {
            if($result_barang->image3){
                unlink('assets/img/barang/' . $this->mRequest->getVar('fotoLama3'));
            }
            $namaFoto3 = 'img' . $kode . '_3.png';
            $fileFoto3->move('assets/img/barang', $namaFoto3);
        }
        if ($fileFoto4->getError() == 4) {
            $namaFoto4 = $this->mRequest->getVar('fotoLama4');
        } else {
            if($result_barang->image4){
                unlink('assets/img/barang/' . $this->mRequest->getVar('fotoLama4'));
            }
            $namaFoto4 = 'img' . $kode . '_4.png';
            $fileFoto4->move('assets/img/barang', $namaFoto4);
        }
        $data = [
            'kode' => $this->request->getVar('kode'),
            'nm_barang' => $this->request->getVar('nm_barang'),
            'kd_jns' => $this->request->getVar('jenis'),
            'kd_cat' => $this->request->getVar('kategori'),
            'merk_id' => $this->request->getVar('merk_id'),
            'satuan' => $this->request->getVar('satuan'),
            'berat' => $this->request->getVar('berat'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'ket' => $this->request->getVar('ket'),
            'image1' => $namaFoto,
            'image2' => $namaFoto2,
            'image3' => $namaFoto3,
            'image4' => $namaFoto4,
            'updated_at' => $this->time
        ];
        $this->builder = $this->db->table('barang');
        $this->builder->select('*')
            ->where('kode', $kode)
            ->update($data);
        session()->setFlashdata('success', 'Barang berhasil diupdate!');
        return redirect()->to('stock/edit_barang/'.$kode);
    }


    public function delete_barang()
    {
        $kode = $this->request->getVar('kode');
        $this->builder = $this->db->table('barang');
        $this->builder->select('*')
            ->where('kode', $kode)
            ->delete();
        $this->db->table('stock')->where('kd_bar', $kode)->delete();
        session()->setFlashdata('success', 'Barang berhasil dihapus!');
        return redirect()->to('stock/barang');
    }

    /*
    * Kategori
    */

    public function kategori()
    {
        $this->builder = $this->db->table('kategori');
        $this->builder->select('*')
            ->orderBy('kd_cat', 'DESC');
        $result = $this->builder->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'result' => $result,
            'sts' => false,
            'validation' => \Config\Services::validation(),
        ];
        return view('stock/kategori', $data);
    }

    public function import_kategori()
    {
        $progress = [];

        $file_excel = $this->request->getFile('fileexcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } elseif ($ext == 'xlsx') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        } else {
            session()->setFlashdata('failed', 'file gagal di import!');
            return redirect()->to('stock/kategori');
        }
        $spreadsheet = $render->load($file_excel);
        $spreadsheet->setActiveSheetIndex(0);
        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $x => $row) {
            if ($x <= 2) {
                if ($x == 2) {
                    if ($row[0] != 'Kode Kategori' || $row[1] != 'Kategori') {
                        session()->setFlashdata('failed', 'Format tidak falid!');
                        return redirect()->to('/stock/kategori');
                    }
                }
                continue;
            }
            $kode = $row[0];
            $kategori = $row[1];
            $cekKode = $this->db->table('kategori')->getWhere(['kd_cat' => $kode])->getResult();

            if (count($cekKode) > 0) {
                $obj = [
                    'sts' => 0,
                    'note' => 'Record gagal diupload! (data sudah ada)',
                ];
                array_push($progress, $obj);
            } else {
                if ($kode) {
                    $simpandata = [
                        'kd_cat' => $kode,
                        'kategori' => $kategori,
                        'created_at' => $this->time
                    ];
                    $this->db->table('kategori')->insert($simpandata);
                    $obj = [
                        'sts' => 1,
                        'note' => 'Record inserted successfully!',
                    ];
                    array_push($progress, $obj);
                }
            }
        }

        $str = json_encode($progress);
        session()->setFlashdata('sts', $str);
        return redirect()->to('/stock/kategori');
    }

    public function add_kategori()
    {
        $kode = $this->request->getVar('kode');
        $data = [
            'kd_cat' => $kode,
            'kategori' => $this->request->getVar('kategori'),
            'created_at' => $this->time
        ];
        $res = $this->db->table('kategori')->getWhere(['kd_cat' => $kode])->getResult();
        if ($res) {
            session()->setFlashdata('failed', 'Kategori sudah ada! (kode sama)');
            return redirect()->to('stock/kategori');
        }
        $this->builder = $this->db->table('kategori');
        $this->builder->select('*')
            ->insert($data);
        session()->setFlashdata('success', 'Kategori berhasil ditambahkan!');
        return redirect()->to('stock/kategori');
    }

    public function edit_kategori()
    {
        $kode = $this->request->getVar('kode');

        $data = [
            'kd_cat' => $kode,
            'kategori' => $this->request->getVar('kategori'),
            'updated_at' => $this->time
        ];
        $this->builder = $this->db->table('kategori');
        $this->builder->select('*')
            ->where('kd_cat', $kode)
            ->update($data);
        session()->setFlashdata('success', 'Kategori berhasil diupdate!');
        return redirect()->to('stock/kategori');
    }

    public function delete_kategori()
    {
        $kode = $this->request->getVar('kode');
        $this->builder = $this->db->table('kategori');
        $this->builder->select('*')
            ->where('kd_cat', $kode)
            ->delete();
        session()->setFlashdata('success', 'Kategori berhasil dihapus!');
        return redirect()->to('stock/kategori');
    }

    public function merk()
    {
        $this->builder = $this->db->table('merk');
        $this->builder->select('*')
            ->orderBy('id', 'DESC');
        $result = $this->builder->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'result' => $result,
            'sts' => false,
            'validation' => \Config\Services::validation(),
        ];
        return view('stock/merk', $data);
    }

    public function import_merk()
    {
        $progress = [];

        $file_excel = $this->request->getFile('fileexcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } elseif ($ext == 'xlsx') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        } else {
            session()->setFlashdata('failed', 'file gagal di import!');
            return redirect()->to('stock/merk');
        }
        $spreadsheet = $render->load($file_excel);
        $spreadsheet->setActiveSheetIndex(0);
        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $x => $row) {
            if ($x <= 2) {
                if ($x == 2) {
                    if ($row[0] != 'Merk' && $row[1] != 'Merk ID') {
                        session()->setFlashdata('failed', 'Format tidak falid!');
                        return redirect()->to('/stock/merk');
                    }
                }
                continue;
            } else if ($row[0]) {
                $result = $this->db->table('merk')->where('id',$row[1])->get()->getRow();
                if(!$result){
                    $simpandata = [
                        'merk' => $row[0],
                        'id' => $row[1],
                    ];
                    $this->db->table('merk')->insert($simpandata);
                    $obj = [
                        'sts' => 1,
                        'note' => 'Record inserted successfully!',
                    ];
                    array_push($progress, $obj);
                }else{
                    $obj = [
                        'sts' => 0,
                        'note' => 'Record inserted failed! (ID sudah digunakan)',
                    ];
                    array_push($progress, $obj);
                }
            }
        }

        $str = json_encode($progress);
        session()->setFlashdata('sts', $str);
        return redirect()->to('/stock/merk');
    }

    public function add_merk()
    {
        $data = [
            'merk' => $this->request->getVar('merk'),
        ];
        $this->builder = $this->db->table('merk');
        $this->builder->select('*')
            ->insert($data);
        session()->setFlashdata('success', 'Merk berhasil ditambahkan!');
        return redirect()->to('stock/merk');
    }

    public function edit_merk()
    {
        $id = $this->request->getVar('id');

        $data = [
            'merk' => $this->request->getVar('merk'),
        ];
        $this->builder = $this->db->table('merk');
        $this->builder->select('*')
            ->where('id', $id)
            ->update($data);
        session()->setFlashdata('success', 'Merk berhasil diupdate!');
        return redirect()->to('stock/merk');
    }

    public function delete_merk()
    {
        $id = $this->request->getVar('id');
        $this->builder = $this->db->table('merk');
        $this->builder->select('*')
            ->where('id', $id)
            ->delete();
        session()->setFlashdata('success', 'Merk berhasil dihapus!');
        return redirect()->to('stock/merk');
    }

    /*
    * Jenis
    */

    public function jenis()
    {
        $this->builder = $this->db->table('jenis');
        $this->builder->select('*')
            ->orderBy('kd_jns', 'DESC');
        $result = $this->builder->get()->getResult();
        $data = [
            'uri' => $this->uri,
            'result' => $result,
            'validation' => \Config\Services::validation(),
        ];
        return view('stock/jenis', $data);
    }

    public function import_jenis()
    {
        $progress = [];

        $file_excel = $this->request->getFile('fileexcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } elseif ($ext == 'xlsx') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        } else {
            session()->setFlashdata('failed', 'file gagal di import!');
            return redirect()->to('stock/jenis');
        }
        $spreadsheet = $render->load($file_excel);
        $spreadsheet->setActiveSheetIndex(0);
        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $x => $row) {
            if ($x <= 2) {
                if ($x == 2) {
                    if ($row[0] != 'Kode Jenis' || $row[1] != 'Jenis') {
                        session()->setFlashdata('failed', 'Format tidak falid!');
                        return redirect()->to('/stock/jenis');
                    }
                }
                continue;
            }
            $kode = $row[0];
            $jenis = $row[1];
            $cekKode = $this->db->table('jenis')->getWhere(['kd_cat' => $kode])->getResult();

            if (count($cekKode) > 0) {
                $obj = [
                    'sts' => 0,
                    'note' => 'Record gagal diupload! (data sudah ada)',
                ];
                array_push($progress, $obj);
            } else {
                if ($kode) {
                    $simpandata = [
                        'kd_cat' => $kode,
                        'jns' => $jenis,
                        'created_at' => $this->time
                    ];
                    $this->db->table('jenis')->insert($simpandata);
                    $obj = [
                        'sts' => 1,
                        'note' => 'Record inserted successfully!',
                    ];
                    array_push($progress, $obj);
                }
            }
        }

        $str = json_encode($progress);
        session()->setFlashdata('sts', $str);
        return redirect()->to('/stock/jenis');
    }

    public function add_jenis()
    {
        $kode = $this->request->getVar('kode');

        $data = [
            'kd_jns' => $kode,
            'jns' => $this->request->getVar('jenis'),
            'created_at' => $this->time
        ];
        $res = $this->db->table('jenis')->getWhere(['kd_jns' => $kode])->getResult();
        if ($res) {
            session()->setFlashdata('failed', 'Jenis Barang sudah ada! (kode sama)');
            return redirect()->to('stock/jenis');
        }
        $this->builder = $this->db->table('jenis');
        $this->builder->select('*')
            ->insert($data);
        session()->setFlashdata('success', 'Jenis Barang berhasil ditambahkan!');
        return redirect()->to('stock/jenis');
    }

    public function edit_jenis()
    {
        $kode = $this->request->getVar('kode');

        $data = [
            'kd_jns' => $kode,
            'jns' => $this->request->getVar('jenis'),
            'created_at' => $this->time
        ];
        $this->builder = $this->db->table('jenis');
        $this->builder->select('*')
            ->where('kd_jns', $kode)
            ->update($data);
        session()->setFlashdata('success', 'Jenis Barang berhasil diupdate!');
        return redirect()->to('stock/jenis');
    }

    public function delete_jenis()
    {
        $kode = $this->request->getVar('kode');
        $this->builder = $this->db->table('jenis');
        $this->builder->select('*')
            ->where('kd_jns', $kode)
            ->delete();
        session()->setFlashdata('success', 'Jenis Barang berhasil dihapus!');
        return redirect()->to('stock/jenis');
    }
}
