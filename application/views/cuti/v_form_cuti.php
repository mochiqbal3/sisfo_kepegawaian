<div class="col-sm-12">
    <div class="caption">
        <h3>Form Cuti</h3>
    </div>
    <form action="<?=base_url();?>cuti/save" method="post">
        <input type="hidden" name="id" value="<?= (isset($row->id)?$row->id:'');''?>"
        class="form-control" />
        <table class="table" width="100%">
            <tr>
                <td>
                    Alasan Cuti
                </td>
                <td>
                    :
                </td>
                <td>
                    <textarea name="reason" class="form-control"><?=isset($row->reason)?$row->reason:''?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Jenis_cuti
                </td>
                <td>
                    :
                </td>
                <td>
                    <select name="jenis_cuti_id" class="form-control custom-select">
                    <?php
								foreach ($jenis_cuti as $row_jenis_cuti) {
									if (isset($row) && $row_jenis_cuti->id == $row->jenis_cuti_id) {
										echo '<option value="' . $row_jenis_cuti->id . '" selected>' . $row_jenis_cuti->nama_cuti . '</option>';
									} else {
										echo '<option value="' . $row_jenis_cuti->id . '">' . $row_jenis_cuti->nama_cuti . '</option>';
									}
								}
								?>
                        </select>
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
                    Penanggung Jawab
                </td>
                <td>
                    :
                </td>
                <td>
                    <select name="responsible" class="form-control custom-select">
                    <?php
								foreach ($users as $row_users) {
									if (isset($row) && $row_users->id == $row->responsible) {
										echo '<option value="' . $row_users->id . '" selected>' . $row_users->name . '</option>';
									} else {
										echo '<option value="' . $row_users->id . '">' . $row_users->name . '</option>';
									}
								}
								?>
                        </select>
                </td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td>
                    <input stle="align-self: flex-end" type="submit" class="btn btn-success" value="Simpan">
                </td>
            </tr>
        </table>
    </form>
</div>