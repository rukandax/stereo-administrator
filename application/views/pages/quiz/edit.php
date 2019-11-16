<div class="mb-4">
  <h1 class="h3 mb-2 text-gray-800">Add New Question</h1>
  <a href="<?= base_url('/quiz') ?>"><i class="fas fa-arrow-left"></i> Back to List Page</a>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    <form method="post" action="<?= base_url('/quiz/update/' . $data['quiz']['id']) ?>">
      <div class="form-group">
        <label for="name">Name</label>
        <input required type="text" class="form-control" value="<?= $data['quiz']['name'] ?>" autocomplete="off" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="duration">Duration (Minutes)</label>
        <input required type="number" class="form-control" value="<?= $data['quiz']['duration'] ?>" autocomplete="off" id="duration" name="duration">
      </div>
      <div class="form-group">
        <label for="schedule">Schedule</label>
        <input required type="date" class="form-control" value="<?= $data['quiz']['date'] ?>" autocomplete="off" id="schedule" name="schedule">
      </div>
      <div class="form-group">
        <label for="category">Category</label>
        <?php
        function isSelectedCategory($selected_categories, $category) {
          for($i = 0; $i < count($selected_categories); $i += 1) {
            return $selected_categories[$i]->id == $category['id'];
          }
        }

        function categoryData($selected_categories, $category) {
          for($i = 0; $i < count($selected_categories); $i += 1) {
            if ($selected_categories[$i]->id == $category['id']) {
              return $selected_categories[$i]->total;
            }
          }

          return 0;
        }

        $selected_categories = json_decode($data['quiz']['total_quiz_data']);

        foreach ($data['quiz_category'] as $key => $category) {
          ?>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" value="<?= $category['id'] ?>" name="category[]" class="custom-control-input" id="category-<?= $key ?>" <?= isSelectedCategory($selected_categories, $category) ? 'checked="checked"' : '' ?> >
            <label class="custom-control-label" for="category-<?= $key ?>">
              <strong class="text-dark"><?= $category['name'] ?></strong>
              <input required type="number" class="form-control mt-2" value="<?= categoryData($selected_categories, $category) ?>" autocomplete="off" name="total[]">
            </label>
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
