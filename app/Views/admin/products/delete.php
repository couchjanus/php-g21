<?php includeWithVars(VIEWS.'/layouts/partials/admin/toolbar.php', [
    'url'=> "/admin/products",
    'label'=> "All Products",
    'title'=> "Delete Product "
]);?>

<div class="row g-3">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal" role="form" method="POST">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-12 control-label"><h2>Product <?=$product->name;?> will be deleted! Are You Sure?</h2></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button name="submit" type="submit" class="save btn btn-danger">Delete Product</button>
                    <button name="reset" class="save btn btn-info">Cansel</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>

  </div>        
</div>
