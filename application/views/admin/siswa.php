<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Siswa
        <small>data siswa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Siswa</a></li>
      </ol>
    </section>
	
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
			
			<?=@$this->session->flashdata('status');?>
		
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="<?=base_url()?>siswaadmin/insert" method="post">
                <div class="form-group">
						<label>Nomor Induk Siswa</label>
						<input type="text" class="form-control" name="siswa_nis" required />
					</div>
					<div class="form-group">
						<label>Nama Siswa</label>						
						<input type="text" class="form-control" name="siswa_nama" required />
					</div>
					<div class="form-group">
						<label>Tempat Lahir</label>
						<input type="text" class="form-control" name="siswa_tempat_lahir" required />
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" class="form-control" name="siswa_tanggal_lahir" required />
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select class="form-control" required name="siswa_jenis_kelamin">
							<option value="">Pilih</option>
							<option value="laki-laki">Laki-Laki</option>
							<option value="perempuan">Perempuan</option>						
						</select>
					</div>
					<div class="form-group">
						<label>Nama Ayah</label>
						<input type="text" class="form-control" name="siswa_ayah" required />
					</div>
					<div class="form-group">
						<label>Nama Ibu</label>
						<input type="text" class="form-control" name="siswa_ibu" required />
					</div>
					<div class="form-group">
						<label>Nomor Telpon</label>
						<input type="text" class="form-control" name="siswa_wali_telp" required />
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="siswa_alamat" required></textarea>						
					</div>
					<div class="form-group">
						<label>Kelas</label>
						<select class="form-control" required name="siswa_kelas_id">
							<option value="">Pilih</option>
							<?php if(!empty($kelas)){foreach($kelas as $kl) { ?>
							<option value="<?=$kl->kelas_id?>"><?=$kl->kelas_nama?></option>						
							<?php }}?>
						</select>
					</div>
				<input type="submit" class="btn btn-primary" value="Simpan">
              </form>
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
						  <th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php $i=1; if(!empty($list)){foreach($list as $ls){ ?>
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
						  <td>
							<div class="btn-group">
								<button onclick="
									document.getElementById('siswa_id').value='<?=$ls->siswa_id?>';
									document.getElementById('siswa_nis').value='<?=$ls->siswa_nis?>';
									document.getElementById('siswa_nama').value='<?=$ls->siswa_nama?>';
									document.getElementById('siswa_tempat_lahir').value='<?=$ls->siswa_tempat_lahir?>';
									document.getElementById('siswa_tanggal_lahir').value='<?=$ls->siswa_tanggal_lahir?>';
									document.getElementById('siswa_jenis_kelamin').value='<?=$ls->siswa_jenis_kelamin?>';
									document.getElementById('siswa_ayah').value='<?=$ls->siswa_ayah?>';
									document.getElementById('siswa_ibu').value='<?=$ls->siswa_ibu?>';
									document.getElementById('siswa_wali_telp').value='<?=$ls->siswa_wali_telp?>';
									document.getElementById('siswa_alamat').innerHTML='<?=$ls->siswa_alamat?>';
									document.getElementById('siswa_kelas_id').value='<?=$ls->siswa_kelas_id?>';
								" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalubah">ubah</button>
								<a href="<?=base_url()?>siswaadmin/destroy/<?=$ls->siswa_id?>" onclick="return confirm('Hapus Data Ini?')" class="btn btn-danger btn-xs" >hapus</a>
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