<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">List Quiz</h1>
  <div class="d-sm-flex align-items-center justify-content-between">
    <a href="<?= base_url('/quiz/new') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Add New</a>
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
            <th>Question</th>
            <th>#</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Duration (Minutes)</th>
            <th>Schedule</th>
            <th>Question</th>
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
              <td valign="middle"><?= date_format(date_create($value['date']), 'd F Y') ?></td>
              <td valign="middle">
                <?php
                  $details = json_decode($value['total_quiz_data']);

                  foreach ($details as $detail) {
                    ?>
                    <a href="<?= base_url('/question/' . $value['id']) ?>" class="btn btn-sm btn-secondary"><?= $data['quiz_model']->get_quiz_category($detail->id)['name'] ?> <span class="badge badge-light ml-2"><?= $detail->total ?></span></a>
                    <?php
                  }
                ?>
              </td>
              <td>
                <div class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Proctor Code</div>
                <a href="<?= base_url('/quiz/edit/' . $value['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                <a href="<?= base_url('/quiz/duplicate/' . $value['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-copy"></i> Duplicate</a>
                <a href="<?= base_url('/quiz/delete/' . $value['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this data ?');"><i class="fas fa-trash-alt"></i> Delete</a>
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
