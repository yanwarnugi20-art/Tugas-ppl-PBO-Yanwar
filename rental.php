<?php

// 1. Membuat class parent (superclass) bernama Rental
class Rental {
    // Enkapsulasi: Property dibuat private agar tidak bisa diakses langsung dari luar class
    private $hargaSewaPerHari;

    // Setter: Method public untuk mengisi/mengubah nilai property private
    public function setHargaSewaPerHari($harga) {
        $this->hargaSewaPerHari = $harga;
    }

    // Getter: Method public untuk mengambil nilai property private
    public function getHargaSewaPerHari() {
        return $this->hargaSewaPerHari;
    }

    // 3. Method hitungDiskon di class parent (sebagai default/base method)
    public function hitungDiskon($jumlahHari) {
        // Secara default, class parent tidak memberikan diskon (mengembalikan 0)
        return 0; 
    }
}

// 2. Membuat class child (subclass) RentalMobil yang melakukan extends (Pewarisan)
class RentalMobil extends Rental {
    
    // 4. Method Overriding (Polimorfisme): Menimpa method hitungDiskon dari parent
    public function hitungDiskon($jumlahHari) {
        $totalSewa = $this->getHargaSewaPerHari() * $jumlahHari;
        
        // Jika sewa lebih dari 3 hari, dapat diskon 10%
        if ($jumlahHari > 3) {
            return $totalSewa * 0.10; // Mengembalikan nominal diskon
        }
        return 0;
    }
}

// 2. Membuat class child (subclass) RentalMotor yang melakukan extends (Pewarisan)
class RentalMotor extends Rental {
    
    // 4. Method Overriding (Polimorfisme): Menimpa method hitungDiskon dari parent
    public function hitungDiskon($jumlahHari) {
        $totalSewa = $this->getHargaSewaPerHari() * $jumlahHari;
        
        // Jika sewa lebih dari 3 hari, dapat diskon 5%
        if ($jumlahHari > 3) {
            return $totalSewa * 0.05; // Mengembalikan nominal diskon
        }
        return 0;
    }
}




echo "--- SISTEM RENTAL KENDARAAN ---\n\n";

// A. Instansiasi Object RentalMobil
$mobil = new RentalMobil();
$mobil->setHargaSewaPerHari(300000); // Harga sewa mobil per hari
$hariSewaMobil = 5; // Sewa 5 hari (Lebih dari 3 hari)

$diskonMobil = $mobil->hitungDiskon($hariSewaMobil);
$totalBayarMobil = ($mobil->getHargaSewaPerHari() * $hariSewaMobil) - $diskonMobil;

echo "PEMINJAMAN MOBIL:\n";
echo "Harga per hari   : Rp " . number_format($mobil->getHargaSewaPerHari(), 0, ',', '.') . "\n";
echo "Jumlah Hari      : " . $hariSewaMobil . " hari\n";
echo "Total Diskon     : Rp " . number_format($diskonMobil, 0, ',', '.') . " (10%)\n";
echo "Total yang dibayar: Rp " . number_format($totalBayarMobil, 0, ',', '.') . "\n\n";


// B. Instansiasi Object RentalMotor
$motor = new RentalMotor();
$motor->setHargaSewaPerHari(75000); // Harga sewa motor per hari
$hariSewaMotor = 3; // Sewa 3 hari (Tidak lebih dari 3 hari, jadi tidak dapat diskon)

$diskonMotor = $motor->hitungDiskon($hariSewaMotor);
$totalBayarMotor = ($motor->getHargaSewaPerHari() * $hariSewaMotor) - $diskonMotor;

echo "PEMINJAMAN MOTOR:\n";
echo "Harga per hari   : Rp " . number_format($motor->getHargaSewaPerHari(), 0, ',', '.') . "\n";
echo "Jumlah Hari      : " . $hariSewaMotor . " hari\n";
echo "Total Diskon     : Rp " . number_format($diskonMotor, 0, ',', '.') . " (0%)\n";
echo "Total yang dibayar: Rp " . number_format($totalBayarMotor, 0, ',', '.') . "\n";

?>