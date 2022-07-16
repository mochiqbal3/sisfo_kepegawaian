<div class="col-sm-12">
    <div class="caption">
        <h3>Form Penunjukan Pelatihan</h3>
    </div>
    
    <?php
            if($this->session->flashdata('warning')){
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
        
    <form action="<?=base_url();?>penunjuk_pelatihan/save" method="post">
        <input type="hidden" name="id" value="<?= (isset($row->id)?$row->id:'');''?>"
        class="form-control" />
        <table class="table" width="100%">
            <tr>
                <td>
                    Pengisi Pelatihan
                </td>
                <td>
                    :
                </td>
                <td>
                <?php 
                  if($this->session->userdata('role') == 2){
                ?>
                <input type="text" name="determiner_id" value="<?=(isset($row->determainer_id)?$row->determainer_id:'');?><?= $this->session->userdata('name') ?>"
                    required class="form-control"/>    
                <?php  
                    }elseif($this->session->userdata('role') == 3){
                ?>
                      <select name="determiner_id" class="form-control custom-select">
                    <?php
								foreach ($users as $row_users) {
									if (isset($row) && $row_users->id == $row->user_id) {
										echo '<option value="' . $row_users->id . '" selected>' . $row_users->name . '</option>';
									} else {
										echo '<option value="' . $row_users->id . '">' . $row_users->name . '</option>';
									}
								}
								?>
                        </select>
                <?php  
                    }
                ?> 
                </td>
            </tr>
            <tr>
                <td>
                    Nama Pelatihan
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="text" name="training_name" value="<?=(isset($row->training_name)?$row->training_name:'');?>"
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
                    <input type="date" name="start_date" value="<?=(isset($row->start_date)?$row->start_date:'');?>"
                    required class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>
                    Tanggal Akhir
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
                    Tanggal Publikasi Sertifikat
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
                    Alamat Pelatihan
                </td>
                <td>
                    :
                </td>
                <td>
                <textarea name="address" required class="form-control"><?=isset($row->address)?$row->address:''?></textarea>
            </tr>
            <tr>
                <td>
                    Catatan
                </td>
                <td>
                    :
                </td>
                <td>
                <textarea name="note" required class="form-control"><?=isset($row->note)?$row->note:''?></textarea>
            </tr>
            <tr>
                <td>
                    Permohonan
                </td>
                <td>
                    :
                </td>
                <td>
                <?php
                if($this->session->userdata('role') == 2){
                ?>
                    <select name="flag" class="form-control custom-select">
                    <option <?php if ($row->flag == 2) { 
                        echo 'selected'; }?> value="2"><?=isset($row) && $row_training->flag == $row->flag?>Pengajuan pelatihan</option>
                    </select>
                </td>
                <?php
                }
                ?>
                
                <?php
                if($this->session->userdata('role') == 3){
                ?>
                <select name="flag" class="form-control custom-select">
                    <option <?php if ($row->flag == 1) { 
                        echo 'selected'; }?> value="1"><?=isset($row) && $row_training->flag == $row->flag?>Penunjukan Pelatihan</option>
                    <option <?php if ($row->flag == 2) { 
                        echo 'selected'; }?> value="2"><?=isset($row) && $row_training->flag == $row->flag?>Pengajuan Pelatihan</option>
                    </select>
                
                <?php
                }
                ?>   
                </td>
            </tr>
            <tr>
                <td>
                <?php 
                  if($this->session->userdata('role') == 2){
                      echo "Nama Pengaju";
                  }elseif($this->session->userdata('role') == 3){
                      echo "Nama Penunjuk";
                  }
                  ?>    
                </td>
                <td>
                    :
                </td>
                <td>
                <?php 
                  if($this->session->userdata('role') == 2){
                ?>
                <input type="text" name="determiner_id" value="<?=(isset($row->determainer_id)?$row->determainer_id:'');?><?= $this->session->userdata('name') ?>"
                    required class="form-control"/>    
                <?php  
                    }elseif($this->session->userdata('role') == 3){
                ?>
                      <select name="determiner_id" class="form-control custom-select">
                    <?php
								foreach ($users as $row_users) {
									if (isset($row) && $row_users->id == $row->user_id) {
										echo '<option value="' . $row_users->id . '" selected>' . $row_users->name . '</option>';
									} else {
										echo '<option value="' . $row_users->id . '">' . $row_users->name . '</option>';
									}
								}
								?>
                        </select>
                <?php  
                    }
                ?>                
                </td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td>
                    <input stle="align-self: flex-end" type="submit" class="btn btn-success" value="Simpan">

                    <a href="<?= base_url(); ?>penunjuk_pelatihan"class="btn btn-danger">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</div>