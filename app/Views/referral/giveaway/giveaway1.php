<?php if(!empty(session('success'))) { ?>
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
            <div class="col-12 justify-content-center">
                <h1 class="title">GIVEAWAY 1</h1>
                <p class="subtitle">"REFERRAL SUCCESS"</p>
            </div>
            <div class="col-12">
                <form action="<?=BASE_URL?>referral/referral/submit_giveaway" method="POST">
                    <input type="hidden" name="tipe" value="tipe1">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-white">Your Profile Link</div>
                        </div>
                        <div class="col-12">
                            <div class="link-group">
                                <input type="text" class="link-input" name="profile" value="<?=@$profile->profile?>" <?php echo (!empty($profile->profile)?"readonly":"")?>>
                                <button class="confirm-button" <?php echo (!empty($profile->profile)?"disabled":"")?>>CONFIRM</button>
                            </div>
                        </div>
                    </div>
                    <!-- Input Groups -->
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-white">Reel Link 1</div>
                        </div>
                        <div class="col-12">
                            <div class="link-group">
                                <input type="text" class="link-input" name="link1" value="<?=@$profile->link1?>" <?php echo (!empty($profile->link1)?"readonly":"")?>>
                                <button class="confirm-button" <?php echo (!empty($profile->link1)?"disabled":"")?>>CONFIRM</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-white">Reel Link 2</div>
                        </div>
                        <div class="col-12">
                            <div class="link-group">
                                <input type="text" class="link-input" name="link2"  value="<?=@$profile->link2?>" <?php echo (!empty($profile->link2)?"readonly":"")?>>
                                <button class="confirm-button" <?php echo (!empty($profile->link2)?"disabled":"")?>>CONFIRM</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-white">Reel Link 3</div>
                        </div>
                        <div class="col-12">
                            <div class="link-group">
                                <input type="text" class="link-input" name="link3" value="<?=@$profile->link3?>" <?php echo (!empty($profile->link3)?"readonly":"")?>>
                                <button class="confirm-button" <?php echo (!empty($profile->link3)?"disabled":"")?>>CONFIRM</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-white">Reel Link 4</div>
                        </div>
                        <div class="col-12">
                            <div class="link-group">
                                <input type="text" class="link-input" name="link4" value="<?=@$profile->link4?>" <?php echo (!empty($profile->link4)?"readonly":"")?>>
                                <button class="confirm-button" <?php echo (!empty($profile->link4)?"disabled":"")?>>CONFIRM</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>