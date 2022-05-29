
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="<?=BASE_URL?>/images/logo/logo_pandu.png" alt="Logo" srcset="">  MY_SPP</a>
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

                        <li class="sidebar-item ">
                            <a href="<?=BASE_URL?>/Siswa/<?=$data['user']['nisn']?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="<?=BASE_URL?>/Siswa/tagihanSPP/<?=$data['user']['nisn']?>" class='sidebar-link'>
                                <i class="bi bi-cash-coin"></i>
                                <span>Tagihan SPP</span>
                            </a>
                        </li>

                        <li class="sidebar-item active ">
                            <a href="<?=BASE_URL?>/Siswa/transaksi/<?=$data['user']['nisn']?>" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Riwayat Transaksi Pembayaran Siswa</span>
                            </a>
                        </li>

						<li class="sidebar-title">Lainya</li>

						<li class="sidebar-item  ">
                            <a href="<?=BASE_URL?>/Siswa/profile/<?=$data['user']['id_akun']?>" class='sidebar-link'>
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
                                    <li><a class="dropdown-item" href="<?=BASE_URL?>/Auth/logout"><i
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
                    <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Transaksi Pembayaran <?= $data['siswa']['nama_lengkap']?></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>NISN</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" readonly id="first-name" value="<?= $data['siswa']['nisn']?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Nama Lengkap</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" readonly id="first-name" value="<?= $data['siswa']['nama_lengkap']?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Kelas</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" readonly id="first-name" value="<?= $data['siswa']['kelas']?> <?= $data['siswa']['as_jurusan']?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Jurusan</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" readonly id="first-name" value="<?= $data['siswa']['jurusan']?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Tanggal Pembayaran</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" readonly id="first-name" value="<?= date('d-F-Y', strtotime($data['pembayaran']['tgl_bayar'])); ?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Tagihan Bulan</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" readonly id="first-name" value="<?= $data['pembayaran']['bulan']; ?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Nominal Pembayaran</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" readonly id="first-name" value="<?="Rp " . number_format($data['pembayaran']['nominal_bayar'],2,',','.');?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Keterangan</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" readonly id="first-name" value="<?=$data['pembayaran']['keterangan'];?>" class="form-control">
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <a href="<?=BASE_URL?>/siswa/transaksi/<?=$data['user']['nisn']?>" type="submit"
                                                            class="btn btn-primary me-1 mb-1">Kembali</a>
                                                            <a href="<?=BASE_URL?>/siswa/cetakTransaksi/<?=$data['pembayaran']['id_pembayaran']?>" type="submit"
                                                            class="btn btn-success me-1 mb-1">Cetak</a>

                                                    </div>

                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Bukti Pembayaran <?= $data['siswa']['nama_lengkap']?></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                <img class="img-fluid w-50" src="<?=BASE_URL?>/images/bukti_pembayaran/<?= $data['pembayaran']['bukti_bayar']?>"
                                                    alt="Card image cap">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </section>
                <!-- // Basic Horizontal form layout section end -->
                    </div>
