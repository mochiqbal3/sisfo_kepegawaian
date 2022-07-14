<div class="col-sm-12">
    <div class="thumbnail">
        <div class="caption">
            <h3>
                Penunjukan Pelatihan
            </h3>
        </div>
        <?php
            if($this->session->flashdata('success') || $this->session->flashdata('warning')){
        ?>
            <?php
                if($this->session->flashdata('success')){
            ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                    </button>
                    <i class="fa fa-check sign" ></i><?= $this->session->flashdata('success'); ?>
                </div>
            <?php
                }else{
            ?>
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                    </button>
                    <i class="fa fa-check sign" ></i><?= $this->session->flashdata('warning'); ?>
                </div>
            <?php
                }
            ?>
        <?php
            }
        ?>
        <div class="card">

                <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>PENGISI PELATIHAN</th>
                            <th>NAMA PELATIHAN</th>
                            <!-- <th>TANGGAL MULAI</th>
                            <th>TANGAL AKHIR</th>  -->
                            <!-- <th>TANGGAL PUBLIKASI SERTIFIKAT</th> -->
                            <!-- <th>ALAMAT</th> -->
                            <th>NOTE</th>
                            <th>PERMOHONAN</th>
                            <th>PENGAJU</th>
                            <th>
                                <a href="<?= base_url(); ?>penunjuk_pelatihan/form"class="btn btn-success">
                                    TAMBAH
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach($listtraining->result() as $rowtraining){
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$rowtraining->name;?></td>
                                <td><?=$rowtraining->training_name;?></td>
                                <!-- <td><?=$rowtraining->start_date;?></td>
                                <td><?=$rowtraining->end_date;?></td> -->
                                <!-- <td><?=$rowtraining->certificate_published_date;?></td> -->
                                <!-- <td><?=$rowtraining->address;?></td> -->
                                <td><?=$rowtraining->note;?></td>
                                <td><?php 
                                if($rowtraining->flag == "1" ){
                                    echo "Penunjukan Pelatihan";
                                }elseif($rowtraining->flag == "2" ){
                                    echo "Pengajuan Pelatihan";
                                }
                                ?></td>
                                <td><?=$rowtraining->determiner_id;?></td>
                                <td>
                                    <a href="<?= base_url(); ?>penunjuk_pelatihan/detail/<?=$rowtraining->id?>"
                                    class="btn"
                                    >
                                    <i class="fa fa-info-circle" style='color: blue'></i>
                                    </a>
                                    <a href="<?= base_url(); ?>penunjuk_pelatihan/form/<?=$rowtraining->id?>"
                                    class="btn"
                                    >
                                    <i class="fa fa-edit" style='color: purple'></i>
                                    </a>
                                    <a href="<?= base_url(); ?>penunjuk_pelatihan/delete/<?=$rowtraining->id?>"
                                    class="btn"
                                    >
                                    <i class="fa fa-trash" style='color: red'></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                                $no++;
                            }
                        ?>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>