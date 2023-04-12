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
            <table class="table table-bordered" id="tableKajian">
                <thead>
                    <tr class="table-primary">
                        <th scope="col" class="table-primary">No</th>
                        <th scope="col">Nama Kajian</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $key) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $key['nama_kajian'] ?></td>
                            <td><?= $key['mulai'] ?> - <?= $key['selesai'] ?></td>
                            <td><?= $key['keterangan_waktu'] ?></td>
                            <td>
                                <a href="<?= base_url('Kajian/hapus/') ?><?= $key['id_kajian'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</a>
                                <!-- <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['id_kajian'] ?>" type="button">Edit</button> -->
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>



    <?php foreach ($data as $key) : ?>
        <div class="modal fade" id="editModal<?= $key['id_kajian'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data kajian</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Kajian/edit/') ?><?= $key['id_kajian'] ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama_kajian" class="form-label">Nama kajian</label>
                                <!-- <input type="text" class="form-control" id="nama_kajian" name="nama_kajian" value="<?= $key['nama_kajian'] ?>"> -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="mulai" class="form-label">Waktu mulai</label>
                                        <input type="time" class="form-control" id="mulai" name="mulai"><?= $key['mulai'] ?></input>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="selesai" class="form-label">Waktu selesai</label>
                                        <input type="time" class="form-control" id="selesai" name="selesai"><?= $key['selesai'] ?></input>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan_waktu" class="form-label">Keterangan waktu</label>
                                <input type="text" class="form-control" id="keterangan_waktu" name="keterangan_waktu" value="<?= $key['keterangan_waktu'] ?>">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


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
                            <label for="nama_kajian" class="form-label">Nama Kajian</label>
                            <textarea name="nama_kajian" id="nama_kajian" class="form-control" rows="12" cols="50"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mulai" class="form-label">Waktu mulai</label>
                                    <input type="time" class="form-control" id="mulai" name="mulai">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="selesai" class="form-label">Waktu selesai</label>
                                    <input type="time" class="form-control" id="selesai" name="selesai">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_waktu" class="form-label">Keterangan waktu</label>
                            <input type="text" class="form-control" id="keterangan_waktu" name="keterangan_waktu">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            CKEDITOR.replace('nama_kajian');
        };
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tableKajian').DataTable();
        });
    </script>