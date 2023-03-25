<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        <?= $title ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th scope="col" class="table-primary">No</th>
                        <th scope="col">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $key) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $key['hari'] ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>