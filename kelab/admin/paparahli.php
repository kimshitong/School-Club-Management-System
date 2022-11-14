<h3>Senarai Ahli :</h3>
<table border="1">
	<tr><th>Bil</th><th>Kod Ahli</th><th>Nama</th><th>Email</th><th>No Telefon</th><th>Status</th><th>Delete</th></tr>

<?php 
	//sambung ke Pangkalan Data
	include 'capaian.php';
	//Query panggil semua data
	$SQL="select * from ahli order by kodahli LIMIT 50";
	//Laksanakan 
	$panggil=mysqli_query($connect,$SQL);
	$i=0;
	while($data=mysqli_fetch_array($panggil)){

		$ip=$data['kodahli'];
		$kp=$data['status'];
		$nama=$data['nama'];
		$email=$data['email'];
		$notel=$data['notelefon'];
		$i++;
		echo "<tr><td>$i</td><td>$ip</td><td>$nama</td><td>$email</td><td>$notel</td><td>$kp</td><td><a href='deleteahli.php?id=$ip'>Padam</a></td></tr>";
	}
	if($i==0)
	{
		echo "Tiada Permohonan Ahli Baharu<br>";
		
		echo "<br>";
	}
	mysqli_close($connect);
 ?>
 </table>
 <br><b>
 <p>Status 0 = Permohonan belum dilulus </p>
 <p>Status 1 = Permohonan sudah dilulus / Ahli Biasa</p>