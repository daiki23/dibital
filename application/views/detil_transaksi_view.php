<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Transaksi</h1>
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
                    Detil Data Transaksi
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form>
                                <div class="form-group">
                                    <label>Nama Pembeli</label>
                                    <input class="form-control" disabled value="<?php echo $detill->NAMA_PEMBELI; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Beli</label>
                                    <input class="form-control" disabled value="<?php echo $detill->TGL_BELI; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input class="form-control" disabled value="<?php echo $detil->NAMA_OBAT; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input class="form-control" disabled value="<?php echo $detil->JUMLAH; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Sub Total</label>
                                    <input class="form-control" disabled value="Rp<?php echo $detil->SUB_TOTAL; ?>,-">
                                </div>
                                <div class="form-group">
                                    <label>Total</label>
                                    <input class="form-control" disabled value="Rp<?php echo $detill->TOTAL; ?>,-">
                                </div>
                                <div class="form-group">
                                    <a href="<?php echo base_url(); ?>index.php/transaksi" class="btn btn-danger">KEMBALI</a>
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