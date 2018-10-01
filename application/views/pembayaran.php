<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img">
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
                            <div class="col-12 col-lg-12">
                                <div class="contact-information wow fadeInUp" data-wow-delay="400ms">
									<?=@$this->session->flashdata("status")?>
                                    <div class="section-heading text-left">
                                        <span>Tagihan Anda</span>
                                        <p class="mt-30">
											<?=$tagihan?> Tagihan Belum Di Bayar.
										</p>
                                    </div>
									<table class="table table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Pesan Penagihan</th>
												<th>Status Tagihan</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
										<?php $array_status = array("0"=>"Belum Di Bayar","1"=>"Sudah Di Bayar","2"=>"Di Terima","3"=>"Di Tolak"); $i=1; if(!empty($list)){foreach($list as $ls){ ?>
											<tr>
												<td><?=$i++?></td>
												<td><?=$ls->tagihan_tanggal?></td>
												<td><?=$ls->tagihan_pesan?></td>
												<td><?=$array_status[$ls->tagihan_status]?></td>
												<td><?php
													if($ls->tagihan_status=='0'){
													?>
													<a href="<?=base_url()?>front/formbayar/<?=$ls->tagihan_id?>" class="btn btn-info btn-xs">Bayar Sekarang</button>
													<?php
													}else { ?>
													<a href="<?=base_url()?>front/detailbayar/<?=$ls->tagihan_id?>" class="btn btn-info btn-xs">Detail Pembayaran</button>
													<?php }?></td>
											</tr>
										<?php }}?>
									</table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->