<?php include('config.php'); 
//jika benar mendapatkan GET id dari UR
if(isset($_GET['Id'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$ID = $_GET['Id'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM konten WHERE ID='$ID'") or die(mysqli_error($koneksi));
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=tampil_mhs";</script>';
	}
	?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<tbody>
				<?php
				//query ke database SELECT tabel konten urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM konten ORDER BY ID DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						';
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>

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
	</div>
