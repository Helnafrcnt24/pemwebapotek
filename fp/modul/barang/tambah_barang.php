<div class="col-lg-12">
    <?php if (isset($_POST['add'])) {
        $id_barang = $_POST['id_barang'];
        $id_jenis=$_POST['id_jenis'];
        $nama_jenis= $_POST['nama_jenis'];
        $nama_barang= $_POST['nama_barang'];
        $keterangan = $_POST['keterangan'];
        $jumlah = $_POST['jumlah'];
        $bentuk = $_POST['bentuk'];

        $query = mysqli_query($mysqli, "INSERT INTO barang (ID_BARANG, ID_JENIS, NAMA_JENIS, NAMA_BARANG, BENTUK, KETERANGAN, JUMLAH)VALUES('$id_barang', '$id_jenis', '$nama_jenis', '$nama_barang', '$bentuk', '$keterangan', '$jumlah')")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));

        if ($query) { ?>
        <script language="JavaScript">
            document.location='index.php?page=barang&alert=4';
        </script>

        <?php }} ?>
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data Barang</strong> 
            </div>
            <div class="card-body card-block">
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">ID Barang</label>
                        </div>
                        <?php 
                        $query = mysqli_query($mysqli, "SELECT * FROM barang ORDER BY ID_BARANG DESC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                        $data=mysqli_fetch_assoc($query) 
                        ?>
                        <div class="col-12 col-md-9">
                            <input type="number" name="id_barang" value="<?php echo $data['ID_BARANG']+1; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class="form-control-label">ID Jenis</label>
                                </div>
                                <div class="col-12 col-md-9">
                                <select name="id_jenis" class="form-control" required="required" autofocus="autofocus">
                                    <option>Pilih Jenis</option>
                                    <?php 
                                    $query = mysqli_query($mysqli, "SELECT * FROM jenis ORDER BY ID_JENIS");
                                    while ($data=mysqli_fetch_assoc($query)) {
                                        ?>
                                        <option value="<?php echo $data['ID_JENIS']; ?>"><?php echo $data['ID_JENIS']; ?></option>
                                        <?php } ?>
                                    </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Jenis</label>
                            </div>
                            <div class="col-12 col-md-9">

                                <select name="id_jenis" class="form-control" required="required" autofocus="autofocus">
                                    <option>Pilih Jenis</option>
                                    <?php 
                                    $query = mysqli_query($mysqli, "SELECT * FROM jenis ORDER BY NAMA_JENIS");
                                    while ($data=mysqli_fetch_assoc($query)) {
                                        ?>
                                        <option value="<?php echo $data['ID_JENIS']; ?>"><?php echo $data['NAMA_JENIS']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nama Barang</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="nama_barang" placeholder="Nama Barang..." class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Bentuk</label>
                                </div>
                                <div class="col-12 col-md-9">

                                    <select name="bentuk" class="form-control" required="required" autofocus="autofocus">
                                        <option>Pilih Bentuk</option>
                                        <option value="tablet">Tablet</option>
                                        <option value="kapsul">Kapsul</option>
                                        <option value="sirup">Sirup</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class="form-control-label">Keterangan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="keterangan" rows="5" placeholder="Keterangan..." class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class="form-control-label">Jumlah</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" name="jumlah" placeholder="Jumlah..." class="form-control" required>
                                </div>
                            </div>
                            
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit" name="add">Tambah</button>
                            <a href="index.php?page=tambah_barang"><button type="reset" class="btn btn-danger">Reset</button></a>
                        </div>
                    </form>
                </div>
            </div>