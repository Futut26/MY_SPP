
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

                        <li class="sidebar-item active ">
                            <a href="<?=BASE_URL?>/Siswa/tagihanSPP/<?=$data['user']['nisn']?>" class='sidebar-link'>
                                <i class="bi bi-cash-coin"></i>
                                <span>Tagihan SPP</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
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
                    <?php Flasher::flash(); ?>
                        <div class="row row-cols-5 row-cols-md-4 g-5">
                        <?php $no = 1; foreach ($data['tagihan'] as $data) : ?>
                            `  <div class="col">
                                    <div class="card text-bg-info mb-3" style="max-width: 18rem;">
                                        <div class="card-header"><h3><?= $data['bulan']?></h3></div>
                                        <div class="card-body">
                                            <h6 class="card-title">Status  :  <?= $data['keterangan']?></h6>
                                            <h7 class="card-title">Nominal :  <?="Rp " . number_format($data['nominal'],2,',','.');?></h7>
                                            <h7 class="card-title">Bayar Sebelum tanggal :  <?= date('d-F-Y', strtotime($data['batas_pembayaran'])); ?></h7>
                                            
                                        </div>
                                        <button type="button" class="btn btn-primary mb-2 bayar" data-id="<?=$data['id_tagihan'];?>" data-bs-toggle="modal" data-bs-target="#formModal">
                                             Bayar
                                            </button>
                                    </div>
                                </div>
                        <?php endforeach ;?>
                        </div>`


                         <!-- Modal -->
                    <div class="modal fade" id="formModal" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="judulModal">Bayar Tgihan SPP</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5>Lakukan pembayaran dengan cara transfer ke no. rekening yang tertera kemudian upload bukti transfer</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">BRI : 0097927xxx</li>
                                    <li class="list-group-item">BNI : 0740078xxx</li>
                                    <li class="list-group-item">BCA : 0590319xxx</li>
                                    <li class="list-group-item">Mandiri : 8735089xxx</li>
                                </ul>
                             

                            <form action="<?= BASE_URL; ?>/Siswa/bayarTagihan" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                <input type="hidden" class="form-control" id="id_tagihan" name="id_tagihan" autocomplete="off">
                                </div>

                                <div class="mb-3">
                                <input type="hidden" class="form-control" id="nisn" name="nisn" autocomplete="off">
                                </div>

                                <div class="mb-3">
                                <input type="hidden" class="form-control" id="kd_spp" name="kd_spp" autocomplete="off">
                                </div>
                                
                                <div class="mb-3">
                                
                                <input type="hidden" value="<?= date('Y-m-d')?>" class="form-control" id="tgl_bayar" name="tgl_bayar" autocomplete="off">
                                </div>

                                <div class="mb-3">
                                <label for="formFileSm" class="form-label">Upload Bukti Transfer</label>
                                <input class="form-control form-control-sm" name="bukti" id="formFileSm" type="file">
                                </div>
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </section>
				</div>

<script>
    $(function() {

    $('.bayar').on('click', function(){
        const id = $(this).data('id');
        console.log(id)
        $.ajax({
            url: 'http://localhost/MY_SPP/public/siswa/ambilTagihan',
            data : {id_tagihan : id},
            method : 'post',
            dataType : 'json',
            success : function(data){
                $('#id_tagihan').val(data.id_tagihan);
                $('#nisn').val(data.nisn);
                $('#kd_spp').val(data.kd_spp);
            }
        });
    });


});
</script>