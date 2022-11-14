<!DOCTYPE html>
<html lang="en">
<head>	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif+SC">
	<title>Sistem Pengurusan Kelab Bahasa Cina </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<?php include 'header.php'; ?>
	</header>
		<nav>
			<?php include 'navadmin.php'; ?>
		</nav>
			<section>
			    <article>
					<?php 
					//Ambil data dari URL
					$id=$_GET['id'];
					//sambung ke Pangkalan Data
					include 'capaian.php';
					//Query arahan padam
					$sql = "DELETE FROM ajk WHERE kodahli = '$id'";

					
					if (mysqli_query($connect, $sql)) {
    				echo "Rekod Berjaya Dipadam";    				
					echo "<p><a href='senaraiajk.php'>  Klik Sini dan Refresh Website</a></p>";
    				} else {
    				echo "Rekod Gagal Dipadam ";
					echo "<a href='senaraiajk.php'>Klik Sini</a>";
    				}
					mysqli_close($connect);
					?>	
				</article>
				<aside> 
					<?php include 'sidenavadmin.php'; ?>
				</aside>
			</section>
	<footer>
		<?php include 'footer.php'; ?>
	</footer>
</body>
</html>
