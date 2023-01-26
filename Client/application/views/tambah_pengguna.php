<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?> </h1>

    </div>

    <div class="card">
        <div class="card-body" style="width: 70%; margin-bottom: 80px">
            <form action="<?= base_url('DataPengguna/tambah_data_aksi') ?>" method="post">
                <div class="form-group">
                    <label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control">
                    <?= form_error('nama_lengkap', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label">NIP</label>
                    <input type="number" name="nip" class="form-control">
                    <?= form_error('nip', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label">Username</label>
                    <input type="text" name="username" class="form-control">
                    <?= form_error('username', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label">Password</label>
                    <input type="password" name="password" class="form-control">
                    <?= form_error('password', '<div class="text-small text-danger"></div>') ?>
                </div>

                <button type="submit" class="btn btn-success">SIMPAN</button>
            </form>
        </div>
    </div>

</div>