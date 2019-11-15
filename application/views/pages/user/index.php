<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">List User</h1>
  <div class="d-sm-flex align-items-center justify-content-between">
    <a href="<?= base_url('/user/new') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-4"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
    <form id="import-form" method="post" action="<?= base_url('/user/import') ?>" enctype="multipart/form-data">
      <label for="import-field" class="mb-0">
        <div class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-file-import fa-sm text-white-50"></i> Import</div>
      </label>
      <input type="file" id="import-field" name="user_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" hidden>
    </form>
  </div>
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
            <th>Departement</th>
            <th>#</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>NIP</th>
            <th>Departement</th>
            <th>#</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          $no = 1;
          foreach ($data['user'] as $key => $value) {
            ?>
            <tr>
              <td valign="middle"><?= $no ?></td>
              <td valign="middle"><?= $value['user_name'] ?></td>
              <td valign="middle"><?= $value['nip'] ?></td>
              <td valign="middle"><?= $value['departement_name'] ?></td>
              <td>
              <a href="<?= base_url('/user/edit/' . $value['user_id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <a href="<?= base_url('/user/delete/' . $value['user_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this data ?');"><i class="fas fa-trash-alt"></i> Delete</a>
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
