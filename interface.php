<?php

interface InfoProduk {
	public function getInfoProduk();
}

abstract class Produk {
	public 	$judul = "judul",
			$penulis = "penulis",
			$penerbit = "penerbit",
			$harga = 0;

	protected $diskon = 0;

	public function __construct($judul, $penulis, $penerbit, $harga)
	{
		$this->judul = $judul;
		$this->penulis = $penulis;
		$this->penerbit = $penerbit;
		$this->harga = $harga;
	}

	public function getLabel()
	{
		return "$this->penulis, $this->penerbit";
	}

	abstract public function getInfo();
}

class Komik extends Produk implements InfoProduk {
	public $jmlHalaman;

	public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman = 0) {
		parent::__construct($judul, $penulis, $penerbit, $harga);
		$this->jmlHalaman = $jmlHalaman;
	}

	public function setDiskon( $diskon )
	{
		$this->diskon = $diskon;
	}

	public function getDiskon()
	{
		return $this->harga - ( $this->harga * $this->diskon / 100 );
	}

	public function getInfoProduk(){
		$str = "Komik : " . $this->getInfo(). " - {$this->jmlHalaman} Halaman.";
		return $str;
	}

	public function getInfo()
	{
		$str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

		return $str;
	}
}

class Game extends Produk implements InfoProduk {
	public $waktuMain;

	public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain =0 ) {
		parent::__construct($judul, $penulis, $penerbit, $harga);

		$this->waktuMain = $waktuMain;
	}

	public function getInfoProduk(){
		$str = "Game : " . $this->getInfo(). " - {$this->waktuMain} Jam.";
		return $str;
	}

	public function getInfo()
	{
		$str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

		return $str;
	}
}

class CetakInfoProduk {
	public $daftarProduk = [];

	public function tambahProduk(Produk $produk)
	{
		$this->daftarProduk[] = $produk;
	}
	public function cetak()
	{
		$str = "Daftar Produk : <br>";

		foreach ($this->daftarProduk as $p) {
			$str .= "- {$p->getInfoProduk()} <br>";
		}
		return $str;
	}
}


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckman", "Sony Computer", 300000, 50);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk( $produk1);
$cetakProduk->tambahProduk( $produk2);
echo $cetakProduk->cetak();