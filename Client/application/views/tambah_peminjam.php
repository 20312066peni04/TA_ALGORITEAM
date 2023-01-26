<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?> </h1>

    </div>

    <div class="card">
        <div class="card-body" style="width: 70%; margin-bottom: 80px">
            <form action="<?= base_url('/DataPinjam/tambah_data_aksi') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label">ID Siswa</label>
                    <input type="number" name="id_siswa" class="form-control">
                    <?= form_error('id_siswa', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label">ID Buku</label>
                    <input type="numbertext" name="id_buku" class="form-control">
                    <?= form_error('id_buku', '<div class="text-small text-danger"></div>') ?>
                </div>

                <button type="submit" class="btn btn-success">SIMPAN</button>
            </form>
        </div>
    </div>

</div>