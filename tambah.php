<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Id			= $_POST['Id'];
			$Judul_Konten			= $_POST['Judul_Konten'];
			$Jenis_Sosmed	= $_POST['Jenis_Sosmed'];
			$tgl_posting		= $_POST['tgl_posting'];

			$cek = mysqli_query($koneksi, "SELECT * FROM konten WHERE Id='$Id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO konten(Id, Judul_Konten, Jenis_Sosmed, tgl_posting) VALUES('$Id', '$Judul_Konten', '$Jenis_Sosmed', '$tgl_posting')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="tampil.php?page=tampil_mhs";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Id sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_data" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Id" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Judul Konten</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Judul_Konten" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Sosmed</label>
				<div class="col-md-6 col-sm-6">
					<select name="Jenis_Sosmed" class="form-control" required>
						<option value="">Pilih Sosisal Media</option>
						<option value="Instagram">Instagram</option>
						<option value="FacebookL">Facebook</option>
						<option value="Youtube">Youtube</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Posting</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tgl_posting" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
