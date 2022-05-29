
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img  src="<?=BASE_URL?>/images/logo/logo_pandu.png" alt="Logo" srcset="">  MY_SPP</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
				<div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active">
                            <a href="<?=BASE_URL?>/Admin/<?=$data['user']['id_akun']?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?=BASE_URL?>/Admin/dataSiswa/<?=$data['user']['id_akun']?>" class='sidebar-link'>
                                <i class="bi bi-person-badge"></i>
                                <span>Data Siswa</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?=BASE_URL?>/Admin/transaksiSiswa/<?=$data['user']['id_akun']?>" class='sidebar-link'>
                                <i class="bi bi-cash-coin"></i>
                                <span>Transaksi Pembayaran Siswa</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?=BASE_URL?>/Admin/Tagihan/<?=$data['user']['id_akun']?>" class='sidebar-link'>
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                                <span>Generate Tagihan</span>
                            </a>
                        </li>

						<li class="sidebar-title">Lainya</li>

						<li class="sidebar-item  ">
                            <a href="<?=BASE_URL?>/Admin/profile/<?=$data['user']['id_akun']?>" class='sidebar-link'>
                                <i class="bi bi-person-circle"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="<?=BASE_URL?>/Auth/logout" class='sidebar-link'>
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Logout</span>
                            </a>
                        </li>

					</ul>
                </div>
				<!-- End Sidebar -->
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?= $data['user']['nama_lengkap']?></h6>
                                            <p class="mb-0 text-sm text-gray-600"><?= $data['user']['level']?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?=BASE_URL?>/images/profile/<?= $data['user']['foto']?>">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

			<div id="main-content">
				<div class="page-heading">
					<div class="page-title">
						<div class="row">
							<div class="col-12 col-md-6 order-md-1 order-last">
								<h3><?= $data['title']?></h3>
							</div>
						</div>
					</div>
					<br>
					<section class="section">
					<div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pemasukan Bulan Ini</h4>
                            </div>
							<?php foreach ($data['pemasukan'] as $pmk) : ?>
                            <div class="card-body">
							<h6><?="Rp " . number_format($pmk['total'],2,',','.');?></h6>
                            </div>
							<?php endforeach;?>
                        </div>
                    </div>
					<div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Jumlah Siswa</h4>
                            </div>
							<?php foreach ($data['jumlah_siswa'] as $sws) : ?>
                            <div class="card-body">
							<h6><?= $sws['total_siswa'] ?></h6>
							<?php endforeach; ?>
                            </div>
                        </div>
                    </div>
					</section>
				</div>


