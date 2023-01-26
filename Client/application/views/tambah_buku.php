<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?> </h1>

    </div>

    <div class="card">
        <div class="card-body" style="width: 70%; margin-bottom: 80px">
            <form action="<?= base_url('/DataBuku/tambah_data_aksi') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label">Nama Buku</label>
                    <input type="text" name="nama_buku" class="form-control">
                    <?= form_error('nama_buku', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label">Gambar</label>
                    <input type="file" name="photo" class="form-control">
                    <?= form_error('photo', '<div class="text-small text-danger"></div>') ?>
                </div>

                <button type="submit" class="btn btn-success">SIMPAN</button>
            </form>
        </div>
    </div>

</div>