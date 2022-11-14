<?php if (empty($_POST['daftar'])){
?>
<h2>Daftar AJK </h2>
<form action="daftarajk.php" method="POST">
	Masuk Kod Ahli:
	<input type="text" name="id"><br>
	Pangkat :<br>

	<input type="radio" name="pangkat" value="Pengurusi">Pengurusi
	<br><input type="radio" name="pangkat" value="NaibPengurusi">Naib Pengurusi
	<br><input type="radio" name="pangkat" value="Setiausaha">Setiausaha
	<br><input type="radio" name="pangkat" value="Naib Setiausaha">Naib Setiausaha
	<br><input type="radio" name="pangkat" value="Bendahari">Bendahari
	<br><input type="radio" name="pangkat" value="NaibBendahari">Naib Bendahari
	<br><input type="radio" name="pangkat" value="AJK">Ahli Jawatankuasa 
	<br>
 
	<input type="submit" name="daftar" value="DAFTAR">
</form>
	
 
<?php }else{
	//Bahagian Proses Data Tarikh Sesuai
	$id=$_POST['id'];	
	$pangkat=$_POST['pangkat'];
	//Sambung Fail ke DBMS
	
	include'capaian.php';
	if(!$connect){
		echo"DMS gagal dicapai";
	}
	
	
	

	$SQL2 ="SELECT nama FROM ahli WHERE kodahli = '$id'";
	
	$run=mysqli_query($connect,$SQL2);

	if ($run->num_rows > 0) {
	while($row = $run->fetch_assoc()) {
		$nama=$row['nama'];
		}
	}
	$SQL="insert into ajk(kodahli,nama,pangkat) values('$id','$nama','$pangkat')";	
	
	$daftar=mysqli_query($connect,$SQL);
	//Papar Berjaya atau tidak
	if($daftar){
		print "<br>Anda telah berjaya daftar!</br>";
		echo "<br>KodTempahan : $id </br>";
		echo "<br>Nama: $nama</br>";

		echo "<br>Pangkat: $pangkat </br>";
		
	} else {
		echo "Sila Daftar selagi ";
	}
	
	
	mysqli_close($connect);

}
?>