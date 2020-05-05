<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Transaksi</h1>
            <a href="<?php echo base_url(); ?>index.php/transaksi/add" class="btn btn-warning btn-md"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
            <br>
            <br>
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
                    Data Transaksi
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th style="width:1%;">No.</th>
                                <th>Nama Pembeli</th>
                                <th style="width:15%;">Tanggal</th>
                                <th style="width:25%;">Total</th>
                                <th style="width:16%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no=1;
                                foreach($transaksi as $data) {
                                    echo '
                                        <tr>
                                            <td>'.$no.'</td>
                                            <td>'.$data->NAMA_PEMBELI.'</td>
                                            <td>'.$data->TGL_BELI.'</td>
                                            <td>Rp'.$data->TOTAL.',-</td>
                                            <td>
                                                <a href="'.base_url().'index.php/transaksi/detil/'.$data->KD_TRANSAKSI.'" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i> Lihat</a>
                                                <a href="'.base_url().'index.php/transaksi/delete/'.$data->KD_TRANSAKSI.'" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus </a>
                                            </td>
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
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>