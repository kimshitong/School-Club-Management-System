<?php if (empty($_POST['semakb'])){
?>
<h2>Semak Bayaran</h2>
<h3>Masukkan Kod Ahli</h3>
<form action="semakb.php" method="POST">
	Masuk Kod Ahli:
	<input type="text" name="id"><br>
	<input type="submit" name="semakb" value="SEMAK">
</form>
	
 
<?php }else{
	//Bahagian Proses Data Tarikh Sesuai
	$id=$_POST['id'];
	error_reporting(0);
	//Sambung Fail ke DBMS
	include'capaian.php';
	if(!$connect){
		echo"DMS gagal dicapai";
	}
	//Query

	$SQL ="SELECT 	*  	FROM     `bayaran` WHERE  `kodahli` = $id";

	$semakb=mysqli_query($connect,$SQL);
	//Pembilang
	$i=1;
	//Papar Jadual
	echo"<table border='1'><tr><th>Bil</th><th>Kod Ahli</th><th>TarikhBayar</th><th>Catatan</th><th>Kod Bayaran</th>";
    
	if ($semakb->num_rows > 0) {
	while($row = $semakb->fetch_assoc()) {
		$id=$row['kodahli'];
		$catatan=$row['catatan'];
		$date=$row['tarikhbayar'];
		$idbayar=$row['kodbayaran'];

		echo "<tr><td>$i</td><td>$id</td><td>$date</td><td>$catatan</td><td>$idbayar</td></tr>";
		$i++;
	}
	}else{
	echo"Gagal Semak Bayaran(Belum Daftar?)"	;
	}
	
	echo"</table>";
	mysqli_close($connect);
}?>
	<p><a href="semakb.php">Semak Lagi</a></p>
	
	
	


