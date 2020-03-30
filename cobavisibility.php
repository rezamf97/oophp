<?php

class Produk {
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

	public function getInfoProduk()
	{
		$str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

		return $str;
	}
}

class Komik extends Produk {
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
		$str = "Komik : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga} - {$this->jmlHalaman} Halaman.)";
		return $str;
	}
}

class Game extends Produk {
	public $waktuMain;

	public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain =0 ) {
		parent::__construct($judul, $penulis, $penerbit, $harga);

		$this->waktuMain = $waktuMain;
	}

	public function getInfoProduk(){
		$str = "Game : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga} ~ {$this->waktuMain} Jam.)";
		return $str;
	}
}


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckman", "Sony Computer", 300000, 50);

echo "Komik : " . $produk1->getInfoProduk();
echo "<br>";
echo "Game : " . $produk2->getInfoProduk();
echo "<hr>";
$produk1->setDiskon(50);
echo $produk1->getDiskon();