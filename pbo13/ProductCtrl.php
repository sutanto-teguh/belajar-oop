<?PHP
class ProductCtrl{
	private $table_name = "products";
	private $conn;
	public function __construct($conn){
		$this->conn = $conn;
	}
	public function insert(Product $prd) {
        $query = "INSERT INTO " . $this->table_name . " SET nama_product=:nama_product, harga_product=:harga_product, gambar_product=:gambar_product, keterangan=:keterangan, status=:status";
        $stmt = $this->conn->prepare($query);
       $nama_product = $prd->getNamaProduct();
	   $harga_product =  $prd->getHargaProduct();     
	   $gambar_product =  htmlspecialchars(strip_tags($prd->getGambarProduct()));     
	   $keterangan =  $prd->getKeterangan();     
	   $status =  $prd->getStatus();
	   
        $stmt->bindParam(":nama_product",$nama_product);
        $stmt->bindParam(":harga_product", $harga_product);
        $stmt->bindParam(":keterangan", $keterangan);
		$stmt->bindParam(":gambar_product", $gambar_product);
		$stmt->bindParam(":status", $status);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
	public function getAllProducts(){
		$query = "SELECT * FROM " . $this->table_name;
		$stmt = $conn->prepare($query);
	$stmt->execute();

	// Fetch data as an associative array
	$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $products;
	}
}
?>