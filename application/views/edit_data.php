<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Data</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		
		<form method="post">
			<!-- <div class="text-center"><h2>General Info</h2></div>
			<div id="general_info">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="company">Company</label>
							<input type="text" class="form-control" name="company" placeholder="Enter Company Name" value="<?= $details['company']?>" required readonly>
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="company_turnover">Company Turnover</label>
							<input type="text" class="form-control" name="company_turnover" placeholder="Company Turnover" value="<?= $details['company_turnover']?>" required readonly>
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="industry_sector">Industry</label>
							<input type="text" class="form-control" name="industry_sector" placeholder="Industry" value="<?= $details['industry_sector']?>" required readonly>
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="no_of_outlets">Sector</label>
							<input type="text" class="form-control" name="no_of_outlets" placeholder="Sector" value="<?= $details['no_of_outlets']?>" required readonly>
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="no_of_units">No of Units/Outlets</label>
							<input type="number" class="form-control" name="no_of_units" placeholder="No of Units/Outlets" value="<?= $details['no_of_units']?>" required readonly>
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="attrition">Attrition(%)</label>
							<input type="number" class="form-control" name="attrition" placeholder="Attrition" value="<?= $details['attrition']?>" required readonly max="100">
						</div>
					</div>
				</div>
			</div>
			<hr> -->
			<div class="text-center"><h2>Add Training Details</h2></div>
			<hr>
			<div id="training_details">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="company">Company</label>
							<input type="text" class="form-control" name="companyy" placeholder="Enter Company Name">
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="country">Country</label>
							<select class="form-control selectpicker" title="Select Country" data-live-search="true" name="country">
								<?php foreach($countries as $key){?>
									<option value="<?= $key['id']?>"><?= $key['country_name']?></option>
								<?php }?>
							</select>
							<!-- <input type="text" class="form-control" name="country" placeholder="Enter Country Name"> -->
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="location">Location</label>
							<input type="text" class="form-control" name="location" placeholder="Enter location Name">
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="preffered location">Training Location</label>
							<input type="text" class="form-control" name="preffered location" placeholder="Enter preffered location">
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="industry_sector">Training Industry</label>
							<input type="text" class="form-control" name="industry" placeholder="Training Industry">
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="industry_sector">Training Sector</label>
							<input type="text" class="form-control" name="sector" placeholder="Training Sector">
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="domain">Domain</label>
							<select class="form-control selectpicker" title="Select Domain" data-live-search="true" name="domain" id="domain" onchange="get_subdomain()">
								<?php foreach($domain as $key){?>
									<option value="<?= $key['DCd']?>"><?= $key['Domain']?></option>
								<?php }?>
							</select>
							<!-- <input type="text" class="form-control" name="domain" placeholder="Enter domain Name"> -->
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="subdomain">Sub Domain</label>
							<select class="form-control" data-live-search="true" title="Select SubDomain" name="subdomain" id="subdomain">
								
							</select>
							<!-- <input type="text" class="form-control" name="domain" placeholder="Enter domain Name"> -->
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="group_size">Group Size</label>
							<input type="text" class="form-control" name="group_size" placeholder="Enter Group Size">
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="group_level">Group Level</label>
							<select class="form-control" name="group_level" onchange="getCourses()" id="group_level">
								<option value="">Select Group Level</option>
								<?php foreach($group_level as $key){?>
									<option value="<?= $key['id']?>"><?= $key['level']?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="type">Type</label>
							<select class="form-control" name="type" onchange="getCourses()" id="type">
								<option value="">Select Type</option>
								<option value="1">Onsite</option>
								<option value="2">Offline</option>
								<option value="3">Mixed</option>
							</select>
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="type">Course</label>
							<select class="form-control" name="course" onchange="getUniversities()" id="course">
								
							</select>
						</div>
					</div>
					
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="topics_to_be_covered">Preffered University - Course</label>
							<input type="text" class="form-control" name="university_id" id="university_name" placeholder="Preffered University - Course" readonly>
							
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="preffered_hours">Course Hours</label>
							<input type="text" class="form-control" id="hours" name="preffered_hours" placeholder="Enter Preffered Hours" readonly>
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="form-group">
							<label for="topics_to_be_covered">Topics to be covered</label>
							<textarea class="form-control" rows="10" id="topics" readonly></textarea>
						</div>
					</div>
					
					
				</div>
				<div class="text-center"><button class="btn btn-primary">Submit</button></div>
			</div>
		  	<!-- Button trigger modal -->
			<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			  Launch demo modal
			</button> -->

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Select University</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <div>
			        	<h3>University List</h3>
			        	<div id="university_list">
			        		
			        	</div>
			        </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			      </div>
			    </div>
			  </div>
			</div>
		</form>
	</div>
</body>
<script type="text/javascript">
	$('.selectpicker').selectpicker();
	function get_subdomain(){
		var v = $('#domain').val();
		if(v != ''){
			$.ajax({
				type : "POST",
				url : '<?php echo base_url();?>home/get_subdomain',
				data : {'domain' : v},
				success : function(data){
					// data = JSON.parse(data);
					// for(i=0;i<domain.length())
					$('#subdomain').html(data);
					// $('#subdomain').selectpicker();
				}
			});
		}
	}
	function getCourses(){
		var v = $('#type').val();
		var l = $('#group_level').val();
		if(v != '' && l != ''){
			$.ajax({
				type : "POST",
				url : '<?php echo base_url();?>home/getCourses',
				data : {'type' : v, 'level': l},
				success : function(data){
					// data = JSON.parse(data);
					// for(i=0;i<domain.length())
					$('#course').html(data);
					// $('#subdomain').selectpicker();
				}
			});
		}
	}
	function getUniversities(){
		var t = $('#type').val();
		var c = $('#course').val();
		if(t != '' && c != ''){
			$.ajax({
				type : "POST",
				url : '<?php echo base_url();?>home/getUniversities',
				data : {'course' : c, 'type':t},
				success : function(data){
					// data = JSON.parse(data);
					// for(i=0;i<domain.length())
					$('#university_list').html(data);
					$('#exampleModal').modal('show');
					// $('#subdomain').selectpicker();
				}
			});
		}	
	}
	function getTopics(u){
		var c = $('#course').val();
		if(c != ''){
			$.ajax({
				type : "POST",
				url : '<?php echo base_url();?>home/getTopics',
				data : {'course' : c, 'u':u},
				success : function(data){
					$('#exampleModal').modal('hide');
					data = JSON.parse(data);
					// for(i=0;i<domain.length())
					console.log(data);
					$('#topics').html(data.o);
					$('#university_name').val(data.u);
					$('#hours').val(data.time);
					// $('#subdomain').selectpicker();
				}
			});
		}	
	}

</script>
</html>