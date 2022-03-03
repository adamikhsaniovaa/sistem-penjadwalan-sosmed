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
			<?php 
			if(isset($_GET['Id_JSosmed'])){
				$Id_JSosmed = $_GET['Id_JSosmed'];
				$cek = mysqli_query($koneksi, "SELECT * FROM jenis_sosmed WHERE Id_JSosmed='$Id_JSosmed'") or die(mysqli_error($koneksi));
				if(mysqli_num_rows($cek) > 0){ 
					while ($d = mysqli_fetch_assoc($cek)){
					echo'
			<form action="action_update.php" method="post">
							
							<div class="col-md-12">
							  <div class="form-floating">
								<input type="text" class="form-control" id="floatingName"  name="Id_JSosmed" value='.$d['Id_JSosmed'].'>
								<label for="floatingName">ID</label>
							  </div>
							</div>
							<div class="col-md-12">
							  <div class="form-floating">
								<input type="text" class="form-control" id="floatingName"  name="Judul" value='.$d['Judul'].'>
								<label for="floatingName">Judul</label>
							  </div>
							</div>
							<div class="col-12">
							  <div class="form-floating">
								<textarea class="form-control" name="Deskripsi" id="floatingTextarea"  style="height: 100px;" value='.$d['Deskripsi'].'>'.$d['Deskripsi'].'</textarea>
								<label for="floatingTextarea">Deskripsi</label>
							  </div>
							</div>
							
							<div class="col-md-4">
							  <div class="form-floating mb-3">
								<select class="form-select"  name="Jenis_Sosmed"  id="floatingSelect"   aria-label="Jenis Sosmed">
								   <option selected value='.$d['Jenis_Sosmed'].'> '.$d['Jenis_Sosmed'].'</option>
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
								<select class="form-select" name="Status" id="floatingSelect" value='.$d['Status'].' aria-label="Status">
								<option selected>'.$d['Status'].'</option>
								  <option value="Belum Posting">Belum Posting</option>
								  <option value="Sudah Posting">Sudah Posting</option>
								  <option value="Batal Posting">Batal Posting</option>
								</select>
								<label for="floatingSelect">Status Posting</label>
							  </div>
							</div>
							<div class="col-md-4">
							  <div class="form-floating mb-3">
								<input type="date" name="tgl" value='.$d['tgl'].' class="form-control">
								<label for="floatingSelect">Tanggal Posting</label>
							  </div>
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							  <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
						  </div>
						  </form><!-- End Form -->
						  ';
						  }
	}
	}else{
		echo '<script>alert("Data Tidak Ada!"); document.location="index.php";</script>';
		

	}
	?>
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