<?= $this->extend('layouts/BlankLayout'); ?>

<?= $this->section('content'); ?>
<div class="page-content">
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-content">
                <img class="card-img img-fluid" src="<?= base_url('res/img/4.jpeg'); ?>" alt="Card image cap" style="height: 20rem; object-fit: cover;">
                <div class="card-body">
                    <h4 class="card-title">SMP Negeri 2 Banda</h4>
                    <p class="card-text">
                        Selamat datang siswa baru!
                    </p>
                    <!-- <a href="#" class="card-link"><small>142 formulir terdaftar</small></a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>