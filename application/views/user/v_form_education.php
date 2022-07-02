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
    <form action="<?=base_url();?>profile/saveEducation" method="post">
        <input type="hidden" name="id" value="<?= (isset($row->id)?$row->id:'');''?>"
        class="form-control" />
        <table class="table" width="100%">
            <tr>
                <td>
                    Nama Sekolah/Perguruan Tinggi
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="text" name="school_name" value="<?=(isset($row->school_name)?$row->school_name:'');?>"
                    required class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>
                    Nama Kepala Sekolah/Rektor
                </td>
                <td>
                    :
                </td>
                <td>
                <input type="text" name="principal" value="<?=(isset($row->principal)?$row->principal:'');?>"
                    required class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>
                    Tanggal Mulai
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="date" name="start_place" value="<?=(isset($row->start_date)?$row->start_date:'');?>"
                    required class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>
                    Tanggal Selesai
                </td>
                <td>
                    :
                </td>
                <td>
                <input type="date" name="end_date" value="<?=(isset($row->end_date)?$row->end_date:'');?>"
                    required class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>
                Tanggal Terbit Sertifikat
                </td>
                <td>
                    :
                </td>
                <td>
                <input type="date" name="certificate_published_date" value="<?=(isset($row->certificate_published_date)?$row->certificate_published_date:'');?>"
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
                <textarea name="school_address" class="form-control"><?=isset($row->school_address)?$row->school_address:''?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Penanggung Jawab
                </td>
                <td>
                    :
                </td>
                <td>
                    <select name="flag" class="form-control custom-select">
                    <option value="1"><?=isset($row->flag)?$row->flag:'Sekolah Dasar'?></option>
                    <option value="2"><?=isset($row->flag)?$row->flag:'Sekolah Menengah Pertama'?></option>
                    <option value="3"><?=isset($row->flag)?$row->flag:'Sekolah Menengah Atas/Kejuruan'?></option>
                    <option value="4"><?=isset($row->flag)?$row->flag:'Perguruan Tinggi'?></option>
                    </select>
                </td>
            </tr>            
            <tr>
                <td></td>
                <td>
                    
                </td>
                <td>
                    <input style="align-self: flex-end" type="submit" class="btn btn-success" value="Simpan">
                    <a href="<?= base_url(); ?>profile/education"class="btn btn-danger">Kembali</a>
            </td>
            <td></td>
            <td></td>
            </tr>
        </table>

        



            </div>
    </form>
</div>