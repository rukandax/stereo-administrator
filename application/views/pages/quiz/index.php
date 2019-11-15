<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">List Quiz</h1>
  <div class="d-sm-flex align-items-center justify-content-between">
    <a href="<?= base_url('/quiz/new') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
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
            <th>Duration (Minutes)</th>
            <th>Schedule</th>
            <th>Detail</th>
            <th>#</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Duration (Minutes)</th>
            <th>Schedule</th>
            <th>Detail</th>
            <th>#</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          $no = 1;
          foreach ($data['quiz'] as $key => $value) {
            ?>
            <tr>
              <td valign="middle"><?= $no ?></td>
              <td valign="middle"><?= $value['name'] ?></td>
              <td valign="middle"><?= $value['duration'] ?></td>
              <td valign="middle"><?= date_format(date_create($value['date']), 'd M Y') ?></td>
              <td valign="middle">
                <?php
                  $details = json_decode($value['total_quiz_data']);

                  foreach ($details as $detail) {
                    ?>
                    <a href="#" class="btn btn-sm btn-secondary"><?= $data['quiz_model']->get_quiz_category($detail->id)['name'] ?> <span class="badge badge-light ml-2"><?= $detail->total ?></span></a>
                    <?php
                  }
                ?>
              </td>
              <td class="d-flex">
                <a href="<?= base_url('/quiz/edit/' . $value['id']) ?>" class="btn btn-warning btn-sm mr-3"><i class="fas fa-edit"></i> Edit</a>
                <form id="import-form" method="post" action="<?= base_url('/quiz/import') ?>" enctype="multipart/form-data">
                  <label for="import-field-<?= $key ?>" class="mb-0">
                    <div class="btn btn-sm mr-3 btn-warning"><i class="fas fa-file-import fa-sm"></i> Import</div>
                  </label>
                  <input type="file" id="import-field-<?= $key ?>" name="quiz_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" hidden>
                </form>
                <a href="<?= base_url('/quiz/delete/' . $value['id']) ?>" class="btn btn-danger btn-sm mr-3" onclick="return confirm('Are you sure want to delete this data ?');"><i class="fas fa-trash-alt"></i> Delete</a>
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
