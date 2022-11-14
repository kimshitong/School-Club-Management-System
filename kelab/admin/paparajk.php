<h3>Senarai Ahli :</h3>
<table border="1">
	<tr><th>Bil</th><th>Kod Ahli</th><th>Nama</th><th>Pangkat</th><th>Delete</th></tr>

<?php 
	//sambung ke Pangkalan Data
	include 'capaian.php';
	//Query panggil semua data
	$SQL="select * from ajk order by kodahli LIMIT 50";
	//Laksanakan 
	$panggil=mysqli_query($connect,$SQL);
	$i=0;
	while($data=mysqli_fetch_array($panggil)){

		$ip=$data['kodahli'];
		$nama=$data['nama'];
		$pangkat=$data['pangkat'];
		$i++;
		echo "<tr><td>$i</td><td>$ip</td><td>$nama</td><td>$pangkat</td><td><a href='deleteajk.php?id=$ip'>Padam</a></td></tr>";
	}
	if($i==0)
	{
		echo "BELUM DAFTAR<br>";
		
		echo "<br>";
	}
	mysqli_close($connect);
 ?>
 </table>
