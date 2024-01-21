
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Masuk</h6>
            </div>
            <div class="card-body">
                <form action="" method="post" class="mb-3">
                    <div class="form-group">
                        <label for="id_inventaris">Nama Barang</label>
                        <select name="id_inventaris" id="id_inventaris" class="form-control">
                            <option value="" selected disabled>-- pilih barang --</option>
                            <option value="1">Darbuka</option>
                            <option value="2">Tam Remo</option>
                            <option value="3">Bass</option>
                            <option value="4">Terbang</option>
                            <option value="5">Mic</option>
                        </select>

                            <?php 
                                $query = "SELECT * FROM inventaris";
                                $result = mysqli_query($conn, $query);
                                while ($barang = mysqli_fetch_assoc($result)) {
                           
                                    ?>
                                    <option value="<?php echo $barang['id_inventaris'] ?>"><?php echo $barang['nama']; ?></option>
                                    <?php
                                }
                 
                             ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_masuk">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah_masuk" id="jumlah_masuk" placeholder="Jumlah masuk" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="id_ruang">Supplier</label>
                        <select name="id_supplier" id="id_supplier" class="form-control">
                            <option value="" selected disabled>-- pilih supplier --</option>
                            <option value="4">Jepara</option>
                            <option value="5">Pekalongan</option>
                        </select>
                            <?php 
                                $query = "SELECT * FROM supplier WHERE status = 1";
                                $result = mysqli_query($conn, $query);
                                while ($supplier = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $supplier['id_supplier'] ?>"><?php echo $supplier['nama_supplier']; ?></option>
                                    <?php
                                }
                             ?>
                        </select>
                    </div>
                    <div class="form-inline">
                        <span class="ml-auto">
                            <a href="index.php?page=BarangMasuk" class="btn btn-info btn-sm">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Tambah</button>
                        </span>
                    </div>
                </form>
                <?php
                ob_start();
                if (isset($_POST['submit'])) {
                    $id_inventaris     = $_POST['id_inventaris'];
                    $jumlah_masuk     = $_POST['jumlah_masuk'];
                    $id_supplier = $_POST['id_supplier'];

                    $queryBarang = "SELECT jumlah FROM inventaris WHERE id_inventaris = $id_inventaris";
                    $resultBarang = mysqli_query($conn, $queryBarang);
                    $jumlah = mysqli_fetch_assoc($resultBarang);

                    $hasil = $jumlah['jumlah'] + $jumlah_masuk;

                    mysqli_query($conn, "UPDATE inventaris SET jumlah = '$hasil' WHERE id_inventaris = $id_inventaris");


                    $query = "INSERT INTO barang_masuk (id_inventaris, jumlah_masuk, id_supplier) VALUES ('$id_inventaris', '$jumlah_masuk', '$id_supplier')";
                    if (mysqli_query($conn, $query)) {
                        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=BarangMasuk">';
                } else {
                    ?>
                        <div class="alert alert-danger">
                            Gagal Menambahkan Data!
                        </div>
                    <?php
                }
            }
            ob_flush();
            ?>
            </div>
        </div>
    </div>
</div>