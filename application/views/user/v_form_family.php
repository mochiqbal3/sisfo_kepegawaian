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
    <form action="<?=base_url();?>profile/saveFamily" method="post">
        <input type="hidden" name="id" value="<?= (isset($row->id)?$row->id:'');''?>"
        class="form-control" />
        <table class="table" width="100%">
            <tr>
                <td>
                    Nama Lengkap
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
                <textarea name="birth_place" class="form-control"><?=isset($row->birth_place)?$row->birth_place:''?></textarea>
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
                    Pekerjaan
                </td>
                <td>
                    :
                </td>
                <td>
                <input type="text" name="job" value="<?=(isset($row->job)?$row->job:'');?>"
                    required class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>
                    Catatan
                </td>
                <td>
                    :
                </td>
                <td>
                <textarea name="note" class="form-control"><?=isset($row->note)?$row->note:''?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Status Dalam Keluarga
                </td>
                <td>
                    :
                </td>
                <td>
                    <select name="flag" class="form-control custom-select">
                    <option <?php if ($row->flag == 1) { 
                        echo 'selected'; }?> value="1"><?=isset($row) && $row_family_member->flag == $row->flag?>Kakek</option>
                    <option <?php if ($row->flag == 2) { 
                        echo 'selected'; }?> value="2"><?=isset($row) && $row_family_member->flag == $row->flag?>Neneka</option>
                    <option <?php if ($row->flag == 3) { 
                        echo 'selected'; }?> value="3"><?=isset($row) && $row_family_member->flag == $row->flag?>Suami</option>
                    <option <?php if ($row->flag == 4) { 
                        echo 'selected'; }?> value="4"><?=isset($row) && $row_family_member->flag == $row->flag?>Istri</option>
                    <option <?php if ($row->flag == 5) { 
                        echo 'selected'; }?> value="5"><?=isset($row) && $row_family_member->flag == $row->flag?>Kakak</option>
                    <option <?php if ($row->flag == 6) { 
                        echo 'selected'; }?> value="6"><?=isset($row) && $row_family_member->flag == $row->flag?>Adik</option>
                    <option <?php if ($row->flag == 7) { 
                        echo 'selected'; }?> value="7"><?=isset($row) && $row_family_member->flag == $row->flag?>Anak</option>
                    <option <?php if ($row->flag == 8) { 
                        echo 'selected'; }?> value="8"><?=isset($row) && $row_family_member->flag == $row->flag?>Cucu</option>
                    </select>
                </td>
            </tr>
    
            <tr>
                <td></td>
                <td>
                    
                </td>
                <td>
                    <input style="align-self: flex-end" type="submit" class="btn btn-success" value="Simpan">
                    <a href="<?= base_url(); ?>profile/family"class="btn btn-danger">Kembali</a>
            </td>
            <td></td>
            <td></td>
            </tr>
            
        </table>

        



            </div>
    </form>
</div>