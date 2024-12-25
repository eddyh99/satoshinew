<!-- Sign in Start -->
<section class="sign-in-page">
    <div class="container p-0" id="sign-in-page-box">
        <div class="bg-white form-container sign-in-container">
            <?php if(!empty(session('failed'))) { ?>
            <div id="failed-alert" class="alert alert-danger fade show position-absolute" style="top: 1rem; left: 1rem; width: 90%;" role="alert">
                <div class="iq-alert-icon">
                    <i class="ri-information-line"></i>
                </div>
                <div class="iq-alert-text">
                    <?= session('failed')?>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ri-close-line text-black"></i>
                </button>
            </div>
            <?php }?>
            <div class="sign-in-page-data">
                <div class="sign-in-from w-100 m-auto">
                    <h1 class="mb-3 text-center text-black">Create Password</h1>
                    <p class="text-center text-dark">Create new Password and Activate Your Account</p>
                    <form action="<?= BASE_URL?>referral/auth/activate" method="POST" class="mt-4">
                        <div class="form-group">
                            <label for="exampleInputEmail2">Email address</label>
                            <input type="email" class="form-control mb-0" name="email" id="exampleInputEmail2" placeholder="Enter email" value="<?=$email?>">
                        </div>
                        <div class="form-group position-relative">
                            <div>
                                <label for="exampleInputPassword2">Password</label>
                                <input type="password" class="form-control mb-0" name="password" id="password" placeholder="Password">
                            </div>
                            <i class="icon-pass-login las la-eye" id="togglePassword"></i>
                        </div>
                        <div class="form-group position-relative">
                            <div>
                                <label for="exampleInputPassword2">Re-Type Password</label>
                                <input type="password" class="form-control mb-0" name="confpassword" id="confpassword" placeholder="Retype Password">
                            </div>
                            <i class="icon-pass-login las la-eye" id="toggleConf"></i>
                        </div>
                        <div class="sign-info">
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <a href="<?=BASE_URL?>"><img src="<?= BASE_URL?>assets/img/logo-satoshi.png" class="logo-signin" alt="logo"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sign in END -->
