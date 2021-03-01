<!-- navbar-->
<header class="bg-white">
    <nav id="nav">
        <div class="navbar">
            <input class="trigger" type="checkbox" id="hamburger">
            <label for="hamburger">
                <i class="nav-toggle fas fa-bars"></i>
            </label>
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <span class="font-weight-bold text-uppercase text-dark">Shopaholic</span>
                </a>
            </div>

            <ul class="navbar-nav effect-brackets">
                <li><a href="/">Home</a></li>
                <li><a href="/shop">Shop</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>

            <ul class="navbar-tool">
                <li>
                    <a href="#" class="sidebar-toggle"><i class="fas fa-dolly-flatbed"></i><small
                            class="text-gray count-items-in-cart">0</small></a>
                </li>
                <li>
                    <a href="#"><i class="far fa-heart"></i><small class="text-gray">(0)</small></a>
                </li>
                <li>
                    <?php if(isGuest()):?>
                    <a href="#login"><i class="fas fa-user-alt"></i></a>
                    <?php else:?>
                        <li>
                            <a href="/profile" title="User Profile"><i class="fas fa-address-card"></i></a>
                        </li>
                        <li>
                            <a href="/logout" title="Sign Out"><i class="fas fa-sign-out-alt"></i></a>
                        </li>
                    <?php endif?>
                </li>
            </ul>
        </div>
    </nav>
</header>