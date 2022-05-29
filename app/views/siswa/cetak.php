<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data['title']?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=BASE_URL?>/css/bootstrap.css">
    
    <link rel="stylesheet" href="<?=BASE_URL?>/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/css/app.css">
    <link rel="shortcut icon" href="<?=BASE_URL?>/images/favicon.svg" type="image/x-icon">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>
<body>
         <div id="main-content">
				<div class="page-heading">
					<div class="page-title">
						<div class="row">
							<div class="col-12 col-md-6 order-md-1 order-last">
							</div>
						</div>
					</div>
					<br>
                    <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Transaksi Pembayaran <?= $data['user']['nama_lengkap']?></h4>
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
                                                        <input type="text" readonly id="first-name" value="<?= $data['user']['nisn']?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Nama Lengkap</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" readonly id="first-name" value="<?= $data['user']['nama_lengkap']?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Kelas</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" readonly id="first-name" value="<?= $data['user']['kelas']?> <?= $data['user']['as_jurusan']?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Jurusan</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" readonly id="first-name" value="<?= $data['user']['jurusan']?>" class="form-control">
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
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Bukti Pembayaran <?= $data['user']['nama_lengkap']?></h4>
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
<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
                            <p>2022 &copy; Putut Budiutomo</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script>window.print()</script>
    <script src="<?=BASE_URL?>/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?=BASE_URL?>/js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?=BASE_URL?>/js/main.js"></script>
</body>

</html>