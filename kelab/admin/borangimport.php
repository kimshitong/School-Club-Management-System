
<!--Import Data Pelangggan-->
<!--Bahagian Borang Upload-->
<?php if(empty($_POST['import'])){?>
<h2>Kemudahan Import Data Ahli</h2>
<form action="import.php" method="POST" name="upload_excel" enctype="multipart/form-data">
	<label>Masukkan Data Jenis CSV Bagi Ahli Sahaja</label>
	
	<fieldset>
	<input type="file"name="file"id="file">
	<input type="submit" name="import" value="Upload Fail CSV">
	</fieldset>
	<br>Notice</br>
	<br>Row A:Nama<br>Row B:Kelas<br>Row C:Emel<br>Row D:NoTel</br>
	<br><b>DONT INSERT EMPTY FILES</b></br>
	
</form>

<!-- Bahagian Pemprosesan Import-->
<?php }else{
	//Terima kirman fail dari Borang Import
	$faildata=$_FILES['file']['tmp_name'];
	$bukafail=fopen($faildata,"r");
	//banyak data-data yang tersimpan hendaklah dibuka
	
	while(($GETdata=fgetcsv($bukafail,1000,","))!==FALSE){
		//Sambung ke Pangkalan Data DBMS
	include'capaian.php';
	$SQL = "insert into ahli(nama,kelas,email,notelefon) values('".$GETdata[0]."','".$GETdata[1]."','".$GETdata[2]."','".$GETdata[3]."')";
	
	$simpan=mysqli_query($connect,$SQL);
		if($simpan){
				echo"<p>Import Berjaya!</p>";

		}else{
				echo "<p>Import Gagal-</p>";
	
			}
		}
	fclose($bukafail);
	if($simpan)
{
					echo"<script type='text/javascript'>
		window.alert('Import Berjaya!');
		</script>";
}
	mysqli_close($connect);
	
}

?>
