<?php

class Product {
    private $nimi;
    private $valmistaja;
    private $hinta;
    private $kuvaus;

    function __construct($nimi, $valmistaja, $hinta, $kuvaus) {
        $this->nimi = $nimi;
        $this->valmistaja = $valmistaja;
        $this->hinta = $hinta;
        $this->kuvaus = $kuvaus;
    }
    public function get_nimi() {
        return $this->nimi;
    }
    public function get_valmistaja() {
        return $this->valmistaja;
    }
    public function get_hinta() {
        return $this->hinta;
    }
    public function get_kuvaus() {
        return $this->kuvaus;
    }
    
    public function get_alvhinta($alvprosentti) {
        $alv = 1 + ($alvprosentti / 100);
        return $this->hinta * $alv;
    }
}