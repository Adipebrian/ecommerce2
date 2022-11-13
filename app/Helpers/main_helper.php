<?php

use Config\Database;

function compress($source, $destination, $quality)
{

    $info = getimagesize($source);
    if ($info) {
        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
            imagejpeg($image, $destination, $quality);
        } elseif ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($source);
            imagegif($image, $destination);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($source);
            imagealphablending($image, false);
            imagesavealpha($image, true);
            imagepng($image, $destination);
        }
    } else {
        return false;
    }

    return $destination;
}
function convert_filesize($bytes, $decimals = 2)
{
    $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

function jns($no)
{
    $db = Database::connect();
    $result = $db->table('jenis')->getWhere(['kd_jns' => $no])->getRow();
    return $result->jns;
}
function cat($no)
{
    $db = Database::connect();
    $result = $db->table('kategori')->getWhere(['kd_cat' => $no])->getRow();
    return $result->kategori;
}
function cat_all()
{
    $db = Database::connect();
    $result = $db->table('kategori')->get()->getResult();
    return $result;
}
function jns_all()
{
    $db = Database::connect();
    $result = $db->table('jenis')->get()->getResult();
    return $result;
}
function menu()
{
    $db = Database::connect();
    $result = $db->table('menu')->join('list_menu', 'list_menu.id = menu.menu_id', 'left')->get()->getResult();
    return $result;
}
function get_menu($id)
{
    $db = Database::connect();
    $result = $db->table('list_menu')->where(['id' => $id])->get()->getRow();
    if($result){
        return $result->menu;
    }
    return null;
}
function list_menu()
{
    $db = Database::connect();
    $result = $db->table('list_menu')->get()->getResult();
    return $result;
}
function getidlast()
{
    $db = Database::connect();
    $result = $db->table('users')->get()->getRow();
    dd($result->id);
    return $result->id;
}
