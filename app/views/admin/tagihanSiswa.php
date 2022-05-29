
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
                        <li class="sidebar-item active ">
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
								<h3><?= $data['title']?> <?=$data['siswa']['nama_lengkap']?></h3>
							</div>
						</div>
					</div>
					<br>
					<section class="section">
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                            
                                <div class="card-content">
                                    <!-- table hover -->
                                   
                                    <div class="card-body">
                                        <button type="button" class="btn btn-success mb-2 tambahTagihan" data-id="<?=$data['siswa']['nisn'];?>" data-bs-toggle="modal" data-bs-target="#tagihan">
                                           Tambah Tagihan
                                        </button>

                                        <a href="<?=BASE_URL?>/Admin/tagihan" type="button" class="btn btn-primary mb-2">
                                          Kembali
                                        </a>

                                        <?php Flasher::flash2();?>
                                    </div>
                                    <div class="table-responsive">
                                        
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>No</th>
                                                    <th>Tagihan Bulan</th>
                                                    <th>Keterangan</th>
                                                    <th>Nominal Tagihan</th>
                                                    <th>Batas Pembayaran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no = 1; foreach ($data['tagihan'] as $data) : ?>
                                                <tr >
                                                    <td></td>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data['bulan'] ?></td>
                                                    <td><?= $data['keterangan'] ?></td>
                                                    <td><?="Rp " . number_format($data['nominal'],2,',','.');?></td>
                                                    <td><?= date('d-F-Y', strtotime($data['batas_pembayaran'])); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="tagihan" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="judulModal">Tambah Tagihan Siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASE_URL;?>/Admin/tambahTagihanSiswa" method="post">
                                <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" readonly class="form-control" id="nisn" name="nisn" required="required" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                <label for="bulan" class="form-label">Tagihan Bulan</label>
                                <select id="bulan" class="form-select" name="bulan">
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
					</section>
				</div>
                <script>
                    $(function() {
                        $('.tambahTagihan').on('click', function(){
                            $('.modal-body form').attr('action', 'http://localhost/MY_SPP/public/admin/tambahTagihanSiswa');
                            const id = $(this).data('id');
                            console.log(id)
                            $.ajax({
                                url: 'http://localhost/MY_SPP/public/admin/getSiswaUbah',
                                data : {nisn : id},
                                method : 'post',
                                dataType : 'json',
                                success : function(data){
                                    $('#nisn').val(data.nisn);
                                }
                            });
                        });
                    });
                </script>

