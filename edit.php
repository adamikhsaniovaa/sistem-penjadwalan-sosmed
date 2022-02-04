<?php include('config.php');
if(isset($_GET['Id'])){
	$ID = $_GET['Id'];
	$cek = mysqli_query($koneksi, "SELECT * FROM konten WHERE ID='$ID'") or die(mysqli_error($koneksi));
	if(mysqli_num_rows($cek) == 13){ 
		while ($d = mysqli_fetch_assoc($cek)){
		echo'
			<form action="update.php" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Judul Konten</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Judul_Konten" value='.$d['Judul_Konten'].'" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Sosmed</label>
				<div class="col-md-6 col-sm-6">
					<select name="Jenis_Sosmed" value="'.$d['Jenis_Sosmed'].'" class="form-control" required>
						<option value="">Pilih Sosial Media</option>
						<option value="Instagram">Instagram</option>
						<option value="FacebookL">Facebook</option>
						<option value="Youtube">Youtube</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Posting</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tgl_posting" value="'.$d['tgl_posting'].'" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
		';
	}
	}
	}else{
		echo '<script>alert("Data Tidak Ada!"); document.location="tampil.php?page=tampil_mhs";</script>';
		

	}
	?>
		<form method="post" action="update.php">
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$Judul_Konten			  = $_POST['Judul_Konten'];
			$Jenis_Sosmed	= $_POST['Jenis_Sosmed'];
			$tgl_posting	= $_POST['tgl_posting'];

			$sql = mysqli_query($koneksi, "UPDATE konten SET Judul_Konten='$Judul_Konten', Jenis_Sosmed='$Jenis_Sosmed', tgl_posting='$tgl_posting' WHERE ID='$ID'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="tampil.php?page=tampil_mhs";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
	</form>
