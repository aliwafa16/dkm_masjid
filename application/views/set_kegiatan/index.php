<style>
img {
  width: 200px;
  height: 200px;
}
</style>

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
            <table class="table table-bordered" id="tableSK">
                <thead>
                    <tr class="table-primary">
                        <th scope="col" class="table-primary">No</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Foto Kegiatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $key) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $key['judul'] ?></td>
                            <td><img src="<?= base_url('assets/foto_kegiatan/') ?><?= $key['foto_kegiatan'] ?>" alt="foto" width="100px"></td>
                            <td>
                                <a href="<?= base_url('Setkegiatan/hapus/') ?><?= $key['id_setkegiatan'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah kegiatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                        <?php
                                $getKegiatanRutin = $this->db->get('tbl_kegiatan')->result_array();
                            ?>

                            <label for="id_kegiatan" class="form-label">Nama Kegiatan</label>
                            <select class="form-select form-control" aria-label="" name="id_kegiatan">
                                    <option selected disabled value="0" readonly>Pilih Kegiatan</option>
                                    <?php
                                    foreach ($getKegiatanRutin as $kg) :  ?>
                                        <option value="<?= $kg['id_kegiatan']; ?>"><?= $kg['judul']; ?></option>
                                    <?php endforeach ?>
                                </select>
                        </div>
                        <div class="mb-3">

                            <?php
                                $getGambarKegiatan = $this->db->get('tbl_foto_kegiatan')->result_array();
                            ?>

                            <label for="foto" class="form-label">Foto Kegiatan</label>

                            <label for="id_fotokegiatan">
                                <div class="row">
                                <?php foreach($getGambarKegiatan as $gk) : ?>
                                        <div class="col-md-6">
                                            <input type="checkbox" id="id_fotokegiatan" name="id_fotokegiatan[]" value="<?= $gk['id_fotokegiatan']?>" />
                                            <img src="<?= base_url('assets/foto_kegiatan/')?><?= $gk['foto_kegiatan']?>">
                                        </div>
                                        <?php endforeach?>
                                    </div>
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
             $('#tableSK').DataTable();
         });
    </script>