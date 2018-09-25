<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar User</h3>
                <div class="panel-toolbar text-right"><a href="" style="padding:5px 25px;" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modaltambah"><i class="ico-user-plus2"></i> Tambah</a></div>
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-striped table-bordered" id="table-list-unsortable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Provinsi</th>
                            <th>Level</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status Login</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $x = 1; foreach($user as $u ){ ?>
                        <tr>
                            <td><?=$x?></td>
                            <td>
								<?php
									if($u['level'] != 'dinas'){
										echo 'all';
									}else{
										echo ucfirst($u['nama_provinsi']);
									}
								?>
							</td>
                            <td><?=ucfirst($u['level'])?></td>
                            <td><?=$u['username']?></td>
                            <td><?=$u['email']?></td>
                            <td><?
                                if ($u['login_status']==1) {
                                    echo "Aktif";
                                }else{
                                    echo "Non Aktif";
                                }
                            ?></td>
                            <td>
                                <a href="<?php echo(base_url('user/user_detail/'.$u['level'].'/'.$u['id_user']));?>" class="btn btn-sm btn-primary"><i class="ico-eye-open"></i></a>
                                <a href="<?php echo(base_url('user/user_edit/'.$u['level'].'/'.$u['id_user']));?>" class="btn btn-sm btn-success"><i class="ico-edit"></i></a>
                            </td>
                        </tr>
                        <?php $x++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- START modal-md -->
<div id="modaltambah" class="modal fade">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="semibold modal-title text-primary">Tambah User</h3>
            </div>
            <form action="<?=site_url('user/action_add')?>" method="post">
	            <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="control-label">Nama</label>
                                <input type="text" name="nama" class="form-control" required></input>
								<label class="control-label">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control"></input>
                                <label class="control-label">Username</label>
                                <input type="text" name="username" class="form-control" required></input>
                                <label class="control-label">Password</label>
                                <input type="password" name="password" class="form-control" required></input>
                                <label class="control-label">Email</label>
                                <input type="text" name="email" class="form-control" required></input>
								<label class="control-label">Level</label>
								<select class="form-control input-md" name="level">
									<option value="">...pilih level...</option>
									<option value="dinas">Dinas</option>
									<option value="kp">Kantor Pusat</option>
								</select>
                                <label class="control-label">Provinsi</label>
								<select class="form-control input-md" name="provinsi">
									<option value="">...pilih provinsi...</option>
									<?php
										foreach($provinsi as $key){
											echo '<option value="'.$key['id_provinsi'].'">'.$key['nama_provinsi'].'</option>';
										}
									?>
								</select>
                            </div>
                        </div>
                    </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
	            </div>
			</form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END modal-md -->
