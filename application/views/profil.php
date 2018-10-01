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
                                        <span>Profil</span>
                                        <h3>Nama : <?=$this->session->nama?></h3>
                                        <table class="table">
											<tr>
												<td>NIS</td><td>: <?=$ls->siswa_nis?></td>
											</tr>
											<tr>
												<td>Kelas</td> <td>: <?=$ls->kelas_nama?></td>
											</tr>
											<tr>
												<td>Tempat/Tanggal Lahir</td> <td>: <?=$ls->siswa_tempat_lahir?>/<?=$ls->siswa_tanggal_lahir?></td>
											</tr>
											<tr>
												<td>Jenis Kelamin</td> <td>: <?=$ls->siswa_jenis_kelamin?></td>
											</tr>
											<tr>
												<td>Nama Ayah</td> <td>: <?=$ls->siswa_ayah?></td>
											</tr>
											<tr>
												<td>Nama Ibu</td> <td>: <?=$ls->siswa_ibu?></td>
											</tr>
											<tr>
												<td>No Telpon</td> <td>: <?=$ls->siswa_wali_telp?></td>
											</tr>
											<tr>
												<td>Alamat</td> <td>: <?=$ls->siswa_alamat?></td>
											</tr>
										</table>
                                    </div>

                                </div>
                            </div>
                            <!-- Contact Form Area -->
                            <div class="col-12 col-lg-7">
                                <div class="contact-form-area wow fadeInUp" data-wow-delay="500ms">
									<div class="section-heading">
									<span>Ubah Password</span>
									</div>
                                    <form action="<?=base_url()?>front/ubahpassword" method="post">                                        
                                        <input type="password" name="password_lama" class="form-control" placeholder="Password Lama">
                                        <input type="password" name="password_baru" class="form-control" placeholder="Password Baru">
                                        <button class="btn academy-btn btn-3 m-2" type="submit">Ubah</button>
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