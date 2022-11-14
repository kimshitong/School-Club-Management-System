<?php if(empty($_POST['daftar'])){?>
<!--Bahagian Borang Input Pengguna -->
<h3>Pendaftaran Admin Baharu</h3>
<form action ="daftar.php"method="POST">
	<label>Nama Admin:</label>
	<input type="text" name="nama" placeholder="Nama Penuh"><br>
	<label>Email:</label>
	<input type="text" name="email" placeholder="email@mail.com"><br>
	<label>Id Admin:</label>
	<input type ="text" name="idadmin" placeholder="601"><br>
	<label>Kata Laluan</label>
	<input type ="text" name="pass" placeholder="123abc"><br>

	<input type = "submit" name="daftar" value="DAFTAR"><br>
</form>

<?php }else{
	//Bahagian Proses Data
	//Syarat melaksanakan pemprosesan - data tidak kosong
	echo $_POST['pass'];

	if((!empty($_POST['nama']))and(!empty($_POST['email']))and(!empty($_POST['idadmin']))and(!empty($_POST['pass']))){
	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$idadmin=$_POST['idadmin'];
	include 'capaian.php';
	echo $email;
	$query="insert into admin(idadmin,nama,email,katalaluan)
	values('$idadmin','$nama','$email','$pass');";
	$run=mysqli_query($connect,$query);
	//DialogBiasa
	if($run){
		echo"<script type='text/javascript'>
		window.alert('Tahniah!,Pendaftaran Berjaya');
		</script>";
		echo"Pendaftaran Berjaya";
	}else{
		echo"<script type='text/javascript'>
		window.alert('Pendaftaran Gagal. Sila daftar semula');
		</script>";
		echo $katalaluan;
		
		echo "Pendaftaran Gagal.</br> Sila daftar semula</br>";
		echo "Klik <a href='daftar.php'> di sini </a> untuk mendaftar";
	}
	mysqli_close($connect);

}else{
		echo "Pendaftaran Gagal.</br> Sila daftar semula</br>";
		echo "Klik <a href='daftar.php'> di sini </a> untuk mendaftar";
}

}?>