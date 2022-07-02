<div class="col-sm-12">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="<?= base_url();?>profile">Profile</a>
      <a class="nav-item nav-link active" href="<?= base_url();?>profile/education">Riwayat Pendidikan <span class="sr-only">(current)</span></a>
    </div>
  </div>
</nav>
            <div class="card-body">
                <table class="table table-bordered table-striped">
        <thead>
                <tr>
                <th>NAMA SEKOLAH/PERGURUAN TINGGI</th>
                <th>NAMA KEPALA SEKOLAH/REKTOR</th>
                <th>TANGGAL MULAI</th>
                <th>TANGGAL SELESAI</th>
                <th>TANGGAL TERBIT SERTIFIKAT</th>
                <th>ALAMAT</th>
                <th>PENDIDIKAN</th>
                <th>
                                <a href="<?= base_url(); ?>profile/form_education"class="btn btn-success">
                                    Tambah Data
                                </a>
                </th>
                </tr>
                </thead>
                <tbody>
                <?php
                        foreach($listeducation->result() as $roweducation){
                ?>
                <tr>
                <td><?=$roweducation->school_name;?></td>
                <td><?=$roweducation->principal;?></td>
                <td><?=$roweducation->start_date;?></td>
                <td><?=$roweducation->end_date;?></td>
                <td><?=$roweducation->certificate_published_date;?></td>
                <td><?=$roweducation->school_address;?></td>
                <td>
                <?php 
                  if($roweducation->flag == "1" ){
                      echo "Sekolah Dasar";
                  }elseif($roweducation->flag == "2" ){
                      echo "Sekolah Menengah Pertama";
                  }elseif($roweducation->flag == "3" ){
                      echo "Sekolah Mengah Atas/Kejuruan";
                  }elseif($roweducation->flag == "4" ){
                      echo "Perguruan Tinggi";
                  }
                  ?>  
                </td>  
                <td>
                    <a href="<?= base_url(); ?>profile/form_education/<?=$roweducation->id?>"
                        class="btn">
                        <i class="fa fa-edit" style='color: purple'></i>
                            </a>
                            <a href="<?= base_url(); ?>user/deleteEducation/<?=$roweducation->id?>"
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