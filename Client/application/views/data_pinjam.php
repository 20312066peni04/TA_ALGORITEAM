<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?> </h1>

    </div>

    <?= $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="margin-bottom: 100px">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Nama Siswa</th>
                <th>Nama Pengguna</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Nama Siswa</th>
                <th>Nama Pengguna</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>

            <?php $no = 0; foreach($pinjam as $p){ $no++ ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $p->nama_buku ?></td>
                    <td><?= $p->nama_siswa ?></td>
                    <td><?= $p->nama_pengguna ?></td>
                    <td>
                        <center>
                            <a class="btn btn-sm btn-primary" href="<?= base_url('DataPinjam/update_data/' . $p->id) ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                        </center>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
</div>