<div class="app-content row  mb-5 pb-5 pt-5">
    <div class="app-member mx-auto col-12 col-lg-8  border-1 border-white">
        <div class="dash-signal-preview">
            <div class="main-signal-preview d-flex flex-column align-items-center justify-content-center">
                <div class="insturctions d-flex flex-column align-items-center justify-content-center mt-4">
                    <span class="instructions-title">Instructions</span>
                    <?php 
                            $type = explode(" ", $order)[0]; // Get the first word from $order
                            $type = strtolower(trim($type)); // Convert to lowercase and remove extra spaces
                        
                            $backgroundStyle = ($type !== "buy") ? 'background-color:red !important;' : '';
                        ?>
                    <div class="box-insturctions d-flex align-items-center justify-content-between" style="<?= $backgroundStyle ?>">
                        <h5 style="color:white !important;"><?= @$order?></h5>
                    </div>
                </div>
                <div class="signal-preview">
                    <div class="row">
                        <div class="col-6 all-buy">
                            <div class="wrapper-buy">
                                <div class="buy">
                                    <div class="buy-title d-flex justify-content-between align-items-end">
                                        <span class="buy-text">BUY - A</span>
                                        <!-- <span class="buy-date"> 
                                            <?php
                                                $newDate = date('d/m/Y H:i', strtotime(@$buy_a['created_at']));
                                                if(!empty($buy_a)){
                                                    echo $newDate;
                                                }
                                            ?>
                                        </span> -->
                                    </div>
                                    <?php if(!empty($buy_a)){?>
                                        <input type="text" class="price-input" value="<?= @$buy_a['entry_price'] ?>" readonly>
                                    <?php }else{?>
                                        <input type="text" value="-" readonly>
                                    <?php }?>
                                </div>
                                <div class="buy">
                                    <div class="buy-title d-flex justify-content-between align-items-end">
                                        <span class="buy-text">BUY - B</span>
                                        <!-- <span class="buy-date">
                                            <?php
                                                $newDate = date('d/m/Y H:i', strtotime(@$buy_b['created_at']));
                                                if(!empty($buy_b)){
                                                    echo $newDate;
                                                }
                                            ?>
                                        </span> -->
                                    </div>
                                    <?php if(!empty($buy_b)){?>
                                        <input type="text" class="price-input" value="<?= @$buy_b['entry_price'] ?>" readonly>
                                    <?php }else{?>
                                        <input type="text" value="-" readonly>
                                    <?php }?>
                                </div>
                                <div class="buy">
                                    <div class="buy-title d-flex justify-content-between align-items-end">
                                        <span class="buy-text">BUY - C</span>
                                        <!-- <span class="buy-date"> 
                                        <?php
                                            $newDate = date('d/m/Y H:i', strtotime(@$buy_c['created_at']));
                                            if(!empty($buy_c)){
                                                echo $newDate;
                                            }
                                        ?>
                                        </span> -->
                                    </div>
                                    <?php if(!empty($buy_c)){?>
                                        <input type="text" class="price-input" value="<?= @$buy_c['entry_price'] ?>" readonly>
                                    <?php }else{?>
                                        <input type="text" value="-" readonly>
                                    <?php }?>
                                   
                                </div>
                                <div class="buy">
                                    <div class="buy-title d-flex justify-content-between align-items-end">
                                        <span class="buy-text">BUY - D</span>
                                        <!-- <span class="buy-date"> 
                                            <?php
                                                $newDate = date('d/m/Y H:i', strtotime(@$buy_d['created_at']));
                                                if(!empty($buy_d)){
                                                    echo $newDate;
                                                }
                                            ?>
                                        </span> -->
                                    </div>
                                    <?php if(!empty($buy_d)){?>
                                        <input type="text" class="price-input" value="<?= @$buy_d['entry_price'] ?>" readonly>
                                    <?php }else{?>
                                        <input type="text" value="-" readonly>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 all-sell">
                            <div class="wrapper-sell">
                                <div class="sell">
                                    <div class="sell-title d-flex justify-content-between align-items-end">
                                        <span class="sell-text">Sell - A</span>
                                        <!-- <span class="sell-date">
                                            <?php
                                                $newDate = date('d/m/Y H:i', strtotime(@$sell_a['created_at']));
                                                if(!empty($sell_a)){
                                                    echo $newDate;
                                                }
                                            ?>
                                        </span> -->
                                    </div>
                                    <?php if(!empty($sell_a)){?>
                                        <input type="text" class="price-input" value="<?= @$sell_a['entry_price'] ?>" readonly>
                                    <?php }else{?>
                                        <input type="text" value="-" readonly>
                                    <?php }?>
                                </div>
                                <div class="sell">
                                    <div class="sell-title d-flex justify-content-between align-items-end">
                                        <span class="sell-text">Sell - B</span>
                                        <!-- <span class="sell-date">
                                            <?php
                                                $newDate = date('d/m/Y H:i', strtotime(@$sell_b['created_at']));
                                                if(!empty($sell_b)){
                                                    echo $newDate;
                                                }
                                            ?>
                                        </span> -->
                                    </div>
                                    <?php if(!empty($sell_b)){?>
                                        <input type="text" class="price-input" value="<?= @$sell_b['entry_price'] ?>" readonly>
                                    <?php }else{?>
                                        <input type="text" value="-" readonly>
                                    <?php }?>
                                    
                                </div>
                                <div class="sell">
                                    <div class="sell-title d-flex justify-content-between align-items-end">
                                        <span class="sell-text">Sell - C</span>
                                        <!-- <span class="sell-date">
                                            <?php
                                                $newDate = date('d/m/Y H:i', strtotime(@$sell_c['created_at']));
                                                if(!empty($sell_c)){
                                                    echo $newDate;
                                                }
                                            ?>
                                        </span> -->
                                    </div>
                                    <?php if(!empty($sell_c)){?>
                                        <input type="text" class="price-input" value="<?= @$sell_c['entry_price'] ?>" readonly>
                                    <?php }else{?>
                                        <input type="text" value="-" readonly>
                                    <?php }?>
                                </div>
                                <div class="sell">
                                    <div class="sell-title d-flex justify-content-between align-items-end">
                                        <span class="sell-text">Sell - D</span>
                                        <span class="sell-date">
                                            <?php
                                                $newDate = date('d/m/Y H:i', strtotime(@$sell_d['created_at']));
                                                if(!empty($sell_d)){
                                                    echo $newDate;
                                                }
                                            ?>
                                        </span>
                                    </div>
                                    <?php if(!empty($sell_d)){?>
                                        <input type="text" class="price-input" value="<?= @$sell_d['entry_price'] ?>" readonly>
                                    <?php }else{?>
                                        <input type="text" value="-" readonly>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="instructions">USE 25% OF YOUR TOTAL CAPITAL FOR EACH TIME YOU OPEN AN ORDER.</p>
                <div class="container mt-5">
                  <div class="row justify-content-center">
                    <div class="col-12">
                      <div class="capital-container">
                        <div class="row">
                          <div class="col-12 col-md-4 d-flex flex-column align-items-center justify-content-center">
                            <h5>Total Capital</h5>
                            <div class="capital-input d-flex align-items-center">
                              <button onclick="changeValue(-1000)" id="decreaseButton">-</button>
                              <input type="number" id="totalCapital" value="10000" readonly>
                              <button onclick="changeValue(1000)" id="increaseButton">+</button>
                            </div>
                          </div>
                          <div class="col-md-8 mt-2 mt-lg-0">
                            <table>
                              <tbody>
                                <tr>
                                  <td>BUY A</td>
                                  <td class="price" id="buyA">2500</td>
                                </tr>
                                <tr>
                                  <td>BUY B</td>
                                  <td class="price"  id="buyB">2500</td>
                                </tr>
                                <tr>
                                  <td>BUY C</td>
                                  <td class="price" id="buyC">2500</td>
                                </tr>
                                <tr>
                                  <td>BUY D</td>
                                  <td class="price" id="buyD">2500</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="text-center mt-3">
                          <button class="save-btn" id="saveButton" onclick="saveCapital()" disabled>Save</button>
                          <p class="saved-message" id="savedMessage" style="display:none;">Value saved and locked!</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>