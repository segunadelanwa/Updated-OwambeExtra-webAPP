            <div class="row dashboard-header">
               <div class="col-lg-3 col-md-6">
			    <a href="my_events.php">
                  <div class="card dashboard-product">
                     <span>My Events</span>
                     <h2 class="dashboard-total-products"><?php echo $loader->event($username);  ?></h2>
                     <span class="label label-warning">Total</span>Events
                     <div class="side-box">
                        <i class="icon-event text-warning-color"></i>
                     </div>
                  </div>
				  </a>
               </div>
               <div class="col-lg-3 col-md-6">
			   <a href="my_giftpage.php">
                  <div class="card dashboard-product">
                     <span>My Gifts </span>
                     <h2 class="dashboard-total-products"><?php echo $loader->myGift($username);  ?></h2>
                     <span class="label label-primary">Total</span>Gift Received
                     <div class="side-box ">
                        <i class="ti-gift text-primary-color"></i>
                     </div>
                  </div>
              </a>
			  </div>
               <div class="col-lg-3 col-md-6">
			     <a href="wallet_cashout.php">
                  <div class="card dashboard-product">
                     <span>My Wallet</span>
                     <h2 class="dashboard-total-products">₦<span><?php echo $loader->wallet($username);  ?></span></h2>
                     <span class="label label-success">My</span>Bal
                     <div class="side-box">
                        <i class="icon-wallet text-success-color"></i>
                     </div>
                  </div>
				  </a>
               </div>
			   
               <div class="col-lg-3 col-md-6">
			    <a href="my_proxy_event.php">
                  <div class="card dashboard-product">
                     <span>Proxy Events</span>
                     <h2 class="dashboard-total-products"><span><?php echo $loader->proxyAccount($username);  ?></span></h2>
                     <span class="label label-danger">Total</span>Proxy Event
                     <div class="side-box">
                        <i class="icon-people text-danger-color"></i>
                     </div>
                  </div>
				  </a>
               </div>
			   
            </div>
 