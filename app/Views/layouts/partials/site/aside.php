<!-- aside -->
<aside class="aside">
    <div class="cart">
        <div class="cart-header">
            <button class="close-btn"><i class="fas fa-times"></i></button>
            <h2 class="logo">Shopping Cart</h2>
        </div>

        <!-- cart items -->
        <div class="cart-items">

        </div>

        <!-- buttons -->
        <div class="cart-footer">
            <h3>Your total : $<span class="cart-total">0</span></h3>
            
            <div class="btn-group" role="group">
                <button type="button" class="clear-cart btn btn-danger">Clear Cart</button>
                <?php if(isGuest()):?>
                <a href="/#login"><button type="button" class="btn btn-warning">You should log in</button></a>
                <?php else:?>
                <button type="button" class="checkout__now btn btn-success">Chackout</button>
                <?php endif?>
            </div>
        </div>

    </div>
</aside>
<!-- ./aside -->

<aside class="single">

</aside>