<?= $this->extend('layouts/AdminLayout'); ?>

<?= $this->section('content'); ?>
<div class="page-content">
    <section class="row">

        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Diterima</h6>
                                    <h6 class="font-extrabold mb-0"><?= $diterima; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Pending</h6>
                                    <h6 class="font-extrabold mb-0"><?= $pending; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Akun</h6>
                                    <h6 class="font-extrabold mb-0"><?= count($akun); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Formulir</h6>
                                    <h6 class="font-extrabold mb-0"><?= count($formulir); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                Daftar Formulir
                            </h5>
                        </div>
                        <div class="card-body">
                            <table class="table table" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Asal Sekolah</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($formulir) > 0) : ?>
                                    <?php foreach ($formulir as $form) : ?>
                                    <tr>
                                        <td><?= $form['siswa_nama']; ?></td>
                                        <td><?= $form['siswa_asal_sekolah']; ?></td>
                                        <td>
                                            <?php
                                                $badge = [];
                                                switch ($form['siswa_status_form']) {
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
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="./assets/compiled/jpg/1.jpg" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?= $admin['admin_name']; ?></h5>
                            <h6 class="text-muted mb-0">
                                <?php
                                $uid = explode('@', $admin['admin_email']);
                                echo '@' . $uid[0];
                                ?>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Pendaftar Terbaru</h4>
                </div>
                <div class="card-content pb-4">
                    <?php
                    $limitLoop = 3;
                    if (count($akun) < 3) {
                        $limitLoop = count($akun);
                    }
                    ?>

                    <?php for ($i = 0; $i < $limitLoop; $i++) : ?>

                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="<?= base_url('img/bangkusekolah3d.png'); ?>">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1"><?= $akun[$i]['user_name']; ?></h5>
                                <h6 class="text-muted mb-0">
                                    <?php
                                    $uid = explode('@', $akun[$i]['user_email']);
                                    echo '@' . $uid[0];
                                    ?>
                                </h6>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

        </div>

    </section>
</div>

<script src="<?= base_url('assets/extensions/simple-datatables/umd/simple-datatables.js'); ?>"></script>
<script src="<?= base_url('assets/static/js/pages/simple-datatables.js'); ?>"></script>

<?= $this->endSection(); ?>