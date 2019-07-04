<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("admin/_partials/head.php") ?>

</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <?php $this->load->view("admin/_partials/navbar.php") ?>

    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-list"></i><span> Histori Penjualan</span></h1>


                <!-- add form -->


                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('admin/pulsa/add') ?>"><i class="fas fa-comment-dollar"></i><span> Beli Pulsa</span></a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nomor</th>
                                        <th>Operator</th>
                                        <th>Nominal</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pulsa as $pulsa) : ?>
                                        <tr>

                                            <td>
                                                <?php echo $pulsa->tanggal ?>
                                            </td>
                                            <td>
                                                <?php echo $pulsa->nomor ?><br> <?php echo $pulsa->nomor2 ?>
                                            </td>
                                            <td>
                                                <?php echo $pulsa->operator ?>
                                            </td>
                                            <td>
                                                <?php echo $pulsa->nominal ?>
                                            </td>
                                            <td>
                                                <?php echo $pulsa->status ?>

                                                </br>
                                            <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end add form -->



                <!-- /.container-fluid -->

                <!-- Sticky Footer -->
                <?php $this->load->view("admin/_partials/footer.php") ?>


                <!-- /.content-wrapper -->

            </div>
            <!-- /#wrapper -->

            <!-- Scroll to Top Button-->
            <?php $this->load->view("admin/_partials/scrolltop.php") ?>

            <!-- Logout Modal-->
            <?php $this->load->view("admin/_partials/modal.php") ?>

            <!-- Bootstrap core JavaScript-->
            <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>