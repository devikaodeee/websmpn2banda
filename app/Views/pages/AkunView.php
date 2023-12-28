<?= $this->extend('layouts/BlankLayout'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?= base_url('assets/extensions/toastify-js/src/toastify.css'); ?>">

<section class="section">
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <div class="avatar avatar-2xl">
                            <img src="<?= base_url('img/bangkusekolah3d.png'); ?>" alt="Avatar">
                        </div>

                        <h3 class="mt-3 mb-1" id="nama-siswa"><?= $data['user_name']; ?></h3>
                        <p class="text-small">Siswa</p>
                        <a href="<?= base_url('auth/logout'); ?>" id="btn-logout" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="#" id="form-profile" method="get">
                        <input type="hidden" name="user_id" value="<?= $data['user_id']; ?>">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="user_name" id="user-name" class="form-control" value="<?= $data['user_name']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="user_email" id="user-email" class="form-control" value="<?= $data['user_email']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Password</label>
                            <input type="password" name="user_password" id="user-password" class="form-control" value="<?= $data['user_password']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <button type="submit" id="btn-edit" class="btn btn-primary">Edit</button>
                                <div class="ms-auto">
                                    <button type="reset" id="btn-cancel" class="btn btn-light d-none">Cancel</button>
                                    <button type="submit" id="btn-simpan" class="btn btn-success d-none">Simpan</button>
                                </div>
                            </div>
                        </div </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?= base_url('assets/extensions/toastify-js/src/toastify.js'); ?>"></script>

<script>
    const formProfile = document.getElementById('form-profile');
    const formInputs = formProfile.querySelectorAll('input');
    const btnEdit = document.getElementById('btn-edit');
    const btnCancel = document.getElementById('btn-cancel');
    const btnSimpan = document.getElementById('btn-simpan');

    // console.log(formInputs);

    formProfile.addEventListener('submit', function(e) {
        e.preventDefault();
    });

    btnEdit.addEventListener('click', function() {

        btnEdit.classList.add('d-none');
        btnCancel.classList.remove('d-none');
        btnSimpan.classList.remove('d-none');

        formInputs.forEach(function(i) {
            i.removeAttribute('disabled');
        });
    });

    btnCancel.addEventListener('click', function() {

        formInputs.forEach(function(i) {
            i.setAttribute('disabled', '');
        });

        btnEdit.classList.remove('d-none');
        btnCancel.classList.add('d-none');
        btnSimpan.classList.add('d-none');
    });

    btnSimpan.addEventListener('click', function() {

        const dataProfile = new FormData(document.getElementById('form-profile'));

        $.ajax({
            url: "<?= base_url('api/akun/save'); ?>",
            method: "POST",
            cache: false,
            processData: false,
            contentType: false,
            data: dataProfile,
            success: function(res) {

                console.log(res);

                if (res.code == 200) {
                    $('#nama-siswa').html(dataProfile.get('user_name'));
                    Toastify({
                        text: "Berhasil ubah data",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#4fbe87",
                    }).showToast();
                    btnEdit.classList.remove('d-none');
                    btnCancel.classList.add('d-none');
                    btnSimpan.classList.add('d-none');
                    formInputs.forEach(function(i) {
                        i.setAttribute('disabled', '');
                    });
                }
            },
            error: function() {
                Toastify({
                    text: "Kesalahan server",
                    duration: 3000,
                    close: true,
                    backgroundColor: "red",
                }).showToast();
                btnEdit.classList.remove('d-none');
                btnCancel.classList.add('d-none');
                btnSimpan.classList.add('d-none');
                formInputs.forEach(function(i) {
                    i.setAttribute('disabled', '');
                });
            }
        });
    });
</script>

<?= $this->endSection(); ?>