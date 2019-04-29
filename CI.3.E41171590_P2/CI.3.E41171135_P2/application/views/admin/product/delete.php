public function delete($id=null)
{
    if (!isset($id)) show_404();
        
    if ($this->product_model->delete($id)) {
        redirect(site_url('admin/products'));
    }
}