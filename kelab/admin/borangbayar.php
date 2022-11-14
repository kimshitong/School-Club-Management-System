<?php if (empty($_POST['borangbayar'])){
?>
<h2>Daftar Yuran</h2>
<form action="borangbayar.php" method="POST">
	Masuk Kod Ahli:
	<input type="text" name="id"><br>
	Masuk Tarikh Bayar:
	<input type="date" name="date"><br>
	Catatan(Untuk Bulan Berapa/...):
	<input type="text" name="catatan"><br>
 
	<input type="submit" name="borangbayar" value="DAFTAR">
	
</form>
	
 
<?php }else{
	//Bahagian Proses Data Tarikh Sesuai
	error_reporting(0);

	$id=$_POST['id'];
	$date=$_POST['date'];
	$catatan=$_POST['catatan'];
	//Sambung Fail ke DBMS
	
	include'capaian.php';
	if(!$connect){
		echo"DMS gagal dicapai";
	}
	$SQL="insert into bayaran (kodahli,catatan,TarikhBayar) values('$id','$catatan','$date')";
	if(!$SQL){
		echo"Fail sql";
	}
	
	$bayar=mysqli_query($connect,$SQL);
	//Papar Berjaya atau tidak
	if($bayar){
		echo "<br>Anda telah berjaya daftar!</br>";
		echo "<br>KodTempahan : $id </br>";
		echo "<br>Tarikh Bayar : $date </br>";
		echo "<br>Catatan : $catatan</br>";
		echo "Klik <a href='semakb.php'> di sini </a> untuk semak";

	} else {
		echo "Sila Daftar selagi ";
		
		echo "Klik <a href='yuran.php'> di sini </a> untuk mendaftar";
	}
	
	
	mysqli_close($connect);

}
?>