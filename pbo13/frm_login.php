<?PHP
require_once "UI.php";
	UI::setTitle("Program Resto");
	UI::setHeader("Ayam Geprek:Login");
	echo '<form class="w3-container" method="POST" action="LoginView.php">'; 
	echo "<p>";
	echo "<label>User Name</label>";
	echo '<input class="w3-input" type="text" name="user_name"></p>';
	echo "<p>";
	echo "<label>Password</label>";
	echo '<input class="w3-input" type="password" name="password"></p>';
	echo "<p>";
	echo '<input type="submit" class="w3-btn w3-blue"></p>';
	echo"</form>"; 
	UI::setFooter("Created by Kelas PBO P1");
?>