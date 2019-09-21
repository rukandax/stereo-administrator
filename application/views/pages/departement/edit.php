<div class="mb-4">
  <h1 class="h3 mb-2 text-gray-800">Add New Departement</h1>
  <a href="<?= base_url('/departement') ?>"><i class="fas fa-arrow-left"></i> Back to List Page</a>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    <form method="post" action="<?= base_url('/departement/update/' . $data['departement'][0]['id']) ?>">
      <div class="form-group">
        <label for="name">Departement Name</label>
        <input required type="text" value="<?= $data['departement'][0]['departement_name'] ?>" autocomplete="off" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="name">Division Name</label>
        <select name="division" required class="custom-select" data-value="<?= $data['departement'][0]['division_id'] ?>">
          <option selected disabled>Choose Division Name</option>
          <?php
          foreach ($data['division'] as $key => $value) {
            ?>
            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <button type="submit" class="mt-3 btn btn-success">Submit</button>
      <a href="<?= base_url('/departement') ?>" class="mt-3 btn btn-danger">Cancel</a>
    </form>
  </div>
</div>
