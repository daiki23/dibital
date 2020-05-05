<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Obat</h1>
                    <a href="<?php echo base_url(); ?>index.php/obat/add" class="btn btn-success btn-md"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
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
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Data Obat
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Supplier</th>
                                        <th>Kode Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Produsen</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no=1;
                                        foreach($obat as $data) {
                                            echo '
                                                <tr>
                                                    <td>'.$no.'</td>
                                                    <td>'.$data->KD_SUPPLIER.'</td>
                                                    <td>'.$data->KD_OBAT.'</td>
                                                    <td>'.$data->NAMA_OBAT.'</td>
                                                    <td>'.$data->PRODUSEN.'</td>
                                                    <td>Rp'.$data->HARGA.',-</td>
                                                    <td>'.$data->JUMLAH_STOK.'</td>
                                                    <td><img style="height:125px; width:250px;" src="'.base_url().'uploads/'.$data->FOTO.'"></td>
                                                    <td style="width:15.5%;">
                                                        <a href="'.base_url().'index.php/obat/edit/'.$data->KD_OBAT.'" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                                        <a href="'.base_url().'index.php/obat/delete/'.$data->KD_OBAT.'" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus </a>
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