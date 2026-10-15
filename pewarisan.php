<?php

// Class Induk (Parent)
class kendaraan
{

    public $merk;
    public function __construct($merk)
    { 

        $this->merk = $merk;
    }
    public function berjalan()
    {

       return $this->merk . "sedang melaju...";   
    }
}
// Class Anak (Child) mewarisi class Kendaraan
class Mobil extends Kendaraan
{
    public $jumlahPintu = 4;
    public function bukaPintu()
    {

        return "membuka " . $this->jumlahPintu . " pintu mobil " . $this->merk;
    }
}

$mobilRPL = new Mobil("Toyota");
echo $mobilRPL->berjalan(); // Menggunakan method warisan dari parent
echo "<br>";
echo $mobilRPL->bukaPintu(); // Menggunakan method milik Child sendiri