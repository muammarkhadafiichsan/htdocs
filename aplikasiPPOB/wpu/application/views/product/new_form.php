<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("templates/user/header.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("templates/user/topbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("templates/user/siderbar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("templates/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				

						<!-- add form -->
						<div class="card mb-3">
                        <div class="card-header">
                            <a href="<?php echo site_url('products/') ?>"><i class="fas fa-arrow-left"></i> List Pembelian</a>
                        </div>
                        <div class="card-body">

                            <form action="<?php base_url('pulsa/add') ?>" method="post" enctype="multipart/form-data">
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

							

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("templates/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("templates/scrolltop.php") ?>

		<?php $this->load->view("templates/js.php") ?>

</body>

</html>