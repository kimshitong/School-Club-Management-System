<?php if(empty($_POST['daftar'])){?>
<!--Bahagian Borang Input Pengguna -->
<h3>Borang Permohonan Menjadi Ahli Baharu</h3>
<form action ="daftar.php"method="POST">
	<label>Nama :</label>
	<input type="text" name="nama" placeholder="Nama Penuh"><br>
	<label>No.Telefon(mula dari 601...):</label>
	<input type ="text" name="notel" placeholder="601122334455"><br>
	<label>Kelas(5A/3D/2E...)</label>
	<input type = "text" name="kelas" placeholder="5A"><br>
	<label>Email:</label>
	<input type="email" name="email" placeholder="kim@mail.com"><br>
	
	
	
	<input type = "submit" name="daftar" value="DONE"><br>
</form>
<br><a href="login.php">Login</a>


<?php }else{
	//Bahagian Proses Data
	//Syarat melaksanakan pemprosesan - data tidak kosong
	if((!empty($_POST['nama']))and(!empty($_POST['email']))and(!empty($_POST['notel']))and(!empty($_POST['kelas']))){
	$nama=$_POST['nama'];
	$emel=$_POST['email'];
	$NoTelefon=$_POST['notel'];
	$kelas=$_POST['kelas'];
	//capaian
	$connect=mysqli_connect('localhost','root','','dbase_kelab');
	$query="insert into ahli(nama,email,notelefon,kelas)
	values('$nama','$emel','$NoTelefon','$kelas');";
	$run=mysqli_query($connect,$query);
	//DialogBiasa
	
	if($run){
		echo"<script type='text/javascript'>
		window.alert('Tahniah!,Pendaftaran untuk permohonan  Berjaya');
		</script>";
		echo"Klik <a href='index.php'> di sini untuk kembali ke muka Home </a> dan tunggu permohonan anda diluluskan"; 
		echo"Terima Kasih !!";
	}else{
		echo"<script type='text/javascript'>
		window.alert('Pendaftaran Gagal. Sila daftar semula');
		</script>";
		echo"Klik <a href='daftar.php'> di sini </a> untuk mendaftar<br>";
		echo "Sila pasti No Telefon dan Email anda tidak pernah ditempah/didaftar dalam borang permohonan ";
	}	

	mysqli_close($connect);

}else{
		echo "Pendaftaran Gagal.</br> Sila daftar semula</br>";
		echo "Klik <a href='daftar.php'> di sini </a> untuk mendaftar";
				echo "Sila pasti No Telefon dan Email anda tidak pernah ditempah/didaftar dalam borang permohonan ";

}
}
?>