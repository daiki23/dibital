<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Supplier</h1>
            <a href="<?php echo base_url(); ?>index.php/supplier/add" class="btn btn-primary btn-md"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
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
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Telp.</th>
                                <th>Aksi</th>
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
                                            <td>'.$data->ALAMAT.'</td>
                                            <td>'.$data->KOTA.'</td>
                                            <td>'.$data->TELP.'</td>
                                            <td>
                                                <a href="'.base_url().'index.php/supplier/edit/'.$data->KD_SUPPLIER.'" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                                <a href="'.base_url().'index.php/supplier/delete/'.$data->KD_SUPPLIER.'" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus </a>
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