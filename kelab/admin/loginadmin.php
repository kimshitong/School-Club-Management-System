<!--Bahagian Pertama : Borang-->
<?php if(empty($_POST['loginadmin'])){?>
<h2>Login Admin</h2>
<p>Hanya Admin dibenarkan akses dihalaman sini</p>
<form action="index.php"method="POST">
	<input type="text"name="id" placeholder="ID Admin">
	<input type="password"name="pswd" placeholder="Kata laluan">
	<input type="submit" name="loginadmin"value="LOGIN">
</form>
<p>Jika anda bukan admin klik<a href=../index.php> di sini.</a></p>
<!--Bahagian Kedua: Pemprosesan Data -->
<?php }else{
	$id=$_POST['id'];
	$pswd=$_POST['pswd'];
	
	//Sambung ke pangkalan data
	include 'capaian.php';
	
	//Query
	$SQL="SELECT * FROM admin where idadmin='".$id."' AND katalaluan='".$pswd."'";
	
	//SEMAK
	$run=mysqli_query($connect,$SQL);
	
	//Dialog hasil login
	if ($run->num_rows > 0) {
		while($row = $run->fetch_assoc()) {
			echo "Salam Kunjungan,".$row["nama"]."berjaya login";
			echo"<br>Klik<a href='admin.php'>di sini </a> sekarang.";
		}
	}else {
			echo"Maaf,anda gagal login";
			echo"<br>Sila login semula <a href='index.php'>di sini</a>";
		} 
	mysqli_close($connect);

	}

?>