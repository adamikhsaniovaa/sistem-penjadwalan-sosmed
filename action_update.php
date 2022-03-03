<?php include('config.php');
?>
<form method="post" action="action_update.php">
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$Id_JSosmed		= $_POST['Id_JSosmed'];
			$Jenis_Sosmed	= $_POST['Jenis_Sosmed'];
			$tgl			= $_POST['tgl'];
			$Judul			= $_POST['Judul'];
			$Deskripsi		= $_POST['Deskripsi'];
			$Status			= $_POST['Status'];

			$sql = mysqli_query($koneksi, "UPDATE jenis_sosmed SET Id_JSosmed='$Id_JSosmed', Jenis_Sosmed='$Jenis_Sosmed', tgl='$tgl', Judul='$Judul', Deskripsi='$Deskripsi', Status='$Status' WHERE Id_JSosmed='$Id_JSosmed'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
	</form>