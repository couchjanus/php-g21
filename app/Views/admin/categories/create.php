<?php includeWithVars(VIEWS.'/layouts/partials/admin/toolbar.php', [
    'url'=> "/admin/categories",
    'label'=> "All Categories",
    'title'=> "Create New Category"
]);?>

<div class="row g-3">
  <div class="col-12">
    <form class="needs-validation" novalidate method="POST" action="/admin/categories/store">
        <div class="row g-3">
          <div class="col-12">
              <label for="categoryName" class="form-label">Category name</label>
              <input type="text" class="form-control" id="categoryName" placeholder="" value="" required name="name">
              <div class="invalid-feedback">
                Valid name is required.
              </div>
          </div>

          <div class="col-12">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="status" name="status">
              <label class="form-check-label" for="status">Category Status (Check if active)</label>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <button class="w-100 btn btn-primary btn-lg" type="submit">Add New</button>
    </form>
  </div>
</div>