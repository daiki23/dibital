<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Data Transaksi</h1>
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
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Input Data Transaksi
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="<?php echo base_url(); ?>index.php/transaksi/insert">
                            <div class="form-group">
                                    <label>Kode Transaksi</label>
                                    <input class="form-control" placeholder="Kode Transaksi" name="kd_transaksi">
                                </div>
                                <div class="form-group">
                                    <label>Nama Pembeli</label>
                                    <input class="form-control" placeholder="Nama Pembeli" name="nama">
                                </div>
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <select class="form-control" name="nama_obat">
                                        <?php 
                                            foreach ($obat as $data) {
                                                echo '<option>'.$data->NAMA_OBAT.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kode Obat</label>
                                    <select class="form-control" name="kode">
                                        <?php 
                                            foreach ($obat as $data) {
                                                echo '<option>'.$data->KD_OBAT.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input class="form-control" type="date" name="tanggal">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input class="form-control" type="number" placeholder="Jumlah" name="jumlah">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="insert" value="TAMBAH" class="btn btn-warning">
                                    <a href="<?php echo base_url(); ?>index.php/transaksi" class="btn btn-danger">KEMBALI</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    Data Obat
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body table-responsive">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th style="width:1%;">No.</th>
                                                <th style="width:49.5%;">Kode Obat</th>
                                                <th style="width:49.5%;">Nama Obat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no=1;
                                                foreach($obat as $data) {
                                                    echo '
                                                        <tr>
                                                            <td>'.$no.'</td>
                                                            <td>'.$data->KD_OBAT.'</td>
                                                            <td>'.$data->NAMA_OBAT.'</td>
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