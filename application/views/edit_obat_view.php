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
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Input Data Supplier
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url(); ?>index.php/obat/update/<?php echo $kdob_sp = $this->uri->segment(3); ?>">
                                        <div class="form-group">
                                            <label>Kode Supplier</label>
                                            <select class="form-control" name="kode_sp">
                                                <option><?php echo $detil->KD_SUPPLIER; ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Obat</label>
                                            <select class="form-control" name="kode">
                                                <option><?php echo $detil->KD_OBAT; ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Obat</label>
                                            <input class="form-control" placeholder="Nama Obat" name="nama" value="<?php echo $detil->NAMA_OBAT; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Produsen</label>
                                            <input class="form-control" placeholder="Produsen" name="produsen" value="<?php echo $detil->PRODUSEN; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input class="form-control" placeholder="Kode Supplier" name="harga" type="number" value="<?php echo $detil->HARGA; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input class="form-control" placeholder="Kode Supplier" name="stok" type="number" value="<?php echo $detil->JUMLAH_STOK; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input class="form-control" type="file" name="foto" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="update" value="UPDATE" class="btn btn-success">
                                            <a href="<?php echo base_url(); ?>index.php/obat" class="btn btn-danger">KEMBALI</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <img src="'.base_url().'uploads/'.$detil->FOTO.'" alt="foto">
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