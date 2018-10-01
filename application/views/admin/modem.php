<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Setting Modem
        <small>setting modem sms</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cogs"></i> Setting Modem</a></li>
      </ol>
    </section>
	
	<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
			
			<?=@$this->session->flashdata('status');?>
		
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form Setting Modem</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table class="table table-bordered table-striped datatable">
						<thead>
						<tr>						  
						  <th>Device Set</th>
						  <th>Baud Rate</th>
						  <th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php $i=1; if(!empty($list)){foreach($list as $ls){ ?>
						  <tr>
						  <td><?=$ls->modem_set?></td>
						  <td><?=$ls->modem_baudrate?></td>
						  <td>
							<div class="btn-group">
								<button onclick="
									document.getElementById('modem_set').value='<?=$ls->modem_set?>';
									document.getElementById('modem_baudrate').value='<?=$ls->modem_baudrate?>';
								" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalubah">ubah</button>	
								<button id="btnTes" class="btn btn-info btn-xs" onclick="cekKoneksi()">Tes Koneksi</button>
							</div>
						  </td>
						</tr>
						<?php }}?>
						</tbody>
				</table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
                <form action="<?=base_url()?>settingmodem/update" method="post">
					<div class="form-group">
						<label>Device Set</label>
						<input type="text" class="form-control" id="modem_set" name="modem_set" required />
					</div>
					<div class="form-group">
						<label>Baud Rate</label>
						<input type="text" class="form-control" id="modem_baudrate" name="modem_baudrate" required />
					</div>
					<input type="submit" class="btn btn-primary" value="Ubah"/>
				</form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->