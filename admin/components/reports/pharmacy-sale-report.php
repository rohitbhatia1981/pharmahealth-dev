<div class="page-header d-lg-flex d-block">
			<div class="page-leftheader">
				<h4 class="page-title">Pharmacy wise Sales Report</h4>
                <br />
                <a href="javascript:history.back()">Reports</a> > Sales by Pharmacies
			</div>
			<div class="page-rightheader ml-md-auto">
            <?php $queryString=$_SERVER['QUERY_STRING']; ?>
				<button type="button" class="btn btn-secondary mr-3" onclick="window.location='export/pharmacy-sales-report-export.php?<?php echo $queryString?>'">
					<i class="las la-file-excel"></i>  Download Excel Report
				</button>
				
			</div>
		</div>
		<!--End Page header-->

			<!-- Row -->
	<div class="row flex-lg-nowrap">
		<div class="col-12">
        
			<div class="row flex-lg-nowrap">
				<div class="col-12 mb-3">
					<div class="e-panel card">
						<div class="card-body">
							<div class="e-table">
                            
                            
                            
                            <form action="" method="GET">
							<div class="row">
                           
                             	<input type="hidden" name="c" value="<?php echo $_GET['c']?>" />
                                <input type="hidden" name="task" value="<?php echo $_GET['task']?>" />
                           						
                                                 
                                             		 <div class="col-md-12 col-lg-12 col-xl-2">
														<div class="form-group">
															<label class="form-label">Start Date:</label>
															<div class="input-group">
																<div class="input-group-prepend">
																	
																</div><input class="form-control" name="txtSDate" type="date" value="<?php echo $_GET['txtSDate']?>">
															</div>
														</div>
													</div> 
                                                    
                                                     <div class="col-md-12 col-lg-12 col-xl-2">
														<div class="form-group">
															<label class="form-label">End Date:</label>
															<div class="input-group">
																<div class="input-group-prepend">
																	
																</div><input class="form-control" name="txtEDate" type="date" value="<?php echo $_GET['txtEDate']?>">
															</div>
														</div>
													</div>   
                                                 
                           
                           
											
											
											<div class="col-md-12 col-lg-12 col-xl-3">
												<div class="form-group">
													<label class="form-label">Filter by Pharmacy</label>
                                                  
                                                   <?php 
												   	$sqlPharmacy="select pharmacy_id,pharmacy_name from tbl_pharmacies where pharmacy_status=1 order by pharmacy_name";
													$resPharmacy=$database->get_results($sqlPharmacy);
													
													 ?>
                                                  
													<select name="cmbPharmacy"  class="form-control" data-placeholder="All">
													<option value="">All Pharmacies</option>
                                                    <?php if (count($resPharmacy)>0)
													{
														for ($j=0;$j<count($resPharmacy);$j++)
														{
															$rowPharmacy=$resPharmacy[$j];
														?>
                                                   			 <option value="<?php echo $rowPharmacy['pharmacy_id']?>" <?php if ($rowPharmacy['pharmacy_id']==$_GET['cmbPharmacy']) echo "selected"; ?>><?php echo $rowPharmacy['pharmacy_name']; ?></option>
                                                   <?php }
													}	?>
													</select>
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
                                          </form>
                                    
                                        
								<div class="table-responsive table-lg mt-3">
									<table class="table table-bordered border-top text-nowrap" id="example1" width="100%">
										<thead>
											<tr>
												<th width="19%" class="border-bottom-0">Pharmacy Name</th>
												<th width="14%" class="border-bottom-0">Pharmacy Detail</th>                                               
                                                <th width="14%" class="border-bottom-0">Sale Amount</th>                                             
                                                
                                                
                                               
											</tr>
										</thead>
							


									
							<tbody>
                     
                     
                      <?php
						$sql = "SELECT pharmacy_id, pharmacy_address,pharmacy_city,pharmacy_postcode,pharmacy_name,pharmacy_o_mobile  from tbl_pharmacies where 1 ";
						
						if ($_GET['cmbPharmacy']!="")
						{
							$sql.=" and pharmacy_id='".$database->filter($_GET['cmbPharmacy'])."'";
						}
						
						
						
						
						
						$sql.=" order by pharmacy_name asc";
						$res=$database->get_results($sql);
						if (count($res)>0)
						{
							
							for ($k=0;$k<count($res);$k++)
							{
								$row=$res[$k];
								
								$address=$row['pharmacy_address'].", ".$row['pharmacy_city'].", ".$row['pharmacy_postcode'];
					?>	
								
                 		<tr>
                        	<td style="color:#039;font-weight:bold"><?php echo $row['pharmacy_name']?></td>
                            <td><?php echo $address ?> <br />
                            Phone: <?php echo $row['pharmacy_o_mobile']?></td>
                            <td><?php echo CURRENCY?><?php 
							if ($_GET['txtSDate']!="")
							$sDate=$_GET['txtSDate'];
							if ($_GET['txtEDate']!="")
							$eDate=$_GET['txtEDate']; 
							echo getPharmacyIncome($row['pharmacy_id'],$sDate,$eDate); ?></td>
                           
                        </tr> 
                        
            	  <?php 	} 
						}?>      
                        
                     

			
							
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
							<h5 class="modal-title">Select Pharmacy, Month & Year</h5>
							<button  class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
                        
                        <div class="form-group">
								<label class="form-label">Pharmacy:</label>
								<select name="attendance"  class="form-control custom-select select2" data-placeholder="Select Pharmacy">
									<option label="Select Pharmacy"></option>
									
								</select>
							</div>
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