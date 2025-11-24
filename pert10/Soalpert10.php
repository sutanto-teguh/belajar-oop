<?php
class Soal {
    private string $pertanyaan;
    private array $pilihan;  
    private string $jawaban; 

    public function __construct($pertanyaan, $opsi, $jawaban) {
        $this->pertanyaan = $pertanyaan;
        $this->pilihan = $opsi;
        $this->jawaban = $jawaban;
    }

    public function getPertanyaan() {
        return $this->pertanyaan;
    }

    public function getPilihan() {
        return $this->pilihan;
    }

    public function cekJawaban($input) {
        return strtoupper(trim($input)) === strtoupper($this->jawaban);
    }
}
?>