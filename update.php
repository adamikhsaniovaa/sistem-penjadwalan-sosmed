<?php include('config.php');
?>
<form method="post" action="update.php">
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$Id			    = $_POST['Id'];
			$Judul_Konten	= $_POST['Judul_Konten'];
			$Jenis_Sosmed	= $_POST['Jenis_Sosmed'];
			$tgl_posting	= $_POST['tgl_posting'];

			$sql = mysqli_query($koneksi, "UPDATE konten SET Judul_Konten='$Judul_Konten', Jenis_Sosmed='$Jenis_Sosmed', tgl_posting='$tgl_posting' WHERE Id='$Id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="tampil.php";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
	</form>