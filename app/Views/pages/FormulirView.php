<?= $this->extend('layouts/BlankLayout'); ?>
<?= $this->section('content'); ?>

<?php

$alert = [];
$alert['icon'] = 'info-circle';
$alert['warna'] = 'light';
$alert['pesan'] = 'Isi data dengan teliti agar terhindar dari kesalahan. Setelah submit, data tidak bisa diubah.';

switch ($data_siswa['siswa_status_form']) {
    case 700:
        $alert['pesan'] = 'Formulir sedang dalam proses pengecekan..';
        $alert['warna'] = 'info';
        $alert['icon'] = 'clock';
        break;

    case 500:
        $alert['pesan'] = 'Formulir dipending. Periksa & perbaiki data sebelum submit kembali.';
        $alert['warna'] = 'danger';
        $alert['icon'] = 'exclamation-circle';
        break;

    case 200:
        $alert['pesan'] = 'Selamat! Data diterima. Silahkan kunjungi sekolah untuk informasi selanjutnya.';
        $alert['warna'] = 'success';
        $alert['icon'] = 'check-circle';
        break;

    default:
        # code...
        break;
}

?>

<link rel="stylesheet" href="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/extensions/toastify-js/src/toastify.css'); ?>">

<div class="page-content">

    <div class="alert alert-<?= $alert['warna']; ?>">
        <i class="bi bi-<?= $alert['icon']; ?>"> </i>
        <span>
            <?= $alert['pesan']; ?>
        </span>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title mb-0">Formulir Pendaftaran</h4>
                <div class="ms-auto">
                    <?php if ($data_siswa['siswa_status_form'] != 700 && $data_siswa['siswa_status_form'] != 200) : ?>
                        <button class="btn btn-light" id="btn-edit">
                            <i class="bi bi-pencil"></i>
                            <span>Edit</span>
                        </button>
                        <button class="btn btn-success d-none" id="btn-save">
                            <i class="bi bi-save"></i>
                            <span>Simpan</span>
                        </button>
                        <button id="btn-submit" class="btn btn-primary ms-4">
                            <i class="bi bi-send"></i>
                            <span>Submit</span>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form id="form-siswa">
                <input type="text" class="d-none" name="siswa_id" value="<?= $data_siswa['siswa_id']; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="disabledInput" class="mb-2 text-muted">ID</label>
                            <input type="text" name="siswa_nisn" class="form-control fw-bold" id="disabledInput" disabled value="<?= $data_siswa['siswa_id']; ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label for="disabledInput" class="mb-2 text-muted">NISN</label>
                            <input type="text" name="siswa_nisn" class="form-control fw-bold" id="disabledInput" readonly="readonly" value="<?= $data_siswa['siswa_nisn']; ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label for="disabledInput" class="mb-2 text-muted">Tempat Lahir</label>
                            <input type="text" name="siswa_tempat_lahir" class="form-control fw-bold" id="disabledInput" readonly="readonly" value="<?= $data_siswa['siswa_tempat_lahir']; ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label for="disabledInput" class="mb-2 text-muted">Nama Orang Tua</label>
                            <input type="text" name="siswa_nama_orang_tua" class="form-control fw-bold" id="disabledInput" readonly="readonly" value="<?= $data_siswa['siswa_nama_orang_tua']; ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label for="disabledInput" class="mb-2 text-muted">No. HP</label>
                            <input type="text" name="siswa_no_hp" class="form-control fw-bold" id="disabledInput" readonly="readonly" value="<?= $data_siswa['siswa_no_hp']; ?>" />
                        </div>

            </form>

        </div>
        <div class="col-md-6">
            <div class="form-group mb-4">
                <label for="disabledInput" class="mb-2 text-muted">Nama</label>
                <input type="text" name="siswa_nama" class="form-control fw-bold" id="disabledInput" readonly="readonly" value="<?= $data_siswa['siswa_nama']; ?>" />
            </div>
            <div class="form-group mb-4">
                <label for="disabledInput" class="mb-2 text-muted">Asal Sekolah</label>
                <input type="text" name="siswa_asal_sekolah" class="form-control fw-bold" id="disabledInput" readonly="readonly" value="<?= $data_siswa['siswa_asal_sekolah']; ?>" />
            </div>
            <div class="form-group mb-4">
                <label for="disabledInput" class="mb-2 text-muted">Tanggal Lahir</label>
                <input type="text" name="siswa_tanggal_lahir" class="form-control fw-bold" id="disabledInput" readonly="readonly" value="<?= $data_siswa['siswa_tanggal_lahir']; ?>" />
            </div>
            <div class="form-group mb-4">
                <label for="disabledInput" class="mb-2 text-muted">Alamat</label>
                <input type="text" name="siswa_alamat" class="form-control fw-bold" id="disabledInput" readonly="readonly" value="<?= $data_siswa['siswa_alamat']; ?>" />
            </div>

            <div class="form-group mb-4">
                <label for="disabledInput" class="mb-2 text-muted">Agama</label>
                <input type="text" name="siswa_agama" class="form-control fw-bold" id="disabledInput" readonly="readonly" value="<?= $data_siswa['siswa_agama']; ?>" />
            </div>

        </div>
    </div>
    </form>
</div>
</div>
</div>

<script src="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.js'); ?>"></script>
<script src="<?= base_url('assets/extensions/toastify-js/src/toastify.js'); ?>"></script>


<script>
    document.getElementById('form-siswa').addEventListener('submit', function(e) {
        e.preventDefault();
    });

    const Swal2 = Swal.mixin({
        customClass: {
            input: 'form-control'
        }
    })

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
</script>

<script>
    const BtnEdit = document.getElementById('btn-edit');
    const BtnSave = document.getElementById('btn-save');
    const BtnSubmit = document.getElementById('btn-submit');
    const FormSiswa = document.getElementById('form-siswa');
    const FormInputs = FormSiswa.querySelectorAll('input');

    console.log(FormInputs);

    BtnEdit.addEventListener('click', function() {
        FormInputs.forEach(function(i) {
            BtnSave.classList.remove('d-none');
            BtnSubmit.setAttribute('disabled', '');
            i.removeAttribute('readonly');
        });
    });

    $(document).ready(function() {

        $('#btn-save').click(function() {
            saveForm();
        });

        $('#btn-submit').click(function() {
            // submitForm(1);
            Swal.fire({
                title: "Yakin?",
                text: "Pastikan data sudah sesuai dan tidak ada kesalahan karena tidak dapat diubah",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: 'Ya'
            }).then(function(result) {
                if (result.isConfirmed) {
                    // console.log("y");
                    submitForm();
                }
            });
        });

    });

    function submitForm() {
        $.ajax({
            url: "<?= base_url('api/formulir/submit'); ?>",
            method: "POST",
            data: {
                siswa_id: <?= session()->get('x-psb-user'); ?>,
                siswa_status_form: 700
            },
            success: function(res) {
                if (res.code == 200) {
                    Toastify({
                        text: "Berhasil submit formulir",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#4fbe87",
                    }).showToast();
                    $('#btn-edit').remove();
                    $('#btn-save').remove();
                    $('#btn-submit').remove();
                }
            },
            error: function(res) {
                console.log(res);
            }
        });
    }

    function saveForm() {
        const Formulir = new FormData(document.getElementById('form-siswa'));
        Formulir.append('siswa_status_form', 300);
        $.ajax({
            url: "<?= base_url('api/formulir/add'); ?>",
            method: "POST",
            data: Formulir,
            processData: false,
            contentType: false,
            cache: false,
            success: function(res) {
                if (res.code == 200) {
                    Toastify({
                        text: "Berhasil simpan formulir",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#4fbe87",
                    }).showToast();
                    FormInputs.forEach(function(i) {
                        BtnSave.classList.add('d-none');
                        BtnSubmit.removeAttribute('disabled');
                        i.setAttribute('readonly', '');
                    });
                }
            },
            error: function(res) {
                console.log(res);
            }
        });
    }
</script>

<?= $this->endSection(); ?>