<?PHP
class User{
	private $username;
	private $password;
	private $namaLengkap;
	public function __construct($uname, $pass, $nama){
		$this->username = $uname;
		$this->password = $pass;
		$this->namaLengkap = $nama;
	}
	public function getUserName(){
		return $this->username;
	}
	public function getPassword(){
		return $this->password;
	}
	public function getNama(){
		return $this->namaLengkap;
	}
}
?>