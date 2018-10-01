<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kelas
        <small>data kelas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-th"></i> Kelas</a></li>
      </ol>
    </section>
	
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
			
			<?=@$this->session->flashdata('status');?>
		
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Kelas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="<?=base_url()?>kelasadmin/insert" method="post">
                <div class="form-group">
                  <label>Nama Kelas</label>
                  <input type="text" name="kelas_nama" class="form-control" placeholder="Masukkan Nama Kelas">
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
					<h3 class="box-title">Data Kelas</h3>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-striped datatable">
						<thead>
						<tr>
						  <th>No</th>
						  <th>Nama Kelas</th>
						  <th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php $i=1; if(!empty($list)){foreach($list as $ls){ ?>
						<tr>
						  <td><?=$i++;?></td>
						  <td><?=$ls->kelas_nama?></td>
						  <td>
							<div class="btn-group">
								<button onclick="
									document.getElementById('kelas_id').value='<?=$ls->kelas_id?>';
									document.getElementById('kelas_nama').value='<?=$ls->kelas_nama?>';
								" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalubah">ubah</button>
								<a href="<?=base_url()?>kelasadmin/destroy/<?=$ls->kelas_id?>" onclick="return confirm('Hapus Data Ini?')" class="btn btn-danger btn-xs" >hapus</a>
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
                <form action="<?=base_url()?>kelasadmin/update" method="post">
					<div class="form-group">
						<label>Nama Kelas</label>
						<input type="hidden" id="kelas_id" name="kelas_id" required/>
						<input type="text" class="form-control" id="kelas_nama" name="kelas_nama" required/>
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