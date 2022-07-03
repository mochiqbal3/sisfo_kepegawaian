<div class="col-sm-12">
    <div class="thumbnail">
        <div class="caption">
            <h3>
                Riwayat Cuti - <?= $this->session->userdata('name') ?>
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
        <div class="row">
            <div class="col-lg-3 col-6" style="max-width:15%">
                <div class="small-box bg-success" >
                    <div style="padding-left:5px" >
                    <h2>
                    <?=$liststatusdisetujui?>
                    </h2>
                    <p>Disetujui</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6" style="max-width:15%">
                <div class="small-box bg-info" >
                    <div style="padding-left:5px" >
                    <h2>
                    <?=$liststatusmenunggu?>
                    </h2>
                    <p>Menuggu Disetujui</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6" style="max-width:15%">
                <div class="small-box bg-danger" >
                    <div style="padding-left:5px" >
                    <h2>
                    <?=$liststatusditolak?>
                    </h2>
                    <p>Ditolak</p>
                    </div>
                </div>
            </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Data</h3>
            </div>
                <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>PENGAJU</th>
                            <th>ALASAN CUTI</th>
                            <th>JENIS CUTI</th> 
                            <th>MULAI TANGGAL</th>
                            <th>AKHIR TANGGAL</th>
                            <th>STATUS</th>
                            <th>PENANGGUNG JAWAB</th>
                            <th>
                                <a href="<?= base_url(); ?>cuti/form"class="btn btn-success">
                                    Tambah Data
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach($listcuti->result() as $rowcuti){
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$rowcuti->pengaju;?></td>
                                <td><?=$rowcuti->reason;?></td>
                                <td><?=$rowcuti->nama_cuti;?></td>
                                <td><?=$rowcuti->start_date;?></td>
                                <td><?=$rowcuti->end_date;?></td>
                                <td><?php 
                                if($rowcuti->status == "1" ){
                                    echo "Menunggu Persetujuan";
                                }elseif($rowcuti->status == "2" ){
                                    echo "Disetujui";
                                }else{
                                    echo "Ditolak";
                                }
                                ?></td>
                                <td><?=$rowcuti->name;?></td>
                                <td>
                                    <a href="<?= base_url(); ?>cuti/form/<?=$rowcuti->id?>"
                                    class="btn"
                                    >
                                    <i class="fa fa-edit" style='color: purple'></i>
                                    </a>
                                    <a href="<?= base_url(); ?>cuti/delete/<?=$rowcuti->id?>"
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