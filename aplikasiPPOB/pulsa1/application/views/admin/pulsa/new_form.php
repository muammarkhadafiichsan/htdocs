<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("admin/_partials/head.php") ?>

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <?php $this->load->view("admin/_partials/navbar.php") ?>

    </nav>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Alert untuk mengetahui status transaksi -->
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('danger')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('danger'); ?>
                        </div>
                    <?php endif; ?>


                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-comment-dollar"></i><span> Pembelian</span></h1>


                    <!-- add form -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?php echo site_url('admin/pulsa/') ?>"><i class="fas fa-list"></i> Histori Penjualan</a>
                        </div>
                        <div class="card-body">

                            <form action="<?php base_url('admin/pulsa/add') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input class="form-control" type="date" name="tanggal" id="tanggal" placeholder="Tanggal" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tanggal') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nomor">Nomor</label>
                                    <input class="form-control" type="text" name="nomor" id="nomor" placeholder="Nomor HP" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nomor') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nomor2">Nomor</label>
                                    <input class="form-control" type="text" name="nomor2" id="nomor2" placeholder="Nomor HP" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nomor2') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="id_operator">Operator</label><br>
                                    <select class="form-control" name="id_operator" id="id_operator" required>
                                        <option value="">--Pilih Operator--</option>
                                        <?php
                                        $servername = "localhost";
                                        $database = "pulsa";
                                        $username = "root";
                                        $password = "";
                                        $conn = mysqli_connect($servername, $username, $password, $database);
                                        $sql_akses = mysqli_query($conn, "SELECT * FROM operator") or die(mysqli_error($conn));
                                        while ($data_operator = mysqli_fetch_array($sql_akses)) {
                                            echo '<option value="' . $data_operator['id_operator'] . '">' . $data_operator['operator'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('id_operator') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="id_nominal">Nominal</label><br>
                                    <select class="form-control" name="id_nominal" id="id_nominal" required>
                                        <option value="">--Pilih Nominal--</option>
                                        <?php
                                        $servername = "localhost";
                                        $database = "pulsa";
                                        $username = "root";
                                        $password = "";
                                        $conn = mysqli_connect($servername, $username, $password, $database);
                                        $sql_akses = mysqli_query($conn, "SELECT * FROM nominal") or die(mysqli_error($conn));
                                        while ($data_nominal = mysqli_fetch_array($sql_akses)) {
                                            echo '<option value="' . $data_nominal['id_nominal'] . '">' . $data_nominal['nominal'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('id_nominal') ?>
                                    </div>
                                </div>






                                <input class="btn btn-success" type="submit" name="btn" id="save" value="Save" />
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php $this->load->view("admin/_partials/scrolltop.php") ?>

    <!-- Logout Modal-->
    <?php $this->load->view("admin/_partials/modal.php") ?>

    <!-- JavaScript-->
    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>