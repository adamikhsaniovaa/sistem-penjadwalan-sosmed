<?php
//include file config.php
include('config.php');
    
    if($_POST['Id_JSosmed']) {
        $Id_JSosmed = $_POST['Id_JSosmed'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = "SELECT * FROM jenis_sosmed WHERE id = $Id_JSosmed";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>

        <!-- MEMBUAT FORM -->
        <form action="update.php" method="post">
            <input type="hidden" name="Id_JSosmed" value="<?php echo $baris['Id_JSosmed']; ?>">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" name="Judul" value="<?php echo $baris['Judul']; ?>">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" rows="5" name="Deskripsi" ><?php echo $baris['Deskripsi']; ?></textarea>
            </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>

        <?php } }
  
?>