<div class="col-sm-12">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="<?= base_url();?>profile">Profile</a>
      <a class="nav-item nav-link" href="<?= base_url();?>profile/education">Riwayat Pendidikan</a>
      <a class="nav-item nav-link active" href="<?= base_url();?>profile/family">Anggota Keluarga<span class="sr-only">(current)</span></a>
    </div>
  </div>
</nav>
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
            <div class="card-body">
                <table class="table table-bordered table-striped">
        <thead>
                <tr>
                <th>NAMA LENGKAP</th>
                <th>TEMPAT LAHIR</th>
                <th>TANGGAL LAHIR</th>
                <th>JENIS PEKERJAAN</th>
                <th>CATATAN</th>
                <th>STATUS DALAM KELUARGA</th>
                <th>
                    <a href="<?= base_url(); ?>profile/form_family"class="btn btn-success">
                        Tambah Data
                    </a>
                </th>
                </tr>
                </thead>
                <tbody>
                <?php
                        foreach($listfamily->result() as $rowfamily){
                ?>
                <tr>
                <td><?=$rowfamily->name;?></td>
                <td><?=$rowfamily->birth_place;?></td>
                <td><?=$rowfamily->birth_date;?></td>
                <td><?=$rowfamily->job;?></td>
                <td><?=$rowfamily->note;?></td>
                <td>
                <?php 
                    if($rowfamily->flag == "1" ){
                        echo "Kakek";
                    }elseif($rowfamily->flag == "2" ){
                        echo "Nenek";
                    }elseif($rowfamily->flag == "3" ){
                        echo "Suami";
                    }elseif($rowfamily->flag == "4" ){
                        echo "Istri";
                    }elseif($rowfamily->flag == "5" ){
                        echo "Kakak";
                    }elseif($rowfamily->flag == "6" ){
                        echo "Adik";
                    }elseif($rowfamily->flag == "7" ){
                        echo "Anak";
                    }elseif($rowfamily->flag == "8" ){
                        echo "Cucu";
                    }
                    
                  ?>  
                </td>  
                <td>
                    <a href="<?= base_url(); ?>profile/form_family/<?=$rowfamily->id?>"
                        class="btn">
                        <i class="fa fa-edit" style='color: purple'></i>
                            </a>
                            <a href="<?= base_url(); ?>profile/deleteFamily/<?=$rowfamily->id?>"
                        class="btn">
                            <i class="fa fa-trash" style='color: red'></i>
                        </a>
                    </td>
                
                </tr>
                <?php
                            }
                        ?>
        </table>

        



            </div>
    </form>
</div>