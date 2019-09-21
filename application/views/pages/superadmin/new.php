<div class="mb-4">
  <h1 class="h3 mb-2 text-gray-800">Add New Super Admin</h1>
  <a href="<?= base_url('/superadmin') ?>"><i class="fas fa-arrow-left"></i> Back to List Page</a>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    <form method="post" action="<?= base_url('/superadmin/create') ?>">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" class="form-control" id="nip" name="nip">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="form-group">
        <label for="confirmpassword">Confirm Password</label>
        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
      </div>
      <button type="submit" class="mt-3 btn btn-success">Submit</button>
      <a href="<?= base_url('/superadmin') ?>" class="mt-3 btn btn-danger">Cancel</a>
    </form>
  </div>
</div>
