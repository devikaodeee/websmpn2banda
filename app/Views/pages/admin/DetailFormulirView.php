<?= $this->extend('layouts/AdminLayout'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?= base_url('assets/extensions/sweetalert2/sweetalert2.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/extensions/toastify-js/src/toastify.css'); ?>">

<div class="page-content">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title mb-0">ID#19</h4>
                <div class="ms-auto">
                    <button id="btn-pending" class="btn btn-danger">
                        <i class="bi bi-clock"></i>
                        <span>Pending</span>
                    </button>
                    <button id="btn-terima" class="btn btn-success">
                        <i class="bi bi-check"></i>
                        <span>Terima</span>
                    </button>
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

    $(document).ready(function() {

        $('#btn-pending').click(function() {
            console.log('#btn-pending: clicked!');
            Swal.fire({
                title: "Yakin?",
                text: "Pastikan jika data tersebut harus diubah",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: 'Ya'
            }).then(function(result) {
                if (result.isConfirmed) {
                    submitForm(500);
                }
            });
        });

        $('#btn-terima').click(function() {
            Swal.fire({
                title: "Yakin?",
                text: "Pastikan data sudah sesuai dan tidak ada kesalahan karena tidak dapat diubah",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: 'Ya'
            }).then(function(result) {
                if (result.isConfirmed) {
                    submitForm(200);
                }
            });
        });

    });

    function submitForm(statusCode = 700) {
        $.ajax({
            url: "<?= base_url('api/formulir/submit'); ?>",
            method: "POST",
            data: {
                siswa_id: <?= $data_siswa['siswa_id']; ?>,
                siswa_status_form: statusCode
            },
            success: function(res) {
                if (res.code == 200) {
                    Toastify({
                        text: "Berhasil submit formulir",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#4fbe87",
                    }).showToast();
                }
            },
            error: function(res) {
                console.log(res);
            }
        });
    }
</script>

</div>
</div>

<?= $this->endSection(); ?>