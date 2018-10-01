<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>SMK Gajah Mada</title>

    <!-- Favicon -->
    <link rel="icon" href="<?=base_url()?>assets/front/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?=base_url()?>assets/front/style.css">

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="index.html"><img src="<?=base_url()?>assets/front/img/core-img/logo.jpg" style="height:80px" alt=""> &nbsp;&nbsp;SMK Gajah Mada</a>
                            </div>
                            <div class="login-content">
							<?php if(empty($this->session->userdata('username'))){ ?>
                                <a href="<?=base_url()?>front/login">Login</a>
							<?php }else {?>
								Selamat Datang, <?=$this->session->nama?>.
								<a href="<?=base_url()?>front/logout"> Logout</a>
							<?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
									<li><a href="<?=base_url()?>">Home</a></li>     
								<?php if(empty($this->session->userdata('username'))) { ?>                                    
                                    <li><a href="<?=base_url()?>front/informasi">Informasi Pembayaran</a></li>
								<?php }else {?>
									<li><a href="<?=base_url()?>front/profil">Profil</a></li>
									<li><a href="<?=base_url()?>front/pembayaran">Pembayaran</a></li>
								<?php }?>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href="tel:+654563325568889"><i class="icon-telephone-2"></i> <span>(+65) 456 332 5568 889</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    