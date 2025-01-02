<?php if(!empty(session('failed'))) { ?>
<div class="alert alert-danger fade show position-absolute" style="top: 1rem; right: 1rem; width: 30%; z-index: 99999;" role="alert">
    <div class="iq-alert-icon">
        <i class="ri-information-line"></i>
    </div>
    <div class="iq-alert-text text-black">
        <?= session('failed')?>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="ri-close-line text-black"></i>
    </button>
</div>
<?php }?>
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
                        <form action="<?=BASE_URL?>referral/referral/submitfiat_withdraw" method="POST" class="withdraw-form mt-4">
                            <input type="hidden" name="type" value="usa">
                            <div class="form-group">
                                    <label for="amount" class="form-label">Amount to withdraw</label>
                                    <input type="text" id="amount" name="amount" value="<?=number_format($unpaid)?>" class="form-control" readonly />
                            </div>

                            <div class="form-group">
                                <label for="recipient" class="form-label">Recipient Name</label>
                                <input type="text" id="recipient" name="recipient" class="form-control" placeholder="Robin Hood" required />
                            </div>
                        
                            <div class="form-group">
                                <label for="account-number" class="form-label">Account Number</label>
                                <input type="text" id="account-number" name="account-number" class="form-control" placeholder="123456789" required />
                            </div>
                        
                            <div class="form-group">
                                <label for="routing-number" class="form-label">Routing Number</label>
                                <input type="text" id="routing-number" name="routing-number" class="form-control" placeholder="0987654321" required />
                            </div>
                        
                            <div class="form-group d-flex justify-content-center">
                                <label class="form-label me-3">Account Type:</label>
                                <div>
                                    <input type="radio" id="checking" name="account-type" value="checking" checked />
                                    <label for="checking" class="radio-label">Checking</label>
                                </div>
                                <div class="ms-4">
                                    <input type="radio" id="saving" name="account-type" value="saving" />
                                    <label for="saving" class="radio-label">Saving</label>
                                </div>
                            </div>
                        
                            <button type="submit" class="btn btn-withdraw mt-4">Confirm</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
