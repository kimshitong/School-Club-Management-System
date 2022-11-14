<?php if(empty($_POST['login'])){?>
<!--Bahagian Borang Input Pengguna -->
<h3>Login Ahli</h3>
<form action ="login.php"method="POST">
	<input type="email" name="email" placeholder="kimkim@mail.com"><br>
	<input type ="password" name="pswd" placeholder="Telefon"><br>
	<input type = "submit" name="login" value="Login"><br>
</form>
<p>Jika belum mendaftar klik<a href="daftar.php"> di sini </a></p>
<?php }else{
	//Bahagian Proses Data
	$email=$_POST['email'];
	$pswd=$_POST['pswd'];

	//Sambung Fail ke DBMS
	include'capaian.php';
	if (mysqli_connect_errno($connect)) 
	{ 
    		echo "Fail connect to SQL: " . mysqli_connect_error(); 
	} 
	//Query
	$query="select * from ahli where email='".$email."' AND notelefon='".$pswd."'";
	//Laksana Query
	$run=mysqli_query($connect,$query);
	
	if ($run->num_rows > 0) {
    // Papar Data
    while($row = $run->fetch_assoc()) {
		if($row["status"]== 1)
		{
			echo "Tahniah ,  ".$row["nama"]." berjaya login\n";
			echo "<br>Sila klik <a href='umum.php ?id=".$row["kodahli"]." && nama=".$row["nama"]."'>di sini</a> untuk menyemak pengumuman anda<br>";
		} else {
			echo "Pemohonan anda masih belum disemaki.<br>Sila Tunggu beberapa hari untuk pemohonan ahli anda disemak.";
			echo"<br>Klik sini untuk kembali<a href='index.php'>    Di Sini</a>";

		}
	}
} else {
		echo"Maaf,anda gagal login";
		echo"<br>Sila login semula <a href='login.php'>di sini</a>";
}
	mysqli_close($connect);

}?>