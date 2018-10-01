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
                                        <span>Form Login</span>
                                        <h3>SMK Gajah Mada</h3>
                                        <p class="mt-30">Silahkan login menggunakan username dan password yang sudah diberikan Admin Sekolah.</p>
                                    </div>

                                </div>
                            </div>
                            <!-- Contact Form Area -->
                            <div class="col-12 col-lg-7">
                                <div class="contact-form-area wow fadeInUp" data-wow-delay="500ms">
                                    <form action="<?=base_url()?>front/proseslogin" method="post">
                                        <input type="text" class="form-control" name="username" id="Username" placeholder="Username">
                                        <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
                                        <button class="btn academy-btn mt-30" type="submit">Login</button>
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