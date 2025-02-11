<!--Page header-->
<div class="page-header d-lg-flex d-block">
			<div class="page-leftheader">
				<h4 class="page-title">Clinician Report</h4>
                <br />
                <a href="javascript:history.back()">Reports</a> > Clinician Report
			</div>
			<div class="page-rightheader ml-md-auto">
				<button type="button" class="btn btn-secondary mr-3" data-toggle="modal" data-target="#excelmodal">
					<i class="las la-file-excel"></i>  Download Excel
				</button>
				
			</div>
		</div>
		<!--End Page header-->

			<!-- Row -->
	<div class="row flex-lg-nowrap">
		<div class="col-12">
        <div class="row">


								<div class="col-md-12 col-xl-4 col-lg-6">
								<div class="card text-center">
									<div class="card-body"> <span>Total Verified Clinician</span>
									  <h1 class=" mb-1 mt-1 font-weight-bold">18</h1>
									 
								  </div>
								</div>
								</div>
                                
                                <div class="col-md-12 col-xl-4 col-lg-6">
								<div class="card text-center">
									<div class="card-body"> <span>Total Hours spent by clinician this month</span>
									  <h1 class=" mb-1 mt-1 font-weight-bold">60</h1>
									 
								  </div>
								</div>
								</div>
                                
                                <div class="col-md-12 col-xl-4 col-lg-6">
								<div class="card text-center">
									<div class="card-body"> <span>This month Clinician Registration</span>
									  <h1 class=" mb-1 mt-1 font-weight-bold">2</h1>
									  
								  </div>
								</div>
								</div>
							
							
							

							
							
							
							
                            
                            
                            
                            
                            
                            
						</div>
			<div class="row flex-lg-nowrap">
				<div class="col-12 mb-3">
					<div class="e-panel card">
						<div class="card-body">
							<div class="e-table">
                            
                            
                            
                            
							<div class="row">
                           
                           						
                                                 
                                             		 <div class="col-md-12 col-lg-12 col-xl-2">
														<div class="form-group">
															<label class="form-label">Registered Date From:</label>
															<div class="input-group">
																<div class="input-group-prepend">
																	
																</div><input class="form-control" name="txtSDate" type="date" value="<?php echo $_GET['txtSDate']?>">
															</div>
														</div>
													</div> 
                                                    
                                                     <div class="col-md-12 col-lg-12 col-xl-2">
														<div class="form-group">
															<label class="form-label">Registered Date To:</label>
															<div class="input-group">
																<div class="input-group-prepend">
																	
																</div><input class="form-control" name="txtEDate" type="date" value="<?php echo $_GET['txtEDate']?>">
															</div>
														</div>
													</div>   
                                                 
                           
											
											
                                            
                                            
                                            
											<div class="col-md-12 col-lg-12 col-xl-2">
												<div class="form-group mt-5">
													<button type="submit" class="btn btn-primary btn-block">Search</button>
                                                    
                                                     <?php $qS=$_SERVER['QUERY_STRING'];
												   if (strstr($qS,"txtSearchByTitle"))
												   {
												    ?>
                                                    <a href="" style="font-size:11px; color:#03C">Reset filter</a>
                                                   <?php } ?>
												</div>
											</div>
										</div>
								<div class="table-responsive table-lg mt-3">
									<table class="table table-bordered border-top text-nowrap" id="example1" width="100%">
										<thead>
											<tr>
													
													<th width="14%" class="border-bottom-0">Clinician Name</th>
                                                   <th width="14%" class="border-bottom-0">Employee Number</th>
                                                   <th width="14%" class="border-bottom-0">Profession</th>  
                                                   <th width="14%" class="border-bottom-0">Email</th>    
                                                   <th width="14%" class="border-bottom-0">Phone</th>   
                                                   <th width="14%" class="border-bottom-0">DOB</th>                                                 
                                                  <th width="14%" class="border-bottom-0">City</th> 
                                                  <th width="14%" class="border-bottom-0">Postcode</th> 
                                                   <th width="19%" class="border-bottom-0">Date</th>
                                                
                                               
											</tr>
										</thead>
							


									
							<tbody>
								
                 		<tr>
                        	<td style="color:#039;font-weight:bold">Ricky Paul</td>
                           
                            <td>E2939434</td>
                            <td>Doctor</td>
                            <td>rocky233@gmail.com</td>
                            <td>+44892330343</td>
                            <td>04/04/1980</td>
                          
                            <td>London</td>
                            <td>IL 0303</td>
                           
                            <td>05/05/2024</td>
                           
                        </tr> 
                        
                              
                                


	

			
							
							</tbody>
											</table>

											

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->

		</div>
	</div><!-- end app-content-->
</div>
				
            
            <!--Excel Modal -->
			<div class="modal fade"  id="excelmodal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Select Month & Year</h5>
							<button  class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label class="form-label">Month:</label>
								<select name="attendance"  class="form-control custom-select select2" data-placeholder="Select Month">
									<option label="Select Month"></option>
									<option value="1">January</option>
									<option value="2">February</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
							</div>
							<div class="form-group">
								<label class="form-label">Year:</label>
								<select name="attendance"  class="form-control custom-select select2" data-placeholder="Select Year">
									<option label="Select Year"></option>
									<option value="1">2024</option>
									<option value="2">2023</option>
									<option value="3">2022</option>
									<option value="4">2021</option>
									<option value="5">2020</option>
									<option value="6">2019</option>
									<option value="7">2018</option>
									<option value="8">2017</option>
									<option value="9">2016</option>
									<option value="10">2015</option>
									<option value="11">2014</option>
									<option value="12">2013</option>
									<option value="13">2012</option>
									<option value="14">2011</option>
									<option value="15">2019</option>
									<option value="16">2010</option>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn btn-outline-danger" data-dismiss="modal">Close</a>
							<a href="#" class="btn btn-primary">Download</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End Excel Modal  -->