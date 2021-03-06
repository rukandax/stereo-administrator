<div class="mb-4">
  <h1 class="h3 mb-2 text-gray-800">Add New User</h1>
  <a href="<?= base_url('/user') ?>"><i class="fas fa-arrow-left"></i> Back to List Page</a>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    <form method="post" action="<?= base_url('/user/update/' . $data['user']['user_id']) ?>">
      <div class="form-group">
        <label for="name">Name</label>
        <input required type="text" class="form-control" value="<?= $data['user']['user_name'] ?>" autocomplete="off" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="nip">NIP</label>
        <input required type="text" class="form-control" value="<?= $data['user']['nip'] ?>" autocomplete="off" id="nip" name="nip">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" placeholder="Set blank if you don't want to change password" class="form-control" id="password" name="password">
      </div>
      <div class="form-group">
        <label for="confirmpassword">Confirm Password</label>
        <input type="password" placeholder="Set blank if you don't want to change password" class="form-control" id="confirmpassword" name="confirmpassword">
      </div>
      <div class="form-group">
        <label for="user-division">Division Name</label>
        <select name="division" id="user-division" data-value="<?= $data['user']['division_id'] ?>" required class="custom-select">
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
      <div class="form-group">
        <label for="user-departement">Departement Name</label>
        <select name="departement" id="user-departement" data-value="<?= $data['user']['departement_id'] ?>" required class="custom-select">
          <option selected disabled>Choose Division First</option>
        </select>
      </div>
      <button type="submit" class="mt-3 btn btn-success">Submit</button>
      <a href="<?= base_url('/user') ?>" class="mt-3 btn btn-danger">Cancel</a>
    </form>
  </div>
</div>
