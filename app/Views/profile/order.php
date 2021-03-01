<section class="py-5">
    <div class="container p-0">
        <div class="row">
            <?php require_once VIEWS.'/profile/_profile.php'; ?>
            <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                <section class="pt-2">
                        <header class="text-center">
                        <p class="small text-muted small text-uppercase mb-1">Детали заказа</p>
                        <h2 class="h5 text-uppercase mb-4"><?=$title; ?></h2>
                        <dt>Дата заказа: <?=$order->order_date?>
                        <dt>Статус: <?=Helper::getOrderStatus($order->status);?>
                        <h2 class='mb-5 mt-3 mb-lg-0'>Товары в заказе</h2>
                    </header>
                </section>
                
                <?php $totalValue = 0;?>

                <div class='mb-5 mt-3 mb-lg-0'>
                    <div class='table-row'>
                        <div class='table-column table-header'>
                                Image
                        </div>
                        <div class='table-column table-header'>
                                Товар
                        </div>
                        <div class='table-column table-header'>
                                Цена
                        </div>
                        <div class='table-column table-header'>
                            Amount
                        </div>
                    </div>
                    <?php foreach((array)$products as $product):?>
                    <div class='table-row'>
                        <div class='table-column'>
                            <div class='green-column'>
                            <img src="/assets/images/products/<?=$product['image'];?>" class="img-fluid w-20">
                            </div>
                        </div>
                        <div class='table-column table-content'>
                            
                            <?=$product['name']?>
                            
                        </div>
                        <div class='table-column table-content'>
                            
                            <?=$product['price'];?>
                            
                        </div>
                        <div class='table-column table-content'>
                            
                            <?=$product['amount'];?>
                            
                        </div>
                    </div>
                        <?php 
                            //подсчитываем сумму по каждому товару и пишем в массив
                            $arr[] = $product['price'] * $product['amount'];
                            //считаем общую сумму всех товаров в заказе, с учетом их кол-ва
                            $totalValue = array_sum($arr);
                        ?>
                    <?php endforeach;?>

                    <div class='table-row'>
                        <div class='table-column table-header'>
                            Сумма заказа:
                        </div>
                        <div class='expand-column table-header'>
                            
                            <?='' . $totalValue.' грн';?>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php require_once VIEWS.'/layouts/partials/_flash-message.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>