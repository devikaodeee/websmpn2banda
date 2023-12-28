<?= $this->extend('layouts/AdminLayout'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                Daftar Formulir
                            </h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover" id="table1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_siswa as $i => $data) : ?>
                                    <tr>
                                        <td><?= ++$i; ?></td>
                                        <td><?= $data['siswa_nisn']; ?></td>
                                        <td><?= $data['siswa_nama']; ?></td>
                                        <td>
                                            <?php
                                                $badge = [];
                                                switch ($data['siswa_status_form']) {
                                                    case 700:
                                                        $badge['status'] = 'Baru';
                                                        $badge['color'] = 'light';
                                                    break;
                                                    case 200:
                                                        $badge['status'] = 'Diterima';
                                                        $badge['color'] = 'success';
                                                    break;
                                                        case 500:
                                                        $badge['status'] = 'Pending';
                                                        $badge['color'] = 'danger';
                                                    break;
                                                }
                                            ?>
                                            <span class="badge bg-<?= $badge['color']; ?>">
                                                <?= $badge['status']; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/formulir/' . $data['siswa_id']); ?>" class="badge bg-light"
                                                title="Lihat">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <!-- <a href="#" class="badge bg-light" title="Edit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a> -->
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url('assets/extensions/simple-datatables/umd/simple-datatables.js'); ?>"></script>
<script src="<?= base_url('assets/static/js/pages/simple-datatables.js'); ?>"></script>

<?= $this->endSection(); ?>