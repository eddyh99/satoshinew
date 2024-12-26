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
            <div class="col-lg-12">
                <?php if($type == "totalmember"){?>
                    <a class="text-white" href="<?= BASE_URL?>godmode/dashboard">BACK</a>
                <?php }else if($type == "freemember"){?>
                    <a class="text-white" href="<?= BASE_URL?>godmode/dashboard?type=<?=base64_encode("free_member")?>">BACK</a>
                <?php } else if($type == "referralmember") {?>
                    <a class="text-white" href="<?= BASE_URL?>godmode/dashboard?type=<?=base64_encode("referral_member")?>">BACK</a>
                <?php } ?>
            </div>
            <div class="col-lg-10 mx-auto">
                
                <h4 class="text-center"><?= $member->email; ?></h4>

                <!-- Detail -->
                <div class="dash-detailmember">
                    <div class="header">Detail</div>
                    
                    <!-- Membership Status -->
                    <div class="label">Membership Status</div>
                    <div class="value">
                        <span>
                            <?php 
                                if($member->role == "member"){
                                    if($member->free_status!='yes') { ?>
                                        Normal Member
                            <?php   } else {?>
                                        Free Member
                            <?php   } ?>
                            <?php 
                                } else if($member->role == "referral") { 
                            ?>
                                Referral Member
                            <?php } ?>
                        </span>
                        <!--<button 
                            id="btnupgrade"
                            class="upgrade-btn" 
                            data-toggle="modal" 
                            data-target="#upgradeModal"
                            <?= (($member->free_status !='free') ? "" : "disabled")?>
                        >  
                            Upgrade
                        </button>
                        <a 
                            href="<?=BASE_URL?>godmode/dashboard/cancelfree/<?=base64_encode($member->email)?>"
                            id="btncancel"
                            class="upgrade-btn" 
                            <?= (($member->free_status =='free') ? "" : "disabled")?>                        >  
                            Cancel
                        </a>   -->                     
                    </div>
                    
                    <!-- Registration date -->
                    <div class="label">Registration date</div>
                    <div class="value">
                        <?php
                            $dateString = $member->created_at;
                            $date = new DateTime($dateString);
                            $formattedDate = $date->format('d F Y');
                            echo $formattedDate;
                        ?>
                    </div>

                    <!-- Subscription Status -->
                    <div class="label">Subscription Status</div>
                    <div class="value"><?= $member->membership?></div>

                    <!-- Subscription Plan -->
                    <div class="label">Subscription Plan</div>
                    <div class="value">
                        <?php 
                            $totalDays = (int)$member->total_period;
                            $months = floor($totalDays / 30);
                            $days = $totalDays % 30;   
                            
                            if ($member->membership!="expired"){
                                if($months < 1){
                                    echo $days . " Days";
                                }else if($days == 0){
                                    echo $months . " Month";
                                }else{
                                    echo $months . " Month " . $days . " Days";
                                }
                            }else{
                                echo "-";
                            }
                        ?>
                    </div>

                    <!-- Subscription Status -->
                    <div class="label">Referral Code</div>
                    <div class="value"><?= $member->refercode?></div>

                    <!-- Subscription Status -->
                    <div class="label">Referral Link</div>
                    <div class="d-flex flex-row justify-content-start">
                        <input class="me-2" type="text" name="" id="refcode" class="form-control" value="<?=@$member->refcode?>" readonly style="min-width: 28ch;">
                        <a class="btn btn-copy me-2" id="btnref">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.16675 12.5C3.39018 12.5 3.00189 12.5 2.69561 12.3731C2.28723 12.204 1.96277 11.8795 1.79362 11.4711C1.66675 11.1649 1.66675 10.7766 1.66675 10V4.33333C1.66675 3.39991 1.66675 2.9332 1.8484 2.57668C2.00819 2.26308 2.26316 2.00811 2.57676 1.84832C2.93328 1.66666 3.39999 1.66666 4.33341 1.66666H10.0001C10.7767 1.66666 11.1649 1.66666 11.4712 1.79353C11.8796 1.96269 12.2041 2.28714 12.3732 2.69553C12.5001 3.00181 12.5001 3.39009 12.5001 4.16666M10.1667 18.3333H15.6667C16.6002 18.3333 17.0669 18.3333 17.4234 18.1517C17.737 17.9919 17.992 17.7369 18.1518 17.4233C18.3334 17.0668 18.3334 16.6001 18.3334 15.6667V10.1667C18.3334 9.23324 18.3334 8.76653 18.1518 8.41001C17.992 8.09641 17.737 7.84144 17.4234 7.68165C17.0669 7.5 16.6002 7.5 15.6667 7.5H10.1667C9.23333 7.5 8.76662 7.5 8.4101 7.68165C8.09649 7.84144 7.84153 8.09641 7.68174 8.41001C7.50008 8.76653 7.50008 9.23324 7.50008 10.1667V15.6667C7.50008 16.6001 7.50008 17.0668 7.68174 17.4233C7.84153 17.7369 8.09649 17.9919 8.4101 18.1517C8.76662 18.3333 9.23333 18.3333 10.1667 18.3333Z" stroke="#8a6d3b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    <!-- Bonus Member -->
                    <div class="label">Send Bonus</div>
                    <div class="d-flex flex-row justify-content-start">
                        <form id="frmbonus" action="<?=BASE_URL?>godmode/payment/sendbonus" method="POST" onsubmit="return validate()">
                            <input type="hidden" name="email" value="<?=$member->email?>">
                            <input class="me-2" type="number" name="amount" id="bonus" class="form-control"  style="min-width: 28ch;" required>
                            &nbsp;&nbsp;<button class="btn" style="background-color:#8a6d3b;color:white">Send</button>
                        </form>
                    </div>
                </div>
                <!-- Page Content  -->
                <div class="row content-body">
                    <div class="col-lg-12 dash-table-referralmember mt-5">
                        <h4 class="text-white my-3 text-uppercase fw-bold">Referral List</h4>
                        <table id="table_referralmember" class="table table-striped" style="width:100%">
                            <thead class="thead_referralmember">
                                <tr>
                                    <th>EMAIL</th>
                                    <th>STATUS</th>
                                    <th>SUBSCRIPTION</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Upgrade Modal -->
<div class="modal fade" id="upgradeModal" tabindex="-1" aria-labelledby="upgradeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content upgrade-member">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="upgradeModalLabel">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-black" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                    $currentDate = new DateTime();
                    $currentDate->modify('+1 month');
                    $tgl= $currentDate->format('Y-m-d');
                ?>

                <form method="POST" action="<?=BASE_URL?>godmode/dashboard/upgrademember">
                    <input type="hidden" name="email" value="<?=$member->email?>">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <p>You will upgrade this member to FREE</p>
                        <h4 class="my-4"><?= $member->email; ?></h4>
                        <input type="text" name="expired" id="expired" value="<?=$tgl ?>" class="form-control text-black">
                        <button class="btn-modal-upgrade mb-4 mt-4">Upgrade</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>