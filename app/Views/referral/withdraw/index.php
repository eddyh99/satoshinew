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

                        <!-- Withdraw Options -->
                        <span class="withdraw-amount">
                        <h4 class="withdraw-title">Available commission to withdraw</h4>
                        <div class="withdraw-amount">$ <?=number_format($unpaid)?></div>
                        </span>

                        <h4 class="withdraw-option-title">Withdraw option</h4>
                        <a href="<?= BASE_URL ?>referral/referral/local" class="withdraw-option btn">USA Local Bank Transfer</a>
                        <a href="<?= BASE_URL ?>referral/referral/inter" class="withdraw-option btn">International Bank Transfer</a>
                        <a href="<?= BASE_URL ?>referral/referral/usdt" class="withdraw-option btn">USDT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>