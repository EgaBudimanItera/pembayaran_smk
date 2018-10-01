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
                            <div class="col-12 col-lg-5">
                                <div class="contact-information wow fadeInUp" data-wow-delay="400ms">
                                    <div class="section-heading text-left">
										<?=@$this->session->flashdata("status")?>
                                        <span>Form Pembayaran</span>
                                        <p class="mt-20">
											Pembayaran Tagihan Untuk Tanggal <?=date("d M Y",strtotime($list->tagihan_tanggal))?>.<br>
											Silahkan isi Form, Pastikan anda sudah melakukan Transfer dan memiliki bukti transfer.
										</p>
                                    </div>

                                </div>
                            </div>
                            <!-- Contact Form Area -->
                            <div class="col-12 col-lg-7">
                                <div class="contact-form-area wow fadeInUp" data-wow-delay="500ms">
									<div class="section-heading">
										<span>Form Upload Bukti Transfer</span>
									</div>
                                    <form action="<?=base_url()?>front/uploadbuktibayar" method="post" enctype="multipart/form-data" >
                                        <div class="form-group">
											<label>Jumlah Transfer</label>
											<input class="form-control" type="number" name="pembayaran_jumlah" required />
											<input type="hidden" value="<?=$list->tagihan_id?>" name="pembayaran_tagihan_id" required />
										</div>
										<div class="form-group">
											<label>Tanggal Transfer</label>
											<input class="form-control" type="date" name="pembayaran_tanggal" required />
										</div>
										<div class="form-group">
											<label>No Rekening Anda</label>
											<input class="form-control" type="text" name="pembayaran_norek" required />
										</div>										
										<div class="form-group">
											<label>Atas Nama (Rekening Anda)</label>
											<input class="form-control" type="text" name="pembayaran_atasnama" required />
										</div>										
										<div class="form-group">
											<label>Bukti Transfer (Maksimal 1MB)</label>
											<input  class="form-control"type="file" name="pembayaran_bukti" required />
										</div>
                                        <button class="btn academy-btn btn-3 m-2" type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->