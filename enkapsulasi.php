<?php
class Siswa {
     // Property private, tidak bisa diubah langsung dari luar class
     private $nama;
     private $nilaiPBO;

    // Method public untuk mengisi data (Setter)
    public function setData($namaBaru, $nilaiBaru) {
$this->nama = $namaBaru;
//Validasi: Nilai tidak boleh lebih dari 100
if($nilaiBaru <= 100)  {
$this->nilaiPBO = $nilaiBaru;
} else {
$this->nilaiPBO = 100;
}
}// Method public untuk mengambil data (Getter)

public function getinfo() {

    return "Siswa: " . $this->nama . ",Nilai PBO: ". $this->nilaiPBO;
    
}

}

$siswa1 = new Siswa();
// $siswa1->nilaiPBO = 150; // INI AKAN ERROR karena private!
$siswa1->setData("Ugiiii", 85);
echo $siswa1->getInfo();
?>
   