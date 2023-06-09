<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DKM MASJID AL FURQON</title>

    <!-- add icon link -->
    <link rel="icon" href="<?= base_url() ?>assets/img/kegiatanmasjid/Logo Al-Furqon-01.png" type= "image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />



    <!-- Template Main CSS File -->

    <!-- <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet"> -->

    <link href="<?= base_url() ?>assets/css/mycss.css" rel="stylesheet">



    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">



</head>

<body>

    <div class="swiper">

        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <!-- Pembuka -->
            <div class="swiper-slide">
                <div class="background">
                    <img src="<?= base_url() ?>assets/img/kegiatanmasjid/alfurqon.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="col-12 pembuka position-absolute top-50 start-50 translate-middle">
                    <div class="judulpembuka text-center">
                        <img src="<?= base_url() ?>assets/img/kegiatanmasjid/rounded_logo.png" class="mb-2" alt="" width="100">
                        <h1>PROGRAM KEGIATAN PEKANAN <br />MASJID AL FURQON</h1>
                    </div>
                </div>
            </div>
            <!-- Senin -->

            <?php foreach ($hari as $key) : ?>
                <?php

                $this->db->select('*');
                $this->db->from('tbl_daily');
                $this->db->join('tbl_hari', 'tbl_hari.id_hari = tbl_daily.id_hari', 'left');
                $this->db->join('tbl_penceramah', 'tbl_penceramah.id_penceramah = tbl_daily.id_penceramah', 'left');
                $this->db->join('tbl_kajian', 'tbl_kajian.id_kajian = tbl_daily.id_kajian', 'left');
                $this->db->join('tbl_background', 'tbl_background.id_background = tbl_daily.id_background', 'left');
                $this->db->order_by('tbl_hari.id_hari', 'ASC');
                $this->db->where('tbl_hari.id_hari', $key['id_hari']);
                $getData = $this->db->get()->result_array();
                $count = count($getData);
                ?>

                <?php if ($count == 1) : ?>
                    <div class="swiper-slide">
                        <div class="background">
                            <img src="<?= base_url() ?>assets/background/<?= $getData[0]['background'] ?>" class="d-block w-100" alt="...">
                        </div>

                        <div class="col-6 kotakthumb position-absolute top-50 end-0 translate-middle-y">
                            <?php if ($getData[0]['foto'] != 'default.png') { ?>
                                <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[0]['foto'] ?>" class=" thumbnail rounded float-end me-auto" alt="...">
                            <?php } ?>
                        </div>

                        <div class="col-6 d-flex judulkegiatan judulkegiatan1 position-absolute top-50 start-0 translate-middle">

                            <div class="kegiatan1">

                                <h1><?= $key['hari'] ?></h1>

                                <h3><?= $getData[0]['nama_kajian'] ?></h3>
                                <p class="lh-1"><?= $getData[0]['keterangan_waktu'] . ' Pukul ' . $getData[0]['mulai'] . ' s.d ' . $getData[0]['selesai'] ?></p>
                                <div class="ustazah">
                                    <p class="lh-1"><?= $getData[0]['nama_penceramah'] ?></p>
                                </div>

                            </div>

                        </div>
                    </div>
                <?php elseif ($count == 2) : ?>
                    <div class="swiper-slide">
                        <div class="background">
                            <img src="<?= base_url() ?>assets/background/<?= $getData[0]['background'] ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="col-6 kotakthumb position-absolute top-50 end-0 translate-middle-y">

                            <swiper-container class="mySwiper ms-5" navigation="false" space-between="30" centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
                                <?php if ($getData[0]['foto'] != 'default.png') { ?>
                                    <swiper-slide>
                                        <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[0]['foto'] ?>" class=" thumbnail rounded " alt="...">
                                    </swiper-slide>
                                <?php } ?>
                                <?php if ($getData[1]['foto'] != 'default.png') { ?>
                                    <swiper-slide>
                                        <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[1]['foto'] ?>" class=" thumbnail rounded " alt="...">
                                    </swiper-slide>
                                <?php } ?>
                            </swiper-container>

                        </div>

                        <div class="col-6 judulkegiatan position-absolute top-0 start-0">

                            <div class="kegiatan1">

                                <h1><?= $key['hari'] ?></h1>

                                <h3><?= $getData[0]['nama_kajian'] ?></h3>
                                <p class="lh-1"><?= $getData[0]['keterangan_waktu'] . ' Pukul ' . $getData[0]['mulai'] . ' s.d ' . $getData[0]['selesai'] ?></p>

                                <p class="lh-1"><?= $getData[0]['nama_penceramah'] ?></p>

                            </div>

                            <div class="kegiatan2">

                                <h3><?= $getData[1]['nama_kajian'] ?></h3>
                                <p class="lh-1"><?= $getData[1]['keterangan_waktu'] . ' Pukul ' . $getData[1]['mulai'] . ' s.d ' . $getData[1]['selesai'] ?></p>
                                <div class="ustazah">
                                    <p class="lh-1"><?= $getData[1]['nama_penceramah'] ?></p>
                                </div>

                            </div>

                        </div>
                    </div>
                <?php elseif ($count == 3) : ?>
                    <div class="swiper-slide">
                        <div class="background">
                            <img src="<?= base_url() ?>assets/background/<?= $getData[0]['background'] ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="col-6 kotakthumb position-absolute top-50 end-0 translate-middle-y">
                            <swiper-container class="mySwiper ms-5" navigation="false" space-between="30" centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
                                <?php if ($getData[0]['foto'] != 'default.png') { ?>
                                    <swiper-slide>
                                        <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[0]['foto'] ?>" class=" thumbnail rounded " alt="...">
                                    </swiper-slide>
                                <?php } ?>
                                <?php if ($getData[1]['foto'] != 'default.png') { ?>
                                    <swiper-slide>
                                        <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[1]['foto'] ?>" class=" thumbnail rounded " alt="...">
                                    </swiper-slide>
                                <?php } ?>
                                <?php if ($getData[2]['foto'] != 'default.png') { ?>
                                    <swiper-slide>
                                        <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[2]['foto'] ?>" class=" thumbnail rounded " alt="...">
                                    </swiper-slide>
                                <?php } ?>
                            </swiper-container>
                        </div>

                        <div class="col-6 judulkegiatan position-absolute top-0 start-0">

                            <div class="selasa1">

                                <h1><?= $key['hari'] ?></h1>

                                <h3><?= $getData[0]['nama_kajian'] ?></h3>
                                <p class="lh-1"><?= $getData[0]['keterangan_waktu'] . ' Pukul ' . $getData[0]['mulai'] . ' s.d ' . $getData[0]['selesai'] ?></p>
                                <div class="ustazah">
                                    <p class="lh-1"><?= $getData[0]['nama_penceramah'] ?></p>
                                </div>

                            </div>

                            <div class="selasa1">

                                <h3><?= $getData[1]['nama_kajian'] ?></h3>

                                <p class="lh-1"><?= $getData[1]['keterangan_waktu'] . ' Pukul ' . $getData[1]['mulai'] . ' s.d ' . $getData[1]['selesai'] ?></p>

                                <div class="ustazah">

                                    <p class="lh-1"><?= $getData[1]['nama_penceramah'] ?></p>

                                </div>

                            </div>

                            <div class="selasa1">

                                <h3><?= $getData[2]['nama_kajian'] ?></h3>

                                <p class="lh-1"><?= $getData[2]['keterangan_waktu'] . ' Pukul ' . $getData[2]['mulai'] . ' s.d ' . $getData[2]['selesai'] ?></p>

                                <div class="ustazah">

                                    <p class="lh-1"><?= $getData[2]['nama_penceramah'] ?></p>

                                </div>

                            </div>

                        </div>
                    </div>
                <?php elseif ($count == 4) : ?>
                    <div class="swiper-slide">
                        <div class="background">
                            <img src="<?= base_url() ?>assets/background/<?= $getData[0]['background'] ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="col-4 judulkegiatan mt-3 ps-3 position-absolute top-0 start-0">

                            <div class="ahad1">

                                <h3><?= $getData[0]['nama_kajian'] ?></h3>

                                <span class="lh-1" style="color:white; font-size:18pt !important;"><?= $getData[0]['keterangan_waktu'] . ' Pukul ' . $getData[0]['mulai'] . ' s.d ' . $getData[0]['selesai'] ?></span>4
                                <div class="ustazah mt-2">

                                    <p class="lh-1"><?= $getData[0]['nama_penceramah'] ?></p>

                                </div>

                            </div>

                            <div class="ahad2">
                                <h3><?= $getData[1]['nama_kajian'] ?></h3>

                                <span class="lh-1" style="color:white; font-size:18pt !important;"><?= $getData[1]['keterangan_waktu'] . ' Pukul ' . $getData[1]['mulai'] . ' s.d ' . $getData[1]['selesai'] ?></span>4
                                <div class="ustazah mt-2">

                                    <p class="lh-1"><?= $getData[1]['nama_penceramah'] ?></p>

                                </div>

                            </div>

                        </div>

                        <div class="col-4 mt-3 position-absolute top-0 start-50 translate-middle-x">

                            <h1 class="text-center lh-lg" style="color:white; font-size:45pt;"><?= $key['hari'] ?></h1>
                            <swiper-container class="mySwiper " navigation="false" space-between="30" centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
                                <?php if ($getData[0]['foto'] != 'default.png') { ?>
                                    <swiper-slide>
                                        <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[0]['foto'] ?>" class=" thumbnail rounded " alt="...">
                                    </swiper-slide>
                                <?php } ?>
                                <?php if ($getData[1]['foto'] != 'default.png') { ?>
                                    <swiper-slide>
                                        <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[1]['foto'] ?>" class=" thumbnail rounded " alt="...">
                                    </swiper-slide>
                                <?php } ?>
                                <?php if ($getData[2]['foto'] != 'default.png') { ?>
                                    <swiper-slide>
                                        <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[2]['foto'] ?>" class=" thumbnail rounded " alt="...">
                                    </swiper-slide>
                                <?php } ?>
                                <?php if ($getData[3]['foto'] != 'default.png') { ?>
                                    <swiper-slide>
                                        <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[3]['foto'] ?>" class=" thumbnail rounded " alt="...">
                                    </swiper-slide>
                                <?php } ?>
                            </swiper-container>

                        </div>

                        <div class="col-4 judulkegiatan mt-3 ps-3 position-absolute top-0 end-0">

                            <div class="ahad1">
                                <h3><?= $getData[2]['nama_kajian'] ?></h3>

                                <span class="lh-1" style="color:white; font-size:18pt !important;"><?= $getData[2]['keterangan_waktu'] . ' Pukul ' . $getData[2]['mulai'] . ' s.d ' . $getData[2]['selesai'] ?></span>4
                                <div class="ustazah mt-2">

                                    <p class="lh-1"><?= $getData[2]['nama_penceramah'] ?></p>

                                </div>

                            </div>

                            <div class="ahad2">
                                <h3><?= $getData[3]['nama_kajian'] ?></h3>

                                <span class="lh-1" style="color:white; font-size:18pt !important;"><?= $getData[3]['keterangan_waktu'] . ' Pukul ' . $getData[3]['mulai'] . ' s.d ' . $getData[3]['selesai'] ?></span>4
                                <div class="ustazah mt-2">

                                    <p class="lh-1"><?= $getData[3]['nama_penceramah'] ?></p>

                                </div>

                            </div>

                        </div>
                    </div>
                <?php elseif ($count == 5) : ?>
                    <div class="swiper-slide">
                        <div class="background">
                            <img src="<?= base_url() ?>assets/background/<?= $getData[0]['background'] ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="col-4 judulkegiatan mt-3 ps-3 position-absolute top-0 start-0">

                            <div class="ahad1">

                                <h3><?= $getData[0]['nama_kajian'] ?></h3>

                                <p class="lh-1"><?= $getData[0]['keterangan_waktu'] . ' Pukul ' . $getData[0]['mulai'] . ' s.d ' . $getData[0]['selesai'] ?></p>4
                                <div class="ustazah">

                                    <p class="lh-1"><?= $getData[0]['nama_kajian'] ?></p>

                                </div>

                            </div>

                            <div class="ahad2">
                                <h3><?= $getData[1]['nama_kajian'] ?></h3>

                                <p class="lh-1"><?= $getData[1]['keterangan_waktu'] . ' Pukul ' . $getData[1]['mulai'] . ' s.d ' . $getData[1]['selesai'] ?></p>4
                                <div class="ustazah">

                                    <p class="lh-1"><?= $getData[1]['nama_kajian'] ?></p>

                                </div>

                            </div>

                        </div>

                        <div class="col-4 mt-3 position-absolute top-0 start-50 translate-middle-x">

                            <h1 class="text-center lh-lg" style="color:white; font-size:45pt;"><?= $key['hari'] ?></h1>
                            <swiper-container class="mySwiper " navigation="false" space-between="30" centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
                                <?php if ($getData[0]['foto'] != 'default.png') { ?>
                                    <swiper-slide>
                                        <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[0]['foto'] ?>" class=" thumbnail rounded " alt="...">
                                    </swiper-slide>
                                <?php } ?>
                                <?php if ($getData[1]['foto'] != 'default.png') { ?>
                                    <swiper-slide>
                                        <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[1]['foto'] ?>" class=" thumbnail rounded " alt="...">
                                    </swiper-slide>
                                <?php } ?>
                                <?php if ($getData[2]['foto'] != 'default.png') { ?>
                                    <swiper-slide>
                                        <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[2]['foto'] ?>" class=" thumbnail rounded " alt="...">
                                    </swiper-slide>
                                <?php } ?>
                                <?php if ($getData[3]['foto'] != 'default.png') { ?>
                                    <swiper-slide>
                                        <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[3]['foto'] ?>" class=" thumbnail rounded " alt="...">
                                    </swiper-slide>
                                <?php } ?>
                            </swiper-container>

                        </div>

                        <div class="col-4 judulkegiatan mt-3 ps-3 position-absolute top-0 end-0">

                            <div class="ahad1">
                                <h3><?= $getData[2]['nama_kajian'] ?></h3>

                                <p class="lh-1"><?= $getData[2]['keterangan_waktu'] . ' Pukul ' . $getData[2]['mulai'] . ' s.d ' . $getData[2]['selesai'] ?></p>4
                                <div class="ustazah">

                                    <p class="lh-1"><?= $getData[2]['nama_kajian'] ?></p>

                                </div>

                            </div>

                            <div class="ahad2">
                                <h3><?= $getData[3]['nama_kajian'] ?></h3>

                                <p class="lh-1"><?= $getData[3]['keterangan_waktu'] . ' Pukul ' . $getData[3]['mulai'] . ' s.d ' . $getData[3]['selesai'] ?></p>4
                                <div class="ustazah">

                                    <p class="lh-1"><?= $getData[3]['nama_kajian'] ?></p>

                                </div>

                            </div>

                        </div>
                    </div>
                <?php else : ?>
                    <div class="swiper-slide">
                        <div class="background">
                            <img src="<?= base_url() ?>assets/background/bg_ramadhan2.jpg" class="d-block w-100" alt="...">
                        </div>

                        <!-- <div class="col-6 kotakthumb position-absolute top-50 end-0 translate-middle-y">
                            <img src="<?= base_url() ?>assets/foto_penceramah/<?= $getData[0]['foto'] ?>" class=" thumbnail rounded float-end me-auto" alt="...">
                        </div> -->

                        <div class="col-6 d-flex judulkegiatan judulkegiatan1 position-absolute top-50 start-0 translate-middle">

                            <div class="kegiatan1">

                                <h1><?= $key['hari'] ?></h1>

                                <h3>Belum ada jadwal pengajian</h3>

                            </div>

                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Kegiatan Asmaf Santunan Anak Yatim -->
            <div class="swiper-slide">
                <div class="background">
                    <img src="<?= base_url() ?>assets/img/bg_ramadhan.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="col-6 kotakthumb position-absolute top-50 end-0 translate-middle-y">

                    <swiper-container class="mySwiper ms-5" navigation="false" space-between="30" centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
                        <swiper-slide>
                            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/santunan/santunan.jpg" class=" thumbnail rounded float-end ms-5">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/santunan/santunan_2.jpg" class=" thumbnail rounded float-end ms-5 border border-5" style="border-color:#ff9e2c !important;">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/santunan/santunan_3.jpg" class=" thumbnail rounded float-end ms-5 border border-5" style="border-color:#ff9e2c !important;">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/santunan/santunan_4.jpg" class=" thumbnail rounded float-end ms-5 border border-5" style="border-color:#ff9e2c !important;">
                        </swiper-slide>
                    </swiper-container>

                </div>

                <div class="col-6 judulkegiatan position-absolute top-0 start-0">

                    <div class="kegiatan1">

                        <h3 class="lh-1"  style="color: #fff; font-family:'Poppins'">KEGIATAN ASMAF SANTUNAN ANAK YATIM</h3>

                        <h4 class="lh-1"  style="color: #fff; font-family:'Poppins'">Santunan kepada 130 Anak Yatim</h4>

                    </div>

                    <div class="kegiatanrutin2">

                        <span>Bank Syariah Indonesia</span>
                        <span class="d-block">An. Masjid	Al	Furqon</span>

                        <div class="norek">

                            <p>No Rekening : 2021202635</p>

                        </div>
                    </div>
                    <div class="qris">
                        <img src="<?= base_url() ?>assets/img/qris/Rek_Asmaf.jpg" class=" thumbnail rounded " style="width:250px !important; height: 250px !important;">
                    </div>

                </div>
            </div>
            <!-- Wakaf Pembagunan Area Parkir dan Kelas -->
            <div class="swiper-slide">
                <div class="background">

                    <img src="<?= base_url() ?>assets/img/bg_ramadhan2.jpg" class="d-block w-100" alt="...">

                </div>

                <div class="col-6 kotakthumb position-absolute top-50 end-0 translate-middle-y">

                    <swiper-container class="mySwiper ms-5" navigation="false" space-between="30" centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
                        <swiper-slide>
                            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/wakaf/wakaf_parkir.jpg" class=" thumbnail rounded float-end ms-5 border border-5" style="border-color:#ff9e2c !important;">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/wakaf/parkir_1.jpg" class=" thumbnail rounded float-end ms-5 border border-5" style="border-color:#ff9e2c !important;">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/wakaf/parkir_2.jpg" class=" thumbnail rounded float-end ms-5 border border-5" style="border-color:#ff9e2c !important;">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/wakaf/parkir_3.jpg" class=" thumbnail rounded float-end ms-5 border border-5" style="border-color:#ff9e2c !important;">
                        </swiper-slide>
                    </swiper-container>

                </div>

                <div class="col-6 judulkegiatan position-absolute top-0 start-0">
                    <div class="kegiatan1">

                        <h3  style="color: #fff; font-family:'Poppins';">WAKAF PEMBANGUNAN AREA PARKIR DAN KELAS</h3>

                        <h4 style="color: #fff; font-family:'Poppins';">Dana yang dibutuhkan untuk pembangunan area parkir motor dan kelas sebesar <strong>Rp 815 juta</strong>.

                        </h4>

                    </div>

                    <div class="kegiatanrutin2">

                        <span>Bank Syariah Indonesia</span>
                        <span class="d-block">An. Masjid	Al	Furqon</span>

                        <div class="norek">

                            <p>No Rekening : 2021202646</p>

                        </div>

                    </div>

                    <div class="qris">

                        <img src="<?= base_url() ?>assets/img/qris/Rek_Wakaf.jpg" class=" thumbnail rounded " style="width:250px !important; height: 250px !important;">

                    </div>
                </div>
            </div>

            <!-- Zakat -->
            <div class="swiper-slide">
                <div class="background">

                    <img src="<?= base_url() ?>assets/img/bg_ramadhan2.jpg" class="d-block w-100" alt="...">

                </div>

                <div class="col-6 kotakthumb position-absolute top-50 end-0 translate-middle-y">

                    <swiper-container class="mySwiper ms-5" navigation="false" space-between="30" centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
                        <swiper-slide>
                            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/zakat/zakat1.jpg" class=" thumbnail rounded float-end ms-5 border border-5" style="border-color:#ff9e2c !important;">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/zakat/zakat2.jpg" class=" thumbnail rounded float-end ms-5 border border-5" style="border-color:#ff9e2c !important;">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/zakat/zakat6.jpg" class=" thumbnail rounded float-end ms-5 border border-5" style="border-color:#ff9e2c !important;">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/zakat/zakat4.jpg" class=" thumbnail rounded float-end ms-5 border border-5" style="border-color:#ff9e2c !important;">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/zakat/zakat5.jpg" class=" thumbnail rounded float-end ms-5 border border-5" style="border-color:#ff9e2c !important;">
                        </swiper-slide>
                    </swiper-container>

                </div>

                <div class="col-6 judulkegiatan position-absolute top-0 start-0">
                    <div class="kegiatan1">

                        <h3  style="color: #fff; font-family:'Poppins';">Penyerahan	Zakat	1443	H</h3>

                        <!-- <h4 style="color: #fff; font-family:'Poppins';">Dana yang dibutuhkan untuk pembangunan area parkir motor dan kelas sebesar <strong>Rp 815 juta</strong>. -->

                        </h4>

                    </div>

                    <div class="kegiatanrutin2">

                        <span>Bank Syariah Indonesia</span>
                        <span class="d-block">An. Masjid	Al	Furqon</span>

                        <div class="norek">

                            <p>No Rekening : 2021202624</p>

                        </div>

                    </div>

                    <div class="qris">

                        <img src="<?= base_url() ?>assets/img/qris/Rek_ZIS.jpg" class=" thumbnail rounded " style="width:250px !important; height: 250px !important;">

                    </div>
                </div>
            </div>

            <!-- Infaq Sodaqoh -->
            <div class="swiper-slide">
                <div class="background">

                    <img src="<?= base_url() ?>assets/img/bg_ramadhan2.jpg" class="d-block w-100" alt="...">

                </div>

                <div class="col-6  kotakthumb2 position-absolute top-50 end-0 translate-middle-y">

                    <div class="qris ">

                        <img src="<?= base_url() ?>assets/img/qris/Rek_Operasional.jpg" class=" thumbnail rounded " style="width:350px !important; height: 350px !important;">

                    </div>

                </div>

                <div class="col-6 judulkegiatan kotakthumb position-absolute top-50 start-0 translate-middle-y ">
                    <div class="kegiatan1">

                        <!-- <h3  style="color: #fff; font-family:'Poppins';">Penyerahan	Zakat	1443	H</h3> -->

                        <h4 style="color: #fff; font-family:'Poppins Semibold';">
                        Masjid	Al	Furqon	menerima	infaq,	sodaqoh	untuk	operasional	kegiatan	sehari-hari.
                        Infaq	dan	Sodaqoh	bisa	di	kirim	ke	rekening	sbb	:
                        </h4>

                    </div>

                    <div class="kegiatanrutin2">

                        <span >Bank Syariah Indonesia</span>
                        <span class="d-block">An. Masjid	Al	Furqon</span>

                        <div class="norek">

                            <p style="font-size:28pt; font-family:'Poppins Semibold' !important;">No Rekening : 2021202613</p>

                        </div>

                    </div>

                    
                </div>
            </div>

            <!-- Donor Darah -->
            <!-- <div class="swiper-slide">
                <div class="background">

                    <img src="<?= base_url() ?>assets/img/bg_ramadhan.jpg" class="d-block w-100" alt="...">

                </div>

                <div class="position-absolute top-0 start-50 translate-middle-x mt-3 m-auto text-center">

                    <h3 style="color: #fff;">DONOR DARAH</h3>
                    <div class="d-flex">
                        <p class="ps-3">Hari/Tanggal : Ahad, 2 April 2023</p>
                        <p class="ps-3">Tempat : Masjid Al Furqon Pakuan Regency</p>
                    </div>
                </div>

                <swiper-container class="mySwiper ms-5 position-absolute top-50 start-50 translate-middle text-center" navigation="false" space-between="30" centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
                    <swiper-slide>
                        <div class="container-fluid ">
                            <div class="row text-center">
                                <div class="col-4">
                                    <img src="<?= base_url() ?>assets/img/kegiatanmasjid/donor_darah/donor_1.jpg" class=" thumbnail rounded border border-5" style="width: 350px !important; height: 350px !important; border-color:#ff9e2c !important;">
                                </div>
                                <div class="col-4">
                                    <img src="<?= base_url() ?>assets/img/kegiatanmasjid/donor_darah/donor_2.jpg" class=" thumbnail rounded border border-5" style="width: 350px !important; height: 350px !important; border-color:#ff9e2c !important;">
                                </div>
                                <div class="col-4">
                                    <img src="<?= base_url() ?>assets/img/kegiatanmasjid/donor_darah/donor_3.jpg" class=" thumbnail rounded border border-5" style="width: 350px !important; height: 350px !important; border-color:#ff9e2c !important;">
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="container-fluid ">
                            <div class="row text-center">
                                <div class="col-4">
                                    <img src="<?= base_url() ?>assets/img/kegiatanmasjid/donor_darah/donor_4.jpg" class=" thumbnail rounded border border-5" style="width: 350px !important; height: 350px !important; border-color:#ff9e2c !important;">
                                </div>
                                <div class="col-4">
                                    <img src="<?= base_url() ?>assets/img/kegiatanmasjid/donor_darah/donor_3.jpg" class=" thumbnail rounded border border-5" style="width: 350px !important; height: 350px !important; border-color:#ff9e2c !important;">
                                </div>
                                <div class="col-4">
                                    <img src="<?= base_url() ?>assets/img/kegiatanmasjid/donor_darah/donor_2.jpg" class=" thumbnail rounded border border-5" style="width: 350px !important; height: 350px !important; border-color:#ff9e2c !important;">
                                </div>
                            </div>
                        </div>
                    </swiper-slide>

                </swiper-container>
            </div> -->
            <!-- Jadwal Sholat -->

            <div class="swiper-slide">
                <div class="background">

                    <img src="<?= base_url() ?>assets/img/bg_ramadhan2.jpg" class="d-block w-100" alt="...">

                </div>

                <div class="container position-absolute top-0 start-50 translate-middle-x mt-5 m-auto text-center">

                    <h1 style="color: #fff; font-family:'Poppins Semibold'" class="mt-5 mb-3">Jadwal Shalat</h1>

                    <h5 style="color: #fff; font-family:'Poppins Semibold' !important; font-size: 16pt !important;">Hari/Tanggal : <?= $tanggal ?></h5>
                    <h5 class="ps-3" style="color: #fff; font-family:'Poppins Semibold' !important; font-size: 18pt !important;">Lokasi : Masjid Al Furqon Pakuan Regency</h5>

                    <div class="container mt-5">
                        <div class="row text-center">
                            <div class="col-12">
                                <table class="table" style="color: white !important; font-family:'Poppins Semibold' !important; font-size: 20pt !important;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Subuh</th>
                                            <th scope="col">Dzuhur</th>
                                            <th scope="col">Ashar</th>
                                            <th scope="col">Magrib</th>
                                            <th scope="col">Isya</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td scope="row"><?= $sholat['subuh'] ?></td>
                                            <td><?= $sholat['dzuhur'] ?></td>
                                            <td><?= $sholat['ashar'] ?></td>
                                            <td><?= $sholat['maghrib'] ?></td>
                                            <td><?= $sholat['isya'] ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="areamarq position-absolute top-100 start-50 translate-middle">
            <marquee direction="left" style="margin-left:10vw !important">REKENING AL FURQON: <?php foreach ($rekening as $key) {echo $key['nama_bank'] . ' no.rek ' . $key['no_rek'] . ' ' . $key['keterangan'] . ' | ';
            } ?> </marquee>
        </div>
        <div class="position-absolute bottom-0 start-0" style="margin-left:8vw !important; z-index: 9999 !important;">
            <img src="<?= base_url() ?>assets/img/kegiatanmasjid/rounded_logo.png" class="mb-2" alt="" width="100">
        </div>
        <!-- If we need pagination -->
        <!-- <div class="swiper-pagination"></div> -->

        <!-- If we need navigation buttons -->
        <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->

        <!-- If we need scrollbar -->
        <!-- <div class="swiper-scrollbar"></div> -->
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            // direction: 'vertical',
            autoplay: {
                delay: 20000,
                disableOnInteraction: false,
            },
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },


        });
    </script>

    <!-- Initialize Swiper -->
    <script>
        const progressCircle = document.querySelector(".autoplay-progress svg");
        const progressContent = document.querySelector(".autoplay-progress span");

        const swiperEl = document.querySelector("swiper-container");
        swiperEl.addEventListener("autoplaytimeleft", (e) => {
            const [swiper, time, progress] = e.detail;
            progressCircle.style.setProperty("--progress", 1 - progress);
            progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        });
    </script>

</body>

</html>