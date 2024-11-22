<?php 
namespace Zhux\Core;
class Flasher {
    public static function setFlash($pesan, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'tipe'  => $tipe
        ];
    }

 public static function flash(){
 if( isset($_SESSION['flash']) ) {
echo '<div style="transform: translateY(-490%);"class="alert alert-'. $_SESSION['flash']['tipe'] . ' m-3 my-1 p-1" role="alert">' .
  $_SESSION['flash']['pesan'] . '
</div>';
unset($_SESSION['flash']);
        }
    }
}