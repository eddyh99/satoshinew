<div class="container mt-5">
    <h1 class="giveaway-title">SATOSHI SIGNAL GIVEAWAY</h1>
    <p class="text-center">SATOSHI SIGNAL OFFERS TWO TYPES OF GIVEAWAY:</p>

    <div class="row text-center">
        <!-- Giveaway 1 -->
        <div class="col-md-6 mb-4">
            <a href="<?=BASE_URL?>referral/referral/giveaway1" class="text-decoration-none">
                <div class="card giveaway-card p-4">
                    <div>
                        <h5>GIVEAWAY 1</h5>
                        <p>"REFERRAL SUCCESS"</p>
                        <p>Make a Reel by tagging Satoshi Signal Instagram page where you show: how many subscribers you have achieved by sharing your Referral Link and the earnings you have obtained.</p>
                    </div>
                </div>
            </a>
            <div class="hashtag">#SATOSHISIGNAL</div>
        </div>

        <!-- Giveaway 2 -->
        <div class="col-md-6 mb-4">
            <a href="<?=BASE_URL?>referral/referral/giveaway2" class="text-decoration-none">
                <div class="card giveaway-card p-4">
                    <div>
                        <h5>GIVEAWAY 2</h5>
                        <p>"SIGNAL SUCCESS"</p>
                        <p>Make a Reel by tagging Satoshi Signal Instagram page where you show: the earnings, percentages and benefits that you have obtained with the app of Satoshi Signal.</p>
                    </div>
                </div>
            </a>
            <div class="hashtag">#SATOSHISIGNAL</div>
        </div>
    </div>

    <!-- Giveaway Regulations -->
    <div class="regulations">
        <h4>GIVEAWAY REGULATIONS:</h4>
        <ul>
            <li>TO PARTICIPATE IN THE GIVEAWAY, IT IS MANDATORY TO FOLLOW SATOSHI SIGNAL'S INSTAGRAM ACCOUNT. (LINK)</li>
            <li>THE REEL YOU HAVE CREATED MUST BE KEPT ON YOUR INSTAGRAM PROFILE UNTIL THE GIVEAWAY EXPIRES.</li>
            <li>THE REEL MUST BE SHARED ON YOUR PROFILE STORIES BY TAGGING SATOSHI SIGNAL'S INSTAGRAM PAGE (LINK).</li>
            <li>TO CONFIRM YOUR PARTICIPATION IN THE GIVEAWAY: LOG IN ON THE SATOSHI SIGNAL WEBSITE (LINK) THROUGH THE "REFERRAL LOGIN" BUTTON AND USING THE CREDENTIALS WITH WHICH YOU ACTIVATED THE SUBSCRIPTION PREVIOUSLY. THEN ADD IN THE APPROPRIATE SECTION THE LINK OF YOUR PROFILE(S) INSTAGRAM WITH WHICH YOU PARTICIPATED IN THE GIVEAWAY. FINALLY, ADD THE LINK OF THE INSTAGRAM REEL(S) IN THE APPROPRIATE SECTION.</li>
            <li>AT THE END OF THE GIVEAWAY, THE BEST REELS WILL BE REPOSTED ON SATOSHI SIGNAL'S INSTAGRAM PAGE AND TAGGED AS WINNERS. THEY WILL THEN RECEIVE THE PRIZE WON IN USDT, NETWORK TRC-20, IN THE WALLET ADDED IN THE REFERRAL SECTION.</li>
        </ul>
    </div>
</div>

<script>
    <?php if(!empty(session('failed'))) { ?>
        setTimeout(function() {
            Swal.fire({
                text: `<?= session('failed')?>`,
                showCloseButton: true,
                showConfirmButton: false,
                background: '#FFE4DC',
                color: '#000000',
                position: 'top-end',
                timer: 3000,
                timerProgressBar: true,
            });
        }, 100);
    <?php } else if(!empty(session('success'))) {?>
        setTimeout(function() {
            Swal.fire({
                text: `<?= session('success')?>`,
                showCloseButton: true,
                showConfirmButton: false,
                background: '#E1FFF7',
                color: '#000000',
                position: 'top-end',
                timer: 3000,
                timerProgressBar: true,
            });
        }, 100);
    <?php }?>
    
    <?php if(!empty(session('error_validation'))) { ?>
        setTimeout(function() {
            Swal.fire({
                html: '<?= trim(str_replace('"', '', json_encode($_SESSION['error_validation']))) ?>',
                showCloseButton: true,
                showConfirmButton: false,
                background: '#FFE4DC',
                color: '#000000',
                position: 'top-end',
                timer: 3000,
                timerProgressBar: true,
            });
        }, 100);
    <?php }?>
</script>


