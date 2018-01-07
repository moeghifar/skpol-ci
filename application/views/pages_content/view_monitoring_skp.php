<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar SKP Terbit</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered" id="table-list-unsortable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Upi</th>
                            <th>Provinsi</th>
                            <th>Produk</th>
                            <th>No. Seri</th>
                            <th>No. SKP</th>
                            <th>Tanggal Berlaku</th>
                            <th>Tanggal Kedaluarsa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($skp as $k){ ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=strtoupper($k['nama_upi'])?></td>
                            <td><?=$k['nama_provinsi']?></td>
                            <td><?=$k['namaind_produk']?></td>
                            <td><?=$k['noseri_skp_terbit']?></td>
                            <td><?=$k['no_skp_terbit']?></td>
                            <td><?=date("d-m-Y", strtotime($k['tglmulai_skp_terbit']))?></td>
                            <td><?=date("d-m-Y", strtotime($k['tglkadaluarsa_skp_terbit']))?></td>
                            <td>
								<a class="btn btn-sm btn-primary mb5" href="<?php echo base_url('home/detail_skp/'.$k['idtbl_skp_terbit'].'/'.$k['idtbl_skp']);?>"><i class="ico ico-eye-open"></i></a>
							</td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>