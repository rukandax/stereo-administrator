<div class="mb-4">
  <h1 class="h3 mb-2 text-gray-800">Edit Division</h1>
  <a href="<?= base_url('/division') ?>"><i class="fas fa-arrow-left"></i> Back to List Page</a>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    <form method="post" action="<?= base_url('/division/update') ?>">
      <input type="hidden" name="id" value="<?= $data['division'][0]['id'] ?>">
      <div class="form-group">
        <label for="name">Division Name</label>
        <input type="text" class="form-control" value="<?= $data['division'][0]['name'] ?>" id="name" name="name" placeholder="Division Name">
      </div>
      <button type="submit" class="mt-3 btn btn-success">Submit</button>
      <a href="<?= base_url('/division') ?>" class="mt-3 btn btn-danger">Cancel</a>
    </form>
  </div>
</div>
