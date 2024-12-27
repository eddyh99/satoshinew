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

<div class="container">
        <!-- Title and Subtitle -->
        <div class="text-center">
            <div class="title">GIVEAWAY 2</div>
            <div class="subtitle">"SIGNAL SUCCESS"</div>
        </div>
        <form action="<?=BASE_URL?>referral/referral/submit_giveaway" method="POST">
            <input type="hidden" name="tipe" value="tipe2">
            <div class="link-group">
                <input type="text" class="link-input" name="profile" value="<?=@$profile->profile?>" <?php echo (!empty($profile->profile)?"readonly":"")?>>
                <button class="confirm-button" <?php echo (!empty($profile->profile)?"disabled":"")?>>CONFIRM</button>
            </div>
            <!-- Input Groups -->
            <div class="link-group">
                <input type="text" class="link-input" name="link1" value="<?=@$profile->link1?>" <?php echo (!empty($profile->link1)?"readonly":"")?>>
                <button class="confirm-button" <?php echo (!empty($profile->link1)?"disabled":"")?>>CONFIRM</button>
            </div>
            <div class="link-group">
                <input type="text" class="link-input" name="link2"  value="<?=@$profile->link2?>" <?php echo (!empty($profile->link2)?"readonly":"")?>>
                <button class="confirm-button" <?php echo (!empty($profile->link2)?"disabled":"")?>>CONFIRM</button>
            </div>
            <div class="link-group">
                <input type="text" class="link-input" name="link3" value="<?=@$profile->link3?>" <?php echo (!empty($profile->link3)?"readonly":"")?>>
                <button class="confirm-button" <?php echo (!empty($profile->link3)?"disabled":"")?>>CONFIRM</button>
            </div>
            <div class="link-group">
                <input type="text" class="link-input" name="link4" value="<?=@$profile->link4?>" <?php echo (!empty($profile->link4)?"readonly":"")?>>
                <button class="confirm-button" <?php echo (!empty($profile->link4)?"disabled":"")?>>CONFIRM</button>
            </div>
        </form>
    </div>