<?php includeWithVars(VIEWS.'/layouts/partials/admin/toolbar.php', [
    'url'=> "/admin/users",
    'label'=> "All Users",
    'title'=> "Create User"
]);?>

<div class="row g-3">
  <div class="col-12">
    <form class="needs-validation" novalidate method="POST" action="/admin/users/store">
        <div class="row g-3">
          <div class="col-12">
              <label for="name" class="form-label">User Name:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="User Name" required>
              <div class="invalid-feedback">
                Valid name is required.
              </div>
          </div>
          <hr class="my-2">

          <div class="col-12">
              <label for="email" class="form-label">User Email:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="User email" required>
              <div class="invalid-feedback">
                Valid email is required.
              </div>
          </div>
          <hr class="my-2">
          <div class="col-12">
              <label for="password" class="form-label">User Password:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="User password" required>
              <div class="invalid-feedback">
                Valid email is required.
              </div>
          </div>
          <hr class="my-2">
          <div class="row">  
            <div class="col-md-6">
              <label for="role" class="form-label">User Role</label>
              <select class="form-select" id="role" name="role_id" required>
                <?php if (is_array($roles)) : ?>
                <option value="">Choose...</option>
                <?php foreach ($roles as $role): ?>
                   <option value="<?php echo $role->id; ?>">
                      <?php echo $role->name; ?>
                   </option>
                <?php endforeach; ?>
               <?php endif; ?>
              </select>
              <div class="invalid-feedback">
                Please select a valid role.
              </div>
            </div>
            <div class="col-md-6">
              <strong>User Status</strong>
              <div class="form-check">

                 <input type="checkbox" class="form-check-input" id="status" name="status" checked>
                 <label class="form-check-label" for="status"> (Check if active)</label>
              </div>
            </div>

          </div>
        </div>

        <hr class="my-4">

        <button class="w-100 btn btn-primary btn-lg" type="submit">Add New User</button>
    </form>
  </div>
</div>
