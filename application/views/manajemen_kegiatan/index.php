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
                        <th scope="col">Rekening</th>
                        <th scope="col">Qris</th>
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
                            
                            
                            <?php $get = $this->db->query("SELECT * FROM tbl_rekening as r JOIN tbl_kegiatan as k ON k.id_rekening = r.id_rekening JOIN tbl_qris as q ON q.id_qris = k.id_qris WHERE r.id_rekening = '$key[id_rekening]' AND q.id_qris='$key[id_qris]'")->row_array();?>

                            <?php if($key['id_rekening'] != null || $key['id_qris'] != null) : ?>
                                <td><?= $get['nama_bank']?> - <?=$get['no_rek']?></td>
                                <td><img src="<?= base_url('assets/qris/') ?><?= $get['foto_qris'] ?>" alt="foto" width="100px"></td>
                            <?php else:?>
                                <td></td>
                                <td></td>
                            <?php endif;?>
                            

                             <!-- <?php foreach($get as $rq):?>
                               
                            <?php endforeach;?> -->
                           
                            <td><a href="<?= base_url('Manajemenkegiatan/hapus/') ?><?= $key['id_kegiatan'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</a></td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


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
                                    <option selected disabled value="0" readonly>Pilih Rekening</option>
                                    <?php
                                    foreach ($rekening as $data) :  ?>
                                        <option value="<?= $data['id_rekening']; ?>"><?= $data['nama_bank'];?> - <?= $data['no_rek']?></option>
                                    <?php endforeach ?>
                                </select>
                        </div>

                        <div class="mb-3">

                            <?php
                                $getQris = $this->db->get('tbl_qris')->result_array();
                            ?>

                            <label for="foto" class="form-label">Foto Kegiatan</label>

                            <label for="id_qris">
                                <div class="row">
                                <?php foreach($getQris as $gk) : ?>
                                        <div class="col-md-6" style="margin-bottom: 15px; width:200px;">
                                            <input type="radio" id="id_qris" name="id_qris" value="<?= $gk['id_qris']?>" />
                                            <img src="<?= base_url('assets/qris/')?><?= $gk['foto_qris']?>">
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
    <!-- end modal tambah -->


    <script type="text/javascript">
         $(document).ready(function(){
             $('#tableKegiatan').DataTable();
         });
    </script>