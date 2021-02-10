<section class="py-5">
    <header class="text-center">
        <p class="text-muted text-uppercase mb-1">Get in touch</p>
        <h2 class="h5 text-uppercase mb-4"><?=$title?></h2>
    </header>

    <div class="row">
        <div class="col-md-4 company-info">
            <h3>Peculiar Shopaholic</h3>
            <?php if (isset($address)):?>
            <ul>
                <li><i class="fa fa-road"></i> <?= $address['street'];?></li>
                <li><i class="fas fa-map-marker-alt"></i> <?= $address['city'];?></li>
                <li><i class="fas fa-home"></i> <?= $address['country'];?></li>
                <li><i class="fa fa-phone"></i> <?= $address['mobile'];?></li>
                <li><i class="fa fa-envelope"></i> <?= $address['email'];?></li>
            </ul>
            <?php endif;?>
        </div>

        <div class="col-md-8">
            <table class="contact">
                <form id="contact-form" method="post">
                    <tr class="table-row">
                        <td class="table-cell half">
                            <label>Name</label>
                            <input type="text" name="name" id="name" required>
                        </td>
                        <td class="table-cell half">
                            <label>E-mail Address</label>
                            <input type="email" name="email" id="email" required>
                        </td>
                    </tr>

                    <tr class="table-row">
                        <td class="table-cell" colspan="2">
                            <label>Message</label>
                            <textarea name="message" rows="5" id="message"></textarea>
                        </td>
                    </tr>

                    <tr class="table-row">
                        <td class="table-cell" colspan="2">
                            <button type="submit">Submit</button>
                        </td>
                    </tr>
                </form>
            </table>

        </div>


    </div>

    <?php if (isset($messages)):?>
        <?php foreach ($messages as $row):?>
            <li class="mb-2">Customer <?=$row['name'];?> wrote this: <?=$row['message'];?> at: <?=date("d-m-Y", strtotime($row['created_at']));?></li>
        <?php endforeach;?>
    <?php endif;?>
</section>

<!-- NEWSLETTER-->
<section class="text-center border border-light p-5 my-3">
    <!-- Subscribe -->
    <h2 class="h4 mb-3">Let's be friends!</h2>
    <div class="text-center border border-light p-5">
        <form class="mb-5">
            <label for="from">
                <i class="fas fa-info-circle"></i>
            </label>
            <input type="email" placeholder="Enter your email address">
            <input type="submit" value="Subscribe">
        </form>
    </div>
    <p class="mt-3">Join our mailing list. We write rarely, but only the best content.</p>
    <p class="my-3">
        <a href="" target="_blank">See the last newsletter</a>
    </p>
</section>