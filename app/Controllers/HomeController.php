<?php

namespace Zhux\Controllers;
use Zhux\Core\View;
use Zhux\Models\Tesmodel;
use Zhux\Core\Flasher;

class HomeController{
  
public function user(){
  echo "tes";
}

public function PenggunaanModel(){
      $cekmodel = new Tesmodel;
      $data = $cekmodel->datadiri();
      View::render('home/index',$data);
    }

public function index(){
  View::render('template/header');
  View::render('upload');
  $flasher = Flasher::flash();
  View::render('template/footer');
}

public function uploader(){
  $nameFiles = $_FILES['files']['name'];
  $type = $_FILES['files']['type'];
  $error = $_FILES['files']['error'];
  $tmpName = $_FILES['files']['tmp_name'];
  
  
  
  if($error == 4){
    Flasher::setFlash('Silahkan pilih gambar untuk di Upload', 'danger');
    header('Location: /');
    exit;
  }
  
  if($type !== 'image/jpeg' && $type !== 'image/gif'){
    Flasher::setFlash('Format file tidak didukung', 'danger');
    header('Location: /');
    exit;
  }
  
  $files = file_get_contents($tmpName);
  $files = bin2hex($files);
  //3c3f706870 hexadecimal dari <?php
  //3c3f3d hexadecimal dari <?=
  $pattern = "/3c3f706870|3c3f3d/";
  if(preg_match($pattern,$files)){
    Flasher::setFlash('Terdeteksi memanipulasi data, mau ngehek ya XD', 'danger');
    header('Location: /');
    exit;
  }
  $nameBaru = explode('.',$nameFiles);
  $nameBaru = end($nameBaru);
  $nameBaru = uniqid('zhux01-') . '.' . $nameBaru;
  if (move_uploaded_file($tmpName, 'img/' . $nameBaru)){
    $insertDatabase = new Tesmodel;
    $insertDatabase->upload($nameBaru);
    Flasher::setFlash('File berhasil di Upload', 'success');
    header('Location: /');
    exit;
    }
}
}