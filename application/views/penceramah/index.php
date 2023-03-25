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
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th scope="col" class="table-primary">No</th>
                        <th scope="col">Nama Penceramah</th>
                        <th scope="col">No telp</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $key) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $key['nama_penceramah'] ?></td>
                            <td><?= $key['no_telp'] ?></td>
                            <td><?= $key['alamat'] ?></td>
                            <td><img src="<?= base_url('assets/foto_penceramah/') ?><?= $key['foto'] ?>" alt="foto" width="100px"></td>
                            <td>
                                <a href="<?= base_url('Penceramah/hapus/') ?><?= $key['id_penceramah'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</a>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['id_penceramah'] ?>" type="button">Edit</button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php foreach ($data as $key) : ?>
        <div class="modal fade" id="editModal<?= $key['id_penceramah'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data penceramah</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Penceramah/edit/') ?><?= $key['id_penceramah'] ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama_penceramah" class="form-label">Nama Penceramah</label>
                                <input type="text" class="form-control" id="nama_penceramah" name="nama_penceramah" value="<?= $key['nama_penceramah'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $key['alamat'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="no_telp" class="form-label">Nomor Telp</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $key['no_telp'] ?>">
                            </div>
                            <img src="<?= base_url('assets/foto_penceramah/') ?><?= $key['foto'] ?>" alt="foto" width="100px">
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input class="form-control" type="file" id="foto" name="foto">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data penceramah</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_penceramah" class="form-label">Nama Penceramah</label>
                            <input type="text" class="form-control" id="nama_penceramah" name="nama_penceramah">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">Nomor Telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp">
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="foto" name="foto">
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