<div class="d-flex justify-content-center">
    <div class="col-12 col-sm-8 col-lg-8 col-xl-6">
         
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5 mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 recive-bank d-flex align-items-center flex-column text-center">
                        <!-- Notifications -->
                        <?php if (@isset($_SESSION["failed"])) { ?>
                            <div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="notif-login f-poppins"><?= $_SESSION["failed"] ?></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>
                        <?php if (@isset($_SESSION["success"])) { ?>
                            <div class="col-12 alert alert-success alert-dismissible fade show" role="alert">
                                <span class="notif-login f-poppins"><?= @$_SESSION["success"] ?></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>
                        <span class="withdraw-amount">
                        <h4 class="withdraw-title">Available commission to withdraw</h4>
                        <div class="withdraw-amount">$ <?=number_format($unpaid)?></div>
                        </span>
                        <form action="#" method="POST" class="withdraw-form mt-4">
                            <!-- Amount -->
                            <div class="form-group">
                                <label for="amount" class="form-label">Amount to withdraw</label>
                                <input type="text" id="amount" name="amount" value="<?=number_format($unpaid)?>" class="form-control" readonly />
                            </div>
                        
                            <!-- Recipient Name -->
                            <div class="form-group">
                                <label for="recipient" class="form-label">Recipient Name</label>
                                <input type="text" id="recipient" name="recipient" class="form-control" placeholder="Robin Hood" />
                            </div>
                        
                            <!-- Account Number -->
                            <div class="form-group">
                                <label for="account-number" class="form-label">Account Number</label>
                                <input type="text" id="account-number" name="account-number" class="form-control" placeholder="123456789" />
                            </div>
                        
                            <!-- Swift Code -->
                            <div class="form-group">
                                <label for="swift-code" class="form-label">Swift Code</label>
                                <input type="text" id="swift-code" name="swift-code" class="form-control" placeholder="0987654321" />
                            </div>
                        
                            <!-- Address -->
                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" id="address-line" name="address-line" class="form-control" placeholder="First line" />
                                <input type="text" id="city" name="city" class="form-control mt-2" placeholder="City" />
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" id="state" name="state" class="form-control mt-2" placeholder="State" />
                                    </div>
                                    <div class="col-6">
                                        <input type="text" id="postal-code" name="postal-code" class="form-control mt-2" placeholder="Pos Code" />
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Confirm Button -->
                            <button type="submit" class="btn btn-withdraw mt-4">Confirm</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>