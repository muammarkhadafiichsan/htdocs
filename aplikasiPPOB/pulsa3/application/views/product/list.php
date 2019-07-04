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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('product/add') ?>"><i class="fas fa-plus"></i> Add New</a>
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
                                                <?php echo $pulsa->nomor ?>
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

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("templates/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("templates/scrolltop.php") ?>
	<?php $this->load->view("templates/modal.php") ?>

	<?php $this->load->view("templates/js.php") ?>

	<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
	</script>
</body>

</html>