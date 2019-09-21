<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">List Super Admin</h1>
  <a href="<?= base_url('/superadmin/new') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>NIP</th>
            <th>#</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>NIP</th>
            <th>#</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          $no = 1;
          foreach ($data['superadmin'] as $key => $value) {
            ?>
            <tr>
              <td valign="middle"><?= $no ?></td>
              <td valign="middle"><?= $value['name'] ?></td>
              <td valign="middle"><?= $value['nip'] ?></td>
              <td>
              <a href="<?= base_url('/superadmin/edit/' . $value['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <a href="<?= base_url('/superadmin/delete/' . $value['id']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
            <?php
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
