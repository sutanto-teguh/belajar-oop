<?PHP
require_once "User.php";
class LoginCtrl{
	private $user;
	public function __construct(User $usr){
		$this->user = $usr;
	}
	public function checkLogin($uname, $pass){
		//echo $this->user->getUserName();
		$hasil = ($this->user->getUserName()==$uname) && ($this->user->getPassword()==$pass);
		return $hasil;
	}
}
?>