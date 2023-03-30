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
        <table class="table table-bordered" id="tableRekening">
                <thead>
                    <tr class="table-primary">
                        <th scope="col" class="table-primary">No</th>
                        <th scope="col">Nama Bank</th>
                        <th scope="col">Nomor Rekening</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $key) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $key['nama_bank'] ?></td>
                            <td><?= $key['no_rek'] ?></td>
                            <td><?= $key['keterangan'] ?></td>
                            <td>
                                <a href="<?= base_url('Rekening/hapus/') ?><?= $key['id_rekening'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</a>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['id_rekening'] ?>" type="button">Edit</button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- MOAL EDIT -->
    <?php foreach ($data as $key) : ?>
        <div class="modal fade" id="editModal<?= $key['id_rekening'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data rekening</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Rekening/edit/') ?><?= $key['id_rekening'] ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama_bank" class="form-label">Nama Bank</label>
                                <input type="text" class="form-control" id="nama_bank" name="nama_bank" value="<?= $key['nama_bank'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="no_rek" class="form-label">Nomor Rekening</label>
                                <input type="text" class="form-control" id="no_rek" name="no_rek" value="<?= $key['no_rek'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $key['keterangan'] ?>">
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

    <!-- END MODAL EDIT -->

    <!-- MODAL TAMBAH -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data rekening</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_bank" class="form-label">Nama Bank</label>
                            <input type="text" class="form-control" id="nama_bank" name="nama_bank">
                        </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="no_rek" class="form-label">Nomor Rekening</label>
                                    <input type="text" class="form-control" id="no_rek" name="no_rek">
                                </div>
                            </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
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
             $('#tableRekening').DataTable();
         });
    </script>