<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Jadwal Konten Sosial Media</font></center>
		<hr>
		<a href="index.php?page=tambah_data"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Judul Konten</th>
					<th>Jenis Sosmed</th>
					<th>tgl_posting</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel konten urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM konten ORDER BY ID DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['Id'].'</td>
							<td>'.$data['Judul_Konten'].'</td>
							<td>'.$data['Jenis_Sosmed'].'</td>
							<td>'.$data['tgl_posting'].'</td>
							<td>
								<a href="edit.php?Id='.$data['Id'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?Id='.$data['Id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
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
		</table>
	</div>
	</div>
