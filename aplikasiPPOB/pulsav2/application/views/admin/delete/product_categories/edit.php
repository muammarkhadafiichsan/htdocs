<div class="col-lg-12">
    <h1 class="page-header"><?php echo lang('menu_nav_product_category_edit') ?></h1>
                    
    <?php echo form_open('', array('class' => 'form-horizontal')) ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo lang('product_category_label_product_category_name') ?> *</label>
            <div class="col-sm-9">
				<input autofocus class="form-control" name="product_category_name" type="text" placeholder="<?php echo lang('product_category_label_product_category_name') ?>" value="<?php echo set_value('product_category_name', $product_category_edit->product_category_name) ?>">
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-3 control-label"><?php echo lang('product_category_label_active') ?></label>
            <div class="col-sm-9">
				<input <?php echo set_checkbox('product_category_active', 1, ($product_category_edit->active == 0 ? false : true) ) ?> name="product_category_active" type="checkbox" value="1">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo lang('product_category_label_product_category_parent') ?></label>
            <div class="col-sm-9">
				<select class="form-control" name="product_category_parent">
					<option value=""></option>
					<?php if ($product_categories_parent) : ?>
						<?php foreach ($product_categories_parent as $k => $v) : ?>
							<option <?php echo set_select('product_category_parent', $v->product_category_id, ( $product_category_edit->product_category_parent == $v->product_category_id ? true : false) ) ?> value="<?php echo $v->product_category_id ?>"><?php echo $v->product_category_name ?></option>
						<?php endforeach ?>
					<?php endif ?>
				</select>
            </div>
        </div>
		
		<div class="form-group">
            <div class="col-sm-3">
                <a class="btn btn-default" href="<?php echo site_url('admin/product_categories/list_all') ?>" role="button"><?php echo lang('label_button_back') ?></a>
            </div>
            <div class="col-sm-9">
                <input class="btn btn-default" name="product_category_edit" type="submit" value="<?php echo lang('label_button_edit') ?>" />
                <input class="btn btn-danger pull-right" name="product_category_remove" onclick="return confirm('<?php echo lang('message_delete_confirm') ?>') == false ? '' : window.location='<?php echo site_url('admin/product_categories/remove/'.$product_category_edit->product_category_id) ?>'" type="button" value="<?php echo lang('label_button_remove') ?>" />
            </div>
        </div>
    <?php echo form_close() ?>   
</div>