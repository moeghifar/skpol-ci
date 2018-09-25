<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar UPI</h3>
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-striped table-bordered" id="table-list-unsortable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Provinsi</th>
                            <th>Nama UPI</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status Login</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $x = 1; foreach($user as $u){?>
                        <tr>
                            <td><?=$x?></td>
                            <td><?=ucfirst($u['nama_provinsi'])?></td>
                            <td><?=strtoupper($u['nama_upi'])?></td>
                            <td><?=$u['username']?></td>
                            <td><?=$u['email']?></td>
                            <td><?
                                if ($u['login_status']==1) {
                                    echo "Aktif";
                                }else{
                                    echo "Non Aktif";
                                }
                            ?>
                            </td>
                            <td>
								<a href="<?php echo(base_url('user/upi_detail/'.$u['level'].'/'.$u['id_user']));?>" class="btn btn-sm btn-primary mb5"><i class="ico-eye-open"></i></a>
                                <a href="<?php echo(base_url('user/upi_edit/'.$u['level'].'/'.$u['id_user']));?>" class="btn btn-sm btn-success mb5"><i class="ico-edit"></i></a>
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
<div id="bs-modal-md" class="modal fade">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="semibold modal-title text-primary">Edit User</h3>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="control-label">Password</label>
                                <input type="password" name="password" class="form-control"></input>
                                <label class="control-label">Email</label>
                                <input type="text" name="email" class="form-control"></input>
                                <label class="control-label">Status Login</label>
                                <select class="form-control">
                                    <option>Aktif</option>
                                    <option>Non Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END modal-md -->
