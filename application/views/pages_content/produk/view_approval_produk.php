<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Tabel Pengajuan Produk</h3>
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-striped table-bordered" id="table-list-unsortable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kategori Produk</th>
                            <th>Nama Produk (Bahasa)</th>
                            <th>Nama Produk (English)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $x = 1; foreach($produk as $p){?>
                        <tr>
                            <td><?=$x;?></td>
                            <td><?=$p['kategori_produk']?></td>
                            <td><?=$p['namaind_produk']?></td>
                            <td><?=$p['namaen_produk']?></td>
                            <td>
                                <a class="btn btn-xs btn-success" href="<?=site_url('produk/confirm_product/'.$p['idtbl_produk']);?>"><i class="ico ico-checkmark4"></i></a>
                                <a class="btn btn-xs btn-default" href="<?=site_url('produk/view_edit_produk/'.$p['idtbl_produk']);?>"><i class="ico ico-edit"></i></a>
                                <a class="btn btn-xs btn-danger" href="<?=site_url('produk/delete_product/'.$p['idtbl_produk']);?>"><i class="ico ico-remove"></i></a>
                            </td>
                        </tr>
                    <?php $x++; }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
