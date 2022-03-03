<?php include "config.php" ?>
<?php include "header.php" ?>

  <main id="main" class="main">
    <section class="section dashboard">
      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jenis Sosial Media</h5>
			
					  
			  <!--Modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Jadwalbaru">
                Tambah Jadwal
              </button>

              <div class="modal fade" id="Jadwalbaru" tabindex="-1">
				<form action="index.php" method="post">
					<div class="modal-dialog modal-lg">
					<?php
					if(isset($_POST['submit'])){
						$Id_JSosmed			= $_POST['Id_JSosmed'];
						$Jenis_Sosmed		= $_POST['Jenis_Sosmed'];
						$tgl				= $_POST['tgl'];
						$Judul				= $_POST['Judul'];
						$Deskripsi			= $_POST['Deskripsi'];
						$Status				= $_POST['Status'];

						$cek = mysqli_query($koneksi, "SELECT * FROM jenis_sosmed WHERE Id_JSosmed='$Id_JSosmed'") 
						or die(mysqli_error($koneksi));

						if(mysqli_num_rows($cek) == 0){
							$sql = mysqli_query($koneksi, "INSERT INTO jenis_sosmed(Id_JSosmed, Jenis_Sosmed,tgl,Judul,Deskripsi,Status) 
							VALUES('$Id_JSosmed', '$Jenis_Sosmed','$tgl','$Judul','$Deskripsi','$Status')") or die(mysqli_error($koneksi));

							if($sql){
								echo '<script>alert("Berhasil menambahkan data."); document.location="index.php";</script>';
							}else{
								echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
							}
						}else{
							echo '<div class="alert alert-warning">Gagal, Id sudah terdaftar.</div>';
						}
					}
					?>
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Form Input Jadwal</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						  <!-- Floating Labels Form -->
						  <form class="row g-3">
							<div class="col-md-12">
							  <div class="form-floating">
								<input type="text" class="form-control" id="floatingName" placeholder="Judul" name="Judul">
								<label for="floatingName">Judul</label>
							  </div>
							</div>
							<div class="col-12">
							  <div class="form-floating">
								<textarea class="form-control" placeholder="Deskripsi"  name="Deskripsi" id="floatingTextarea" style="height: 100px;"></textarea>
								<label for="floatingTextarea">Deskripsi</label>
							  </div>
							</div>
							
							<div class="col-md-4">
							  <div class="form-floating mb-3">
								<select class="form-select"  name="Jenis_Sosmed" id="floatingSelect" aria-label="Jenis Sosmed">
								   <option selected>Pilih Sosmed</option>
								  <option value="Youtube">Youtube</option>
								  <option value="Facebook">Facebook</option>
								  <option value="Instagram">Instagram</option>
								  <option value="Tiktok">Tiktok</option>
								</select>
								<label for="floatingSelect">Jenis Sosmed</label>
							  </div>
							</div>
							<div class="col-md-4">
							  <div class="form-floating mb-3">
								<select class="form-select" name="Status" id="floatingSelect" aria-label="Status">
								<option selected>Pilih Status</option>
								  <option value="Belum Posting">Belum Posting</option>
								  <option value="Sudah Posting">Sudah Posting</option>
								  <option value="Batal Posting">Batal Posting</option>
								</select>
								<label for="floatingSelect">Status Posting</label>
							  </div>
							</div>
							<div class="col-md-4">
							  <div class="form-floating mb-3">
								<input type="date" name="tgl" class="form-control">
								<label for="floatingSelect">Tanggal Posting</label>
							  </div>
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							  <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
						  </div>
						  </form><!-- End Form -->
						  
						</div>
						</div>
					</div>
					</form>
              </div><!-- End  Modal-->
			  
			  
			  
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>	
                    <th scope="col">Judul</th>	
                    <th scope="col">Deskripsi</th>	
                    <th scope="col">Jenis Sosmed</th>	
                    <th scope="col">Tanggal</th>	
                    <th scope="col">Status</th>	
                    <th scope="col">action</th>	
                  </tr>
                </thead>
                <tbody>
                 <?php
				//query ke database SELECT tabel konten urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM jenis_sosmed ORDER BY Id_JSosmed DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						?>
						
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['Judul']; ?></td>
							<td><?php echo $data['Deskripsi']; ?></td>
							<td><?php echo $data['Jenis_Sosmed']; ?></td>
							<td><?php echo $data['tgl']; ?></td>
							<td><?php echo $data['Status']; ?></td>
							<td>
						                 
							<?php
								echo '
							<a href="Update.php?Id_JSosmed='.$data['Id_JSosmed'].'"  class="bi bi-pencil-square">
							<a href="delete.php?Id_JSosmed='.$data['Id_JSosmed'].'"  class="bi bi-trash-fill" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">
								
							</a>
							</td>
						</tr>
						';
					}
				
				}
				else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>

        </div>
		
                        </div>
                        
                    </div>
                </div>
            </div>
		
      </div>
    </section>
    </section>

  </main><!-- End #main -->

 	<?php include "footer.php" ?>	