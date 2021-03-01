<?php includeWithVars(VIEWS.'/layouts/partials/admin/toolbar.php', [
    'url'=> "/admin/roles/create",
    'label'=> "New Role",
    'title'=> "Roles List"
]);?>

<div class="table-responsive">
  <?php if(count($roles)>0):?>
  <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($roles as $role):?>

            <tr>
              <td><?=$role->id?></td>
              <td><?=$role->name?></td>
              
              <td>
                <a href="/admin/roles/edit/<?=$role->id?>"><button class="btn btn-sm btn-outline-info">Edit</button></a>
                <a href="/admin/roles/delete/<?=$role->id?>"><button class="btn btn-sm btn-outline-danger">Delete</button></a>
              </td>
            </tr>
          <?php endforeach?>
          </tbody>
   </table>
   <?php else: echo "No roles yet...";?>
   <?php endif ?>
</div>
