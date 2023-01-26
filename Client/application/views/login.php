<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-7">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Perpustakaan Teknokrat</h1>
                                    </div>
                                    <?= $this->session->flashdata('pesan'); ?>
                                    <form class="user" method="post" action= "<?= base_url('Login') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Username...">
                                            <?= form_error('username', '<div class="text-small text-danger"></div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                            <?= form_error('password', '<div class="text-small text-danger"></div>') ?>
                                        </div>
                                        <Button type="submit" class="btn btn-primary btn-user btn-block">Masuk</Button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="<?= base_url('ext/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('ext/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('ext/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('ext/js/sb-admin-2.min.js') ?>"></script>

</body>

</html>