<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan
        <small>data laporan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-print"></i> Laporan</a></li>
      </ol>
    </section>
	
	<!-- Main content -->
    <section class="content">
      
	  <div class="row">
		<div class="col-xs-12">
		
			<?=@$this->session->flashdata('status');?>
			
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data Pembayaran</h3>
				</div>
				<div class="box-body">
				<div class="table table-responsive">
					<table class="table table-bordered table-striped datatable">
						<thead>
						<tr>
						  <th>No</th>
						  <th>Nomor Induk Siswa</th>
						  <th>Nama Siswa</th>
						  <th>Kelas</th>
						  <th>Nama Ayah</th>						  
						  <th>Nama Ibu</th>
						  <th>No Telpon Wali</th>
						  <th>Tanggal Tagihan</th>
						  <th>Tanggal Pembayaran</th>
						  <th>Nominal Pembayaran</th>
						  <th>No Rekening</th>
						  <th>Atas Nama</th>
						  <th>Bukti Bayar</th>
						  <th>Status</th>
						</tr>
						</thead>
						<tbody>
						<?php $arrayst = array("0"=>"Belum Di Validasi","1"=>"Pembayaran Diterima","2"=>"Pembayaran Ditolak"); $i=1; if(!empty($list)){foreach($list as $ls){ ?>
						<tr>
						  <td><?=$i++;?></td>
						  <td><?=$ls->siswa_nis?></td>
						  <td><?=$ls->siswa_nama?></td>
						  <td><?=$ls->kelas_nama?></td>
						  <td><?=$ls->siswa_ayah?></td>
						  <td><?=$ls->siswa_ibu?></td>
						  <td><?=$ls->siswa_wali_telp?></td>
						  <td><?=$ls->tagihan_tanggal?></td>
						  <td><?=$ls->pembayaran_tanggal?></td>
						  <td><?=$ls->pembayaran_jumlah?></td>
						  <td><?=$ls->pembayaran_norek?></td>
						  <td><?=$ls->pembayaran_atasnama?></td>
						  <td><?=$ls->pembayaran_bukti?></td>
						  <td><?=$arrayst[$ls->pembayaran_status]?></td>
						</tr>
						<?php }}?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</section>
	
	
	<div class="modal modal fade" id="modalubah">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Data</h4>
              </div>
              <div class="modal-body">
                <form action="<?=base_url()?>siswaadmin/update" method="post">
					<div class="form-group">
						<label>Nomor Induk Siswa</label>
						<input type="hidden" id="siswa_id" name="siswa_id" required />
						<input type="text" class="form-control" id="siswa_nis" name="siswa_nis" required />
					</div>
					<div class="form-group">
						<label>Nama Siswa</label>						
						<input type="text" class="form-control" id="siswa_nama" name="siswa_nama" required />
					</div>
					<div class="form-group">
						<label>Tempat Lahir</label>
						<input type="text" class="form-control" id="siswa_tempat_lahir" name="siswa_tempat_lahir" required />
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" class="form-control" id="siswa_tanggal_lahir" name="siswa_tanggal_lahir" required />
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select class="form-control" required id="siswa_jenis_kelamin" name="siswa_jenis_kelamin">
							<option value="">Pilih</option>
							<option value="laki-laki">Laki-Laki</option>
							<option value="perempuan">Perempuan</option>						
						</select>
					</div>
					<div class="form-group">
						<label>Nama Ayah</label>
						<input type="text" class="form-control" id="siswa_ayah" name="siswa_ayah" required />
					</div>
					<div class="form-group">
						<label>Nama Ibu</label>
						<input type="text" class="form-control" id="siswa_ibu" name="siswa_ibu" required />
					</div>
					<div class="form-group">
						<label>Nomor Telpon</label>
						<input type="text" class="form-control" id="siswa_wali_telp" name="siswa_wali_telp" required />
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="siswa_alamat" id="siswa_alamat" required></textarea>						
					</div>
					<div class="form-group">
						<label>Kelas</label>
						<select class="form-control" required id="siswa_kelas_id" name="siswa_kelas_id">
							<option value="">Pilih</option>
							<?php if(!empty($kelas)){foreach($kelas as $kl) { ?>
							<option value="<?=$kl->kelas_id?>"><?=$kl->kelas_nama?></option>						
							<?php }}?>
						</select>
					</div>
					<input type="submit" class="btn btn-primary" value="Ubah"/>
				</form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->