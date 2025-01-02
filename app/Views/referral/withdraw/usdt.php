<!-- Page Content  -->
<div class="content-page mb-5">
    <div class="container-fluid">
        <div class="row content-body justify-content-center">
            <div class="col-12 col-sm-8 col-lg-8 col-xl-6">

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
                        <form action="<?=BASE_URL?>referral/referral/submitusdt_withdraw" method="POST" class="withdraw-form mt-4">
                            <!-- Amount -->
                            <div class="form-group">
                                <label for="amount" class="form-label">Amount to withdraw</label>
                                <input type="text" id="amount" name="amount" value="<?=number_format($unpaid)?>" class="form-control" readonly />
                            </div>
                        
                            <!-- Wallet Address -->
                            <div class="form-group">
                                <label for="wallet-address" class="form-label">Wallet address</label>
                                <input type="text" id="wallet-address" name="wallet-address" class="form-control" placeholder="xxxxx" required/>
                            </div>
                        
                            <!-- Connection -->
                            <div class="form-group">
                                <label for="connection" class="form-label">Connection</label>
                                <input type="text" id="connection" name="connection" value="TRC20" class="form-control" readonly />
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
