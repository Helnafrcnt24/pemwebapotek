<div class="card">
    <div class="card-header">
        <strong>Tambah Data</strong> Transaksi
    </div>
    <div class="card-body card-block">
        <form action="" method="POST" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">Petugas</label>
                </div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static"><?php echo $_SESSION['nama_petugas']; ?></p>
                </div>
            </div>
            <?php
            date_default_timezone_set('Asia/Jakarta');
            $transaksi= date("Y-m-d h:i");
            $query = mysqli_query($mysqli, "SELECT * FROM transaksi ORDER BY ID_TRANSAKSI DESC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
            $data=mysqli_fetch_assoc($query) 
            ?>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Id Transaksi</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="ID_TRANSAKSI" value="<?php echo $data['ID_TRANSAKSI']+1; ?>" class="form-control" >
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tanggal Transaksi</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="TANGGAL_TRANSAKSI" value="<?php echo $transaksi ?>" class="form-control" >
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">jenis</label>
                </div>
                <div class="col-12 col-md-9">

                    <select name="ID_BARANG" class="form-control" required="required" autofocus="autofocus">
                        <option>Pilih BARANG</option>
                        <?php 
                        $query = mysqli_query($mysqli, "SELECT * FROM barang ORDER BY NAMA")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
                        while ($data=mysqli_fetch_assoc($query)) {
                            ?>
                            <option value="<?php echo $data['ID_BARANG']; ?>"><?php echo $data['NAMA']; ?></option>
                            <?php } ?>
                        </select>

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Jumlah</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="JUMLAH" placeholder="Jumlah..." class="form-control">
                    </div>
                </div>
            <div class="card-footer">
                <input class="btn btn-primary" type="submit" name="tambah" value="Tambah">
                <a href="index.php?page=tambah_transaksi"><button type="reset" class="btn btn-danger">Reset</button></a>
            </div>
        </form>
    </div>
</div>
</div>
<?php
$ID_TRANSAKSI = @$_POST['ID_TRANSAKSI'];
$TANGGAL_TRANSAKSI =@$_POST['TANGGAL_TRANSAKSI'];
$ID_BARANG = @$_POST['ID_BARANG'];
$JUMLAH = @$_POST['JUMLAH'];
$tambah_transaksi = @$_POST['tambah'];

$id_barang = @$_POST['ID_BARANG'];
$query=mysqli_query($mysqli, "SELECT * FROM barang WHERE ID_BARANG='$ID_BARANG'")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
while ($data=mysqli_fetch_array($query)) {
    $kondisi =$data['KONDISI'];
    $sisa=$data['JUMLAH'];
    if($tambah_transaksi){
        if($ID_TRANSAKSI == ""){
            ?>
            <script type="text/javascript">
                alert("inputan tidak boleh kosong");
            </script>
            <?php
        }
        if ($sisa < $JUMLAH) {
            ?>
            <script type="text/javascript">
                alert("Barang Yang Anda pinjam Melebihi Stok Atau Stok Sedang Kosong !");
                window.location.href="?page=tambah_transaksi";
            </script>
            <?php
        }
        elseif ($kondisi == "rusak") { ?>
        <script type="text/javascript">
            alert("Barang Yang Anda Pinjam Sedang Rusak !");
            window.location.href="?page=tambah_transaksi";
        </script>
        <?php }
        else {
            @$query=mysqli_query($mysqli, "INSERT INTO transaksi (ID_TRANSAKSI, TANGGAL_TRANSAKSI, STATUS_TRANSAKSI) VALUES ('$ID_TRANSAKSI','$TANGGAL_TRANSAKSI','Keluar')") or die (mysqli_error());
            @$query2=mysqli_query($mysqli, "INSERT INTO detail_transaksi (ID_DETAIL_TRANSAKSI, ID_TRANSAKSI, ID_INVENTARIS, JUMLAH_DETAIL)VALUES('$ID_DETAIL_TRANSAKSI', '$ID_TRANSAKSI', '$ID_BARANG', '$JUMLAH')") or die (mysqli_error());
            @$query3=mysqli_query($mysqli, "UPDATE inventaris SET JUMLAH=(JUMLAH-$JUMLAH) WHERE ID_BARANG='$ID_BARANG'") or die (mysqli_error());
            ?>
            <script type="text/javascript">
                document.location='index.php?page=transaksi&alert=4';
            </script>
            <?php

        }}
    }
    ?>