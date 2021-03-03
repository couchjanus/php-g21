<?php includeWithVars(VIEWS.'/layouts/partials/admin/toolbar.php', [
    'url'=> "/admin/orders/complete",
    'label'=> "Complete Orders",
    'title'=> "Orders List"
]);?>

<div class="table-responsive">
  <?php if(count($orders)>0):?>
  <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Status</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($orders as $order):?>

            <tr>
              <td><?=$order->id?></td>
              <td><?=$order->status?></td>
              <td><?=$order->order_date?></td>
              <td>
                <a href="/admin/orders/edit/<?=$order->id?>"><button class="btn btn-sm btn-outline-info">Edit</button></a>
                <a href="/admin/orders/delete/<?=$order->id?>"><button class="btn btn-sm btn-outline-danger">Delete</button></a>
              </td>
            </tr>
          <?php endforeach?>
          </tbody>
   </table>
 <?php else: ?>  
  <h2>No Orders Yet</h2>
 <?php endif ?>
</div>