<div class="row">
    <div class="col-md-12">
        <!-- Form horizontal layout striped -->
		<?php
			echo form_open(site_url('setting/action_update_setting/'),array("class"=>"form-setting form-horizontal form-bordered panel panel-default","method"=>"post"))
		 ?>
            <!--Produk-->
            <div class="panel-heading text-center">
                <h3 class="panel-title">Email</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-3">Username</label>
                    <div class="col-sm-9">
                        <div class="col-sm-4" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="username" value="<?=$user[0]['username']?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Email</label>
                    <div class="col-sm-9">
                        <div class="col-sm-4" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="email" value="<?=$user[0]['email']?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Password Baru</label>
                    <div class="col-sm-9">
                        <div class="col-sm-4" style="padding-left: 0px;">
                            <input type="password" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id_user" value="<?=$user[0]['id_user']?>" />
            <div class="panel-footer">
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" name="reset" value="reset" class="btn btn-default">Batal</button>
            </div>
        </form>
        <!--/ Form horizontal layout striped -->
    </div>
</div>
