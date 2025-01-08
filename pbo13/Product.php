<?PHP
class Product{
	private $id;
	private $nama_product;
	private $harga_product;
	private $gambar_product;
	private $keterangan;
	private $status;
	public function __construct($id, $nama, $harga, $keterangan){
		$this->id = $id;
		$this->gambar_product ="";
		$this->status = 1;
		$this->id = $id;
		$this->nama_product=$nama;
		$this->harga_product=$harga;
	}
	public function getNamaProduct(){
		return $this->nama_product;
	}
	public function getHargaProduct(){
		return $this->harga_product;
	}
	public function getKeterangan(){
		return $this->keterangan;
	}
	public function getStatus(){
		return $this->status;
	}
	public function getGambarProduct(){
		return $this->gambar_product;
	}
}
?>