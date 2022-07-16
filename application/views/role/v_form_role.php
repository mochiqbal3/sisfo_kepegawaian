<div class="col-sm-12">
    <div class="caption">
        <h3>Form Role</h3>
    </div>
    <form action="<?=base_url();?>role/save" method="post">
        <input type="hidden" name="id" value="<?= (isset($row->id)?$row->id:'');''?>"
        class="form-control" />
        <table class="table" width="100%">
        <tr>
                <td>
                    Username
                </td>
                <td>
                    :
                </td>
                <td>
                <input disabled type="text" name="username " value="<?=(isset($row->username)?$row->username:'');?>"
                    required class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>
                    Hak Akses
                </td>
                <td>
                    :
                </td>
                <td>
                    <select name="role_id" class="form-control custom-select">
                    <?php
								foreach ($roles as $row_roles) {
									if (isset($row) && $row_roles->id == $row->role_id) {
										echo '<option value="' . $row_roles->id . '" selected>' . $row_roles->name . '</option>';
									} else {
										echo '<option value="' . $row_roles->id . '">' . $row_roles->name . '</option>';
									}
								}
								?>
                        </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input stle="align-self: flex-end" type="submit" class="btn btn-success" value="Simpan">

                    <a href="<?= base_url(); ?>role"class="btn btn-danger">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</div>