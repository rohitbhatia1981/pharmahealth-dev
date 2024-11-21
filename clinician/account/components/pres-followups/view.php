		

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
		.trrow:hover {
		  background-color:#F1F4FB;
		  cursor:pointer;
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

			<!-- Row -->
	<div class="row flex-lg-nowrap">
    
   			<div class="col-12">
        <div class="tab-menu-heading hremp-tabs p-0 ">
        <div class="tabs-menu1">
										<!-- Tabs -->
										<ul class="nav panel-tabs">
                                        
                                       
                                        <li><a href="?c=<?php echo $_GET['c']?>&ty="  <?php if ($_GET['ty']=="") { ?> class="active" <?php } ?> >Open</a></li>
										
                                        <li ><a href="?c=<?php echo $_GET['c']?>&ty=cl" <?php if ($_GET['ty']=="cl") { ?> class="active" <?php } ?>>Closed</a></li>
                                        
                                       
                                            
                                            
                                            
											
											
											
										</ul>
									</div>
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
                           
                           					<div class="col-md-12 col-lg-12 col-xl-3">
														<div class="form-group">
															<label class="form-label">Search with Keyword:</label>
															<div class="input-group">
																<div class="input-group-prepend">
																	
																</div><input class="form-control" name="txtSearch" placeholder="" type="text" value="<?php echo $_GET['txtSearch']?>">
															</div>
														</div>
													</div>
                                                 
                                                 <div class="col-md-12 col-lg-12 col-xl-3">
												<div class="form-group">
													<label class="form-label">Condition:</label>
                                                    
                                                  
                                                    <select name="condition" class="form-control" >
                                                	<option value="">All Conditions</option>
                                                    <?php
													$query = "SELECT * FROM tbl_conditions where condition_status=1 order by condition_title";
													$results = $database->get_results( $query );
											
													foreach ($results as $value)
										 			{
													 ?>
                                                     
                                                     <option value="<?php echo $value['condition_id']; ?>" <?php if ($_GET['condition']==$value['condition_id']) echo "selected"; ?>><?php echo $value['condition_title']; ?></option>
													 <?php
                                                    }
                                                    ?>
                                                     
                                                     
                                                </select>
													
												</div>
											</div>
                                                 
                           
                           
											
											
											<div class="col-md-12 col-lg-12 col-xl-3">
												<div class="form-group">
													<label class="form-label">Follow-Up Review Due Date:</label>
                                                    
                                                  
                                                    
													<input class="form-control fc-datepicker" name="txtFrom" placeholder="" type="date" value="<?php echo $_GET['txtFrom']?>">
												</div>
											</div>
                                            
                                            
                                            <div class="col-md-12 col-lg-12 col-xl-3">
												<div class="form-group">
													<label class="form-label">Follow-up Review Date To:</label>
                                                    
                                                  
                                                    
													<input class="form-control fc-datepicker" name="txtTo" placeholder="" type="date" value="<?php echo $_GET['txtTo']?>">
												</div>
											</div>
                                            
                                            
                                            
											<div class="col-md-12 col-lg-12 col-xl-1">
												<div class="form-group mt-5">
                                                <input type="hidden" name="ty" value="<?php echo $_GET['ty']?>" />
													<button type="submit" class="btn btn-primary btn-block">Search</button>
                                                    
                                                     <?php $qS=$_SERVER['QUERY_STRING'];
												   if (strstr($qS,"txtDateFrom"))
												   {
												    ?>
                                                    <a href="?c=<?php echo $_GET['c']?>" style="font-size:11px; color:#03C">Reset filter</a>
                                                   <?php } ?>
												</div>
											</div>
										</div>
								<div class="table-responsive table-lg mt-3">
									<table class="table table-bordered border-top" id="example1" width="100%">
										<thead>
											<tr>
												
												
                                                <th width="20%" class="border-bottom-0">Prescription Details</th>
                                                <th width="12%" class="border-bottom-0">Follow up due on</th>
                                                <th width="10%" class="border-bottom-0">Patient Name</th>
                                                <th width="8%" class="border-bottom-0">Age</th>
                                                <th width="10%" class="border-bottom-0">Condition</th>
                                                <th width="17%" class="border-bottom-0">Medication</th>
                                               <!-- <th width="16%" class="border-bottom-0">Patient Email</th>
                                                <th width="11%" class="border-bottom-0">Patient Phone</th>-->
                                                
                                                <th width="10%" class="border-bottom-0">Requested By </th>                                                
                                               
                                                <th width="13%" class="border-bottom-0 w-20">Status & Actions</th>
											</tr>
										</thead>
                                        <tbody>
							<?php

							if($totalRecords > 0) 

							{

							for ($i = 0; $i < $totalRecords; $i++) 

							{

							$srno++;

							$row = &$rows[$i];
							
							if ($row['message_read_status']==0)
							$readStatus="bold";
							else
							$readStatus="normal";



							?>				
							
								<tr  >
									
									
                                    <td class="align-middle" >
                                    
                                    <!--<a href="?c=<?php echo $component?>&task=detail&id=<?php echo $row['patient_id']; ?>"><?php echo $row['patient_id'] ?></a>-->
                                    
									<div class="card-body pb-0 pt-3">
										<div>
											<label><?php echo $row['message_subject']; ?></label>
											<p >Order ID: <a href="?c=pres-prescriptions&task=detail&id=<?php echo $row['pres_id']; ?>" style="color:#06F; text-decoration:underline" target="_blank">PH-<?php echo $row['pres_id'] ?></a>, <br />Order Date: <?php echo  date("d/m/Y",strtotime($row['pres_date'])); ?></p>
										</div>
									</div>	
												
											
									</td>
                                     <td class="align-middle"><?php echo  date("d M Y",strtotime($row['follow_up_date'])); ?>
                                     
                                     <?php
									 $followUpDate = new DateTime($row['follow_up_date']);
									$currentDate = new DateTime(); // Defaults to the current date
									
									// Compare dates
									if ($followUpDate < $currentDate) {
										echo "<br><font style='color:#F00;font-size:13px'>Overdue</font>";
									} 

									?>
                                     
                                    
                                     
                                     
                                     </td>
                                     
                                    <td><?php echo $name=$row['patient_first_name']." ".$row['patient_last_name']; ?></td>
                                    <td><?php 
									
									$from = new DateTime($row['patient_dob']);
									$to   = new DateTime('today');
									echo $from->diff($to)->y;
									
									$row['patient_dob'] ?></td>
                                    <td><?php echo getConditionName($row['pres_condition']); ?></td>
                                    <td><?php 
																$sqlMedicine="select * from tbl_prescription_medicine where pm_pres_id='".$database->filter($row['pres_id'])."'";
																$resMedicine=$database->get_results($sqlMedicine);
																for ($m=0;$m<count($resMedicine);$m++)
																{
																	$rowMedicine=$resMedicine[$m];
																	
																	echo $rowMedicine['pm_med']." - ".$rowMedicine['pm_med_qty'];
																	echo "<br>";
															
                                                            
                                                            
                                                           }
														   
														   ?></td>
                                    
                                    
                                   <!-- <td class="align-middle"><?php echo $row['patient_email']; ?></td>
                                    <td class="align-middle"><?php echo $row['patient_phone']; ?></td>-->
                                    
                                    
                                    
                                    <td class="align-middle">
										
												<?php echo getUserNameByType('clinician',$row['follow_up_added_by']); ?>
											
									</td>
                                    
                                   
                                    
                                   
                                    
                                   
                                    
                                    <td>
                                    <div class="d-flex">
											<div class="ml-3 mt-1">
												<?php if ($row['follow_up_active']==1) { ?>
                                                			<font style="color:#090; font-weight:bold">Open</font>
                                                 <?php } else { ?>
                                                 
                                                 		<font style="color:#960; font-weight:bold">Closed</font>
                                                 <?php } ?>
                                                            <br /><br />
                                                
                                                			<?php if ($row['follow_up_active']==1) { ?>
															<span class="tag tag-pink"><a href="#" data-toggle="modal" data-target="#newModel" data-id="<?php echo $row['follow_up_id']?>" class="tag tag-pink">Take Action</a></span>
                                                            <?php } else { ?>
                                                            <span class="tag tag-pink"><a href="#" data-toggle="modal" data-target="#newModel" data-id="<?php echo $row['follow_up_id']?>" class="tag tag-pink">View Logs</a></span>
                                                            <?php } ?>
                                                            
                                                           <!-- <br /><br />
                                                            <a href="#" style="color:#06F">Response Required</a>-->
                                                          
                                                           
											</div>
										</div>
                                     </td>
									

									
								</tr>
                                
                                
                                

								<?php

}

}

else

{

	?>

	<tr>

		<th class="border-bottom-0 w-10" style="text-align:center;" colspan="11"> - No Record found - </th>
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
            
            <div class="modal fade"  id="newModel">                 
                
                 
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content" id="modalContent">                   
                     
                    
				</div>
			</div>
           	</div>
            
            <script language="javascript">
			
			$(document).ready(function() {
   
				$('#newModel').on('show.bs.modal', function (e) {
				 var dataId = $(e.relatedTarget).data('id');
					$.ajax({
						url: 'ajax/edit-follow-up.php',  // Replace with your server-side script
						method: 'GET',
						data: { id: dataId },
						success: function(response) {
						 
							$('#modalContent').html(response);
						},
						error: function() {
						  
							$('#modalContent').html('<p>Error loading content. Please try again later.</p>');
						}
					});
				});
			
				
				$('#newModel').on('hidden.bs.modal', function () {
					$('#modalContent').html('<p>Loading...</p>');
				});
			});
			

			
			</script>


             <?php } ?>

	<!-----------End Listing function------------------>

    

    

    <?php function createFormForPagesHtml(&$rows) {

	$row=array();

	global $component, $database;

	$row = &$rows[0];

	

	$sqlmenuid = "select * from tbl_components where component_option='".$database->filter($_GET['c'])."'";

			$getmenuid = $database->get_results( $sqlmenuid );

			//print_r($getmenuid);

			$menuid = $getmenuid[0];

	 ?>
	 
<!--Page header-->
<div class="page-header d-lg-flex d-block">
	<div class="page-leftheader">
	<h4 class="page-title">Patient : <?php if ($_GET['task']=="edit") echo 'Edit'; else if ($_GET['task']=="add") echo 'Add'; else if ($_GET['task']=="detail") echo 'Detail'; ?></h4>
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
								<div class="card">

				<?php

						if ($_GET['task']=="edit")

						$task="saveedit";

						else

						$task="save";

				?>
   <form name="pages" id="pages" action="?c=<?php echo $component?>&task=<?php echo $task;?>" method="post" class="form-horizontal" />
   <div class="card-body pb-2">
						

					<div class="form-group">
								<label class="form-label">Title *</label>
								<select class="form-control" name="txtTitle" id="txtTitle" required >
										<option label="Select Title"></option>
										<?php
				$query = "SELECT * FROM tbl_titles where title_status=1";
				$results = $database->get_results( $query );
							
						foreach ($results as $value) {

									?>

								<option value="<?php echo $value['title_id']; ?>"  <?php if($row['patient_title'] == $value['title_id']) {	echo 'selected="selected"';}?>  ><?php echo $value['title_name']; ?></option>

							<?php	

							}

							?> 

									
									</select>
							</div>
                            
                           <div class="form-group">
								<label class="form-label">First Name *</label>
								<input class="form-control mb-4" type="text" id="txtFirstName" name="txtFirstName" value="<?php echo $row['patient_first_name']?>" required>
							</div>
                            
                             <div class="form-group">
								<label class="form-label">Middle Name</label>
								<input class="form-control mb-4" type="text" id="txtMiddleName" name="txtMiddleName" value="<?php echo $row['patient_middle_name']?>">
							</div>
                            
                             <div class="form-group">
								<label class="form-label">Last Name *</label>
								<input class="form-control mb-4" type="text" id="txtLastName" name="txtLastName" value="<?php echo $row['patient_last_name']?>" required>
							</div>
                            
                            <div class="form-group">
								<label class="form-label">Pharmacy *</label>
								<select class="form-control" name="cmbPharmacy" id="cmbPharmacy" required >
										<option label="Select Pharmacy"></option>
										<?php
				$query = "SELECT * FROM tbl_pharmacies where pharmacy_status=1";
				$results = $database->get_results( $query );
							
						foreach ($results as $value) {

									?>

								<option value="<?php echo $value['pp_id']; ?>"  <?php if($row['patient_pharmacy'] == $value['pharmacy_id']) {	echo 'selected="selected"';}?>  ><?php echo $value['pharmacy_name']; ?></option>

							<?php	

							}

							?> 

									
									</select>
							</div>
                            
                             <div class="form-group">
								<label class="form-label">Email *</label>
								<input class="form-control mb-4" type="email" id="txtEmail" name="txtEmail" value="<?php echo $row['patient_email']?>" required>
							</div>
                            
                             <div class="form-group">
								<label class="form-label">Password *</label>
								<input class="form-control mb-4" type="text" id="txtPassword" name="txtPassword" value="<?php echo $row['patient_password']?>" required>
							</div>
                            
                            <div class="form-group">
								<label class="form-label">Phone *</label>
								<input class="form-control mb-4" type="text" id="txtPhone" name="txtPhone" value="<?php echo $row['blog_title']?>" required>
							</div>
                            
                            <div class="form-group">
								<label class="form-label">Gender *</label>
								<select class="form-control" name="cmbGender" id="cmbGender" required >
										<option label="Select Gender"></option>
										<?php
				$query = "SELECT * FROM tbl_gender where gender_status=1";
				$results = $database->get_results( $query );
							
						foreach ($results as $value) {

									?>

								<option value="<?php echo $value['gender_id']; ?>"  <?php if($row['pateint_gender'] == $value['gender_id']) {	echo 'selected="selected"';}?>  ><?php echo $value['gender_name']; ?></option>

							<?php	

							}

							?> 

									
									</select>
							</div>
					
                    		<div class="form-group">
								<label class="form-label">Date of Birth *</label>
                                
                                <div class="row">
									<div class="col-lg-2 col-md-2">
									<select class="form-control custom-select select2" name="cmbDate" id="cmbDate" required >
										<option value="">Select Date</option>
                                       <?php for ($k=1;$k<=31;$k++) 
									   {
										   if ($k<10)
										   $prefix="0";
										   else
										   $prefix="";
										   ?>
                                        <option value="<?php echo $prefix.$k; ?>"><?php echo $prefix.$k; ?></option>				
                                       <?php } ?>
									</select>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
									<select class="form-control custom-select select2" name="cmbMonth" id="cmbMonth" required >
										<option value="">Select Month</option>
                                       
										<?php for ($r = 1; $r <= 12; $r++){
                                            $month_name = date('F', mktime(0, 0, 0, $r, 1, 2023));
                                            echo '<option value="'.$r.'">'.$month_name.'</option>';
                                        }?>				
									</select>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
									<select class="form-control custom-select select2" name="cmbYear" id="cmbYear" required >
										<option value="">Select Year</option>
                                        <?php
										$year=date("Y");
										 for ($y=$year-18;$y>=$year-118;$y--) { ?>
                                        <option value=""><?php echo $y; ?></option>				
                                        <?php } ?>
									</select>
                                    </div>
                                </div>
							</div>
                            
                            <div class="form-group">
								<label class="form-label">Address 1</label>
								<input class="form-control mb-4" type="text" id="txtAddress1" name="txtAddress1" value="<?php echo $row['blog_title']?>">
							</div>
                            
                             <div class="form-group">
								<label class="form-label">Address 2</label>
								<input class="form-control mb-4" type="text" id="txtAddress2" name="txtAddress2" value="<?php echo $row['blog_title']?>">
							</div>
                            
                            <div class="form-group">
								<label class="form-label">City *</label>
								<input class="form-control mb-4" type="text" id="txtCity" name="txtCity" value="<?php echo $row['blog_title']?>" required>
							</div>
                            
                            

						<div class="form-group ">
						<div class="form-label">KYC Status</div>
						<div class="custom-controls-stacked">
							<label class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" name="rdoKYC" id="rdoKYC" value="1" <?php if($row['page_status']=="1" || $row['page_status']=='') echo 'checked="checked"'; ?>>
								<span class="custom-control-label">Yes</span>
							</label>
							<label class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" name="rdoPublished" id="rdoPublished" value="0" <?php if($row['page_status']==0 && $row['page_status']!='') echo 'checked="checked"'; ?>>
								<span class="custom-control-label">No</span>
							</label>
					
						</div>
					</div>	

							
			
					



						<div class="form-group ">
						<div class="form-label">Enabled</div>
						<div class="custom-controls-stacked">
							<label class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" name="rdoPublished" id="rdoPublished" value="1" <?php if($row['page_status']=="1" || $row['page_status']=='') echo 'checked="checked"'; ?>>
								<span class="custom-control-label">Yes</span>
							</label>
							<label class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" name="rdoPublished" id="rdoPublished" value="0" <?php if($row['page_status']==0 && $row['page_status']!='') echo 'checked="checked"'; ?>>
								<span class="custom-control-label">No</span>
							</label>
					
						</div>
					</div>
				
						
					<div class="row row-sm">
					<div class="col-lg">
					<button  class="btn btn-primary mt-4 mb-0">Submit</button>	
					</div>
					</div>	

<input type="hidden" name="pageId" value="<?php echo $row['page_id']?>" />	
<input type="hidden" name="userId" value="<?php echo $row['user_id']?>" />

<input type="hidden" name="parentgroupId" value="<?php echo $_SESSION['sess_prescriber_groupid']?>" />

<input type="hidden" name="parentuserId" value="<?php echo $_SESSION['sess_patient_id']?>" />
	</form>					
								</div>


             <?php } ?>

     <?php function createFormForPagesHtml_details(&$rows) {

	$row=array();

	global $component, $database;

	$row = &$rows[0];

	

	$sqlmenuid = "select * from tbl_components where component_option='".$database->filter($_GET['c'])."'";

			$getmenuid = $database->get_results( $sqlmenuid );

			//print_r($getmenuid);

			$menuid = $getmenuid[0];

	 ?>
	 
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

						
						<!--End Page header-->

						<!-- Row -->
						<div class="row">
							<div class="col-xl-4 col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header  border-0">
										<div class="card-title">Prescription Status: <span class="tag tag-green">Approved by Prescriber</span></div>
									</div>
									<div class="card-body pt-2 pl-3 pr-3">
										<div class="table-responsive">
											<table class="table">
												<tbody>
													
													<tr>
														<td>
															<span class="w-50">Order Number</span>
														</td>
														<td>:</td>
														<td>
															PH-23432
														</td>
													</tr>
													
													
													<tr>
														<td>
															<span class="w-50">Condition</span>
														</td>
														<td>:</td>
														<td>
															<span class="font-weight-semibold">Nausea, Vomit</span>
														</td>
													</tr>
                                                    
                                                    <tr>
														<td>
															<span class="w-50">Address</span>
														</td>
														<td>:</td>
														<td>
                                                        
															<span class="font-weight-semibold">Tedlafil - 10 mg</span>
														</td>
													</tr>
                                                    
													
													
													<tr>
														<td>
															<span class="w-50">Prescription Status</span>
														</td>
														<td>:</td>
														<td>
                                                        
                                                        	<span class="badge badge-primary">Active</span>
                                                            
														</td>
													</tr>
                                                    
                                                    <tr>
														<td>
															<span class="w-50">Prescription Expires</span>
														</td>
														<td>:</td>
														<td>
                                                        
                                                        	15 Jan, 2023
															
														</td>
													</tr>
                                                    
												</tbody>
											</table>
										</div>
										
									</div>
								</div>
								
							</div>
							<div class="col-xl-8 col-md-12 col-lg-12">
								<div class="tab-menu-heading hremp-tabs p-0 ">
									<div class="tabs-menu1">
										<!-- Tabs -->
										<ul class="nav panel-tabs">
											<li class="ml-4"><a href="#tab5" class="active"  data-toggle="tab">Order Details</a></li>
											<li><a href="#tab6" data-toggle="tab">Completed Medical Assessment</a></li>
											<li><a href="#tab7"  data-toggle="tab">Messages</a></li>
											
										</ul>
									</div>
								</div>
								<div class="panel-body tabs-menu-body hremp-tabs1 p-0">
									<div class="tab-content">
										<div class="tab-pane active" id="tab5">
											<div class="card-body">
												<div class="table-responsive">
										<table class="table card-table table-vcenter text-nowrap mb-0">
											<thead >
												<tr>
													
													<th>Medicine Name</th>
													<th>Quantity</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													
													<td>Metroprolol (Lopressor) 12 mg</td>
													<td>20 Tabs (2 months)</td>
													<td><?php echo CURRENCY?>25</td>
												</tr>
												<tr>
													
													<td>Montair LC 12 mg</td>
													<td>20 Tabs (2 months)</td>
													<td><?php echo CURRENCY?>25</td>
												</tr>
												
											</tbody>
										</table>
									</div>
											</div>
										</div>
										<div class="tab-pane" id="tab6">
											<div class="card-body">
												<div class="table-responsive">
                                                
                                                Not available yet!
													
													<!--<table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="task-list">
														<thead>
															<tr>
																<th class="border-bottom-0 text-center">No</th>
																<th class="border-bottom-0">Task</th>
																<th class="border-bottom-0">Client</th>
																<th class="border-bottom-0">Assign To</th>
																<th class="border-bottom-0">Priority</th>
																<th class="border-bottom-0">Start Date</th>
																<th class="border-bottom-0">Deadline</th>
																<th class="border-bottom-0">Project Status</th>
																<th class="border-bottom-0">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="text-center">1</td>
																<td>
																	<a href="#" class="d-flex sidebarmodal-collpase">
																		<span>Design Updated</span>
																	</a>
																</td>
																<td>
																	<a href="#" class="font-weight-semibold">Julia Walker</a>
																</td>
																<td>
																	<a href="#" class="d-flex">
																		<span class="avatar avatar brround mr-3" style="background-image: url(../../assets/images/users/4.jpg)"></span>
																		<div class="mr-3 mt-0 mt-sm-2 d-block">
																			<h6 class="mb-1 fs-14">Melanie Coleman</h6>
																		</div>
																	</a>
																</td>
																<td><span class="badge badge-danger-light">High</span></td>
																<td>12-02-2021</td>
																<td>16-06-2021</td>
																<td>
																	<div class="d-flex align-items-end justify-content-between">
																		<h6 class="fs-12">Status</h6>
																		<h6 class="fs-12">62%</h6>
																	</div>
																	<div class="progress h-1">
																		<div class="progress-bar bg-success w-60"></div>
																	</div>
																</td>
																<td>
																	<div class="d-flex">
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="View"><i class="feather feather-eye  text-primary"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="feather feather-edit-2  text-success"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Delete"><i class="feather feather-trash-2 text-danger"></i></a>
																	</div>
																</td>
															</tr>
															<tr>
																<td class="text-center">2</td>
																<td>
																	<a href="#" class="d-flex sidebarmodal-collpase">
																		<span>Code Updated</span>
																	</a>
																</td>
																<td>
																	<a href="#" class="font-weight-semibold">Diane Short</a>
																</td>
																<td>
																	<a href="#" class="d-flex">
																		<span class="avatar avatar brround mr-3" style="background-image: url(../../assets/images/users/15.jpg)"></span>
																		<div class="mr-3 mt-0 mt-sm-2 d-block">
																			<h6 class="mb-1 fs-14">Justin Parr</h6>
																		</div>
																	</a>
																</td>
																<td><span class="badge badge-success-light">Low</span></td>
																<td>01-01-2021</td>
																<td>22-04-2021</td>
																<td>
																	<div class="d-flex align-items-end justify-content-between">
																		<h6 class="fs-12">Status</h6>
																		<h6 class="fs-12">45%</h6>
																	</div>
																	<div class="progress h-1">
																		<div class="progress-bar bg-success w-45"></div>
																	</div>
																</td>
																<td>
																	<div class="d-flex">
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="View"><i class="feather feather-eye  text-primary"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="feather feather-edit-2  text-success"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Delete"><i class="feather feather-trash-2 text-danger"></i></a>
																	</div>
																</td>
															</tr>
															<tr>
																<td class="text-center">3</td>
																<td>
																	<a href="#" class="d-flex sidebarmodal-collpase">
																		<span>Issues fixed </span>
																	</a>
																</td>
																<td>
																	<a href="#" class="font-weight-semibold">Pippa Welch</a>
																</td>
																<td>
																	<a href="#" class="d-flex">
																		<span class="avatar avatar brround mr-3" style="background-image: url(../../assets/images/users/5.jpg)"></span>
																		<div class="mr-3 mt-0 mt-sm-2 d-block">
																			<h6 class="mb-1 fs-14">Amelia Russell</h6>
																		</div>
																	</a>
																</td>
																<td><span class="badge badge-warning-light">Medium</span></td>
																<td>11-04-2021</td>
																<td>16-06-2021</td>
																<td>
																	<div class="d-flex align-items-end justify-content-between">
																		<h6 class="fs-12">Status</h6>
																		<h6 class="fs-12">53%</h6>
																	</div>
																	<div class="progress h-1">
																		<div class="progress-bar bg-success w-50"></div>
																	</div>
																</td>
																<td>
																	<div class="d-flex">
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="View"><i class="feather feather-eye  text-primary"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="feather feather-edit-2  text-success"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Delete"><i class="feather feather-trash-2 text-danger"></i></a>
																	</div>
																</td>
															</tr>
															<tr>
																<td class="text-center">4</td>
																<td>
																	<a href="#" class="d-flex sidebarmodal-collpase">
																		<span>Testing</span>
																	</a>
																</td>
																<td>
																	<a href="#" class="font-weight-semibold">Lisa Vance</a>
																</td>
																<td>
																	<a href="#" class="d-flex">
																		<span class="avatar avatar brround mr-3" style="background-image: url(../../assets/images/users/14.jpg)"></span>
																		<div class="mr-3 mt-0 mt-sm-2 d-block">
																			<h6 class="mb-1 fs-14">Ryan Young</h6>
																		</div>
																	</a>
																</td>
																<td><span class="badge badge-success-light">Low</span></td>
																<td>11-04-2021</td>
																<td>16-06-2021</td>
																<td>
																	<div class="d-flex align-items-end justify-content-between">
																		<h6 class="fs-12">Status</h6>
																		<h6 class="fs-12">67%</h6>
																	</div>
																	<div class="progress h-1">
																		<div class="progress-bar bg-success w-65"></div>
																	</div>
																</td>
																<td>
																	<div class="d-flex">
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="View"><i class="feather feather-eye  text-primary"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Edit"><i class="feather feather-edit-2  text-success"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Delete"><i class="feather feather-trash-2 text-danger"></i></a>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>-->
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab7">
											<div class="card-body">
                                            
                                            No messages yet!
                                            
												<!--<div class="table-responsive">
													<a href="#" class="btn btn-primary btn-tableview">Upload Files</a>
													<table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="files-tables">
														<thead>
															<tr>
																<th class="border-bottom-0 text-center w-5">No</th>
																<th class="border-bottom-0">File Name</th>
																<th class="border-bottom-0">Upload By</th>
																<th class="border-bottom-0">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="text-center">1</td>
																<td>
																	<a href="#" class="font-weight-semibold fs-14 mt-5">document.pdf<span class="text-muted ml-2">(23 KB)</span></a>
																	<div class="clearfix"></div>
																	<small class="text-muted">2 hours ago</small>
																</td>
																<td>Client</td>
																<td>
																	<div class="d-flex">
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="View"><i class="feather feather-eye  text-primary"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Download"><i class="feather feather-download   text-success"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Delete"><i class="feather feather-trash-2 text-danger"></i></a>
																	</div>
																</td>
															</tr>
															<tr>
																<td class="text-center">2</td>
																<td>
																	<a href="#" class="font-weight-semibold fs-14 mt-5">image.jpg<span class="text-muted ml-2">(2.67 KB)</span></a>
																	<div class="clearfix"></div>
																	<small class="text-muted">1 day ago</small>
																</td>
																<td>Admin</td>
																<td>
																	<div class="d-flex">
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="View"><i class="feather feather-eye  text-primary"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Download"><i class="feather feather-download   text-success"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Delete"><i class="feather feather-trash-2 text-danger"></i></a>
																	</div>
																</td>
															</tr>
															<tr>
																<td class="text-center">3</td>
																<td>
																	<a href="#" class="font-weight-semibold fs-14 mt-5">Project<span class="text-muted ml-2">(578.6MB)</span></a>
																	<div class="clearfix"></div>
																	<small class="text-muted">1 day ago</small>
																</td>
																<td>Team Lead</td>
																<td>
																	<div class="d-flex">
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="View"><i class="feather feather-eye  text-primary"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Download"><i class="feather feather-download   text-success"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="Delete"><i class="feather feather-trash-2 text-danger"></i></a>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>-->
											</div>
										</div>
										
										
										<div class="tab-pane" id="tab10">
											<div class="card-body">
                                            
                                            No Payments found!
												<!--<table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="invoice-tables">
														<thead>
															<tr>
																<th class="border-bottom-0">InvoiceID</th>
																<th class="border-bottom-0">Amount</th>
																<th class="border-bottom-0">Invoice Date</th>
																<th class="border-bottom-0">Due Date</th>
																<th class="border-bottom-0">Payment</th>
																<th class="border-bottom-0">Status</th>
																<th class="border-bottom-0">Actions</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<a href="#">INV-0478</a>
																</td>
																<td>$345.00</td>
																<td>12-01-2021</td>
																<td>14-02-2021</td>
																<td>
																	<span class="text-primary">$345.000</span>
																</td>
																<td><span class="badge badge-success-light">Paid</span></td>
																<td>
																	<div class="d-flex">
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="feather feather-eye  text-primary"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download"><i class="feather feather-download   text-success"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="feather feather-trash-2 text-danger"></i></a>
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<a href="#">INV-1245</a>
																</td>
																<td>$834.00</td>
																<td>12-01-2021</td>
																<td>14-02-2021</td>
																<td>
																	<span class="text-primary">$834.000</span>
																</td>
																<td><span class="badge badge-danger-light">UnPaid</span></td>
																<td>
																	<div class="d-flex">
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="feather feather-eye  text-primary"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download"><i class="feather feather-download   text-success"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="feather feather-trash-2 text-danger"></i></a>
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<a href="#">INV-5280</a>
																</td>
																<td>$16,753.00</td>
																<td>21-01-2021</td>
																<td>15-01-2021</td>
																<td>
																	<span class="text-primary">$16,753.000</span>
																</td>
																<td><span class="badge badge-success-light">Paid</span></td>
																<td>
																	<div class="d-flex">
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="feather feather-eye  text-primary"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download"><i class="feather feather-download   text-success"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="feather feather-trash-2 text-danger"></i></a>
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<a href="#">INV-2876</a>
																</td>
																<td>$297.00</td>
																<td>05-02-2021</td>
																<td>21-02-2021</td>
																<td>
																	<span class="text-primary">$297.000</span>
																</td>
																<td><span class="badge badge-success-light">Paid</span></td>
																<td>
																	<div class="d-flex">
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="feather feather-eye  text-primary"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download"><i class="feather feather-download   text-success"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="feather feather-trash-2 text-danger"></i></a>
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<a href="#">INV-1986</a>
																</td>
																<td>$12,897.00</td>
																<td>01-01-2021</td>
																<td>24-02-2021</td>
																<td>
																	<span class="text-primary">$12,897.00</span>
																</td>
																<td><span class="badge badge-danger-light">UnPaid</span></td>
																<td>
																	<div class="d-flex">
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="feather feather-eye  text-primary"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download"><i class="feather feather-download   text-success"></i></a>
																		<a href="#" class="action-btns1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="feather feather-trash-2 text-danger"></i></a>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>-->
											</div>
										</div>
										<div class="tab-pane" id="tab11">
											<div class="card-body">
												No log history yet!
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row-->

					</div><!-- end app-content-->
				</div>
		</div>
</div>

             <?php } ?>
  