Berikut adalah rancangan **modul pengenalan JSON dan cara baca/tulis JSON menggunakan PHP dalam aplikasi console (CLI)** yang bisa Anda gunakan:

***

## **Modul: Pengenalan JSON dan Implementasi di PHP CLI**

### **Tujuan Pembelajaran**

*   Memahami konsep dasar JSON.
*   Mengetahui struktur dan format JSON.
*   Mampu membaca (decode) dan menulis (encode) data JSON menggunakan PHP.
*   Mengimplementasikan operasi JSON dalam aplikasi berbasis CLI.

***

### **1. Pengenalan JSON**

*   **Apa itu JSON?**
    *   JSON (JavaScript Object Notation) adalah format pertukaran data yang ringan, mudah dibaca manusia, dan mudah diproses oleh mesin.
*   **Karakteristik JSON:**
    *   Berbasis teks.
    *   Mendukung tipe data: `string`, `number`, `boolean`, `array`, `object`, dan `null`.
*   **Contoh Struktur JSON:**
    ```json
    {
      "nama": "Teguh",
      "usia": 30,
      "hobi": ["coding", "membaca"]
    }
    ```

***

### **2. Mengapa JSON Penting?**

*   Digunakan untuk komunikasi antar aplikasi (API).
*   Format standar untuk menyimpan konfigurasi atau data.
*   Didukung oleh hampir semua bahasa pemrograman.

***

### **3. Dasar PHP untuk JSON**

PHP menyediakan dua fungsi utama:

*   `json_encode($data)` → Mengubah array/objek PHP menjadi string JSON.
*   `json_decode($json, $assoc)` → Mengubah string JSON menjadi array/objek PHP.
    *   Parameter `$assoc`:
        *   `true` → hasil berupa array asosiatif.
        *   `false` → hasil berupa objek.

***

### **4. Membaca JSON di PHP CLI**

**Contoh: Membaca file JSON**

```php
<?php
// file: read_json.php
$jsonString = file_get_contents("data.json");
$data = json_decode($jsonString, true);

echo "Nama: " . $data['nama'] . PHP_EOL;
echo "Usia: " . $data['usia'] . PHP_EOL;
echo "Hobi: " . implode(", ", $data['hobi']) . PHP_EOL;
?>
```

**Isi file `data.json`:**

```json
{
  "nama": "Teguh",
  "usia": 30,
  "hobi": ["coding", "membaca"]
}
```

**Cara menjalankan di CLI:**

```bash
php read_json.php
```

***

### **5. Menulis JSON di PHP CLI**

**Contoh: Menulis ke file JSON**

```php
<?php
// file: write_json.php
$data = [
    "nama" => "Teguh",
    "usia" => 30,
    "hobi" => ["coding", "membaca"]
];

$jsonString = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents("output.json", $jsonString);

echo "Data berhasil disimpan ke output.json" . PHP_EOL;
?>
```

**Cara menjalankan di CLI:**

```bash
php write_json.php
```

***

### **6. Studi Kasus: Aplikasi CLI CRUD dengan JSON**

*   Buat aplikasi sederhana untuk:
    *   Menambahkan data ke file JSON.
    *   Menampilkan data dari file JSON.
    *   Menghapus data.
*   Gunakan `argv` untuk menerima input dari command line.

**Contoh Skeleton:**

```php
<?php
// file: crud_json.php
$action = $argv[1] ?? null;
$file = "data.json";

if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

$data = json_decode(file_get_contents($file), true);

switch ($action) {
    case "add":
        $nama = $argv[2] ?? "Tanpa Nama";
        $usia = $argv[3] ?? 0;
        $data[] = ["nama" => $nama, "usia" => (int)$usia];
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
        echo "Data ditambahkan.\n";
        break;

    case "list":
        foreach ($data as $item) {
            echo "Nama: {$item['nama']}, Usia: {$item['usia']}\n";
        }
        break;

    default:
        echo "Perintah: php crud_json.php [add|list] [nama] [usia]\n";
}
?>
```

***

### **7. Latihan**

*   Buat file `data.json` berisi daftar mahasiswa.
*   Tulis script untuk menambahkan mahasiswa baru via CLI.
*   Tulis script untuk menampilkan semua mahasiswa.

***
