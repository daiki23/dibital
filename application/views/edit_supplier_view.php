<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Data Supplier</h1>
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
                            <form role="form" method="post" action="<?php echo base_url(); ?>index.php/supplier/update/<?php echo $kd_sp = $this->uri->segment(3); ?>">
                                <div class="form-group">
                                    <label>Kode Supplier</label>
                                        <select class="form-control" name="kode_sp">
                                            <option><?php echo $detil->KD_SUPPLIER; ?></option>
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label>Nama Supplier</label>
                                    <input class="form-control" placeholder="Nama Supplier" name="nama_sp" value="<?php echo $detil->NAMA_SUPPLIER; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Supplier</label>
                                    <textarea class="form-control" rows="3" name="alamat_sp"><?php echo $detil->ALAMAT; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Kota Supplier</label>
                                    <input class="form-control" placeholder="Kota Supplier" name="kota_sp" value="<?php echo $detil->KOTA; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Telp. Supplier</label>
                                    <input class="form-control" placeholder="Kode Supplier" name="telp_sp" value="<?php echo $detil->TELP; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="update" value="UPDATE" class="btn btn-primary">
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