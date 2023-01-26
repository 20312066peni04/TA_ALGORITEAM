<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?> </h1>

    </div>

    <a class="btn btn-sm btn-success mb-3" href="<?= base_url('DataSiswa/tambah_data') ?>">
        <i class="fas fa-plus"> Tambah Data</i>
    </a>

    <?= $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="margin-bottom: 100px">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Tanggal Masuk</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Tanggal Masuk</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>

            <?php $no = 0; foreach($siswa as $s){ $no++ ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $s->nis ?></td>
                    <td><?= $s->nama_siswa ?></td>
                    <td><?= $s->created ?></td>
                    <td>
                        <center>
                            <a class="btn btn-sm btn-primary" href="<?= base_url('DataSiswa/update_data/' . $s->id) ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a onclick="return confirm('Apakah anda mau menghapus pengguna <?= $s->nama_siswa ?>?')" class="btn btn-sm btn-danger" href="<?= base_url('DataSiswa/delete_data/' . $s->id) ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </center>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
</div>