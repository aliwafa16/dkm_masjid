<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        <?= $title ?>
                    </h2>
                    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah data</button>
                </div>
            </div>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                    <?= validation_errors() ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <?= $this->session->flashdata('msg') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <?php foreach ($hari as $key) : ?>

                    <?php

                    $this->db->select('*');
                    $this->db->from('tbl_daily');
                    $this->db->join('tbl_hari', 'tbl_hari.id_hari = tbl_daily.id_hari', 'left');
                    $this->db->join('tbl_penceramah', 'tbl_penceramah.id_penceramah = tbl_daily.id_penceramah', 'left');
                    $this->db->join('tbl_kajian', 'tbl_kajian.id_kajian = tbl_daily.id_kajian', 'left');
                    $this->db->order_by('tbl_hari.id_hari', 'ASC');
                    $this->db->where('tbl_hari.id_hari', $key['id_hari']);
                    $getData = $this->db->get()->result_array();

                    ?>

                    <div class="col-md-4 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $key['hari'] ?></h5>
                                <ul class="list-group">
                                    <?php if (count($getData) > 0) :  ?>
                                        <?php foreach ($getData as $keyy) : ?>
                                            <a href="<?= base_url('Dashboard/hapus/') ?><?= $keyy['id_daily'] ?>" onclick="return confirm('Yakin ingi menghapus data  ?')" class="list-group-item list-group-item-action active mt-2" aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1"><?= $keyy['nama_kajian'] ?></h5>
                                                    <small><?= $keyy['mulai'] . ' s.d ' . $keyy['selesai'] ?></small>
                                                </div>
                                                <p class="mb-1"><?= $keyy['nama_penceramah'] ?></p>
                                            </a>

                                            </li>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <center>
                                            <p>Data jadwal pengajian belum tersedia</p>
                                        </center>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data kajian</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_kajian" class="form-label">Hari</label>
                            <select class="form-select" aria-label="Default select example" name="id_hari">
                                <?php foreach ($hari as $key) : ?>
                                    <option value="<?= $key['id_hari'] ?>"><?= $key['hari'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_kajian" class="form-label">Nama Kajian</label>
                            <select class="form-select" aria-label="Default select example" name="id_kajian">
                                <?php foreach ($kajian as $key) : ?>
                                    <option value="<?= $key['id_kajian'] ?>"><?= $key['nama_kajian'] ?> (<?= $key['mulai'] . '-' . $key['selesai'] ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_kajian" class="form-label">Penceramah</label>
                            <select class="form-select" aria-label="Default select example" name="id_penceramah">
                                <?php foreach ($penceramah as $key) : ?>
                                    <option value="<?= $key['id_penceramah'] ?>"><?= $key['nama_penceramah'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_kajian" class="form-label">Background</label>
                            <?php foreach ($background as $key) : ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="flexRadioDefault1" value="<?= $key['id_background'] ?>" name="background[]">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <img src="<?= base_url('assets/background/') ?><?= $key['background'] ?>" alt="image_background" width="100px">
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>