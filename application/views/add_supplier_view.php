<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Supplier</h1>
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Supplier
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="<?php echo base_url(); ?>index.php/supplier/insert">
                                        <div class="form-group">
                                            <label>Kode Supplier</label>
                                            <input class="form-control" placeholder="Kode Supplier" type="number" name="kode_sp">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Supplier</label>
                                            <input class="form-control" placeholder="Nama Supplier" name="nama_sp">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Supplier</label>
                                            <textarea class="form-control" rows="3" name="alamat_sp"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kota Supplier</label>
                                            <input class="form-control" placeholder="Kota Supplier" name="kota_sp">
                                        </div>
                                        <div class="form-group">
                                            <label>Telp. Supplier</label>
                                            <input class="form-control" placeholder="Kode Supplier" type="number" name="telp_sp">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="insert" value="TAMBAH" class="btn btn-primary">
                                            <a href="<?php echo base_url(); ?>index.php/supplier" class="btn btn-danger">KEMBALI</a>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
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