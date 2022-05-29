
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
                            <a href="<?=BASE_URL?>/Admin/<?=$data['user']['id_akun']?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item active ">
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
                    <section class="section" id="form-and-scrolling-components">
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                    <form class="d-flex col-lg-6 mb-3" action="<?= BASE_URL;?>/admin/cariSiswa" method="post">
                                    <input class="form-control me-2" type="search" placeholder="Cari Siswa" aria-label="Search" name="keyword" id="keyword" autocomplete="off">
                                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                                    </form>
                                        <button type="button" class="btn btn-primary mb-2 tombolTambah" data-bs-toggle="modal" data-bs-target="#formModal">
                                           Tambah Data Siswa
                                        </button>

                                        <?php Flasher::flash(); ?>
                                    </div>

                                    
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>NISN</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Kelas</th>
                                                    <th>Jurusan</th>
                                                    <th>Alamat</th>
                                                    <th>Action</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($data['siswa'] as $sws) : ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?= $sws['nisn'] ?></td>
                                                    <td><?= $sws['nama_lengkap'] ?></td>
                                                    <td><?= $sws['kelas'] ?> <?= $sws['as_jurusan'] ?></td>
                                                    <td><?= $sws['jurusan'] ?></td>
                                                    <td><?= $sws['alamat'] ?></td>
                                                    <td><a href="<?=BASE_URL;?>/admin/detailDataSiswa/<?=$sws['nisn'];?>" class="btn btn-info btn-sm  tampilDetail" role="button" 
                                                           data-bs-toggle="modal" data-bs-target="#modalDetail" data-id="<?=$sws['nisn'];?>">Detail</a></td>
                                                    <td><a href="<?=BASE_URL;?>/admin/editDataSiswa/<?=$sws['nisn'];?>" class="btn btn-success btn-sm  tampilModalUbah" role="button" 
                                                           data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?=$sws['nisn'];?>">Edit</a></td>   
                                                    <td><a href="<?=BASE_URL;?>/admin/hapusDataSiswa/<?=$sws['id_akun'];?>" class="btn btn-danger btn-sm " role="button" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
                    <!-- Modal -->
                    <div class="modal fade" id="formModal" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="judulModal">Tambah Data Siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="<?= BASE_URL; ?>/Admin/tambahSiswa" method="post">

                                <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn" required="required" autocomplete="off">
                                </div>

                                <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required="required" autocomplete="off">
                                </div>

                                <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis kelamin</label>
                                <select id="jenis_kelamin" class="form-select" name="jenis_kelamin">
                                    <option value="Laki-Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                </div>
                                
                                <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select id="kelas" class="form-select" name="kelas">
                                    <option value="1">X</option>
                                    <option value="2">XI</option>
                                    <option value="3">XII</option>
                                </select>
                                </div>
                                
                                <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <select id="jurusan" class="form-select" name="jurusan">
                                    <option value="1">Teknik Gambar Bangunan</option>
                                    <option value="2">Teknik Kendaraan Ringan</option>
                                    <option value="3">Teknik Permesinan</option>
                                </select>
                                </div>

                                <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required="required" autocomplete="off">
                                </div>
                                
                                <div class="mb-3">
                                <label for="no_hp" class="form-label">No Hp</label>
                                <input type="number" class="form-control" id="no_hp" name="no_hp" required="required" autocomplete="off">
                                </div>

                                <div class="mb-3">
                                <label for="wali_murid" class="form-label">Wali Murid</label>
                                <input type="text" class="form-control" id="wali_murid" name="wali_murid" required="required" autocomplete="off">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- modal detail -->
                    <div class="modal fade" id="modalDetail" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="judulModal">Detail Data Siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action=" " method=" ">
                                <img id="foto_siswa" src="<?=BASE_URL?>/images/profile/" width="30%" class="rounded-circle shadow">
                                <br>
                                <br>
                                <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input readonly type="text" class="form-control" id="nisn_siswa" name="nisn" required="required" autocomplete="off">
                                </div>

                                <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Siswa</label>
                                <input readonly type="text" class="form-control" id="nama_lengkap_siswa" name="nama_lengkap" required="required" autocomplete="off">
                                </div>

                                <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis kelamin</label>
                                <select disabled id="kelamin" class="form-select" name="jenis_kelamin">
                                    <option  value="Laki-Laki">Laki - Laki</option>
                                    <option  value="Perempuan">Perempuan</option>
                                </select>
                                </div>
                                
                                <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select disabled id="kelas_siswa" class="form-select" name="kelas">
                                    <option value="1">X</option>
                                    <option value="2">XI</option>
                                    <option value="3">XII</option>
                                </select>
                                </div>
                                
                                <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <select disabled id="jurusan_siswa" class="form-select" name="jurusan">
                                    <option  value="1">Teknik Gambar Bangunan</option>
                                    <option  value="2">Teknik Kendaraan Ringan</option>
                                    <option  value="3">Teknik Permesinan</option>
                                </select>
                                </div>

                                <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" readonly class="form-control" id="alamat_siswa" name="alamat" required="required" autocomplete="off">
                                </div>
                                
                                <div class="mb-3">
                                <label for="no_hp" class="form-label">No Hp</label>
                                <input type="number" readonly class="form-control" id="no_hp_siswa" name="no_hp" required="required" autocomplete="off">
                                </div>

                                <div class="mb-3">
                                <label for="wali_murid" class="form-label">Wali Murid</label>
                                <input type="text" readonly class="form-control" id="wali_murid_siswa" name="wali_murid" required="required" autocomplete="off">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>

                </section>
                <!-- Hoverable rows end -->
	</div>

    <script>
    $(function() {
    $('.tombolTambah').on('click', function(){
        $('#judulModal').html('Tambah data Siswa');
        $('.modal-footer button[type=submit]').html('Tambah data');
        $('.modal-body form')[0].reset();
    });

    $('.tampilModalUbah').on('click', function(){
        $('#judulModal').html('Ubah data siswa');
        $('.modal-footer button[type=submit]').html('ubah data');
        $('.modal-body form').attr('action', 'http://localhost/MY_SPP/public/admin/UbahDataSiswa');
        const id = $(this).data('id');
        console.log(id)
        $.ajax({
            url: 'http://localhost/MY_SPP/public/admin/getSiswaUbah',
            data : {nisn : id},
            method : 'post',
            dataType : 'json',
            success : function(data){
                
                $('#nisn').val(data.nisn);
                $('#nama_lengkap').val(data.nama_lengkap);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#alamat').val(data.alamat);
                $('#no_hp').val(data.no_hp);
                $('#wali_murid').val(data.wali_murid);
                $('#id_akun').val(data.id_akun);
                $('#kelas').val(data.id_kelas);
                $('#jurusan').val(data.id_jurusan);
            }
        });
    });

    $('.tampilDetail').on('click', function(){
        const id = $(this).data('id');
        console.log(id)
        $.ajax({
            url: 'http://localhost/MY_SPP/public/admin/getSiswaUbah',
            data : {nisn : id},
            method : 'post',
            dataType : 'json',
            success : function(data){
                $("#foto_siswa").attr("src","http://localhost/MY_SPP/public/images/profile/"+data.foto);
                $('#nisn_siswa').val(data.nisn);
                $('#nama_lengkap_siswa').val(data.nama_lengkap);
                $('#kelamin').val(data.jenis_kelamin);
                $('#alamat_siswa').val(data.alamat);
                $('#no_hp_siswa').val(data.no_hp);
                $('#wali_murid_siswa').val(data.wali_murid);
                $('#id_akun').val(data.id_akun);
                $('#kelas_siswa').val(data.id_kelas);
                $('#jurusan_siswa').val(data.id_jurusan);
            }
        });
    });


});
    </script>