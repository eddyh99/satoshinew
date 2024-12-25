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
                    <a class="text-white" href="<?= BASE_URL?>godmode/freemember">BACK</a>
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
                                } ?>
                        </span>
                        <!--<button 
                            id="btnupgrade"
                            class="upgrade-btn" 
                            data-toggle="modal" 
                            data-target="#upgradeModal"
                            <?= (($member->free_status !='free') ? "" : "disabled")?>
                        >  
                            Upgrade
                        </button>-->
                        <a 
                            href="<?=BASE_URL?>godmode/dashboard/cancelfree/<?=base64_encode($member->email)?>"
                            id="btncancel"
                            class="upgrade-btn" 
                            <?= (($member->free_status =='yes') ? "" : "disabled")?>                        >  
                            Cancel
                        </a>
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

                    <!-- Subscription Status -->
                    <div class="label">Free Plan Start Date</div>
                    <div class="value"><?= $member->start_date?></div>

                    <!-- Subscription Status -->
                    <div class="label">Free Plan End Date</div>
                    <div class="value"><?= $member->end_date?></div>

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
                </div>
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