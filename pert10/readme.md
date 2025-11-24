# Contoh Program Quiz
![Contoh Program](https://github.com/sutanto-teguh/belajar-oop/blob/main/pert10/ContohQuiz1.png)

Potongan Class Soal
```PHP
class Soal {
    private $text;
    private $options;
    private $correctAnswerKey;

   public function __construct(string $text, array $options, string $correctAnswerKey) {
        $this->text = $text;
        $this->options = $options;
        $this->correctAnswerKey = strtoupper($correctAnswerKey);
    }
```
Contoh Pembuatan Objek Soal

```php
// 1. Buat Soal-soal (Objek Soal)
$q1 = new Soal(
    "Apa ibu kota Indonesia?",
    ['A' => 'Jakarta', 'B' => 'Surabaya', 'C' => 'Bandung', 'D' => 'Medan'],
    'A'
);

$q2 = new Soal(
    "Siapa presiden pertama Indonesia?",
    ['A' => 'Soeharto', 'B' => 'Megawati', 'C' => 'Soekarno', 'D' => 'Jokowi'],
    'C'
);

$q3 = new Soal(
    "Apa bahasa pemrograman yang sedang kita gunakan?",
    ['A' => 'Python', 'B' => 'JavaScript', 'C' => 'Java', 'D' => 'PHP'],
    'D'
);

$q4 = new Soal(
    "Berapa hasil dari 8 + 4 * 2?",
    ['A' => '24', 'B' => '16', 'C' => '20', 'D' => '14'],
    'B' // (Prioritas operasi: 4*2 = 8, lalu 8+8 = 16)
);
```
