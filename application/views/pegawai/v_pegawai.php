<div class="col-sm-12">
    <div class="thumbnail">
        <div class="caption">
            <h3>
                Daftar Pegawai
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
            <div class="card-header">
                <h3 class="card-title">List Pegawai</h3>
            </div>
                <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIK</th>
                            <th>NAMA LENGKAP</th>
                            <th>USERNAME</th>
                            <th>TEMPAT LAHIR</th>
                            <th>TANGGAL LAHIR</th>
                            <th>ALAMAT</th>
                            <th>TANGGAL MENIKAH</th>
                            <th>PROFILE LENGKAP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach($listpegawai->result() as $rowpegawai){
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$rowpegawai->nik;?></td>
                                <td><?=$rowpegawai->name;?></td>
                                <td><?=$rowpegawai->username;?></td>
                                <td><?=$rowpegawai->birth_place;?></td>
                                <td><?=$rowpegawai->birth_date;?></td>
                                <td><?=$rowpegawai->address;?></td>
                                <td><?=$rowpegawai->married_date;?></td>
                                <th>
                                    <a href="<?= base_url(); ?>pegawai/profile/<?=$rowpegawai->id?>"class="btn btn-success">
                                        Lihat
                                    </a>
                                </th>
                                </td>
                            </tr>
                        <?php
                                $no++;
                            }
                        ?>
                    </tbody>
                    
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>