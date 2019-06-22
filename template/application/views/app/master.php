<div class="container main">
  

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          JENIS KEGIATAN
              <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
          </div>
        <div class="panel-body">
                      <h4>Total Data : <strong><?= $totalJK ?></strong> </h4>
                      <table class="table table-striped text-center">
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Jenis Kegiatan</th>
                          <?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                            <th class="text-center">Action</th>
                          <?php endif ?>
                        </tr>
                        <?php
                          $i = 1;
                          foreach($daftarJK as $item):
                        ?>
                      <tr>
                          <td><?= $i ?></td>
                          <td><?= $item->nama_jk ?></td>
                          <?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                          <td>
                            <a href='<?= base_url('jenis-kegiatan/edit/'.$item->kode_jk) ?>' class="btn btn-info">EDIT</a>
                            <form action="<?= base_url('jenis-kegiatan/delete') ?>" method="post" style="display: inline-block">
                                  <input type="hidden" name="kode_jk" value="<?= $item->kode_jk ?>">
                                  <button type="submit" class="btn btn-danger">
                                      HAPUS
                                  </button>
                            </form>
                          </td>
                        <?php endif ?>
                      </tr>
                      <?php
                      $i++;
                      endforeach
                       ?>
                  </table>
        </div>
      </div>
    </div>
  </div><!--/.row-->

 

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          DATA USER
              <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
          </div>
        <div class="panel-body">
                      <h4>Total Data : <strong><?= $totalDU ?></strong> </h4>
                      <table class="table table-striped text-center">
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Username</th>
                          <th class="text-center">Hak Akses</th>
                          <?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                          <th class="text-center">Action</th>
                        <?php endif ?>
                        </tr>
                        <?php
                          $i = 1;
                          foreach($daftarDU as $item):
                        ?>
                        <tr>
                          <td><?= $i ?></td>
                          <td><?= $item->username ?></td>
                          <td><?= $item->hak_akses ?></td>
                          <?php if($this->session->userdata('hak_akses') === 'admin'): ?>
                          <td>
                            <a href='<?= base_url('data-user/edit/'.$item->kode_du) ?>' class="btn btn-info">EDIT</a>
                            <form action="<?= base_url('data-user/delete') ?>" method="post" style="display: inline-block">
                                  <input type="hidden" name="kode_du" value="<?= $item->kode_du ?>">
                                  <button type="submit" class="btn btn-danger">
                                      HAPUS
                                  </button>
                            </form>
                          </td>
                        <?php endif ?>
                        </tr>
                        <?php
                        $i++;
                        endforeach
                         ?>
                  </table>

        </div>
      </div>
    </div>
  </div><!--/.row-->

</div>	<!--/.main-->
