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
        <table class="table table-bordered" id="tableKegiatan">
                <thead>
                    <tr class="table-primary">
                        <th scope="col" class="table-primary">No</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Deskripsi Kegiatan</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Rekening</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $key) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $key['judul'] ?></td>
                            <td><?= $key['deskripsi'] ?></td>
                            <td><img src="<?= base_url('assets/kegiatan_rutin/') ?><?= $key['foto'] ?>" alt="foto" width="100px"></td>
                            <td><?= $key['nama_bank'] ?></td>
                            <td>
                                <a href="<?= base_url('Manajemenkegiatan/hapus/') ?><?= $key['id_kegiatan'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</a>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['id_kegiatan'] ?>" type="button">Edit</button>
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
        <div class="modal fade" id="editModal<?= $key['id_kegiatan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data kegiatan rutin</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Manajemenkegiatan/edit/') ?><?= $key['id_kegiatan'] ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="<?= $key['judul'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi Kegiatan</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $key['deskripsi'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="id_rekening" class="form-label">Rekening</label>
                                    <select class="form-select form-control" aria-label="" name="id_rekening" id="id_rekening">
                                    <?php
                                    $getRekening = $this->db->get('tbl_rekening')->result_array();

                                    foreach ($getRekening as $rk) :  
                                        if ($key['id_rekening'] == $rk['id_rekening']) {
                                            $select="selected";
                                           }else{
                                            $select="";
                                           }

                                           echo "<option value=".$rk['id_rekening']." $select>".$rk['nama_bank']."</option>";
                                    endforeach ?>
                                    </select>
                            </div>
                            <img src="<?= base_url('assets/kegiatan_rutin/') ?><?= $key['foto'] ?>" alt="foto" width="100px">
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

    <!-- END MODAL EDIT -->

    <!-- MODAL TAMBAH -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data kegiatan rutin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="judul" name="judul">
                        </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi Kegiatan</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                                </div>
                            </div>
                        <div class="mb-3">

                            <?php
                                $rekening = $this->db->get('tbl_rekening')->result_array();
                            ?>

                            <label for="id_rekening" class="form-label">Rekening</label>
                            <select class="form-select form-control" aria-label="" name="id_rekening">
                                    <option selected disabled value="0">Pilih Rekening</option>
                                    <?php
                                    foreach ($rekening as $data) :  ?>
                                        <option value="<?= $data['id_rekening']; ?>"><?= $data['nama_bank']; ?></option>
                                    <?php endforeach ?>
                                </select>
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
    <!-- end modal tambah -->


    <script type="text/javascript">
         $(document).ready(function(){
             $('#tableKegiatan').DataTable();
         });
    </script>