<div id="content-wrapper">

	<div class="container-fluid">




		<div class="card mb-3">
			<div class="card-header">
				<a href=""><i class="fas fa-arrow-left"></i> Back</a>
			</div>
			<div class="card-body">

				<form action="<?php base_url('product/add') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">Name*</label>
						<input class="form-control" type="text" name="name" placeholder="Product name" />
						<div class="invalid-feedback">

						</div>
					</div>

					<div class="form-group">
						<label for="name">Description*</label>
						<textarea class="form-control " name="description" placeholder="Product description..."></textarea>
						<div class="invalid-feedback">
							<?php echo form_error('description') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="name">Photo</label>
						<input class="form-control-file " type="file" name="image" />
						<div class="invalid-feedback">
							<?php echo form_error('image') ?>
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


	</div>
	<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("templates/scrolltop.php") ?>

<?php $this->load->view("templates/js.php") ?>

</body>

</html>