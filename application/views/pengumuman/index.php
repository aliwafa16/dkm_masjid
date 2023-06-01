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
            <table class="table table-bordered" id="tblPengumuman">
                <thead>
                    <tr class="table-primary">
                        <th scope="col" class="table-primary">No</th>
                        <th scope="col">Pegumuman</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $key) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $key['text'] ?></td>
                            <td><?= $key['status'] ?></td>
                            <td>
                                <a href="<?= base_url('Pengumuman/hapus/') ?><?= $key['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</a>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['id'] ?>" type="button">Edit</button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php foreach ($data as $key) : ?>
        <div class="modal fade" id="editModal<?= $key['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Pengumuman/edit/') ?><?= $key['id'] ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="text" class="form-label">Deskripsi Pengumuman</label>
                                <input type="text" class="form-control" id="text" name="text" value="<?= $key['text'] ?>">
                            </div>
                            <?php if($key['status'] == 'Aktif'){?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status1" value="Aktif" checked>
                                    <label class="form-check-label" for="status1">
                                        Aktif
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status2" value="Tidak Aktif">
                                    <label class="form-check-label" for="status2">
                                        Tidak Aktif
                                    </label>
                                </div>
                            <?php }elseif($key['status'] == 'Tidak Aktif'){?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status1" value="Aktif">
                                    <label class="form-check-label" for="status1">
                                        Aktif
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status2" value="Tidak Aktif" checked>
                                    <label class="form-check-label" for="status2">
                                        Tidak Aktif
                                    </label>
                                </div>
                            <?php }?>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="text" class="form-label">Deskripsi Pengumuman</label>
                            <input type="text" class="form-control" id="text" name="text">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status1" value="Aktif" checked>
                            <label class="form-check-label" for="status1">
                                Aktif
                            </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status2" value="Tidak Aktif">
                        <label class="form-check-label" for="status2">
                            Tidak Aktif
                        </label>
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

    <script type="text/javascript">
         $(document).ready(function(){
             $('#tblPengumuman').DataTable();
         });
    </script>