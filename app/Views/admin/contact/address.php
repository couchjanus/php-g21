<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <i class="fa fa-envelope"></i> <?= $title; ?>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?=$address['email']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="street">Address:</label>
                                <input type="text" class="form-control" id="street" name="street" value="<?=$address['street']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" id="city" name="city" value="<?=$address['city']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="country">Country:</label>
                                <input type="text" class="form-control" id="country" name="country" value="<?=$address['country']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" value="<?=$address['mobile']; ?>" required>
                            </div>

                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary text-right">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>