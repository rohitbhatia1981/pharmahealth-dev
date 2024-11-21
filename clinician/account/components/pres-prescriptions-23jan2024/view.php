		

		<!------ Listing Function ------------------->

		

		<?php function showRecordsListing(&$rows) { 

		

		global $component,$database,$pagingObject, $page;

		

		$totalRecords = count($rows);

		if ($page != 1)    

			$srno = (1 * $page) - 1;

		else

			$srno = 0;

		

		$sqlmenuid = "select * from tbl_components where component_option='".$database->filter($_GET['c'])."'";

			$getmenuid = $database->get_results( $sqlmenuid );

			//print_r($getmenuid);

			$menuid = $getmenuid[0]; 

		$sqlpermission="select * from tbl_rights_groups where rights_group_id='".$_SESSION['sess_prescriber_groupid']."' and rights_menu_id='".$menuid['component_id']."'";

			$permissions = $database->get_results( $sqlpermission );

			$permission = $permissions[0];
			
			

		?>	
	
    <style>
.circle-red {
  width: 40px;
  height: 40px;
  background: red;
  border-radius: 50%
}
</style>	
<form name="adminForm" action="?c=<?php echo $component?>" method="get">


<!--Page header-->
<div class="page-header d-lg-flex d-block">
			<div class="page-leftheader">
				<h4 class="page-title"><?php echo pageheading(); ?></h4>
			</div>
			<div class="page-rightheader ml-md-auto">
				
				
			</div>
		</div>
		<!--End Page header-->
<div class="row">


							<div class="col-xl-2 col-lg-6 col-md-12" >
								<div class="card">
									
										<div class="card-body">
											<div class="row">
												<div class="col-7" style="cursor:pointer" onclick="window.location='?c=pres-prescriptions&cmbPeriod=6&cmbCategory=7&ty=s'">
													<div class="mt-0 text-left">
														<span class="fs-16 font-weight-semibold">All</span>
														<h3 class="mb-0 mt-1 text-primary  fs-25"><?php
													$statsSql = "SELECT * FROM tbl_prescriptions where 1 and pres_date > '".$oldDate."' and pres_stage>0";
													$stats = $database->get_results( $statsSql );
													echo $statsCount = count($stats);
									
													?></h3>
													</div>
												</div>
												<div class="col-5">
													<div class="icon1 bg-primary-transparent my-auto  float-right"> <i class="feather feather-clipboard"></i> </div>
												</div>
											</div>
										</div>
									
								</div>
							</div>

							<div class="col-xl-2 col-lg-6 col-md-12">
								<div class="card">
									
                                   
                                    
										<div class="card-body">
											<div class="row">
                                            
												<div class="col-7" style="cursor:pointer" onclick="window.location='?c=pres-prescriptions&cmbPeriod=6&cmbCategory=1&ty=s'">
													<div class="mt-0 text-left">
														<span class="fs-16 font-weight-semibold">Pending</span>
														<h3 class="mb-0 mt-1 text-danger  fs-25">
                                                        
                                                        <?php
													$daysDe=365;
													$strDays='P'.$daysDe.'D';
													$today = new DateTime();
													$interval = new DateInterval($strDays);
													$oldDate = $today->sub($interval)->format('Y-m-d');
													
													 $statsSql = "SELECT * FROM tbl_prescriptions where 1 and (pres_date > '".$oldDate."' and pres_stage='1') || (pres_stage=2 && pres_patient_query_status=1) ";
													$stats = $database->get_results( $statsSql );
													echo $statsCount = count($stats);
									
													?>
                                                        
                                                        
                                                        </h3>
													</div>
												</div>
												<div class="col-5">
													<div class="icon1 bg-danger-transparent my-auto  float-right"> <i class="feather feather-briefcase"></i> </div>
												</div>
											</div>
										</div>
									
								</div>
							</div>
							<div class="col-xl-2 col-lg-6 col-md-12" >
								<div class="card">
									
										<div class="card-body">
											<div class="row">
												<div class="col-7" style="cursor:pointer" onclick="window.location='?c=pres-prescriptions&cmbPeriod=6&cmbCategory=2&ty=s'">
													<div class="mt-0 text-left">
														<span class="fs-16 font-weight-semibold">Query</span>
														<h3 class="mb-0 mt-1 text-primary  fs-25"><?php
													$statsSql = "SELECT * FROM tbl_prescriptions where 1 and (pres_date > '".$oldDate."' and pres_stage='2')";
													$stats = $database->get_results( $statsSql );
													echo $statsCount = count($stats);
									
													?></h3>
													</div>
												</div>
												<div class="col-5">
													<div class="icon1 bg-primary-transparent my-auto  float-right"> <i class="feather feather-clipboard"></i> </div>
												</div>
											</div>
										</div>
									
								</div>
							</div>
							
							<div class="col-xl-2 col-lg-6 col-md-12">
								<div class="card">
									
										<div class="card-body">
											<div class="row">
												<div class="col-7" style="cursor:pointer" onclick="window.location='?c=pres-prescriptions&cmbPeriod=6&cmbCategory=6&ty=s'">
													<div class="mt-0 text-left">
														<span class="fs-15 font-weight-semibold">Approved</span>
														<h3 class="mb-0 mt-1 text-success fs-25">
                                                        
                                                         <?php
													$statsSql = "SELECT * FROM tbl_prescriptions where 1 and (pres_date > '".$oldDate."' and (pres_stage=6 || pres_stage=3)) ";
													$stats = $database->get_results( $statsSql );
													echo $statsCount = count($stats);
									
													?>
                                                        
                                                        </h3>
													</div>
												</div>
												<div class="col-5">
													<div class="icon1 bg-success-transparent my-auto  float-right"> <i class="feather feather-check"></i> </div>
												</div>
											</div>
										</div>
									
								</div>
							</div>
                            
                            <div class="col-xl-2 col-lg-6 col-md-12">
								<div class="card">
									
										<div class="card-body">
											<div class="row">
												<div class="col-7" style="cursor:pointer" onclick="window.location='?c=pres-prescriptions&cmbPeriod=6&cmbCategory=5&ty=s'">
													<div class="mt-0 text-left">
														<span class="fs-15 font-weight-semibold">Cancelled</span>
														<h3 class="mb-0 mt-1 text-danger fs-25">
                                                        
                                                         <?php
													 $statsSql = "SELECT * FROM tbl_prescriptions where 1 and (pres_date > '".$oldDate."' and pres_stage='5') ";
													$stats = $database->get_results( $statsSql );
													print $statsCount = count($stats);
									
													?>
                                                        
                                                        </h3>
													</div>
												</div>
												<div class="col-5">
													<div class="icon1 bg-danger-transparent my-auto  float-right"> <i class="feather feather-x"></i> </div>
												</div>
											</div>
										</div>
									
								</div>
							</div>
                            
                            <div class="col-xl-2 col-lg-6 col-md-12">
								<div class="card">
									
										<div class="card-body">
											<div class="row">
												<div class="col-7" style="cursor:pointer" onclick="window.location='?c=pres-prescriptions&cmbPeriod=6&cmbCategory=4&ty=s'">
													<div class="mt-0 text-left">
														<span class="fs-16 font-weight-semibold">Rejected</span>
														<h3 class="mb-0 mt-1 text-warning  fs-25">
                                                        
                                                        <?php
													$statsSql = "SELECT * FROM tbl_prescriptions where 1 and (pres_date > '".$oldDate."' and pres_stage='4') ";
													$stats = $database->get_results( $statsSql );
													echo $statsCount = count($stats);
									
													?>
                                                        
                                                        </h3>
													</div>
												</div>
												<div class="col-5">
													<div class="icon1 bg-secondary-transparent my-auto  float-right"> <i class="feather feather-info"></i> </div>
												</div>
											</div>
										</div>
									
								</div>
							</div>
                            
						</div>
			<!-- Row -->
            <div class="col-12">
        <div class="tab-menu-heading hremp-tabs p-0 ">
        <div class="tabs-menu1">
										<!-- Tabs -->
										<ul class="nav panel-tabs">
                                        <li><a href="?c=<?php echo $_GET['c']?>"  <?php if ($_GET['ty']=="") { ?> class="active" <?php } ?> >My Prescription Task</a></li>
										<li ><a href="?c=<?php echo $_GET['c']?>&ty=s" <?php if ($_GET['ty']=="s") { ?> class="active" <?php } ?>>Global Prescription <?php $trUnassign=getUnassignedTotal(); if ($trUnassign>0) { ?><span class="badge badge-danger side-badge"><?php echo $trUnassign; ?></span><?php } ?></a></li>
                                        <li ><a href="?c=<?php echo $_GET['c']?>&ty=od" <?php if ($_GET['ty']=="od") { ?> class="active" <?php } ?>>Overdue <?php  $trOd=getOverDueTotal(); if ($trOd>0) { ?><span class="badge badge-danger side-badge"><?php echo $trOd; ?></span> <font style="color:red; font-size:10px">+ 3 days</font><?php } ?></a></li>
                                            
                                            
                                            
											
											
											
										</ul>
									</div>
             </div>
             
             </div>
	<div class="row flex-lg-nowrap">
		<div class="col-12">
			<div class="row flex-lg-nowrap">
				<div class="col-12 mb-3">
					<div class="e-panel card">
						<div class="card-body">
                        
							<div class="e-table">
                            
                            
                          
                            
							<div class="row">
                            
                            
           
                           
                           					<div class="col-md-12 col-lg-12 col-xl-4">
                                            
                                            
														<div class="form-group">
															<label class="form-label">Search</label>
															<div class="input-group">
																<div class="input-group-prepend">
																	
																</div><input class="form-control" name="txtSearchByTitle" type="text" value="<?php echo $_GET['txtSearchByTitle']?>" placeholder="Search by Order No., Full Name, Date of Birth">
															</div>
														</div>
													</div>
                                                 
                                           <?php if ($_GET['ty']!='od') { ?>      
                                            <div class="col-md-12 col-lg-12 col-xl-3">
												<div class="form-group">
													<label class="form-label">Period:</label>
                                                    
                                                  
                                                    
													<select name="cmbPeriod"  class="form-control custom-select select2" data-placeholder="All" onchange="form.submit()">
														<option value="1" <?php if ($_GET['cmbPeriod']==1) echo "selected"; ?>>Last 14 days</option>
                                                        <option value="2" <?php if ($_GET['cmbPeriod']==2) echo "selected"; ?>>Last 30 days</option>
                                                        <option value="3" <?php if ($_GET['cmbPeriod']==3) echo "selected"; ?>>Last 90 days</option>
                                                        <option value="4" <?php if ($_GET['cmbPeriod']==4) echo "selected"; ?>>Last 180 days</option>
                                                        <option value="6" <?php if ($_GET['cmbPeriod']==6) echo "selected"; ?>>Last 365 days</option>
                                                        <!--<option value="5" <?php if ($_GET['cmbPeriod']==5) echo "selected"; ?>>All Orders</option>-->
                                                        
                                                       
                                                        
														
													</select>
												</div>
											</div>     
                           
                           				
											
											
											<div class="col-md-12 col-lg-12 col-xl-3">
												<div class="form-group">
													<label class="form-label">Filter by Status:</label>
                                                    
                                                  
                                                    
													<select name="cmbCategory"  class="form-control custom-select select2" data-placeholder="All" onchange="form.submit()">
														
                                                        <option value="1" <?php if ($_GET['cmbCategory']==1) echo "selected"; ?>>Pending / Query to be responded</option>
                                                        <option value="2" <?php if ($_GET['cmbCategory']==2) echo "selected"; ?>>Query</option>
                                                        <option value="4" <?php if ($_GET['cmbCategory']==4) echo "selected"; ?>>Rejected</option>
                                                        <option value="6" <?php if ($_GET['cmbCategory']==6) echo "selected"; ?>>Approved</option>
                                                        <option value="5" <?php if ($_GET['cmbCategory']==5) echo "selected"; ?>>Cancelled</option>
                                                        <option value="7" <?php if ($_GET['cmbCategory']=="7") echo "selected"; ?>>All</option>
														
													</select>
												</div>
											</div>
                                            <?php } ?>
											<div class="col-md-12 col-lg-12 col-xl-1">
												<div class="form-group mt-5">
                                                <input type="hidden" name="ty" value="<?php echo $_GET['ty']?>" />
													<button type="submit" class="btn btn-primary btn-block">Search</button>
                                                    
                                                     <?php $qS=$_SERVER['QUERY_STRING'];
												   if (strstr($qS,"txtSearchByTitle"))
												   {
													   
												    ?>
                                                    <a href="?c=<?php echo $_GET['c']?>&ty=<?php echo $_GET['ty']?>" style="font-size:11px; color:#03C">Reset filter</a>
                                                   <?php }
												   
												    ?>
												</div>
											</div>
										</div>
                                        
                               
								<div class="table-responsive table-lg mt-3">
									<table class="table table-bordered border-top text-nowrap" id="example1" width="100%">
										<thead>
											<tr>
												
												
                                                <th width="7%" class="border-bottom-0">Order No.</th>
                                                <th width="8%" class="border-bottom-0">Date</th>
                                                <th width="10%" class="border-bottom-0">Nominated Pharmacy</th>
                                                <th width="11%" class="border-bottom-0">Patient Name</th>
                                                <th width="7%" class="border-bottom-0">Age</th>
                                                <th width="8%" class="border-bottom-0">Biological <br /> Sex</th>
                                                 
                                                <th width="17%" class="border-bottom-0">Medical Condition</th>                                                
                                                <th width="15%" class="border-bottom-0">Medication</th>
                                                <th width="9%" class="border-bottom-0 w-20">Status</th>
                                               
                                                <th width="8%" class="border-bottom-0 w-20">Risk Level</th>
											</tr>
										</thead>
							<?php

							
					
						
						/*$sqlPres="select * from tbl_prescriptions where pres_patient_id='".$database->filter($_SESSION['sess_patient_id'])."' order by pres_id desc";
						$resPres=$database->get_results($sqlPres);
						$totalRecords=count($resPres);*/
						
						if($totalRecords > 0) 

							{

						
						for ($k=0;$k<$totalRecords;$k++)
						{
							
							$rowPres=&$rows[$k];
							
							$sqlPatient="select * from tbl_patients where patient_id='".$rowPres['pres_patient_id']."'";
							$resPatient=$database->get_results($sqlPatient);
							$rowPatient=$resPatient[0];
							
						
						?>



									
							<tbody>
								<tr>
									
									
                                    <td class="align-middle">
                                    
                                    <!--<a href="?c=<?php echo $component?>&task=detail&id=<?php echo $row['patient_id']; ?>"><?php echo $row['patient_id'] ?></a>-->
                                    <a href="?c=<?php echo $component?>&task=detail&id=<?php echo $rowPres['pres_id']; ?>" style="color:#06F; text-decoration:underline">PH-<?php echo $rowPres['pres_id'] ?></a>
										
												
											
									</td>
                                    
                                    <td class="align-middle">
										
										<?php echo  date("d/m/Y",strtotime($rowPres['pres_date'])); ?>
											
									</td>
                                    <td><?php echo getPharmacyName($rowPatient['patient_pharmacy']); ?></td>
                                    <td><?php echo $rowPatient['patient_first_name']." ".$rowPatient['patient_middle_name']." ".$rowPres['patient_last_name']; ?></td>
                                     <td><?php 
									
									$from = new DateTime($rowPatient['patient_dob']);
									$to   = new DateTime('today');
									echo $from->diff($to)->y;
									
									$rowPatient['patient_dob'] ?></td>
                                    <td><?php echo getGenderName($rowPatient['patient_gender']) ?></td>
                                    
                                    <td class="align-middle">
										
												<?php echo getConditionName($rowPres['pres_condition']); ?>
											
									</td>
                                    
                                    
                                    
                                    <td class="align-middle" >
										
												 <?php 
																$sqlMedicine="select * from tbl_prescription_medicine where pm_pres_id='".$database->filter($rowPres['pres_id'])."'";
																$resMedicine=$database->get_results($sqlMedicine);
																for ($m=0;$m<count($resMedicine);$m++)
																{
																	$rowMedicine=$resMedicine[$m];
																	
																	echo $rowMedicine['pm_med']." - ".$rowMedicine['pm_med_qty'];
															
                                                            
                                                            
                                                           }
														   
														   ?>
											
									</td>
                                    
                                   
                                    
                                   
                                    
                                    <td class="align-middle">
										<div class="d-flex">
											<div class="ml-3 mt-1">
												
															<?php 
															
															echo getPrescriptionStatus_clinician($rowPres['pres_stage'],$rowPres['pres_id']); 
															?>
                                                            
                                                            <?php
if ($_GET['ty']=="od") { 															// Your date in the format "Y-m-d" (e.g., "2023-07-25")
$yourDate = $rowPres['pres_date'];

// Create DateTime objects for the current date and your date
$currentDate = new DateTime();
$yourDateTime = new DateTime($yourDate);

// Calculate the difference between the two dates
$interval = $currentDate->diff($yourDateTime);

// Get the difference in days
$daysDifference = $interval->days;

// Check if the difference is more than 3 days
if ($daysDifference > 3) {
    echo "<br><br><font style='color:red'>".$daysDifference. " days older</font>";
} 
}



?>
                                                           
                                                            
                                                           
											</div>
										</div>
									</td>
                                    
                                    <?php
									$overallRisk=$rowPres['pres_overall_risk'];
									if ($overallRisk==1) { $btnClr="green"; }
									else if ($overallRisk==2) { $btnClr="orange";  }
									else if ($overallRisk==3) { $btnClr="red";  }
									?>
                                   
                                    <td><div style="width:40px; height:40px" class="circle-<?php echo $btnClr; ?>"></div></td>
									

									
								</tr>
                                
                                

								<?php 

}

}

else

{

	?>

	<tr>

		<th class="border-bottom-0 w-10" style="text-align:center;" colspan="12"> - No Record found - </th>
	</tr>

	<?php

}



?>				
							
							</tbody>
											</table>

												<?php

												$pagingObject->displayLinks_Front(); 

												?>

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
				<input type="hidden" name="task" value="" />

				<input type="hidden" name="c" value="<?php echo $component?>" />
                
                <input type="hidden" name="Cid" value="<?php echo $_GET['Cid']?>" />

				<input type="hidden" name="hidCheckedBoxes" value="0" />

			</form>


             <?php  } ?>

	<!-----------End Listing function------------------>

    

    

     <?php function createFormForPagesHtml_details(&$rows) {

	$row=array();

	global $component, $database;

	$row = &$rows[0];

	

	$sqlmenuid = "select * from tbl_components where component_option='".$database->filter($_GET['c'])."'";

			$getmenuid = $database->get_results( $sqlmenuid );

			//print_r($getmenuid);

			$menuid = $getmenuid[0];

	 ?>

<!-- jQuery UI library -->



<!--Page header-->
<div class="page-header d-lg-flex d-block">
	<div class="page-leftheader">
	<h4 class="page-title">Prescription detail</h4>
	</div>
	<div class="page-rightheader ml-md-auto">
		<div class=" btn-list">
		<a href="index.php?c=<?php echo $component?>&Cid=<?php echo $menuid['component_headingid']; ?>" class="btn btn-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back">
																<i class="fa fa-close"></i>
															</a>
		</div>
	</div>
</div>
<!--End Page header-->	 

				
<div class="row">
		<div class="col-lg-12 col-md-12">
        
        <div class="main-content">
					<div class="container">
                    
                    
                   <?php
					
						
						
						$rowPres = &$rows[0];
							
					?>


						
						<!--End Page header-->

						<!-- Row -->
						<div class="row">
							<div class="col-xl-3 col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header  border-0">
										<div class="card-title">Prescription Status: <?php echo getPrescriptionStatus_clinician($rowPres['pres_stage'],$rowPres['pres_id']); ?></div>
									</div>
									<div class="card-body pt-2 pl-3 pr-3">
										<div class="table-responsive">
											<table class="table">
												<tbody>
                                                
                                                 <tr>
														<td>
															<span class="w-50">Patient ID</span>
														</td>
														<td>:</td>
														<td>
															<span class="font-weight-semibold"><?php echo $rowPres['patient_id'] ?></span>
														</td>
													</tr>
                                                    
                                                    <tr>
														<td>
															<span class="w-50">Order Number</span>
														</td>
														<td>:</td>
														<td>
															PH-<?php echo $rowPres['pres_id'] ?>
														</td>
													</tr>
                                                
                                               		 <tr>
														<td>
															<span class="w-50">Patient Name</span>
														</td>
														<td>:</td>
														<td>
															<span class="font-weight-semibold"><?php echo $rowPres['patient_first_name']." ".$rowPres['patient_middle_name']." ".$rowPres['patient_last_name']; ?></span>
														</td>
													</tr>
                                                    
                                                    <tr>
														<td>
															<span class="w-50">DOB</span>
														</td>
														<td>:</td>
														<td>
															<span class="font-weight-semibold"><?php 
									
															echo fn_GiveMeDateInDisplayFormat($rowPres['patient_dob']); ?></span>
														</td>
													</tr>
                                                    
                                                    <tr>
														<td>
															<span class="w-50">Age</span>
														</td>
														<td>:</td>
														<td>
															<span class="font-weight-semibold"><?php 
									
									$from = new DateTime($rowPres['patient_dob']);
									$to   = new DateTime('today');
									echo $from->diff($to)->y;
									
									$rowPres['patient_dob'] ?></span>
														</td>
													</tr>
                                                    
                                                    <tr>
														<td>
															<span class="w-50">Biological Sex</span>
														</td>
														<td>:</td>
														<td>
															<span class="font-weight-semibold"><?php echo getGenderName($rowPres['patient_gender']) ?></span>
														</td>
													</tr>
                                                    
                                                     <tr>
														<td>
															<span class="w-50">Address</span>
														</td>
														<td>:</td>
														<td>
															<span class="font-weight-semibold"><?php 
															$address=$rowPres['patient_address1'];
															if ($rowPres['patient_address2']!="")
															$address.=", ".$rowPres['patient_address2'];
															
															$address.=", ".$rowPres['patient_city'];
															echo $address.=", ".$rowPres['patient_postcode'];
															 ?></span>
														</td>
													</tr>
                                                    
                                                    <tr>
														<td>
															<span class="w-50">Phone number</span>
														</td>
														<td>:</td>
														<td>
															<span class="font-weight-semibold"><?php echo $rowPres['patient_phone'] ?></span>
														</td>
													</tr>
                                                    
                                                     <tr>
														<td>
															<span class="w-50">Email address</span>
														</td>
														<td>:</td>
														<td>
															<span class="font-weight-semibold"><?php echo $rowPres['patient_email'] ?></span>
														</td>
													</tr>
													
													
													
													
													<tr>
														<td>
															<span class="w-50">Condition</span>
														</td>
														<td>:</td>
														<td>
															<span class="font-weight-semibold"><?php echo getConditionName($rowPres['pres_condition']) ?></span>
														</td>
													</tr>
                                                    
                                                    
                                                     <tr>
														<td>
															<span class="w-50">Medication</span>
														</td>
														<td>:</td>
														<td>
															<span class="font-weight-semibold">
                                                            <?php
															$sqlMedicine="select * from tbl_prescription_medicine where pm_pres_id='".$database->filter($rowPres['pres_id'])."'";
															$resMedicine=$database->get_results($sqlMedicine);
																for ($m=0;$m<count($resMedicine);$m++)
																{
																	$rowMedicine=$resMedicine[$m];
																	echo $rowMedicine['pm_med'];
																	echo "<br>"; 
																}
															?>
                                                            
                                                            </span>
														</td>
													</tr>
                                                    
                                                    <tr  >
														<td valign="top">
															<span class="w-50">GP Practice</span>
														</td>
														<td valign="top">:</td>
														<td valign="top">
															<span class="font-weight-semibold"><?php echo getPatientGP($rowPres['patient_id']); ?></span>
														</td>
													</tr>
                                                    
                                                    <tr>
														<td>
															<span class="w-50">Nominated Pharmacy</span>
														</td>
														<td>:</td>
														<td>
															<span class="font-weight-semibold"><?php //echo $rowPres['patient_email'] ?></span>
														</td>
													</tr>
													
													
													<tr>
														<td>
															<span class="w-50">Submitted Date</span>
														</td>
														<td>:</td>
														<td>
                                                        
                                                        	<?php echo  date("d/m/Y",strtotime($rowPres['pres_date'])); ?>
                                                            
														</td>
													</tr>
                                                    
                                                    <tr>
														<td>
															<span class="w-50">Prescription Expires</span>
														</td>
														<td>:</td>
														<td>
                                                        
                                                        	-
															
														</td>
													</tr>
                                                    
												</tbody>
											</table>
										</div>
										
									</div>
								</div>
								
							</div>
							<div class="col-xl-9 col-md-12 col-lg-12">
								<div class="tab-menu-heading hremp-tabs p-0 ">
									<div class="tabs-menu1">
										<!-- Tabs -->
										<ul class="nav panel-tabs">
                                        <li><a href="#tab6" data-toggle="tab"  <?php if ($_GET['tab']=="") { ?> class="active" <?php } ?>>Completed Medical Assessment</a></li>
											<!--<li ><a href="#tab5" data-toggle="tab">Order Details</a></li>-->
											
											<li><a href="#tab7"  data-toggle="tab" <?php if ($_GET['tab']=="message") { ?> class="active" <?php } ?>>Messages</a></li>
											<li ><a href="#tab10" data-toggle="tab">Logs</a></li>
                                            
                                            <?php
											$sqlCRquest="select * from tbl_pres_cancel_request where pr_pres_id='".$database->filter($_GET['id'])."' order by pr_id desc limit 0,1";
											$resCRequest=$database->get_results($sqlCRquest);
											if (count($resCRequest)>0)
											{
												$rowCRequest=$resCRequest[0];
											?>
                                            
                                            <li><a href="#tab11"  data-toggle="tab" <?php if ($_GET['tab']=="cr") { ?> class="active" <?php } ?>>Cancellation Request</a></li>
                                            
                                            <?php } ?>
										</ul>
									</div>
								</div>
								<div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                                
                                
                                
									<div class="tab-content">
                                    
                                    
                                    
										<div class="tab-pane <?php if ($_GET['tab']=="cr") { ?> active <?php } ?>" id="tab11" >
											<div class="card-body">
                                            <form action="?c=pres-prescriptions&task=savecancelreq" method="POST">
												<div class="row" style="margin-bottom:30px">
                                				<div class="col-sm-12 col-md-12">
													<div style="background:#f9f9f9; color:#444; border:1px solid #d8d8d8">
                                                    
                                                    	<h4 style="background:#648bff; color:#fff; padding:15px">Cancellation request from pharmacy</h4>
                                                   
														<div class="card-body pt-3">
														
                                                        <p><?php echo $rowCRequest['pr_message']?><br /><br />
                                                        <strong>Sent by:</strong> <?php echo getUserNameByType('pharmacy',$rowCRequest['pr_pharmacy_id'])?> <br /><br />
                                                        <strong>Sent Date:</strong> <?php echo fn_GiveMeDateInDisplayFormat($rowCRequest['pr_date']); ?></p>
                                            			
                                                        <?php if ($rowCRequest['pr_status']==0) { ?>
                                                       		<input type="radio" name="rdAction" id="rdAction" value="1" onchange="fnChAction()" />&nbsp;Accept &nbsp;&nbsp;<input type="radio" name="rdAction" id="rdAction" onchange="fnChAction()" value="2" />&nbsp;Reject
                                                            <textarea required rows="5" placeholder="" cols="100" name="txtMsg" style="margin-top:20px;display:none" id="txtMsg" class="form-control"></textarea>
                                                  			 <div style="height:20px"></div>
                                            				 <div style="clear:both"><button class="btn btn-blue" type="submit">Submit</button></div>
                                                         <?php } else {
															 
																 if ($rowCRequest['pr_status']==1) 
																 {?>
																	<div style="font-weight:bold; color:#090">Accepted by <?php echo getUserNameByType('clinician',$rowCRequest['pr_clinician_id']); ?></div>
                                                                    <div><strong>Message:</strong> <?php echo $rowCRequest['pr_action_message']; ?></div>
																 <?php } 
                                                             
																 if ($rowCRequest['pr_status']==2) 
																 {?>
																	<div style="font-weight:bold; color:#F00">Rejected by <?php echo getUserNameByType('clinician',$rowCRequest['pr_clinician_id']); ?></div>
                                                                    <div><strong>Message:</strong> <?php echo $rowCRequest['pr_action_message']; ?></div>
																 <?php } ?>
                                                         
                                                         <?php } ?>
                                         
										</div>   
														</div>
													</div>
                               				 </div>
                                             <input type="hidden" name="hdId" value="<?php echo $rowCRequest['pr_id']?>" />
                                             <input type="hidden" name="hdPId" value="<?php echo $rowCRequest['pr_pres_id']?>" />
                                             </form>
											</div>
										</div>
                                        
                                   <script language="javascript">
								   function fnChAction()
								   {
									 $("#txtMsg").show(); 
									 var selectedValue = $("input[name='rdAction']:checked").val();
									 if (selectedValue==1)
									 $("#txtMsg").prop("placeholder", "Please confirm reason for cancellation to the patient"); 
									 else
									 $("#txtMsg").prop("placeholder", "Please confirm reason to Pharmacy for rejecting their cancellation request"); 
									 
								   }
								   </script>
                                        
                                        
										<div class="tab-pane <?php if ($_GET['tab']=="") { ?> active <?php } ?>" id="tab6">
											<div class="row">
							
							<div class="col-xl-12 col-md-12 col-lg-12">
								
								<div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                                
									<div class="tab-content">
                                    
                                 
										<div class="tab-pane active" id="tab5">
											<div class="card-body">
                                            
                                            <div class="row" style="margin-bottom:30px">
                                				<div class="col-sm-12 col-md-12">
													<div style="background:#f5f5f5; color:#444; border:1px solid #d8d8d8">
														<table class="table row table-borderless w-100 m-0 text-nowrap">
															<tbody class="col-lg-12 col-xl-6 p-0">
																<tr>
														<td><span class="font-weight-semibold">Date :</span> <?php echo  date("d/m/Y",strtotime($rowPres['pres_date'])); ?></td>
<td><span class="font-weight-semibold">Overall Risk Stratification :</span> 
<?php $overallRisk=$rowPres['pres_overall_risk'];
if ($overallRisk==1) { $btnClr="green"; $btnText="Low"; }
else if ($overallRisk==2) { $btnClr="orange"; $btnText="Moderate"; }
else if ($overallRisk==3) { $btnClr="red"; $btnText="High"; }

 ?>
 
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

 <style>

.ui-menu .ui-menu-item {
	font-size:15px;
	color:#666;
}

</style>
 
 
<span style="background-color:<?php echo $btnClr; ?>; color:#FFF; padding:10px; font-weight:bold"><?php echo $btnText; ?></span>


</td>
<td><span class="font-weight-semibold">Condition :</span> <span class="btn btn-primary" style="cursor:text"><?php echo  getConditionName($rowPres['pres_condition']) ?></span></td>																																														                                                   </tr>
                                                                    </tbody>
                                                               </table>     
														</div>
													</div>
                                </div>
                                
                                
                                
                                
                                
                                
                                
                               			 <div class="row" style="margin-bottom:30px">
                                				<div class="col-sm-12 col-md-12">
													<div style="background:#f9f9f9; color:#444; border:1px solid #d8d8d8">
                                                    
                                                    	<h4 style="background:#648bff; color:#fff; padding:15px">Medication</h4>
                                                   
														<div class="table-responsive" >
                                                        
                                         <div id="medicine_list">
                                                        
											Loading..
                                         
                                         </div>
                                            
                                            
                                            <?php if ($rowPres['pres_stage']==1 || $rowPres['pres_stage']==2) { ?>
                                       
                                       <div id="medChange" style="display:none">     
                                       <form action="" method="post" id="frmChange" >
										<div class="card">
											<div class="card-header  border-0">
												<h4 class="card-title">Add New Medicine</h4>
											</div>
                                             
											<div class="card-body">
												<div class="form-group">
                                                <div id="success-container" style="color:#090"></div>
													<div class="row">
														<div class="col-md-3">
															<label class="form-label mb-0 mt-2">Medicine Name</label>
														</div>
														<div class="col-md-9">
															<input type="text" id="txtMedicine" onkeydown="clearInput()" name="txtMedicine" data-validation="required" data-validation-error-msg="Enter Medicine name" class="form-control" placeholder="Type and Select Medicine Name" value="">
                                                            
                                                             <ul class="list-group" style="position: absolute; min-width:320px;" >
                                                             
                                                             
                                                             </ul>
             
             												
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<div class="row">
														<div class="col-md-3">
															<label class="form-label mb-0 mt-2">Quantity</label>
														</div>
														<div class="col-md-9">
															<input type="number" id="txtQty" name="txtQty" data-validation="required" data-validation-error-msg="Enter quantity" class="form-control" placeholder="Please Enter Quantity" value="">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-3">
															<label class="form-label mb-0 mt-2">Strength</label>
														</div>
														<div class="col-md-9">
															<select id="txtStrength" name="txtStrength"  class="form-control"  data-validation-error-msg="Select Stength">
                                                            	<option value=""></option>
                                                                <option value="100 mg">100 mg</option>
                                                            </select>
														</div>
													</div>
												</div>
                                                
                                                <div class="form-group">
													<div class="row">
														<div class="col-md-3">
															<label class="form-label mb-0 mt-2">Dosage Instructions</label>
														</div>
														<div class="col-md-9">
															<textarea name="txtDosage"  class="form-control" placeholder="Please enter dosage instructions"></textarea>
														</div>
													</div>
												</div>
                                                
											</div>
											<div class="card-footer">
                                            
                                            <div id="errorMessage" style="color:#F00; padding-bottom:20px"></div>
                                            <input type="hidden" name="pId" id="pId" value="<?php echo $_GET['id']?>" />
                                            <input type="hidden" name="medId" id="medId" value="" />
                                            <button type="submit" id="submitBtn" name="submitBtn" class="btn btn-primary">
                                            
												Save Changes
                                             </button>
                                             &nbsp; <button type="button" id="cancelBtn" name="cancelBtn" class="btn btn-secondary" onclick="addMedicine()">
                                            
												Cancel
                                             </button>
												
											</div>
										</div>
                                        
                                      </form>
                                      
                                      </div>
                                      
                                      
                                      <script src="<?php echo URL?>js/form-validator/jquery.form-validator.js"></script>

<script type="text/javascript">   

$(function() {
    $("#txtMedicine").autocomplete({
		 minLength: 2,
        source: "ajax/medicine-names.php",
       select: function( event, ui ) {
            event.preventDefault();
            $("#medId").val(ui.item.id);
			$("#txtMedicine").val(ui.item.value);
        }
    });
});

function clearInput()
{
	$("#medId").val("");
}
        


function loadMedicineCart ()
{
   $('#medicine_list').load('ajax/load-medication-cart.php?pres_id=<?php echo $rowPres['pres_id']; ?>');
}

loadMedicineCart();

function removeMed(id)
{
	
	
	
	
	 $.post('ajax/delete-medication-cart.php', { medicineId: id }, function(response) {
            // Handle the response from the PHP page
		
          if (response==1)
		  {
			  loadMedicineCart();
			  activateCustomerBtn();
		  }
		  else
		  {
			  alert ("Something went wrong! Please check your login session or contact admin");
		  }
        });
}

function showPatientReason()
{
	$("#id_patient_notify").toggle();
}

function activateCustomerBtn()
{
	$("#btnPatientSub").show();
}

    (function($, window) {
	       // setup datepicker    

        window.applyValidation = function(validateOnBlur, forms, messagePosition, xtraModule) {

            if( !forms )

                forms = 'form';

            if( !messagePosition )

                messagePosition = 'top';


            $.validate({


                form : forms,


			    errorMessagePosition : messagePosition,

                scrollToTopOnError : false,

			    sanitizeAll : 'trim', // only used on form C

                // borderColorOnError : 'purple',



                modules : 'security, location,' +( xtraModule ? ','+xtraModule:''),

                onModulesLoaded: function() {

                 // $('#country-suggestions').suggestCountry();

                 //$('#swedish-county-suggestions').suggestSwedishCounty();

                 $('#password').displayPasswordStrength();


                },


                onValidate : function($f) {

				console.log('about to validate form '+$f.attr('id'));

                var $callbackInput = $('#callback');

                if( $callbackInput.val() == 1 ) {

                  return {

                          element : $callbackInput,
                           message : 'This validation was made in a callback'


                       };

                    }


                },


                onError : function($form) {

                 //alert('Invalid '+$form.attr('id'));

                },
                onSuccess : function($form) {

				   $("#submitBtn").attr('disabled','disabled');
				   $("#submitBtn").html("<i class='fa fa-circle-o-notch fa-spin'></i> Please wait..</div>");

		   			var myform = document.getElementById("frmChange");
				    var fd = new FormData(myform );	

		  			   $.ajax({

					   type: "POST",
					   url: "ajax/update-medication.php",
					   data: fd,
					   cache: false,
       				   processData: false,
        			   contentType: false,

					   success: function(msg){

					
					 
					 
					// $("#errorMessage").html("");
					 //$("#success-container").html("");

						   if (msg==1)
						   {
								// $("#success-container").show();
								//$("#success-container").html("Password updated sucessfully");
								myform.reset();
								$("#medChange").hide();
								$('#linkbtn').show();
								$("#submitBtn").html("Save Changes");
						         $("#submitBtn").removeAttr("disabled");
								 loadMedicineCart();
								 activateCustomerBtn();

						   }



						  else if(msg == 0)
					  	 {
							
							$("#errorMessage").html("Old password did not matched with our records");
							 $("#submitBtn").html("Save Changes");
						    $("#submitBtn").removeAttr("disabled");
							myform.reset();

					   		}

						   else 
						  {
						    $('#errorMessage').html('Something went wrong, please try again');
							$("#submitBtn").html("Update Password");
						    $("#submitBtn").removeAttr("disabled");
							myform.reset();
						  }
					  
					 
					 
					  
					  }


					 });


                    return false;

                }

            });


        };
		  window.applyValidation(true, '#frmChange', $('#error-container'), 'sanitize');
    })(jQuery, window);
	
	</script>
                                      
                                      <script language="javascript">
									  function addMedicine()
									  {
											if ($('#medChange').is(':hidden')) {
											$('#medChange').show();
											$('#linkbtn').hide();
											} else {
												$('#medChange').hide();
												$('#linkbtn').show();
											}
									  }
									  </script>
                                      

                                            
                                            		
                                            
                                            <div style="width:100%; margin:auto; margin-bottom:20px;text-align:center"><a href="javascript:void()" id="linkbtn" class="btn btn-primary" style="margin-top:0px" onclick="addMedicine()">Add Medicine</a></div>
                                            <div style="width:100%;margin-bottom:20px;text-align:center"><a href="javascript:void()" id="btnPatientSub" <?php if ($rowPres['pres_medicine_change_status']!=1) { ?>style="display:none" <?php } ?> class="btn btn-danger" onclick="showPatientReason()">Notify Patient for approval</a></div>
                                            <div style="width:100%;margin-bottom:20px;text-align:center;display:none" id="id_patient_notify" >
                                            
                                            <form action="" method="post" id="frmNotifyPatient" >
										<div class="card">
											
                                             
											<div class="card-body">
												
												
												
												
                                                
                                                <div class="form-group">
													<div class="row">
														<div class="col-md-3">
															<label class="form-label mb-0 mt-2">Reason for Changes in Medication</label>
														</div>
														<div class="col-md-9">
															<textarea name="txtDosage"  class="form-control" placeholder="Please enter dosage instructions"></textarea>
														</div>
													</div>
												</div>
                                                
											</div>
											<div class="card-footer">
                                            
                                           
                                            
                                            <button type="submit" id="submitBtn" name="submitBtn" class="btn btn-success">
                                            
												Submit for Approval
                                             </button>
                                            
												
											</div>
										</div>
                                        
                                      </form>
                                            		
                                            
                                            
                                            </div>
                                            <?php } ?>
										</div>   
														</div>
													</div>
                                </div>
                                
                                
                                
                                 <form action="?c=<?php echo $component?>&task=savepres" method="POST" onsubmit="return submitPres()" enctype="multipart/form-data">
                               				 <div class="row"  style="margin-bottom:30px">
                                				<div class="col-sm-12 col-md-12">
													<div style="background:#f9f9f9; color:#444; border:1px solid #d8d8d8">
                                                    
                                                     <h4 style="background:#648bff; color:#fff; padding:15px">About You</h4>
                                                     
                                                 <?php 
											 $aboutYou=unserialize(fnUpdateHTML($rowPres['pres_about_you']));									 
											
											  ?>
								
                               
                                <div class="panel-body p-0">
                                
                                 
									<div class="tab-content">
										<div class="tab-pane active" id="tab5">
											<div class="card-body" style="padding-top:0px">
												
												<div class="form-group">
                                                
                                                
                                                  <?php foreach($aboutYou as $que => $val) { ?>
													<div class="row alternate-item">
														<div class="col-md-5">
															<label class="form-label mb-0 mt-2" style="color:#777"><?php echo base64_decode($que) ?></label>
														</div>
														<div class="col-md-7 mt-2">
															<h5 style="vertical-align:middle"> <?php echo base64_decode($val) ?></h5>
														</div>
													</div>
                                                   <?php } ?>
                                                    
                                                    
                                                        
                                                       
                                                    
                                                     
												</div>
												
												
												
												
											
										</div>
                                        </div>
										
									</div>
								</div> 
														</div>
													</div>
                                			</div>
                                            
												 <div class="row"  style="margin-bottom:30px">
                                				<div class="col-sm-12 col-md-12">
													<div style="background:#f9f9f9; color:#444; border:1px solid #d8d8d8">
                                                    
                                                     <h4 style="background:#648bff; color:#fff; padding:15px">Symptoms</h4>
												<div class="panel-body p-0">
                                     
                                     <?php  $symptoms=unserialize(fnUpdateHTML($rowPres['pres_symptoms'])); ?>           
                                                
                                                
									<div class="tab-content">
										<div class="card" style="background-color:transparent">
									
									<div class="card-body pb-0 pt-3">
                                    
                                     <?php 
												if (is_array($symptoms))
												for($a=0;$a<count($symptoms);$a++) { ?>
										<div class="alternate-item">
											<label class="form-label mb-0"><?php echo base64_decode($symptoms[$a]['question']);  ?> :</label>
											<p style="margin-top:10px">
											
                                            <table width="100%">
                                            <tr><td width="3%" >
											
											<?php
											$answer=base64_decode($symptoms[$a]['answer']);
											
											$riskVal="";
											$riskVal=base64_decode($symptoms[$a]['risk']);
											
											$position=strpos($answer, "~~~");
											if ($position=="")
											{
												if ($riskVal==1)
												echo '<div class="circle-green"></div>';
												else if ($riskVal==2)
												echo '<div class="circle-orange"></div>';
												else if ($riskVal==3)
												echo '<div class="circle-red"></div>';
											 
											?>
                                            </td><td style="font-size:14px">
											
											 <?php echo $answer; ?>
                                             
                                              
                                             
                                           </td>
                                           <?php }
										   else
											{
												echo '<table width="100%" border="0px" style="border-color:#CCC">
                                                            	<tr>';
															$arrAnswer=explode("|",$answer);
															
															for ($k=0;$k<count($arrAnswer);$k++)
															{
																$arrAnsB=explode("~~~",$arrAnswer[$k]);
																
																$riskVal=$arrAnsB[1];
																
																	if ($riskVal==1)
																	echo '<td width="3%"><div class="circle-green"></div></td>';
																	else if ($riskVal==2)
																	echo '<td width="3%"><div class="circle-orange"></div></td>';
																	else if ($riskVal==3)
																	echo '<td width="3%"><div class="circle-red"></div></td>';
																
																echo "<td style='font-size:14px'>".$arrAnsB[0]."</td>";
																echo "</tr>";
																
															}
															
															echo "</tr></table>";
											}
											
											
										   
										    ?>
                                            
                                           
                                                        
                                                        
                                           
                                           </tr>
                                           </table>
                                           
                                           <?php
														if ($symptoms[$a]['more']!="")
														 echo " <br /><br /><font style='color:#000; font-size:15px'>Additional information:</font> ".base64_decode($symptoms[$a]['more']) ?>
                                            
                                            
                                            </p>
										</div>
									
                                    <?php } ?>	
										
										
										
									</div>
									
								</div>
										
									</div>
								</div> 
														</div>
													</div>
                                			</div>
												
                                                
                                                 <div class="row"  style="margin-bottom:30px">
                                				<div class="col-sm-12 col-md-12">
													<div style="background:#f9f9f9; color:#444; border:1px solid #d8d8d8">
                                                    
                                                     <h4 style="background:#648bff; color:#fff; padding:15px">Your Medical History</h4>
												<div class="panel-body p-0">
                                     
                                     <?php   $medicalHistory=unserialize(fnUpdateHTML($rowPres['pres_medical_history'])); ?>           
                                                
                                                
									<div class="tab-content">
										<div class="card" style="background-color:transparent">
									
									<div class="card-body pb-0 pt-3">
                                    
                                     <?php 
												if (is_array($medicalHistory))
												for($a=0;$a<count($medicalHistory);$a++) { ?>
										<div class="alternate-item">
											<label class="form-label mb-0"><?php echo base64_decode($medicalHistory[$a]['question']);  ?> :</label>
											<p style="margin-top:10px">
											
                                            <table width="100%">
                                            <tr><td width="3%" >
											
											<?php
											$answer=base64_decode($medicalHistory[$a]['answer']);
											
											$riskVal="";
											$riskVal=base64_decode($medicalHistory[$a]['risk']);
											
											$position=strpos($answer, "~~~");
											if ($position=="")
											{
												if ($riskVal==1)
												echo '<div class="circle-green"></div>';
												else if ($riskVal==2)
												echo '<div class="circle-orange"></div>';
												else if ($riskVal==3)
												echo '<div class="circle-red"></div>';
											 
											?>
                                            </td><td style="font-size:14px">
											
											 <?php echo $answer; ?>
                                           </td>
                                           <?php }
										   else
											{
												echo '<table width="100%" border="0px" style="border-color:#CCC">
                                                            	<tr>';
															$arrAnswer=explode("|",$answer);
															
															for ($k=0;$k<count($arrAnswer);$k++)
															{
																$arrAnsB=explode("~~~",$arrAnswer[$k]);
																
																$riskVal=$arrAnsB[1];
																
																	if ($riskVal==1)
																	echo '<td width="3%"><div class="circle-green"></div></td>';
																	else if ($riskVal==2)
																	echo '<td width="3%"><div class="circle-orange"></div></td>';
																	else if ($riskVal==3)
																	echo '<td width="3%"><div class="circle-red"></div></td>';
																
																echo "<td style='font-size:14px'>".$arrAnsB[0]."</td>";
																echo "</tr>";
																
															}
															
															echo "</tr></table>";
											}
										   
										    ?>
                                            
                                            
                                           
                                           </tr>
                                           </table>
                                             <?php
														if ($medicalHistory[$a]['more']!="")
														 echo "<br><br><font style='color:#000; font-size:15px'>Additional information: ".base64_decode($medicalHistory[$a]['more']) ?></font>
                                            
                                            </p>
										</div>
									
                                    <?php } ?>	
										
										
										
									</div>
									
								</div>
										
									</div>
								</div> 
														</div>
													</div>
                                			</div>
                                            
                                             <div class="row"  style="margin-bottom:30px">
                                				<div class="col-sm-12 col-md-12">
													<div style="background:#f9f9f9; color:#444; border:1px solid #d8d8d8">
                                                    
                                                     <h4 style="background:#648bff; color:#fff; padding:15px">Your Medication History</h4>
												<div class="panel-body p-0">
                                     
                                     <?php   $medication=unserialize(fnUpdateHTML($rowPres['pres_medication'])); ?>           
                                                
                                                
									<div class="tab-content">
										<div class="card" style="background-color:transparent">
									
									<div class="card-body pb-0 pt-3">
                                    
                                     <?php 
												if (is_array($medication))
												for($a=0;$a<count($medication);$a++) { ?>
										<div class="alternate-item">
											<label class="form-label mb-0"><?php echo base64_decode($medication[$a]['question']);  ?> :</label>
											<p style="margin-top:10px">
											
                                            <table width="100%">
                                            <tr><td width="3%" >
											
											<?php
											$answer=base64_decode($medication[$a]['answer']);
											
											$riskVal="";
											$riskVal=base64_decode($medication[$a]['risk']);
											
											$position=strpos($answer, "~~~");
											if ($position=="")
											{
												if ($riskVal==1 || $riskVal=="")
												echo '<div class="circle-green"></div>';
												else if ($riskVal==2)
												echo '<div class="circle-orange"></div>';
												else if ($riskVal==3)
												echo '<div class="circle-red"></div>';
											 
											?>
                                            </td><td style="font-size:14px">
											
											 <?php echo $answer; ?>
                                           </td>
                                           <?php }
										   else
											{
												echo '<table width="100%" border="0px" style="border-color:#CCC">
                                                            	<tr>';
															$arrAnswer=explode("|",$answer);
															
															for ($k=0;$k<count($arrAnswer);$k++)
															{
																$arrAnsB=explode("~~~",$arrAnswer[$k]);
																
																$riskVal=$arrAnsB[1];
																
																	if ($riskVal==1)
																	echo '<td width="3%"><div class="circle-green"></div></td>';
																	else if ($riskVal==2)
																	echo '<td width="3%"><div class="circle-orange"></div></td>';
																	else if ($riskVal==3)
																	echo '<td width="3%"><div class="circle-red"></div></td>';
																
																echo "<td style='font-size:14px'>".$arrAnsB[0]."</td>";
																echo "</tr>";
																
															}
															
															echo "</tr></table>";
											}
										   
										    ?>
                                            
                                             
                                           
                                           </tr>
                                           </table>
                                           
                                           <?php
														if ($medication[$a]['more']!="")
														 echo "<br><br><font style='color:#000; font-size:15px'>Additional information: ".base64_decode($medication[$a]['more']) ?></font>
                                            
                                            
                                            </p>
										</div>
									
                                    <?php } ?>	
										
										
										
									</div>
									
								</div>
										
									</div>
								</div> 
														</div>
													</div>
                                			</div>
                                            
                                            <div class="row"  style="margin-bottom:30px">
                                				<div class="col-sm-12 col-md-12">
													<div style="background:#f9f9f9; color:#444; border:1px solid #d8d8d8">
                                                    
                                                     <h4 style="background:#648bff; color:#fff; padding:15px">Disclaimer, Consent &amp; Agreement</h4>
												<div class="panel-body p-0">
									<div class="tab-content">
										<div class="card" style="background-color:transparent">
									
                                    <div class="card-body pb-0 pt-3">
                                    	<table class="table">
                                                <?php if ($rowPres['pres_disclaimer_file']!="") { ?>
													<tr><td>Disclaimer</td><td><a href="<?php echo URL?>uploads/patients/agreement/<?php echo $rowPres['pres_disclaimer_file']?>" target="_blank">View</a></td></tr>
                                                    <?php } ?>
                                                    <?php if ($rowPres['pres_agreement_file']!="") { ?>
                                                    <tr><td>Agreement</td><td><a href="<?php echo URL?>uploads/patients/agreement/<?php echo $rowPres['pres_agreement_file']?>" target="_blank">View</a></td></tr>
                                                     <?php } ?>
                                                </table>
                                    	
												<table class="table">
												<tbody>
                                                <?php  
													 $sqlGP="select * from tbl_patient_gps where pg_patient_id='".$rowPres['pres_patient_id']."'";
													$resGP=$database->get_results($sqlGP);
													$rowGP=$resGP[0];
													
													if ($rowGP['pg_option']==1)
													{									
												 ?>
                                                	<tr><td>GP Name</td><td><?php echo $rowGP['pg_gp'] ?></td></tr>
                                                    
                                                    <?php }
													
													else if ($rowGP['pg_option']==2)
													{									
												 ?>
                                                	<tr><td>GP Practise</td><td><?php echo $rowGP['pg_gp_name'] ?></td></tr>
                                                    <tr><td>Address</td><td><?php echo $rowGP['pg_gp_address'] ?></td></tr>
                                                    <tr><td>Email</td><td><?php echo $rowGP['pg_gp_email'] ?></td></tr>
                                                    <tr><td>Telephone</td><td><?php echo $rowGP['pg_gp_phone'] ?></td></tr>
                                                    
                                                    <?php }
													
													else if ($rowGP['pg_option']==3)
													{									
												 ?>
                                                	<tr><td colspan=2>I don’t know my GP Practice details</td></tr>
                                                    
                                                    
                                                    <?php }
													
													else if ($rowGP['pg_option']==4)
													{									
												 ?>
                                                	<tr><td colspan=2> I do not have a registered GP in the UK</td></tr>
                                                    
                                                    
                                                    <?php }
													
													else if ($rowGP['pg_option']==5)
													{									
												 ?>
                                                	<tr><td colspan=2> I will take responsibility to inform my GP</td></tr>
                                                    
                                                    
                                                    <?php }
													
													
													 ?>
                                                    
                                                    
                                                </tbody>
                                                </table>
												
									</div>
									
								</div>
										
									</div>
								</div> 
														</div>
													</div>
                                			</div>
                                            
                                            
                                             <div class="row" style="margin-bottom:30px" id="notes">
                                				<div class="col-sm-12 col-md-12">
													<div style="background:#f9f9f9; color:#444; border:1px solid #d8d8d8">
                                                    
                                                    	<h4 style="background:#648bff; color:#fff; padding:15px">Clinician Consultation Notes</h4>
                                                        <div class="card-body pt-1">
                                                        
                                                        <?php if ($rowPres['pres_clinician_notes']!="") { ?>
                                                        <p><?php echo $rowPres['pres_clinician_notes']; ?></p>
                                            			<?php } ?>
                                                        <?php if ($rowPres['pres_stage']==1 || $rowPres['pres_stage']==2) { ?>
                                                        <!--<a class="btn btn-light" href="javascript:void()" onclick="openNotes(1)">Add Notes</a>-->
                                                        
                                                        <a href="#" class="btn btn-primary " data-toggle="modal" data-target="#newNotes"><i class="feather feather-plus fs-15 my-auto mr-2"></i>Add Notes</a>
                                                        
                                                        <?php } ?>
                                                        <!--<a class="btn btn-light" href="#">Contact by email</a>-->
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        <table style="margin-top:50px" class="table  table-vcenter table-bordered border-bottom" id="miles-tables">
														<thead>
															<tr>
																<th class="border-bottom-0 text-center w-5">No</th>
																<th class="border-bottom-0" width="60%">Notes</th>
																<th class="border-bottom-0">Date</th>
                                                                <th class="border-bottom-0">Added by</th>
															
																
															</tr>
														</thead>
														<tbody>
                                                        
                                                        <?php $sqlNotes="select * from tbl_prescriptions_notes where pn_pres_id='".$database->filter($_GET['id'])."' order by pn_id desc";
														$resNotes=$database->get_results($sqlNotes);
														if (count($resNotes)>0)
														{
															for ($j=0;$j<count($resNotes);$j++)
															{
																$rowNotes=$resNotes[$j];
														 ?>
															<tr>
																<td class="text-center"><?php echo $j+1; ?></td>
																<td>
																	<?php echo $rowNotes['pn_action_details']?>
																</td>
																<td><?php echo fn_formatDateTime($rowNotes['pn_date_time'])?></td>
																<td>
                                                                
                                                                	<?php
																		
																		echo getUserNameByType($rowNotes['pn_user_type'],$rowNotes['pn_user_id'])
																	
																	?>
                                                                
                                                                </td>
																
															</tr>
														<?php }
														} else {?>
                                                        <tr><td colspan="4">No notes added!</td></tr>
                                                        <?php } ?>	
															
														</tbody>
													</table>
                                                        
                                                   </div>
														
                                            
										</div>   
														</div>
													</div>
                                                    
                                                <div class="row" style="margin-bottom:30px">
                                				<div class="col-sm-12 col-md-12">
													<div style="background:#f9f9f9; color:#444; border:1px solid #d8d8d8">
                                                    
                                                    	<h4 style="background:#648bff; color:#fff; padding:15px">Completed Past Medical Assessment</h4>
                                                   
														<div class="table-responsive">
											<table class="table border-top" style="background:#fff; width:95%; margin:auto; border:1px solid #d9d9d9; margin-bottom:15px">
												<thead style="padding-left:20px">
                                                
													<tr>
														<th>Date </th>
														<th>Medical Condition</th>
														<th>Medication Supplied</th>
													
                                                        <th></th>
                                                        
													</tr>
												</thead>
												<tbody style="padding-left:20px">
                                                
                                                <?php 
													$sqlAss="select * from tbl_prescriptions,tbl_patients where patient_id=pres_patient_id and (pres_stage=3 || pres_stage=6) and pres_condition='".$rowPres['pres_condition']."' ";
													
													$resAss=$database->get_results($sqlAss);
													if (count($resAss)>0)
													{
													
													for ($j=0;$j<count($resAss);$j++)
													{
												
														$rowAss=$resAss[$j];
												?>
                                                
													<tr>
														<th scope="row"><?php echo  date("d/m/Y",strtotime($rowAss['pres_date'])); ?></th>
														<td><?php echo getConditionName($rowAss['pres_condition']); ?></td>
														<td><?php 
																$sqlMedicine="select * from tbl_prescription_medicine where pm_pres_id='".$database->filter($rowAss['pres_id'])."'";
																$resMedicine=$database->get_results($sqlMedicine);
																for ($m=0;$m<count($resMedicine);$m++)
																{
																	$rowMedicine=$resMedicine[$m];
																	
																	echo $rowMedicine['pm_med']." - ".$rowMedicine['pm_med_qty'];
															
                                                            
                                                            
                                                           }
														   
														   ?></td>
									
                                                        <td><a class="btn btn-primary" href="#">View Detail</a></td>
													</tr>
                                                    
                                                    <?php }
													} else {?>
                                                    <tr><td colspan="4">No previous record found</td></tr>
                                                    <?php } ?>
                                                    
												</tbody>
											</table>
                                            
                                         
										</div>   
														</div>
													</div>
                               				 </div>
                                                 
                                                    
                                                  <div class="row" style="margin-bottom:30px">
                                				<div class="col-sm-12 col-md-12">
													<div style="background:#f9f9f9; color:#444; border:1px solid #d8d8d8">
                                                    
                                                    	<h4 style="background:#648bff; color:#fff; padding:15px">Notes for pharmacy</h4>
                                                   
														<div class="card-body pt-3">
														<?php if ($rowPres['pres_pharmacy_note']!="") { ?>
                                                        <p><?php echo $rowPres['pres_pharmacy_note']; ?><br /><br />
                                                        Last updated: <?php echo displayDateTimeFormat($rowPres['pres_pharmacy_note_date']); ?></p>
                                            			<?php } ?>
                                                        <?php if ($rowPres['pres_stage']==1 || $rowPres['pres_stage']==2) { ?>
                                                        <a class="btn btn-light" href="javascript:void()" onclick="openNotes(2)">Add Note</a>
                                                        <?php } ?>
                                                                                                          
                                                        <textarea rows="5" placeholder="Enter enter message for pharmacy" cols="100" name="txtPharmacyMsg" style="margin-top:20px;display:none" id="txtPharmacyMsg" class="form-control"><?php echo $rowPres['pres_pharmacy_note']; ?></textarea>
                                            
                                            			
                                         
										</div>   
														</div>
													</div>
                               				 </div>
                                             
                                              <div class="row" style="margin-bottom:30px" id="message">
                                				<div class="col-sm-12 col-md-12">
													<div style="background:#f9f9f9; color:#444; border:1px solid #d8d8d8">
                                                    
                                                    	<h4 style="background:#648bff; color:#fff; padding:15px">Clinical Outcomes</h4>
                                                        <div class="card-body pt-1">
                                                        
                                                        <a class="btn btn-light" <?php if ($rowPres['pres_stage']==1 || $rowPres['pres_stage']==2) { ?> onclick="changeColors(1,1)" <?php } ?> id="btnApprove" href="javascript:void()">Approve</a>
                                                        
                                                        <a class="btn btn-light" <?php if ($rowPres['pres_stage']==1 || $rowPres['pres_stage']==2) { ?> onclick="changeColors(2,1)" <?php } ?> id="btnReject" href="javascript:void()">Reject</a>
                                                        <a class="btn btn-light" <?php if ($rowPres['pres_stage']==1 || $rowPres['pres_stage']==2) { ?> onclick="changeColors(3,1)" <?php } ?> id="btnQuery" href="javascript:void()">Query</a>
                                                        
                                                        <a class="btn btn-light" <?php if ($rowPres['pres_stage']==1 || $rowPres['pres_stage']==2) { ?> onclick="changeColors(4,1)" <?php } ?> id="btnCancel" href="javascript:void()">Cancel</a>
                                                        
                                                        <?php if ($rowPres['pres_rejection_reason']!="") { ?>
                                                        <br /><br />
                                                        <p><?php echo $rowPres['pres_rejection_reason']; ?></p>
                                                        <?php } ?>
                                                        <br /><br />
                                                        <div class="col-sm-6 col-md-6">
                                                        <select name="cmbRejectReason" id="cmbRejectReason" class="form-control" style="display:none" onchange="openFree(this.value)">
                                                        	<option value="" style="display:none">Select Reason</option>
                                                            <option value="Not clinically suitable">Not clinically suitable</option>
                                                            <option value="Unable to reach patient after multiple attempts">Unable to reach patient after multiple attempts</option>
                                                            <option value="Other">Other (free type)</option>
                                                            
                                                        </select>
                                                        
                                                        
                                                        <textarea rows="5" placeholder="Please enter reason" cols="100" name="txtReject" style="margin-top:20px;display:none" id="txtReject" class="form-control"><?php echo $rowPres['pres_rejection_reason'] ?></textarea>
                                                        </div>
                              
                              <?php if ($_GET['error']==1) { ?>
                              <div style="color:#F00">Information was missing while sending the message, please enter all required information.</div>                          
                              <?php } ?>
                             <div class="card" id="contSendMessage_2" style="display:none" >
								<div class="card-header border-0">
									<h4 class="card-title" >Send Query</h4>
								</div>
								<div class="card-body" >
                                
                               
                                   
									
                                    <div>
                                    <label class="form-label">Select message option</label>
                                   		 <select class="form-control" name="cmbMessage" id="cmbMessage" onchange="showCustomMessage()" >
                                         	<option value="">Select Message</option>
                                            <option value="1">Could not reach you by telephone – further information required (Call again)</option>
                                            <option value="2">Could not reach you by telephone – please respond to enquiry via patient portal</option>
                                            <option value="3">Custom message</option>
                                            
                                         </select>
                                    </div>
                                    <div id="cont_custom" style="display:none; padding-top:20px">
                                    <div>
                                    
                                    
                                    <label class="form-label">Select User Type *</label>
                                    <select class="form-control" name="rdUser" id="rdUser" >
                                    	<option value="">Choose the recipient for your message</option>
                                        <option value="Patient">Send to Patient</option>
                                        <?php if ($rowPres['pres_stage']==3 || $rowPres['pres_stage']==6) { ?>
                                        <option value="Pharmacy">Send to Pharmacy</option>
                                        <?php } ?>
                                        <option value="Admin">Send to Admin</option>
                                        
                                    </select>
                                    <div style="height:20px"></div>
                                    <label class="form-label">Subject *</label>
                                    <input type="text" class="form-control" id="txtSubject" name="txtSubject"></div>
                                     <div style="height:20px"></div>
									<div>
                                    <label class="form-label">Message *</label>
                                    <textarea rows="5" class="form-control" cols="50" name="txtMessage"></textarea></div>
                                    <div style="height:20px"></div>
									<div class="form-group">
										<label class="form-label">Upload Document</label>
										<div class="form-group">
										<label for="form-label" class="form-label"></label>
										<input class="form-control" name="flDoc[]" type="file" accept=".pdf,.jpg,.png">
										</div>
									</div>
                                  </div>  
                                 
                                
								
								
								
							
                            </div>
                            </div>
                                                   </div>
														
                                            
										</div>   
														</div>
													</div>
                                                 
                                                 
                                              		<input type="hidden" name="hdOutcomes" id="hdOutcomes" value="" />
                                                    
                                                    <?php if ($rowPres['pres_stage']==1 || $rowPres['pres_stage']==2 || $rowPres['pres_stage']==3 || $rowPres['pres_stage']==6) { ?>
                                                    
                                                  
                                                	<button type="submit" class="btn btn-primary btn-lg icons">Submit</button>
                                               		
                                                    <?php } ?>
                                                    
                               				 </div>
                                
                               				 
                                            
                                            
											</div>
                                            <input type="hidden" name="hdId" value="<?php echo $_GET['id']?>" />
                                            </form>
										</div>
										
									</div>
								</div>
							</div>
										</div>
										<div class="tab-pane <?php if ($_GET['tab']=="message") { ?> active <?php } ?>" id="tab7">
											<div class="card-body">
												<div class="pt-4 pb-4 text-end" align="right">
													<a  href="?c=<?php echo $_GET['c']?>&task=<?php echo $_GET['task']?>&id=<?php echo $_GET['id']?>&message=send" class="btn btn-primary">Compose New Message</a>
												</div>
                                                
                                                <div class="card" id="contSendMessage" style="display:none" >
								<div class="card-header border-0">
									<h4 class="card-title" id="id_headingMsg"></h4>
                                    
                                    
								</div>
								<div class="card-body" >
                                <form name="adminForm" id="adminForm" action="?c=<?php echo $component?>&task=sendmessage" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div>
                                     <label class="form-label">Select User Type *</label>
                                    <select class="form-control" name="rdUser" id="rdUser2" >
                                    	
                                        <option value="Patient">Send to Patient</option>
                                       <option value="Pharmacy">Send to Pharmacy</option>
                                        
                                        <option value="Admin">Send to Admin</option>
                                        
                                    </select>
                                   
                                     <div style="height:20px"></div>
									<div>
                                    <div style="height:20px"></div>
                                    <div>
                                    <label class="form-label">Subject *</label>
                                    <input type="text" class="form-control" name="txtSubject" id="txtSubject2"></div>
                                     <div style="height:20px"></div>
									<div>
                                    <label class="form-label">Message *</label>
                                    <textarea rows="5" class="form-control" cols="50" name="txtMessage"></textarea></div>
                                    <div style="height:20px"></div>
									<div class="form-group">
										
										<input class="form-control" name="flDoc[]" type="file" accept=".pdf,.jpg,.png">
                                        
                                       	<div id="cont_addmore_1"></div>
                                        <div style="padding-left:10px; padding-top:10px"><a href="javascript:void()" onclick="addMoreFile(1)">+ Add More Attachment</a></div>
                                        
                                        
										</div>
                                    
                                  <div class="card-footer">
									<button type="submit" class="btn btn-primary">Send</button>
									<a  href="javascript:void(0);" onclick="showMessagebox_close()" class="btn btn-danger">Cancel</a>
								</div>  
                                <input type="hidden" name="hid" value="<?php echo $_GET['id']?>" />
								</form>	
								</div>
								
							</div>
                            </div>
                            </div>
                                                
                                                
												
                                                
                                                 <?php 

														
														$sqlMessage="select * from tbl_messages where message_pres_id='".$database->filter($_GET['id'])."'  order by message_id desc";
														$resMessage=$database->get_results($sqlMessage);
														if (count($resMessage)>0)
														{
															
															for ($i=0;$i<count($resMessage);$i++)
															{
																
																$rowMessage=$resMessage[$i];																
																$mysqlDate = $rowMessage['message_date'];
																$timestamp = strtotime($mysqlDate);
																$formattedDate = date("d M Y", $timestamp);
																
																$formattedTime = date("H:i", $timestamp);
																
																
																if ($rowMessage['message_sent_to']=="Clinician")
																changeReadStatus($rowMessage['message_id']);
																
																
																			if ($rowMessage['message_sender_type']=="Patient")
																				{
																				$sqlSender="select * from tbl_patients where patient_id='".$rowMessage['message_sender_id']."'";
																				//else if ($rowMessage['message_sender_type']=="Clinician")
																				//$sqlSender="select * from tbl_prescribers where pres_id='".$rowMessage['message_sender_id']."'";
																				$resSender=$database->get_results($sqlSender);
																				$rowSender=$resSender[0];
																				$replierName=$rowSender['patient_first_name']." ".$rowSender['patient_middle_name']." ".$rowSender['patient_last_name']." (".$rowMessage['message_sender_type'].")";
																				$colorCss="danger";
																				}
																				else if ($rowMessage['message_sender_type']=="Clinician")
																				{
																					$name=getUserNameByType("clinician",$rowMessage['message_sender_id']);
																					$replierName=$name." (Clinicians)";
																					$colorCss="primary";
																				}
																				else if ($rowMessage['message_sender_type']=="Pharmacy")
																				{
																					$name=getUserNameByType("pharmacy",$rowMessage['message_sender_id']);
																					$replierName=$name." (Pharmacy)";
																					$colorCss="pink";
																				}
																				else if ($rowMessage['message_sender_type']=="Admin")
																				{
																					
																					$replierName="Admin";
																					$colorCss="orange";
																				}



														
													?>
                                                    <div class="card shadow-none border">
													<div class="d-sm-flex p-5">
													
                                                    
                                                    
                                                    
                                                    	
														<div class="media-body">
															<h5 class="mt-1 mb-1 font-weight-semibold"><?php echo $rowMessage['message_subject']?> <span class="badge badge-<?php echo $colorCss; ?>-light badge-md ms-2">Sent by: <?php echo $replierName; ?></span></h5>
															<small class="text-muted"><i class="fa fa-calendar"></i> <?php echo $formattedDate; ?> <i class=" ms-3 fa fa-clock-o"></i> <?php echo $formattedTime; ?></small>
                                                            
                                                            <span style="color:#00F;font-size:13px"><strong> 
                                                            	<?php if ($rowMessage['message_sent_to']=="Admin") echo 'Sent to Admin';
																if ($rowMessage['message_sent_to']=="Clinician") echo 'Sent to You';
																if ($rowMessage['message_sent_to']=="Patient") echo 'Sent to Patient';
																if ($rowMessage['message_sent_to']=="Pharmacy") echo 'Sent to Pharmacy';
																 ?>
                                                                 </strong>
                                                            </span>
															<p class="fs-13 mb-2 mt-1">
															   <?php echo $rowMessage['message_text']?>
															</p>
															 <!---------Attachment of new message------------>
                                                            
                                                             <?php if ($rowMessage['message_attachment']!="") {
																 
																 $arrUnSerMes=unserialize(fnUpdateHTML($rowMessage['message_attachment']));
																
																  ?>
                                                                    
                                                                    <div class="row">
                                                                    
                                                                    <?php for ($j=0;$j<count($arrUnSerMes);$j++) {
																		
																		
															$fileExtension = pathinfo($arrUnSerMes[$j], PATHINFO_EXTENSION);
															
															// Check if the file extension is PDF
															if (strtolower($fileExtension) === 'pdf') {
																// The file is a PDF
																$type="pdf";
															} elseif (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png'])) {
																// The file is an image
																$type="image";
															} 
																		
																		 ?>
                                                                        <div class="col-lg-2 col-md-3">
                                                                            <a  href="<?php echo URL?>uploads/patients/<?php echo $arrUnSerMes[$j]; ?>" download class="attach-supportfiles">
                                                                                
                                                                                <?php if ($type=="image") { ?>
                                                                                <img src="<?php echo URL?>uploads/patients/<?php echo $arrUnSerMes[$j]; ?>" style="max-height:100px" alt="<?php echo $arrUnSerMes[0]; ?>" title="<?php echo $arrUnSerMes[0]; ?>" class="img-fluid">
                                                                                <div class="attach-title"><?php echo $arrUnSerMes[0]; ?></div>
                                                                                <?php } else { ?>
                                                                                <img src="<?php echo URL?>images/pdf.png" style="max-height:100px" alt="<?php echo $arrUnSerMes[0]; ?>" title="<?php echo $arrUnSerMes[0]; ?>" class="img-fluid">
                                                                                <div class="attach-title"><?php echo $arrUnSerMes[0]; ?></div>
                                                                                <?php } ?>
                                                                                
                                                                            </a>
                                                                        </div>
                                                                      <?php } ?>
												
											</div>
                                            <?php } ?> 
                                            <!-----------end attachment------->
                                                            
                                                          <?php
														  
														 
														   if ($rowMessage['message_sender_type']!="Clinician") 
																{
																	if ($rowMessage['message_sender_type']=="Patient")
																	$r=1;
																	if ($rowMessage['message_sender_type']=="Pharmacy")
																	$r=2;
																	if ($rowMessage['message_sender_type']=="Admin")
																	$r=3;
																	
																	?>
                                            
                                            						<br />
                                            
																	<a  href="javascript:void(0);" onclick="showMessagebox(<?php echo $r?>,'<?php echo $rowMessage['message_subject']?>')" class="me-2 mt-1"><span class="badge badge-orange"><i class="fa fa-reply"></i> Reply</span></a>
															   <?php } ?>
                                                                
                                                               
                                                            
														</div>
                                                        
                                                        
                                                        
                                                        
													</div>
                                                    </div>
                                                    
                                                    <?php }
														}
														else
														
														echo "<p style='font-size:18px; padding:30px'>No communication yet for this order</p>";
														?>
												
												
											</div>
										
										
										
										
										
									</div>
                                    
                                    <div class="tab-pane" id="tab10">
                                    
                                    <div class="card-body">
												<div class="table-responsive">
													
													<table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="miles-tables">
														<thead>
															<tr>
																<th class="border-bottom-0 text-center w-5">No</th>
																<th class="border-bottom-0">Log Details</th>
																<th class="border-bottom-0">Date</th>
                                                                <th class="border-bottom-0">Action Taken by</th>
															
																
															</tr>
														</thead>
														<tbody>
                                                        
                                                        <?php $sqlLogs="select * from tbl_prescriptions_actions where pa_pres_id='".$database->filter($_GET['id'])."' order by pa_id desc";
														$resLogs=$database->get_results($sqlLogs);
														if (count($resLogs)>0)
														{
															for ($j=0;$j<count($resLogs);$j++)
															{
																$rowLogs=$resLogs[$j];
														 ?>
															<tr>
																<td class="text-center"><?php echo $j+1; ?></td>
																<td>
																	<?php echo $rowLogs['pa_action_details']?>
																</td>
																<td><?php echo displayDateTimeFormat($rowLogs['pa_date_time'])?></td>
																<td>
                                                                
                                                                	<?php
																		
																		echo getUserNameByType($rowLogs['pa_user_type'],$rowLogs['pa_user_id'])
																	
																	?>
                                                                
                                                                </td>
																
															</tr>
														<?php }
														}?>	
															
														</tbody>
													</table>
                                                    
                                                    
												</div>
											</div>
                                            
                                            
                                    
                                    </div>
                                    
								</div>
							</div>
						</div>
						<!-- End Row-->
                        
                        <div class="modal fade"  id="newNotes">
                 
                 <form action="?c=pres-prescriptions&task=savenotes" method="POST">
                 
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add New Notes</h5>
							<button  class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							
							
							
							
							<div class="form-group">
								<label class="form-label">Notes:</label>
								<textarea row="4" cols="100%" required class="form-control" placeholder="Type your notes here.." name="txtPNotes"></textarea>
                                <input type="hidden" name="hdPid"   value="<?php echo $_GET['id']?>" />
							</div>
							
							
						</div>
						<div class="modal-footer">
							<button  class="btn btn-outline-primary" data-dismiss="modal">Close</button>
							<button  class="btn btn-success">Submit</button>
						</div>
					</div>
				</div>
                
                </form>
			</div>

					</div><!-- end app-content-->
				</div>
		</div>
        


<script language="javascript">

function showCustomMessage()
{
	val=$("#cmbMessage").val();
	//alert (val);
	$("#txtSubject").val("");
	
	//$("#rdUser option:eq(0)").prop('selected', true);
	//$("#rdUser option:eq(2)").prop('disabled', false);
	
	if (val==3 || val==2)
	{
		$("#cont_custom").show();
		if (val==2)
		{
		$("#txtSubject").val("Could not reach you by telephone");
		
		$("#rdUser option:eq(0)").hide();
		$("#rdUser option:eq(1)").show();
		$("#rdUser option:eq(2)").hide();
		$("#rdUser option:eq(3)").hide();
		
		$("#rdUser option:eq(1)").prop('selected', true);
		
		
		
		}
		if (val==3)
		{
		
		$("#rdUser option:eq(0)").show();
		$("#rdUser option:eq(1)").show();
		$("#rdUser option:eq(2)").show();
		$("#rdUser option:eq(3)").show();
		
		$("#rdUser option:eq(0)").prop('selected', true);	
		}
	}
	else
	{
	$("#cont_custom").hide();
	
	
	
	}
	
}
function openFree(val)
{
	if (val=="Other")
	$("#txtReject").show();
	else
	{
	$("#txtReject").hide();
	}
	
}

function showMessagebox(r,subj)
{
	
	
	
	if (r==1)
	{
		
		
		$("#contSendMessage").show(500);
		
		$("#rdUser2 option:eq(0)").show();
		$("#rdUser2 option:eq(1)").hide();
		$("#rdUser2 option:eq(2)").hide();
		
		 $("#rdUser2 option:eq(0)").prop('selected', true);
		 // Disable the dropdown
		$("#id_headingMsg").html("Send message to Patient");
		$("#txtSubject2").val("Re: "+subj);
		// Scroll to the top of the page
		

		

	}
	else if (r==2)
	{
		$("#rdUser2 option:eq(1)").show();
		$("#rdUser2 option:eq(0)").hide();
		$("#rdUser2 option:eq(2)").hide();
		
		 $("#rdUser2 option:eq(1)").prop('selected', true);
		 // Disable the dropdown
		$("#contSendMessage").show(500);
		$("#id_headingMsg").html("Send message to Pharmacy");
		$("#txtSubject2").val("Re: "+subj);
	}
	
	else if (r==3)
	{
		 $("#rdUser2 option:eq(2)").show();
		$("#rdUser2 option:eq(0)").hide();
		$("#rdUser2 option:eq(1)").hide();
		
		 $("#rdUser2 option:eq(2)").prop('selected', true);
		 // Disable the dropdown
		$("#contSendMessage").show(500);
		$("#id_headingMsg").html("Send message to Admin");
		$("#txtSubject2").val("Re: "+subj);
	}
	
	$('html, body').animate({ scrollTop: 0 }, 'slow');
}
function showMessagebox_close()
{
	$("#contSendMessage").hide(500);
}
function sendReply(id)
{
	
	$("#contReplyMessage_"+id).toggle(500);
}

function addMoreFile(val)
{
	
	str='<div><input style="margin-top:15px" class="form-control" name="flDoc[]" type="file" accept=".pdf,.jpg,.png"></div>';
	$("#cont_addmore_"+val).append(str);
}
</script>

 <script language="javascript">

$("#adminForm").validate({
			rules: {
				txtSubject: "required",
				rdUser: "required",
				txtMessage: "required"
				
			},
			messages: {
				txtSubject: "Subject cannot be blank",
				rdUser: "Please select user type",
				txtMessage: "Please enter message"
				
				
				}			
		});
		
		function openNotes(val)
		{
			if (val==1)
			$("#txtNotes").toggle();
			else if (val==2)
			$("#txtPharmacyMsg").toggle();
		}
		
	function changeColors(val,op) {
		
		
		
		  var element = document.getElementById("btnApprove");    
		  element.style.backgroundColor = "#dee5f7";     
		  element.style.color = "#565b95";
		  
		  var element = document.getElementById("btnQuery");    
		  element.style.backgroundColor = "#dee5f7";     
		  element.style.color = "#565b95";
		  
		  var element = document.getElementById("btnReject");    
		  element.style.backgroundColor = "#dee5f7";     
		  element.style.color = "#565b95";
		  
		  var element = document.getElementById("btnCancel");    
		  element.style.backgroundColor = "#dee5f7";     
		  element.style.color = "#565b95";
		  
		  
		  		   
		   $("#cmbRejectReason").val($("#cmbRejectReason option:first").val());
		   $("#cmbRejectReason").hide();
		  
		   $("#txtReject").hide();
		   $("#contSendMessage_2").hide();
		
	
		if (val==1)
		{
		  var element = document.getElementById("btnApprove");    
		  element.style.backgroundColor = "green";     
		  element.style.color = "#fff";
		  $("#hdOutcomes").val(6);
		  
		  
		} else if (val==2)
		{
		  var element = document.getElementById("btnReject");    
		  element.style.backgroundColor = "red";     
		  element.style.color = "#fff";
		  $("#hdOutcomes").val(4);
		  if (op==1)
		  $("#cmbRejectReason").show();
		  
		} else if (val==3)
		{
		  var element = document.getElementById("btnQuery");    
		  element.style.backgroundColor = "orange";     
		  element.style.color = "#fff";
		  $("#hdOutcomes").val(2);
		  if (op==1)
		  $("#contSendMessage_2").show();
		} else if (val==4)
		{
		  var element = document.getElementById("btnCancel");    
		  element.style.backgroundColor = "red";     
		  element.style.color = "#fff";
		  $("#hdOutcomes").val(5);
		  if (op==1)
		  $("#txtReject").show();
		}
    }
	
	function submitPres()
	{
		
		if ($("#hdOutcomes").val()=="")
		{
			alert ("Please select the outcome before submitting");
			return false;
		}
		else
		return true;
	}
	

  window.onload = function() {
            // Check if the query string parameter 'message' is set to 'send'
            var queryString = window.location.search;
            if (queryString.includes("message=send")) {
                // Scroll to the element with id 'message'
                var element = document.getElementById("message");
                if (element) {
                    element.scrollIntoView();
					 changeColors(3,1); 
					
                }
            }
        };

	
	  <?php
			 
			 if ($rowPres['pres_stage']==4)
			 { ?>
			 
			 changeColors(2,0);            
             
             <?php }  else if ($rowPres['pres_stage']==6)
			 { ?>
			 
			 changeColors(1,0);            
             
             <?php } else if ($rowPres['pres_stage']==2)
			 { ?>
			 
			 changeColors(3,1);            
             
             <?php }
			  ?>
			  

</script>


           <?php
				  
			 
			 
			 
			 } ?>
  