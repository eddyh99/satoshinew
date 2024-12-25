
<?php if(!empty(session('failed'))) { ?>
<div class="alert alert-success fade show position-absolute" style="top: 1rem; right: 1rem; width: 30%; z-index: 99999;" role="alert">
    <div class="iq-alert-icon">
        <i class="ri-information-line"></i>
    </div>
    <div class="iq-alert-text text-black">
        <?= session('success')?>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="ri-close-line text-black"></i>
    </button>
</div>
<?php }?>

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
        <div class="row content-body">
            <div class="col-12">
                <div class="referral-box">
                    <span>Referral Link:&nbsp;&nbsp;</span>
                    <span class="referral-link">
                        <?=$_SESSION["logged_user"]->refcode?>
                    </span>
                    <input  id="reftext" type="hidden" readonly class="referral-link" value="<?=$_SESSION["logged_user"]->refcode?>">
                    <button id="qrbutton" class="qr-button">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.16675 12.5C3.39018 12.5 3.00189 12.5 2.69561 12.3731C2.28723 12.204 1.96277 11.8795 1.79362 11.4711C1.66675 11.1649 1.66675 10.7766 1.66675 10V4.33333C1.66675 3.39991 1.66675 2.9332 1.8484 2.57668C2.00819 2.26308 2.26316 2.00811 2.57676 1.84832C2.93328 1.66666 3.39999 1.66666 4.33341 1.66666H10.0001C10.7767 1.66666 11.1649 1.66666 11.4712 1.79353C11.8796 1.96269 12.2041 2.28714 12.3732 2.69553C12.5001 3.00181 12.5001 3.39009 12.5001 4.16666M10.1667 18.3333H15.6667C16.6002 18.3333 17.0669 18.3333 17.4234 18.1517C17.737 17.9919 17.992 17.7369 18.1518 17.4233C18.3334 17.0668 18.3334 16.6001 18.3334 15.6667V10.1667C18.3334 9.23324 18.3334 8.76653 18.1518 8.41001C17.992 8.09641 17.737 7.84144 17.4234 7.68165C17.0669 7.5 16.6002 7.5 15.6667 7.5H10.1667C9.23333 7.5 8.76662 7.5 8.4101 7.68165C8.09649 7.84144 7.84153 8.09641 7.68174 8.41001C7.50008 8.76653 7.50008 9.23324 7.50008 10.1667V15.6667C7.50008 16.6001 7.50008 17.0668 7.68174 17.4233C7.84153 17.7369 8.09649 17.9919 8.4101 18.1517C8.76662 18.3333 9.23333 18.3333 10.1667 18.3333Z" stroke="#8a6d3b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                    </button>
                </div>
            </div>
            <div class="col-lg-12 mt-2">
                <div class="dash-statistics">
                    <a href="<?= BASE_URL?>referral/referral" class="col-6">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="d-flex flex-column justify-content-center align-items-start">
                                    <div>
                                        <h5 class="text-black">Total Referral</h5>
                                    </div>
                                    <div class="mt-3 w-100 d-flex justify-content-end">
                                        <h1 class="text-black fw-bold"><?= @$referral?></h1>
                                    </div>
                                </div>
                                <div class="<?= ((base64_decode(@$_GET["type"]) == "free_member" || base64_decode(@$_GET["type"]) == "referral_member") ? "disable" : "active" )?>"></div>
                            </div>
                        </div>
                    </a>
                    <a href="<?= BASE_URL?>referral/referral/withdraw" class="col-6">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="d-flex flex-column justify-content-center align-items-start">
                                    <div>
                                        <h5 class="text-black">Commission</h5>
                                    </div>
                                    <div class="mt-3 w-100 d-flex justify-content-end">
                                        <h1 class="text-black fw-bold">$<?= @number_format($unpaid)?></h1>
                                    </div>
                                </div>
                                <div class="<?= ((base64_decode(@$_GET["type"]) == "free_member") ? "active" : "disable" )?>"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-12 dash-table-totalmember">
                <h4 class="text-white my-3 text-uppercase fw-bold">History</h4>
                <table id="table_totalmember" class="table table-striped" style="width:100%">
                    <thead class="thead_totalmember">
                        <tr>
                            <th>WITHDRAW DATE</th>
                            <th>AMOUNT</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
