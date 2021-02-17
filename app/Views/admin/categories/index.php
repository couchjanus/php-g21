<?php includeWithVars(VIEWS.'/layouts/partials/admin/toolbar.php', [
    'url'=> "/admin/categories/create",
    'label'=> "New Category",
    'title'=> "Categories List"
]);?>

<div class="table-responsive">
  <?php if(count($categories)>0):?>
  <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($categories as $category):?>

            <tr>
              <td><?=$category->id?></td>
              <td><?=$category->name?></td>
              <td><?=$category->status?></td>
              <td><button class="btn btn-sm btn-outline-info">Edit</button><button class="btn btn-sm btn-outline-danger">Delete</button></td>
            </tr>
          <?php endforeach?>
          </tbody>
   </table>
 <?php endif ?>
</div>