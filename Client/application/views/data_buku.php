<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?> </h1>

    </div>

    <a class="btn btn-sm btn-success mb-3" href="<?= base_url('DataBuku/tambah_data') ?>">
        <i class="fas fa-plus"> Tambah Data</i>
    </a>

    <?= $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="margin-bottom: 100px">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Tanggal Masuk</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Tanggal Masuk</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>

            <?php $no = 0; foreach($buku as $b){ $no++ ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $b->nama_buku ?></td>
                    <td><?= $b->created ?></td>
                    <td><img src="<?= base_url('ext/buku/' . $b->gambar) ?>" width="75px"></td>
                    <td>
                        <center>
                            <a class="btn btn-sm btn-primary" href="<?= base_url('DataBuku/update_data/' . $b->id) ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a onclick="return confirm('Apakah anda mau menghapus buku <?= $b->nama_buku ?>?')" class="btn btn-sm btn-danger" href="<?= base_url('DataBuku/delete_data/' . $b->id) ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </center>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
</div>