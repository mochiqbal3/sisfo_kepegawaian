<div class="col-sm-12">
    <div class="thumbnail">
        <div class="caption">
            <h3>
                Daftar User
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
                <h3 class="card-title">List Data</h3>
            </div>
                <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>NIK</th>
                            <th>USERNAME</th>
                            <th>
                                <a href="<?= base_url(); ?>user/form"class="btn btn-success">
                                    Tambah Data
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach($listuser->result() as $rowuser){
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$rowuser->name;?></td>
                                <td><?=$rowuser->nik;?></td>
                                <td><?=$rowuser->username;?></td>
                                <td>
                                    <a href="<?= base_url(); ?>user/form/<?=$rowuser->id?>"
                                    class="btn btn-primary"
                                    >
                                        Edit
                                    </a>
                                    <a href="<?= base_url(); ?>user/delete/<?=$rowuser->id?>"
                                    class="btn btn-danger"
                                    >
                                        Hapus
                                    </a>
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