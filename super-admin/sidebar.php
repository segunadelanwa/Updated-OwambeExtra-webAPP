 
 
       <div id="layoutSidenav_nav">
	   
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading" style="color:yellow;font-weight:200 !important;">
							
 
               	<a class="nav-link" href="index.php"> <i class="fa fa-dashboard"></i> &nbsp; Admin Dashboard     </a>
              
			 
							</div> 
							 
							 
				 
						 
							
			
	                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pages_CollapseAuth" aria-expanded="false" aria-controls="pages_CollapseAuth">
                                      <i class="fa fa-gear"></i>  &nbsp; Profile Settings
                                        <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                                    </a>
									
                                    <div class="collapse" id="pages_CollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
										

											
											  <a href="index.php?view-profile"  class="nav-link" > 
											    <i class="fa fa-tag"></i> &nbsp; Profile   
											  </a>  
											  
											  <a href="index.php?photo" class="nav-link" > 
											   <i class="fa fa-tag"></i>  &nbsp;  Photo 
											  </a>  
                             

									 	 <a href="index.php?password_update"  class="nav-link" > 
											  <i class="fa fa-tag"></i> &nbsp; Password
											</a>

											<a class="nav-link" href="account-update.php"> 
											   <i class="fa fa-tag"></i>  &nbsp;Update    
											</a> 
							 
                                        </nav>
                                    </div>	

							 
 


                                 <!--
								<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLoan" aria-expanded="false" aria-controls="collapseLoan">
								<i class="fa fa-money"></i>  &nbsp; Loan  
								<div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
								</a>

								<div class="collapse" id="collapseLoan" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
								<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

								<a href="loan_request.php" style="text-decoration:none"  class="text-white"> <i class="fa fa-money"></i> &nbsp; Request loan   </a>


								
								</nav>
								</div>-->
		
                               
							<a class="nav-link" href="approve_cashout.php">  <i class="fa fa-money"></i>  &nbsp; Unapprove CashOut  </a> 
							<a class="nav-link" href="paid_cashout.php">  <i class="fa fa-money"></i>  &nbsp; Approved CashOut  </a> 
							<a class="nav-link" href="approve_cashout.php">  <i class="fa fa-search"></i> &nbsp;Search User</a> 
							<a class="nav-link" href="approve_cashout.php">  <i class="fa fa-search"></i> &nbsp;Search Event</a> 
							<a class="nav-link" href="wallet_history.php">  <i class="fa fa-history"></i> &nbsp;Transaction  History  </a> 
                             <a class="nav-link" href="open_ticket.php">  <i class="fa fa-mail-forward"></i> &nbsp;Open Ticket  ( <?php echo $superlog->open_ticket();  ?> )</a>
                             <a class="nav-link" href="view_ticket.php">  <i class="fa fa-mail-reply"></i> &nbsp;Close Ticket ( <?php echo $superlog-> close_ticket();  ?> )</a>

 

                               <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div> </a>
								<a class="nav-link" href="logout.php">
								<div class="sb-nav-link-icon"><i class="fa fa-toggle-off"></i></div>
								Logout
								</a> 
                                
                           
                        
 <!-- 
						<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
									
									
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                          
							<div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
-->
                     
                       
                    
                   </div>
                   </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo" $username";?>
                    </div>
                </nav>
            </div>
