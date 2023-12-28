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
                                Daftar Pengguna
                            </h5>
                        </div>
                        <div class="card-body">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $i => $user) : ?>
                                    <tr>
                                        <td><?= ++$i; ?></td>
                                        <td><?= $user['user_name']; ?></td>
                                        <td><?= $user['user_email']; ?></td>
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