<!-- DataTables -->
<div class="card mb-3">
	<div class="card-header">
	</div>
	<div class="card-body">

		<div class="table-responsive">
			<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Name</th>
						<th>Photo</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($list as $list) : ?>
						<tr>
							<td width="150">
								<?php echo $list->name ?>
							</td>
							<td>
								<img src="<?php echo base_url('assets/img/profile/' . $list->image) ?>" width="64" />
							</td>
							<td class="small">
								<?php echo substr($list->description, 0, 120) ?>...</td>
							<td width="250">
								<a href="<?php echo site_url('user/edit_artikel'); ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
								<a onclick="deleteConfirm('<?php echo site_url('products/delete/' . $list->product_id) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>

				</tbody>
			</table>
		</div>
	</div>
</div>

</div>
<!-- /.container-fluid -->



<script>
	function deleteConfirm(url) {
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
</script>
</body>

</html>