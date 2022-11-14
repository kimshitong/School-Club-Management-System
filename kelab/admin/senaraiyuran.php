<h2>Senarai Pembayaran Ahli </h2>
<table border="1">
	<tr><th>Bil</th><th>KodBayaran </th><th>Kod Ahli</th><th>Nama</th><th>Email</th><th>Catatan</th><th>Delete</th></tr>

<?php 
	//sambung ke Pangkalan Data
	include 'capaian.php';
	//Query panggil semua data
	$SQL="select * from bayaran 
	INNER JOIN ahli on bayaran.kodahli= ahli.kodahli ORDER BY kodbayaran DESC LIMIT 30";

	//Laksanakan 
	$panggil=mysqli_query($connect,$SQL);
	$i=0;
	while($data=mysqli_fetch_array($panggil)){

		$ip=$data['kodahli'];
		$nama=$data['nama'];
		$email=$data['email'];
		$catatan=$data['catatan'];
		$kb=$data['kodbayaran'];

		$i++;
		echo "<tr><td>$i</td><td>$kb</td><td>$ip</td><td>$nama</td><td>$email</td><td>$catatan</td><td><a href='deleteyuran.php?id=$kb'>Padam</a></td></tr>";
	}
	if($i==0)
	{
		echo "Tiada Pembayaran <br>";
		
		echo "<br>";
	}
	mysqli_close($connect);
 ?>
 </table>
 <br><br>
<button onclick="fungsiCetak()">CETAK</button>
<script type="text/javascript">
	function fungsiCetak(){
		window.print();
	}

</script>