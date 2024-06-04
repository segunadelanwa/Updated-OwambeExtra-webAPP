    
 <aside class="main-sidebar hidden-print ">
     <section class="sidebar" id="sidebar-scroll">
	<div style="display:flex;justify-content:space-between;padding:20px 20px 10px 20px;">
	<a href="my_events.php" lass="col-lg-4 col-md-4"> <i class="icon-event text-warning-color"></i><br><?php echo $loader->event($username);  ?></a>
	<a href="my_giftpage.php" lass="col-lg-4 col-md-4"> <i class="ti-gift text-primary-color"></i><br><?php echo $loader->event($username);  ?></a> 
	<a href="my_proxy_event.php" lass="col-lg-4 col-md-4"> <i class="icon-people text-danger-color"></i> <span><?php echo $loader->proxyAccount($username);  ?></span></a>
	</div>
            <ul class="sidebar-menu">
           <!-- Sidebar Menu-->

	 			
			
	
			
               <center> <li class="nav-level" align="center"><?php echo"$username";?></li></center>
                <li class="active treeview">
                    <a class="waves-effect waves-dark" href="index.php">
                        <i class="icon-home"></i><span> Home</span>
                    </a>                
                </li>
                <li class="nav-level">Setup Event</li>
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-event"></i><span>My Account  </span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="self_event.php"><i class="icon-arrow-right"></i>Setup Event</a></li>
                        <li><a class="waves-effect waves-dark" href="my_events.php"><i class="icon-arrow-right"></i> View My Events</a></li>
                        <li><a class="waves-effect waves-dark" href="wallet_cashout.php"><i class="icon-arrow-right"></i>My Wallet Cashout</a></li> 
                        <li><a class="waves-effect waves-dark" href="account-update.php"><i class="icon-arrow-right"></i>Update Profile</a></li> 
 
                    </ul>
                </li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-wallet"></i><span> Wallet</span><span class="label label-success menu-caption">₦<span><?php echo $loader->wallet($username);  ?></span></span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                  
						</ul>
                </li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-organization"></i><span>Proxy Account</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                           <li><a class="waves-effect waves-dark" href="proxy_event.php"><i class="icon-arrow-right"></i>Setup Proxy Event</a></li>
                   
                        <li><a class="waves-effect waves-dark" href="my_proxy_event.php"><i class="icon-arrow-right"></i> View Proxy Events</a></li>
                                <li><a class="waves-effect waves-dark" href="proxy_cashout.php"><i class="icon-arrow-right"></i>Proxy Wallet Cashout</a></li> 
            
				   </ul>
                </li>
                
            

                <li class="nav-level">--- Transaction</li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="fa fa-money"></i><span> Payment</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li class="treeview"><a href="#!"><i class="icon-arrow-right"></i><span>Cashout History </span><i class="icon-arrow-down"></i></a>
                            <ul class="treeview-menu">
                                <li><a class="waves-effect waves-dark" href="cashout.php" arget="_blank"><i class="icon-arrow-right"></i>Wallets Cashout</a></li>
                               
                            </ul>
                        </li>
                        
 <!--
                        <li class="treeview"><a href="#!"><i class="icon-arrow-right"></i><span>History </span><i class="icon-arrow-down"></i></a>
                            <ul class="treeview-menu">
                                <li><a class="waves-effect waves-dark" href="register1.html" target="_blank"><i class="icon-arrow-right"></i>Transa History</a></li>
                                
                                 
                            </ul>
                        </li>
                        
                        <li><a class="waves-effect waves-dark" href="404.html" target="_blank"><i class="icon-arrow-right"></i>Create Ticket </a></li>
                        <li><a class="waves-effect waves-dark" href="sample-page.html"><i class="icon-arrow-right"></i> Sample Page</a></li>-->
                        
                    </ul>
                </li>


                <li class="nav-level">---check out </li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icofont icofont-company"></i><span>LogOut</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="waves-effect waves-dark" href="logout.php">
                                <i class="icon-arrow-right"></i>
                               Logout
                            </a>
                        </li>
                        <!--
                        <li class="treeview">
                            <a class="waves-effect waves-dark" href="#!">
                                <i class="icon-arrow-right"></i>
                                <span>Level Two</span>
                                <i class="icon-arrow-down"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="waves-effect waves-dark" href="#!">
                                        <i class="icon-arrow-right"></i>
                                        Level Three
                                    </a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-dark" href="#!">
                                        <i class="icon-arrow-right"></i>
                                        <span>Level Three</span>
                                        <i class="icon-arrow-down"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a class="waves-effect waves-dark" href="#!">
                                                <i class="icon-arrow-right"></i>
                                                Level Four
                                            </a>
                                        </li>
                                        <li>
                                            <a class="waves-effect waves-dark" href="#!">
                                                <i class="icon-arrow-right"></i>
                                                Level Four
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    -->
                     </ul>
                </li>
            </ul>
         </section>
 
 </aside>