
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content">
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

                        <li class="sidebar-item ">
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

						<li class="sidebar-item active ">
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
					<section id="basic-horizontal-layouts">
                    <div class="row match-height">
                    <?php Flasher::flash2(); ?>
                        <div class="col-md-6 col-12">
                        
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Profile</h4>
                                    
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <label>NIP</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" value="<?=$data['user']['nip']?>" readonly class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Nama Lengkap</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" value="<?=$data['user']['nama_lengkap']?>" readonly class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Jenis kelamin</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" value="<?=$data['user']['jenis_kelamin']?>" readonly class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" value="<?=$data['user']['alamat']?>" readonly class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>No Hp</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" value="<?=$data['user']['no_hp']?>" readonly class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Jabatan</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" value="<?=$data['user']['jabatan']?>" readonly class="form-control">
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
                                <div class="card-content">
                                    <div class="card-body">
                                    <h4 class="card-title">Ganti Foto Profile</h4>
                                    
                                        <form class="form form-horizontal" method="POST" action="<?=BASE_URL?>/admin/gantiFoto" enctype="multipart/form-data">
                                            <div class="form-body">
                                            <img id="foto" src="<?=BASE_URL?>/images/profile/<?=$data['user']['foto']?>" width="20%" class="rounded-circle">
                                            <br>
                                            <br>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label>Upload foto</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="mb-3">
                                                         <input class="form-control form-control-sm" name="foto" id="formFileSm" type="file">
                                                         <input value="<?=$data['user']['id_akun']?>" class="form-control form-control-sm" name="id_akun" id="formFileSm" type="hidden">
                                                        </div>
                                                    </div>
                                                    <div class="col-11 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Update</button>
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
                                <div class="card-content">
                                    <div class="card-body">
                                    <h4 class="card-title">Ganti Password</h4>
                                    <br>
                                        <form class="form form-horizontal" method="POST" action="<?=BASE_URL?>/admin/gantiPassword" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                <div class="col-md-6">
                                                        <label>Password Lama</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="password" required name="password_lama" class="form-control" placeholder="Masukan password lama">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>Password baru</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" required name="password_baru" placeholder="Masukan password baru"  class="form-control">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>konfirmasi password baru</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="password"  required name="konfirmasi_password" class="form-control">
                                                    </div>

                                                    <div class="col-md-8 form-group">
                                                        <input type="hidden" required value="<?=$data['user']['id_akun']?>" name="id_akun" class="form-control">
                                                    </div>

                                                    <div class="col-11 d-flex">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Ganti Password</button>
                                                    </div>
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


