<?php includeWithVars(VIEWS.'/layouts/partials/admin/toolbar.php', [
    'url'=> "/admin/roles",
    'label'=> "All Roles",
    'title'=> "Create Role"
]);?>

<div class="row g-3">
  <div class="col-12">
    <form class="needs-validation" novalidate method="POST" action="/admin/roles/store">
        <div class="row g-3">
          <div class="col-12">
              <label class="form-label">Role name</label>
              <input type="text" class="form-control" placeholder="" value="" required name="name">
              <div class="invalid-feedback">
                Valid name is required.
              </div>
          </div>

          
        </div>

        <hr class="my-4">

        <button class="w-100 btn btn-primary btn-lg" type="submit">Add New Role</button>
    </form>
  </div>
</div>
