<?PHP
class UI{
	public static function setTitle($judul){
		echo "<!DOCTYPE html>";
		echo "<html>";
		echo "<title>$judul</title>";
		echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
		echo '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
		echo "<body>";
	}
	public static function setHeader($kalimat){
		echo '<div class="w3-container w3-teal">';
		echo "<h1>$kalimat</h1>";
		echo '</div>';
	}
	public static function setFooter($kalimat){
		echo '<div class="w3-container w3-teal">';
		echo "<p>$kalimat</p>";
		echo '</div>';
		echo "</body></html>";
	}
}
?>