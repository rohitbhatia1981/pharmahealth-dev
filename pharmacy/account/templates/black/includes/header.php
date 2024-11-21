<?php
if ($_SESSION['sess_pharmacy_name']!="")
{
	$fullName = $_SESSION['sess_pharmacy_name'];
	$nameParts = explode(' ', $fullName);
	$firstInitial = strtoupper(substr($nameParts[0], 0, 1));
	$lastInitial = isset($nameParts[1]) ? strtoupper(substr($nameParts[1], 0, 1)) : '';
	
}
?>

						<!--app header-->
						<div class="app-header header">
							<div class="container-fluid">
								<div class="d-flex">
									<a class="header-brand" href="#">
										<img src="<?php echo URL?>images/pharma-logo-admin.png" class="header-brand-img desktop-lgo" alt="">
										<img src="<?php echo URL?>images/pharma-logo-admin.png" class="header-brand-img dark-logo" alt="">
										<img src="<?php echo URL?>images/pharma-logo-admin.png" class="header-brand-img mobile-logo" alt="">
										<img src="<?php echo URL?>images/pharma-logo-admin.png" class="header-brand-img darkmobile-logo" alt="">
									</a>
									<div class="app-sidebar__toggle" data-toggle="sidebar">
										<a class="open-toggle" href="#">
											<i class="feather feather-menu"></i>
										</a>
										<a class="close-toggle" href="#">
											<i class="feather feather-x"></i>
										</a>
									</div>
									<div class="mt-0" >
                                    
                                   
										<form class="form-inline">
											<div class="search-element">
												<input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1">
												<button class="btn btn-primary-color" >
													<i class="feather feather-search"></i>
												</button>
											</div>
										</form>
                                    
                                     
                                        
                                        
									</div><!-- SEARCH -->
                                    <?php
									$sqlPharmacy="select * from tbl_pharmacies where pharmacy_id='".$database->filter($_SESSION['sess_pharmacy_id'])."'";
								
									$resPharmacy=$database->get_results($sqlPharmacy);
									$rowPharmacy=$resPharmacy[0];
									$logoPharmacy=$rowPharmacy['pharmacy_logo'];
									
									?>
                                    <div style="padding:10px">
                                    <?php if ($logoPharmacy!="") { ?>
                                   	 <img src="<?php echo URL?>images/pharmacies/<?php echo $logoPharmacy?>" style="padding-left:50px;max-height:50px" />
                                    <?php } else { ?>
                                    <h3 style="padding-left:20px"><?php echo $rowPharmacy['pharmacy_name']; ?></h3>
                                    <?php } ?>
                                    </div>
									<div class="d-flex order-lg-2 my-auto ml-auto" >
                                    
                                    
                                    
                                     <div class="col-md-8" style="margin-top:10px">
                                     <a href="javascript:;" id="qrcode" class="modal-effect" data-effect="effect-scale" data-toggle="modal"  data-id="<?php echo $rowProp['property_id']; ?>"><button class="btn btn-pink" type="button"><i class="fa fa-qrcode"> </i>&nbsp;&nbsp;Get your QR Code</button></a>
                                      </div>
                                    <div class="col-md-6">
										<a class="nav-link my-auto icon p-0 nav-link-lg d-md-none navsearch" href="#" data-toggle="search">
											<i class="feather feather-search search-icon header-icon"></i>
										</a>
										<div class="dropdown header-message">
											<!--<a class="nav-link icon" data-toggle="dropdown">
												<i class="feather feather-bell header-icon"></i>
												<span class="badge badge-success side-badge">5</span>
											</a>-->
											<!--<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated">
												<div class="header-dropdown-list message-menu" id="message-menu">
													<a class="dropdown-item border-bottom" href="#">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="../../assets/images/users/1.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Jack Wright</h6>
																	<p class="fs-13 mb-1">New patient registered</p>
																	<div class="small text-muted">
																		3 hours ago
																	</div>
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item border-bottom" href="#">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="../../assets/images/users/2.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Lisa Rutherford</h6>
																	<p class="fs-13 mb-1">Posted a new medical questionnaire</p>
																	<div class="small text-muted">
																		5 hour ago
																	</div>
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item border-bottom" href="#">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="../../assets/images/users/3.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Blake Walker</h6>
																	<p class="fs-13 mb-1">Ordered medicine of &pound;24</p>
																	<div class="small text-muted">
																		45 mintues ago
																	</div>
																</div>
															</div>
														</div>
													</a>
													<a class="dropdown-item border-bottom" href="#">
														<div class="d-flex align-items-center">
															<div class="">
																<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="../../assets/images/users/4.jpg"></span>
															</div>
															<div class="d-flex">
																<div class="pl-3">
																	<h6 class="mb-1">Fiona Morrison</h6>
																	<p class="fs-13 mb-1">Approved a prescription</p>
																	<div class="small text-muted">
																		2 days ago
																	</div>
																</div>
															</div>
														</div>
													</a>
													
												</div>
												<div class=" text-center p-2">
													<a href="#" class="">See All Activites</a>
												</div>
											</div>-->
										</div>
									
										<div class="dropdown profile-dropdown">
											<a href="#" class="nav-link pr-1 pl-0 leading-none" data-toggle="dropdown">
												<span class="circle">
												<?php echo $firstInitial; ?><?php echo $lastInitial; ?>
                                            </span>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
												<div class="p-3 text-center border-bottom">
													<a href="#" class="text-center user pb-0 font-weight-bold"><?php echo ucfirst($_SESSION['sess_pharmacy_name']) ?></a>
													<p class="text-center user-semi-title">Pharmacy Account</p>
												</div>
												
												<!--<a class="dropdown-item d-flex" href="#">
													<i class="feather feather-settings mr-3 fs-16 my-auto"></i>
													<div class="mt-1">Edit Profile</div>
												</a>
												
												<a class="dropdown-item d-flex" href="#" data-toggle="modal" data-target="#changepasswordnmodal">
													<i class="feather feather-edit-2 mr-3 fs-16 my-auto"></i>
													<div class="mt-1">Change Password</div>
												</a>-->
												<a class="dropdown-item d-flex" href="<?php echo URL?><?php echo PHARMACY_ADMIN?>logout.php">
													<i class="feather feather-power mr-3 fs-16 my-auto"></i>
													<div class="mt-1">Sign Out</div>
												</a>
											</div>
                                           </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--/app header-->
                        
                        <div class="modal" id="qrcode-popup">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title" >Download the QR code and share it with patients</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					
								<div id="qrfull-detail"></div>
					
					
				</div>
			</div>
		</div>
        
        