
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

                        <li class="sidebar-item">
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

                        <li class="sidebar-item active">
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
					<section class="section" id="form-and-scrolling-components">
					<div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                    <form class="d-flex col-lg-6 mb-3" action="" method="post">
                                    <input class="form-control me-2" type="search" placeholder="Cari Transaksi Siswa" aria-label="Search" name="keyword" id="keyword" autocomplete="off">
                                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                                    </form>
                                        
                                    </div>

                                    <?php Flasher::flash2(); ?>
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>NISN</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Tanggal Pembayaran</th>
                                                    <th>Tagihan Bulan</th>
                                                    <th>Nominal Pembayaran</th>
                                                    <th>Keterangan</th>
                                                    <th>Action</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($data['pembayaran'] as $pmy) : ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?= $pmy['nisn'] ?></td>
                                                    <td><?= $pmy['nama_lengkap'] ?></td>
                                                    <td><?= date('d-F-Y', strtotime($pmy['tgl_bayar'])); ?></td>
                                                    <td><?= $pmy['bulan'] ?></td>
                                                    <td><?="Rp " . number_format($pmy['nominal_bayar'],2,',','.');?></td>
                                                    <td><?= $pmy['keterangan'] ?></td>
                                                    <td>
                                                    <form action="<?=BASE_URL;?>/admin/detailDataPembayaran" method="POST">
                                                        <input type="hidden" name="nisn" value="<?= $pmy['nisn'] ?>">
                                                        <input type="hidden" name="id_pembayaran" value="<?= $pmy['id_pembayaran'] ?>">
                                                        <button type="submit" class="btn btn-info btn-sm" role="button">Detail</button>
                                                    </form></td>
                                                    <td><a href="<?=BASE_URL;?>/admin/konfirmasiPembayaran/<?=$pmy['id_tagihan'];?>" class="btn btn-danger btn-sm " role="button">Konfirmasi</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					</section>
				</div>
                <script>

