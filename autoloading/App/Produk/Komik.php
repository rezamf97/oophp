<?php

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