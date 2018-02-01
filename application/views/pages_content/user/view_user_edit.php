<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Edit User <?=ucfirst($user[0]['nama_dinas'])?></h3>
            </div>
			<form action="<?=site_url('user/action_update_user/');?>" method="post" class="form-horizontal form-bordered">
				<div class="panel-body">
					<div class="form-group">
	                    <label class="control-label col-sm-3">Nama Pengguna</label>
	                    <div class="col-sm-9">
	                        <div class="col-sm-6" style="padding-left: 0px;">
	                            <input type="text" class="form-control" name="nama_dinas" value="<?=ucfirst($user[0]['nama_dinas'])?>">
	                        </div>
	                    </div>
	                </div>
					<div class="form-group">
	                    <label class="control-label col-sm-3">Jabatan</label>
	                    <div class="col-sm-9">
	                        <div class="col-sm-6" style="padding-left: 0px;">
	                            <input type="text" class="form-control" name="jabatan_dinas" value="<?=$user[0]['jabatan_dinas']?>">
	                        </div>
	                    </div>
	                </div>
					<?php if ($user[0]['level']=='dinas') {?>
	                <div class="form-group">
	                    <label class="control-label col-sm-3">Provinsi</label>
	                    <div class="col-sm-9">
	                        <div class="col-sm-6" style="padding-left: 0px;">
	                            <select name="provinsi_id" class="form-control">
									<?php
										foreach($provinsi as $key){
											if($user[0]['id_provinsi'] == $key['id_provinsi']){
												echo '<option selected value="'.$key['id_provinsi'].'">'.$key['nama_provinsi'].'</option>';
											}else{
												echo '<option value="'.$key['id_provinsi'].'">'.$key['nama_provinsi'].'</option>';
											}
										}
									?>
	                            </select>
	                        </div>
	                    </div>
	                </div>
					<?php }?>
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
									<?php
										$st = array('0'=>'Non Aktif','1'=>'Aktif'); foreach($st as $k => $v){
											if($user[0]['login_status'] == $k){
												echo '<option selected value="'.$k.'">'.$v.'</option>';
											}else{
												echo '<option value="'.$k.'">'.$v.'</option>';
											}
									 	}
									 ?>
	                            </select>
	                        </div>
	                    </div>
	                </div>
	            </div>
				<div class="panel-footer">
					<input type="hidden" name="level" value="<?=$user[0]['level']?>"/>
					<input type="hidden" name="id_user" value="<?=$user[0]['id_user']?>"/>
	                <a href="<?php echo base_url('user');?>" class="btn btn-default">Batal</a>
	                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
	            </div>
			</form>
        </div>
    </div>
</div>
