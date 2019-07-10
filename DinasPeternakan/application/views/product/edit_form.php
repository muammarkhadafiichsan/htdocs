<?php if ($this->session->flashdata('success')) : ?>
	<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success'); ?>
	</div>
<?php endif; ?>

<!-- Card  -->
<div class="card mb-3">
	<div class="card-header">

		<a href="<?php echo site_url('user/list'); ?>"><i class="fas fa-arrow-left"></i>
			Back</a>
	</div>
	<div class="card-body">

		<form action="<?php base_url('user/edit_artikel') ?>" method="post" enctype="multipart/form-data">

			<input type="hidden" name="id" value="<?php echo $list->product_id ?>" />

			<div class="form-group">
				<label for="name">Name*</label>
				<input class="form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>" type="text" name="name" placeholder="Product name" value="<?php echo $list->name ?>" />
				<div class="invalid-feedback">
					<?php echo form_error('name') ?>
				</div>
			</div>



			<div class="form-group">
				<label for="name">Photo</label>
				<input class="form-control-file <?php echo form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image" />
				<input type="hidden" name="old_image" value="<?php echo $list->image ?>" />
				<div class="invalid-feedback">
					<?php echo form_error('image') ?>
				</div>
			</div>

			<div class="form-group">
				<label for="name">Description*</label>
				<textarea class="form-control <?php echo form_error('description') ? 'is-invalid' : '' ?>" name="description" placeholder="Product description..."><?php echo $product->description ?></textarea>
				<div class="invalid-feedback">
					<?php echo form_error('description') ?>
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
<?php $this->load->view("admin/_partials/footer.php") ?>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php $this->load->view("admin/_partials/scrolltop.php") ?>

<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>