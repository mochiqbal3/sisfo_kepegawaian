<div class="col-sm-12">
    <div class="thumbnail">
        <div class="caption">
            <h3>
                HAK AKSES
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
                            <th>USERNAME</th>
                            <th>HAK AKSES</th>
                            <th>SETTING</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach($listrole->result() as $rowrole){
                        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$rowrole->username;?></td>
                                <td><?=$rowrole->name;?></td>
                                <td>
                                    <a href="<?= base_url(); ?>role/form/<?=$rowrole->id?>"
                                    class="btn"
                                    >
                                    <i class="fa fa-edit" style='color: purple'></i>
                                    </a>
                                    <a href="<?= base_url(); ?>role/delete/<?=$rowrole->id?>"
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
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>