<?php
class Soal
{
    private string $pertanyaan;
    private array $pilihan;      // array pilihan jawaban
    private int $jawabanBenar;   // index jawaban benar (0,1,2,3)

    // Constructor
    public function __construct(string $pertanyaan, array $pilihan, int $jawabanBenar)
    {
        $this->pertanyaan = $pertanyaan;
        $this->pilihan = $pilihan;
        $this->jawabanBenar = $jawabanBenar;
    }

    // Getter Pertanyaan
    public function getPertanyaan(): string
    {
        return $this->pertanyaan;
    }

    // Getter Pilihan
    public function getPilihan(): array
    {
        return $this->pilihan;
    }

    // Mengecek apakah jawaban user benar
    public function isJawabanBenar(int $jawabanUser): bool
    {
        return $jawabanUser === $this->jawabanBenar;
    }
}
?>