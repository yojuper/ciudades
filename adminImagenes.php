<?php
	include 'dameCiudades.php';
	session_start();
	if (!isset($_SESSION["UsuarioValidado"])){
		header('Location: entrar.php');
	}
?>
<form method='post' enctype="multipart/form-data" action='adminImagenes.php'>
	<select name="listaCiudades">
		<?php  for ($contador=0;$contador<count($ListaCiudades);$contador++){  ?>
		<option value="<?php echo $ListaCiudades[$contador]['id']; ?>">
		<?php	echo $ListaCiudades[$contador]['ciudad'];  ?>
		</option>
		<?php }  ?>
	</select>
	<input type="file" name="fileToUpload" id="fileToUpload">
	<input type="submit" value="Alta" name="btAlta">
</form>

<?php
if (isset($_POST["btAlta"])){
	var_dump($_POST);

	$servername = "localhost";
	$username = "id3641636_root";
	$password = "12345678";
	$dbname = "id3641636_ciudades";
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("Insert INTO tbimagenes
		 (imagen,idciudad) values (?, ?)");
		$stmt->execute(
			array("",$_POST["listaCiudades"])
			);
		$autonumerico = $conn->lastInsertId();
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;


	$target_dir = "uploads/" . $autonumerico . "_" ;
	$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);


	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("UPDATE tbimagenes SET imagen=? WHERE id=?");
		$stmt->execute(
			array($target_file,$autonumerico)
			);
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}
?>
