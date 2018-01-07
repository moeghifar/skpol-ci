<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit UPI <?=strtoupper($user[0]['nama_upi'])?></h3>
            </div>
			<form action="<?=site_url('user/action_update_upi/');?>" method="post" class="form-horizontal form-bordered">
				<div class="panel-body">
					<div class="form-group">
	                    <label class="control-label col-sm-3">Username</label>
	                    <div class="col-sm-9">
	                        <div class="col-sm-6" style="padding-left: 0px;">
	                            <input type="text" class="form-control" name="username" value="<?=$user[0]['username']?>">
	                        </div>
	                    </div>
	                </div>
					<div class="form-group">
	                    <label class="control-label col-sm-3">Email</label>
	                    <div class="col-sm-9">
	                        <div class="col-sm-6" style="padding-left: 0px;">
	                            <input type="text" class="form-control" name="email" value="<?=$user[0]['email']?>">
	                        </div>
	                    </div>
	                </div>
					<div class="form-group">
	                    <label class="control-label col-sm-3">Password</label>
	                    <div class="col-sm-9">
	                        <div class="col-sm-6" style="padding-left: 0px;">
	                            <input type="password" class="form-control" name="password">
	                        </div>
	                    </div>
	                </div>
					<div class="form-group">
	                    <label class="control-label col-sm-3">Status Login</label>
	                    <div class="col-sm-9">
	                        <div class="col-sm-6" style="padding-left: 0px;">
	                            <select name="login_status" class="form-control">
									<?php $lg = array('Non Aktif','Aktif'); foreach($lg as $k => $v){
										if($k == $user[0]['login_status']){
											echo '<option selected value="'.$k.'">'.$v.'</option>';
										}else{
											echo '<option value="'.$k.'">'.$v.'</option>';
										}
									}?>
	                            </select>
	                        </div>
	                    </div>
	                </div>
	            </div>
				<div class="panel-footer">
					<input type="hidden" name="level" value="<?=$user[0]['level']?>"/>
					<input type="hidden" name="id_user" value="<?=$user[0]['id_user']?>"/>
	                <a href="<?php echo base_url('user/upi');?>" class="btn btn-default">Batal</a>
	                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
	            </div>
			</form>
        </div>
    </div>
</div>
