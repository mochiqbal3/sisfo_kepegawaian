<div class="col-sm-12">
<nav class="navbar navbar-expand-lg navbar-light ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="<?= base_url();?>pegawai/profile/<?=$row->id?>">Profile <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="<?= base_url();?>pegawai/education/<?=$row->id?>">Riwayat Pendidikan</a>
      <a class="nav-item nav-link" href="<?= base_url();?>pegawai/family/<?=$row->id?>">Anggota Keluarga</a>
    </div>
  </div>
  <a href="<?= base_url(); ?>pegawai"class="btn btn-success">
     Kembali ke Daftar Pegawai
    </a>
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
    <form action="<?=base_url();?>profile/form_profile" method="post">
        <input type="hidden" name="id" value="<?= (isset($row->id)?$row->id:'');''?>"
        class="form-control" />
        <table class="table" width="100%">
            <tr>
                <td>
                    No. Induk Karyawan
                </td>
                <td>
                    :
                </td>
                <td>
                    <input disabled type="text" name="nik" value="<?=(isset($row->nik)?$row->nik:'');?>"
                    required class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>
                    Nama
                </td>
                <td>
                    :
                </td>
                <td>
                <input disabled type="text" name="name" value="<?=(isset($row->name)?$row->name:'');?>"
                    required class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>
                    Tempat Lahir
                </td>
                <td>
                    :
                </td>
                <td>
                    <input disabled type="text" name="birth_place" value="<?=(isset($row->birth_place)?$row->birth_place:'');?>"
                    required class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>
                    Tanggal Lahir
                </td>
                <td>
                    :
                </td>
                <td>
                <input disabled type="text" name="birth_date" value="<?=(isset($row->birth_date)?$row->birth_date:'');?>"
                    required class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>
                    Alamat
                </td>
                <td>
                    :
                </td>
                <td>
                <textarea disabled name="address" class="form-control"><?=isset($row->address)?$row->address:''?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Tanggal Menikah
                </td>
                <td>
                    :
                </td>
                <td>
                <input disabled type="text" name="married_date" value="<?=(isset($row->married_date)?$row->married_date:'');?>"
                    required class="form-control"/>
                </td>
            </tr>
        </table>
            </div>
    </form>
</div>