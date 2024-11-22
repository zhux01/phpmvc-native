<?php
namespace Zhux\Models;
use Zhux\Core\Database;
class Tesmodel{
  
  private $db;
  
  public function __construct(){
    $this->db = new Database;
  }
  
  public function upload($nameBaru){
    $query = "INSERT INTO filesupload (namafiles) VALUES (:namafiles)";
    $this->db->query($query);
    $this->db->bind('namafiles',$nameBaru);
    $this->db->execute();
    
  }
  public function datadiri(){
    $data = [
      "nama" => "Saepul Bahri",
      "kelas" => "XII",
      "jabatan" => "Wali Kelas"];
     return $data;
  }
}