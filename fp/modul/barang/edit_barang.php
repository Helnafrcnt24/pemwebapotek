<div class="col-lg-12">
    <?php 
    if (isset($_POST['edit_simpan'])) {
      $id = $_GET['edit']; 
      $nama_jenis= $_POST['nama_jenis'];
      $nama_barang= $_POST['nama_barang'];
      $bentuk = $_POST['bentuk'];
      $keterangan = $_POST['keterangan'];
      $jumlah = $_POST['jumlah'];
      $id_jenis = $_POST['id_jenis'];
      $query = mysqli_query($mysqli, "UPDATE barang set ID_JENIS='$id_jenis', NAMA_JENIS='$nama_jenis', NAMA_BARANG='$nama_barang', BENTUK='$bentuk', KETERANGAN='$keterangan', JUMLAH='$jumlah' where ID_BARANG= '$id' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

      if ($query) { ?>
      <script language="JavaScript">
        document.location='index.php?page=barang&alert=5';
    </script>
    <?php }} ?>

    <div class="card">
        <div class="card-header">
            <strong>Edit Data Barang</strong>
        </div>
        <div class="card-body card-block">
            <form method="post" enctype="multipart/form-data" class="form-horizontal">


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Jenis</label>
                    </div>
                    <div class="col-12 col-md-9">

                        <select name="id_jenis" class="form-control" required="required" autofocus="autofocus">
                          <?php 
                          $id_jenis = $_GET['jenis'];
                          $edit2 = mysqli_query($mysqli, "SELECT * FROM jenis WHERE ID_JENIS = $id_jenis")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                          $dataku = mysqli_fetch_assoc($edit2);
                          $jenis = $dataku['ID_JENIS'];
                          $query = mysqli_query($mysqli, "SELECT * FROM jenis")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                          while ($data=mysqli_fetch_assoc($query)) {
                            $id_jenis = $data['ID_JENIS'];
                            $nama_jenis = $data['NAMA_JENIS'];

                            if ($jenis==$id_jenis) {
                                $cek="selected";
                            }
                            else
                            {
                                $cek="";
                            }
                            echo "<option value='$id_jenis' $cek>$nama_jenis</option>";
                        }
                        ?>
                    </select>

                </div>
            </div>
            <?php 
            if (isset($_GET['edit'])) {
              $id = $_GET['edit'];

              $query = mysqli_query($mysqli,"SELECT * FROM barang where ID_BARANG = '$id' ")or die('ada kesalahan pada query tampil data portofolio : '.mysqli_error($mysqli));
              while($data = mysqli_fetch_assoc($query)){
                ?>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">ID Barang</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" name="id_barang" value="<?php echo $data['ID_BARANG']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nama Barang</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="nama" value="<?php echo $data['NAMA_BARANG']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Bentuk</label> 
                    </div>
                    <div class="col-12 col-md-9">
                    <input type="text" name="bentuk" value="<?php echo $data['BENTUK']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class="form-control-label">Keterangan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="keterangan" rows="5" placeholder="Keterangan..." class="form-control" required><?php echo $data['KETERANGAN']; ?></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Jumlah</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" name="jumlah" value="<?php echo $data['JUMLAH']; ?>" class="form-control" required>
                    </div>


            <div class="card-footer">
                <button class="btn btn-primary" type="submit" name="edit_simpan">Edit</button>
                <a href="../barang/index.php?page=barang" class="btn btn-danger">Cancel</a>
            </div>
        </form>
        <?php }} ?>
    </div>
</div>