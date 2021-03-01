<div class="container">
    <div class="title">
        <h2><?=$title?></h2>
    </div>
    <form action="/profile/orders/change" method="POST">
      <div class="d-flex">
        <span class="form">
            <input type="hidden" name="user_id" value="<?=$user->id?>">
            <input type="hidden" name="order_id" value="<?=$order->id?>">
            <label>
                <span class="fname">First Name <span class="required">*</span></span>
                <input type="text" name="first_name" value="<?=$user->first_name ?? '';?>">
            </label>
            
            <label>
                <span class="lname">Last Name <span class="required">*</span></span>
                <input type="text" name="last_name" value="<?=$user->last_name ?? '';?>">
            </label>
            
            <label>
                <span>Phone <span class="required">*</span></span>
                <input type="tel" name="phone_number" value="<?=$user->phone_number ?? '';?>">
            </label>
            <label>
                <span>Email Address <span class="required">*</span></span>
                <input type="email" name="email" value="<?=$user->email ?? '';?>">
            </label>
        </span>  
        <div class="Yorder">
            <table>
                <tbody>
                    <tr>
                        <th colspan="2">Your order</th>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td><?=$total?></td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Free shipping</td>
                    </tr>
                </tbody>
            </table><br>
            
            <button type="submit">Place Order</button>
        </div>
      
      </div>
    </form>
</div>