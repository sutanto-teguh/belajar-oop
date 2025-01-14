# belajar-oop
Repository belajar pemrograman berbasis objek
Tentu! Berikut adalah contoh kode program PHP menggunakan pendekatan Object-Oriented Programming (OOP) dan Model-View-Controller (MVC) untuk melakukan operasi insert, update, delete, dan view data dari tabel `Product`.

### Struktur Direktori
```
/mvc
|-- /controllers
|   |-- ProductController.php
|-- /models
|   |-- Product.php
|-- /views
|   |-- product
|       |-- index.php
|       |-- create.php
|       |-- edit.php
|-- /config
|   |-- Database.php
|-- index.php
```

### 1. Konfigurasi Database (`config/Database.php`)
```php
<?php
class Database {
    private $host = "localhost";
    private $db_name = "your_database_name";
    private $username = "your_username";
    private $password = "your_password";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
```

### 2. Model (`models/Product.php`)
```php
<?php
class Product {
    private $conn;
    private $table_name = "Product";

    public $id;
    public $nama_product;
    public $harga;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama_product=:nama_product, harga=:harga";
        $stmt = $this->conn->prepare($query);

        $this->nama_product = htmlspecialchars(strip_tags($this->nama_product));
        $this->harga = htmlspecialchars(strip_tags($this->harga));

        $stmt->bindParam(":nama_product", $this->nama_product);
        $stmt->bindParam(":harga", $this->harga);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nama_product = :nama_product, harga = :harga WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->nama_product = htmlspecialchars(strip_tags($this->nama_product));
        $this->harga = htmlspecialchars(strip_tags($this->harga));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":nama_product", $this->nama_product);
        $stmt->bindParam(":harga", $this->harga);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
```

### 3. Controller (`controllers/ProductController.php`)
```php
<?php
require_once '../config/Database.php';
require_once '../models/Product.php';

class ProductController {
    private $db;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    public function index() {
        $stmt = $this->product->read();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include '../views/product/index.php';
    }

    public function create() {
        if($_POST) {
            $this->product->nama_product = $_POST['nama_product'];
            $this->product->harga = $_POST['harga'];
            if($this->product->create()) {
                header("Location: index.php");
            }
        }
        include '../views/product/create.php';
    }

    public function edit($id) {
        if($_POST) {
            $this->product->id = $id;
            $this->product->nama_product = $_POST['nama_product'];
            $this->product->harga = $_POST['harga'];
            if($this->product->update()) {
                header("Location: index.php");
            }
        } else {
            $this->product->id = $id;
            $product = $this->product->read()->fetch(PDO::FETCH_ASSOC);
            include '../views/product/edit.php';
        }
    }

    public function delete($id) {
        $this->product->id = $id;
        if($this->product->delete()) {
            header("Location: index.php");
        }
    }
}
?>
```

### 4. Views
#### `views/product/index.php`
```php
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>
    <a href="create.php">Create New Product</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Product</th>
            <th>Harga</th>
            <th>Actions</th>
        </tr>
        <?php foreach($products as $product): ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['nama_product']; ?></td>
            <td><?php echo $product['harga']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $product['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $product['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
```

#### `views/product/create.php`
```php
<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Create Product</h1>
    <form action="create.php" method="post">
        <label for="nama_product">Nama Product:</label>
        <input type="text" name="nama_product" id="nama_product" required>
        <br>
        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" required>
        <br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
```

#### `views/product/edit.php`
```php
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="edit.php?id=<?php echo $product['id']; ?>" method="post">
        <label for="nama_product">Nama Product:</label>
        <input type="text" name="nama_product" id="nama_product" value="<?php echo $product['nama_product']; ?>" required>
        <br>
        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" value="<?php echo $product['harga']; ?>" required>
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
```

### 5. Entry Point (`index.php`)
```php
<?php
require_once 'controllers/ProductController.php';

$controller = new ProductController();

if(isset($_GET['action']) && $_GET['action'] == 'create') {
    $controller->create();
} elseif(isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $controller->edit($_GET['id']);
} elseif(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $controller->delete($_GET['id']);
} else {
    $controller->index();
}
?>
```

Dengan struktur dan kode di atas, Anda dapat melakukan operasi CRUD (Create, Read, Update, Delete) pada tabel `Product` menggunakan pendekatan OOP dan MVC di PHP. Jika ada pertanyaan lebih lanjut atau butuh bantuan tambahan, jangan ragu untuk bertanya! 😊
