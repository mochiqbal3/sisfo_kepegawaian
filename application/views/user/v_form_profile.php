<div class="col-sm-12">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <a class="nav-item nav-link active" href="<?= base_url();?>profile">Profile <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="<?= base_url();?>profile/education">Riwayat Pendidikan</a>
    </div>
  </div>
</nav>
    <form action="<?=base_url();?>profile/save" method="post">
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
                    <input type="text" name="nik" value="<?=(isset($row->nik)?$row->nik:'');?>"
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
                <input type="text" name="name" value="<?=(isset($row->name)?$row->name:'');?>"
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
                    <input type="text" name="birth_place" value="<?=(isset($row->birth_place)?$row->birth_place:'');?>"
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
                <input type="date" name="birth_date" value="<?=(isset($row->birth_date)?$row->birth_date:'');?>"
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
                <textarea name="address" class="form-control"><?=isset($row->address)?$row->address:''?></textarea>
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
                <input type="date" name="married_date" value="<?=(isset($row->married_date)?$row->married_date:'');?>"
                    required class="form-control"/>
                </td>
            </tr>
            
            <tr>
                <td></td>
                <td>
                    
                </td>
                <td>
                    <input style="align-self: flex-end" type="submit" class="btn btn-success" value="Simpan">

                    <a href="<?= base_url(); ?>profile"class="btn btn-danger">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</div>