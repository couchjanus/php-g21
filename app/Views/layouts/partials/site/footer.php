<!-- Footer -->
<footer class="bg-dark text-white mt-3">
    <!-- container -->
    <div class="container py-4">
        <!-- row -->
        <div class="row py-5">
            <!-- 3 columns -->
            <div class="col-md-4 mb-3 mb-md-0">
                <h6 class="text-uppercase">Customer services</h6>
                <ul class="list-unstyled">
                    <li><a class="footer-link" href="#">Help &amp; Contact Us</a></li>
                    <li><a class="footer-link" href="#">Returns &amp; Refunds</a></li>
                    <li><a class="footer-link" href="#">Online Stores</a></li>
                    <li><a class="footer-link" href="#">Terms &amp; Conditions</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <h6 class="text-uppercase">Company</h6>
                <ul class="list-unstyled">
                    <li><a class="footer-link" href="#">What We Do</a></li>
                    <li><a class="footer-link" href="#">Available Services</a></li>
                    <li><a class="footer-link" href="#">Latest Posts</a></li>
                    <li><a class="footer-link" href="#">FAQs</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="text-uppercase">Social media</h6>
                <ul class="list-unstyled footer-socials social-icon">
                    <li><a class="footer-link twitter" href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a class="footer-link facebook" href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                    <li><a class="footer-link instagram" href="#"><i class="fab fa-instagram"></i> Instagram</a>
                    </li>
                    <li><a class="footer-link google-plus" href="#"><i class="fab fa-google-plus"></i> Google</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-top pt-4">
            <!-- 2 columns -->
            <div class="row mb-4">
                <div class="col-lg-6">
                    <p class="text-muted mb-0">&copy; <?=date("Y")?> All rights reserved.</p>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <p class="text-white reset-anchor">Template designed by <a href="#">My Temple</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- modal -->

<div id="login" class="modal">
    <div class="dialog">
        <a href="#close" title="Close" class="close">&times;</a>
        <div class="col-left">
                <div class="login-text">
                    <h3>Not a member?</h3>
                    <p>Create your account.<br>It's totally free.</p>
                    <a class="btn" href="#register">Sign Up</a>
                </div>
        </div>

        <div class="col-right">
            <div class="login-form">
                <h2>Login</h2>
                <form method="POST" action="/login">
                        <p>
                            <label>User email address<span>*</span></label>
                            <input type="email" name="email" placeholder="User Email" required>
                        </p>
                        <p>
                            <label>Password<span>*</span></label>
                            <input type="password" placeholder="Password" name="password" required>
                        </p>
                        <p>
                            <input type="submit" value="Sing In" />
                        </p>
                        <p>
                            <a href="">Forget Password?</a>
                            
                        </p>
                       
                </form>
            </div>
        </div>
    </div>
</div>


<div id="register" class="modal">
    <div class="dialog">
        <a href="#close" title="Close" class="close">&times;</a>
        <div class="col-left">
                <div class="login-text">
                    <h3>Already member?</h3>
                    
                    <a class="btn" href="#login">Sign In</a>
                </div>
        </div>

        <div class="col-right">
            <div class="login-form">
                <h2>Sign Up</h2>
                <form method="POST" action="/register">
                        <p>
                            <label>User email address<span>*</span></label>
                            <input type="email" name="email" placeholder="User Email" required>
                        </p>
                        <p>
                            <label>Password<span>*</span></label>
                            <input type="password" placeholder="Password" name="password" required>
                        </p>

                        <p>
                            <label>Confirm Password<span>*</span></label>
                            <input type="password" placeholder="Retype password again" name="confirmpassword" required>
                        </p>

                        <p>
                            <input type="submit" value="Sing Up" />
                        </p>
                       
                </form>
            </div>
        </div>
    </div>
</div>
  
