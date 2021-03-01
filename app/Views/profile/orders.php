
<section class="py-5">

  <div class="container p-0">
    <div class="row">
      <?php require_once VIEWS.'/profile/_profile.php'; ?>
        <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
          <section class="pt-2">
            <header class="text-center">
              <p class="small text-muted small text-uppercase mb-1">Обработка заказов</p>
                <h2 class="h5 text-uppercase mb-4"><?=$title; ?></h2>
                <?php if(count($orders)>0):?>
                  <h2 class='mb-5 mt-3 mb-lg-0'>Количество заказов <?=count($orders)?></h2>
                <?php else:?>
                  <h2 class='mb-5 mt-3 mb-lg-0'>No Orders yet</h2>
                <?php endif;?>
            </header>
          </section>
          
          <?php if(count($orders)>0):?>
            <div class='mb-5 mt-3 mb-lg-0'>
              <div class='table-row'>
                <div class='table-column table-header'>
                  Дата оформления
                </div>
                <div class='table-column table-header'>
                  Статус заказа
                </div>
                <div class='table-column table-header'>
                  Action
                </div>
              </div>

              <?php foreach ($orders as $order):?>
                <div class='table-row'>
                  <div class='table-column table-content'>
                    <?= $order->formated_date?>
                  </div>
                  <div class='table-column table-content'>
                    <?=Helper::getOrderStatus($order->status)?>
                  </div>
                  <div class='table-column table-content'>
                    <a title="Show order" href="/profile/orders/view/<?=$order->id;?>" class="btn btn-default">View</a>
                    <a title="Check Order" href="/profile/orders/check/<?= $order->id;?>" class="btn btn-danger">Check out</a>
                  </div>
                </div>
              <?php endforeach;?>

            </div>
          <?php endif;?>
        
        <div class="row">
          <?php require_once VIEWS.'/layouts/partials/_flash-message.php'; ?>                            
        </div>
    </div>
  </div>
 
</section>
