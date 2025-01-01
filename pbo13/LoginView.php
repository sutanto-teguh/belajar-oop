<?PHP
require_once "LoginCtrl.php";
class LoginView{
	private $loginCtrl;
	public function __construct(LoginCtrl $lc){
		$this->loginCtrl=$lc;
	}
	public function output($u,$p){
		if($this->loginCtrl->checkLogin($u,$p)==1)
			echo "Login Oke";
		else
			echo "Login Gagal";
	}
}
$usr=new User("admin","123","Tukang Admin");
$lc = new LoginCtrl($usr);
$user_name = $_POST["user_name"];
$pass = $_POST["password"];

$lv=new LoginView($lc);
$lv->output($user_name,$pass);
?>