<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-content">
                        <div class="row">
                            <!-- Contact Information -->
                            <div class="col-12 col-lg-8">
                                <div class="contact-information wow fadeInUp" data-wow-delay="400ms">
                                    <div class="section-heading text-left">
										<?=@$this->session->flashdata("status")?>
                                        <span>Detail Pembayaran</span>
                                        <p class="mt-20">
											<img src="<?=base_url()?>assets/upload/<?=$list->pembayaran_bukti?>" height="400" width="400" class="img-responsive img-thumbnail" />										
										</p>
										<table class="table">
											<tr>
												<td>Tanggal Pembayaran</td>
												<td>: <?=$list->pembayaran_tanggal?></td>
											</tr>
											<tr>
												<td>Jumlah Pembayaran</td>
												<td>: Rp. <?=number_format($list->pembayaran_jumlah)?></td>
											</tr>
											<tr>
												<td>No Rekening Pembayaran</td>
												<td>: <?=$list->pembayaran_norek?></td>
											</tr>
											<tr>
												<td>Atas Nama Rekening Pembayaran</td>
												<td>: <?=$list->pembayaran_atasnama?></td>
											</tr>
											<tr>
												<td>Status Pembayaran</td>
												<td>: <?php $arrayst = array("0"=>"Belum Di Validasi","1"=>"Pembayaran Diterima","2"=>"Pembayaran Ditolak"); echo $arrayst[$list->pembayaran_status];?></td>
											</tr>
										</table>
										<a href="<?=base_url()?>front/pembayaran" class="btn btn-info">Kembali</a>
                                    </div>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->