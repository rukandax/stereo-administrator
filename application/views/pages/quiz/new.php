<div class="mb-4">
  <h1 class="h3 mb-2 text-gray-800">Add New Quiz</h1>
  <a href="<?= base_url('/quiz') ?>"><i class="fas fa-arrow-left"></i> Back to List Page</a>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    <form method="post" action="<?= base_url('/quiz/create') ?>">
      <div class="form-group">
        <label for="name">Name</label>
        <input required type="text" class="form-control" autocomplete="off" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="duration">Duration (Minutes)</label>
        <input required type="number" class="form-control" autocomplete="off" id="duration" name="duration">
      </div>
      <div class="form-group">
        <label for="schedule">Schedule</label>
        <input required type="date" class="form-control" autocomplete="off" id="schedule" name="schedule">
      </div>
      <div class="form-group">
        <label for="category">Category</label>
        <?php
        foreach ($data['quiz_category'] as $key => $category) {
          ?>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="category-<?= $key ?>">
            <label class="custom-control-label" for="category-<?= $key ?>"><strong class="text-dark"><?= $category['name'] ?></strong></label>
          </div>
          <?php
        }
        ?>
      </div>
      <button type="submit" class="mt-3 btn btn-success">Submit</button>
      <a href="<?= base_url('/quiz') ?>" class="mt-3 btn btn-danger">Cancel</a>
    </form>
  </div>
</div>
