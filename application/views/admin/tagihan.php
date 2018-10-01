<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tagihan
        <small>data tagihan dan sms</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Tagihan</a></li>
      </ol>
    </section>
	
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
			
			<?=@$this->session->flashdata('status');?>
		
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Penagihan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			
				<ul class="nav nav-tabs">
					<li class="active">
						<a data-toggle="tab" href="#individu">Per Siswa</a>
					</li>
					<li>
						<a data-toggle="tab" href="#group">Per Kelas</a>
					</li>
				</ul>
			
				<div class="tab-content">
				
					<div id="individu" class="tab-pane fade in active">
						<br>
						 <form action="<?=base_url()?>tagihanadmin/insertindividu" method="post">
							<div class="form-group">
								<label>Pilih Siswa</label>
								<select class="form-control" name="tagihan_siswa_id" required>
									<option value="">Pilih</option>
									<?php if(!empty($siswa)){foreach($siswa as $sw){?>
									<option value="<?=$sw->siswa_id?>"><?=$sw->siswa_nama." (".$sw->siswa_nis.")"?></option>
									<?php }}?>
								</select>
							</div>
							<div class="form-group">
								<label>Tanggal</label>
								<input type="date" name="tagihan_tanggal" value="<?=date("Y-m-d")?>" readonly class="form-control" />
							</div>
							<div class="form-group">
								<label>Isi Pesan Penagihan</label>
								<textarea class="form-control" name="tagihan_pesan" required></textarea>
							</div>
							<input type="submit" value="Simpan" class="btn btn-primary" />
						 </form>
					</div>
					
					
					<div id="group" class="tab-pane fade">
					
						<br>
						 <form action="<?=base_url()?>tagihanadmin/insertgroup" method="post">
							<div class="form-group">
								<label>Pilih Kelas</label>
								<select class="form-control" name="tagihan_siswa_id" required>
									<option value="">Pilih</option>
									<?php if(!empty($kelas)){foreach($kelas as $sw){?>
									<option value="<?=$sw->kelas_id?>"><?=$sw->kelas_nama?></option>
									<?php }}?>
								</select>
							</div>
							<div class="form-group">
								<label>Tanggal</label>
								<input type="date" name="tagihan_tanggal" value="<?=date("Y-m-d")?>" readonly class="form-control" />
							</div>
							<div class="form-group">
								<label>Isi Pesan Penagihan</label>
								<textarea class="form-control" name="tagihan_pesan" required></textarea>
							</div>
							<input type="submit" value="Simpan" class="btn btn-primary" />
						 </form>
					
					</div>
					
				</div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
	  </div>
	  <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data Siswa</h3>
				</div>
				<div class="box-body">
				<div class="table table-responsive">
					<table class="table table-bordered table-striped datatable">
						<thead>
						<tr>
						  <th>No</th>
						  <th>Nomor Induk Siswa</th>
						  <th>Nama Siswa</th>
						  <th>Tempat Lahir</th>
						  <th>Tanggal Lahir</th>
						  <th>Jenis Kelamin</th>
						  <th>Nama Ayah</th>
						  <th>Nama Ibu</th>
						  <th>Nomor Telpon</th>
						  <th>Alamat</th>
						  <th>Kelas</th>
						  <th>Pesan Penagihan</th>
						  <th>Status Tagihan</th>
						  <th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php $array_status = array("0"=>"Belum Di Bayar","1"=>"Sudah Di Bayar","2"=>"Di Terima","3"=>"Di Tolak"); $i=1; if(!empty($list)){foreach($list as $ls){ ?>
						<tr>
						  <td><?=$i++;?></td>
						  <td><?=$ls->siswa_nis?></td>
						  <td><?=$ls->siswa_nama?></td>
						  <td><?=$ls->siswa_tempat_lahir?></td>
						  <td><?=$ls->siswa_tanggal_lahir?></td>
						  <td><?=$ls->siswa_jenis_kelamin?></td>
						  <td><?=$ls->siswa_ayah?></td>
						  <td><?=$ls->siswa_ibu?></td>
						  <td><?=$ls->siswa_wali_telp?></td>
						  <td><?=$ls->siswa_alamat?></td>
						  <td><?=$ls->kelas_nama?></td>
						  <td><?=$ls->tagihan_pesan?></td>
						  <td><?=$array_status[$ls->tagihan_status]?></td>
						  <td>
							<div class="btn-group">								
								<a href="<?=base_url()?>tagihanadmin/destroy/<?=$ls->tagihan_id?>" onclick="return confirm('Hapus Data Ini?')" class="btn btn-danger btn-xs" >hapus</a>
							</div>
						  </td>
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