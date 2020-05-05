<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Data Obat</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php 
        $notif = $this->session->flashdata('notif');
        if (!empty($notif)) {
            echo '<div class="alert alert-danger">';
            echo $notif;
            echo '</div>';
        }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    Input Data Obat
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="<?php echo base_url(); ?>index.php/obat/insert" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Kode Supplier</label>
                                    <select class="form-control" name="kode_sp">
                                        <?php 
                                            foreach ($supplier as $data) {
                                                echo '<option>'.$data->KD_SUPPLIER.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kode Obat</label>
                                    <input class="form-control" placeholder="Kode Obat" name="kode" type="number">
                                </div>
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input class="form-control" placeholder="Nama Obat" name="nama">
                                </div>
                                <div class="form-group">
                                    <label>Produsen</label>
                                    <input class="form-control" placeholder="Produsen" name="produsen">
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input class="form-control" placeholder="Harga" name="harga" type="number">
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input class="form-control" placeholder="Stok" name="stok" type="number">
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input class="form-control" type="file" name="foto" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="insert" value="TAMBAH" class="btn btn-success">
                                    <a href="<?php echo base_url(); ?>index.php/obat" class="btn btn-danger">KEMBALI</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Data Supplier
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body table-responsive">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Supplier</th>
                                                <th>Nama Supplier</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no=1;
                                                foreach($supplier as $data) {
                                                    echo '
                                                        <tr>
                                                            <td>'.$no.'</td>
                                                            <td>'.$data->KD_SUPPLIER.'</td>
                                                            <td>'.$data->NAMA_SUPPLIER.'</td>
                                                        </tr>
                                                    ';
                                                    $no++;
                                                };
                                            ?>
                                        </tbody>
                                    </table>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>