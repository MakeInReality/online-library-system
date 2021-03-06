<!DOCTYPE html>
<html>
<head>
	<title>TEST DashBoard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>include/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>include/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>include/js/bootstrap.min.js"></script>

	<style type="text/css">
		html{
		    min-height:100%;
		    position:relative;
		}
		body{
		    height:100%; 
		}
		#navs{
			margin-bottom: 0px;
			background: #dc9d62 !important;
			border: 2px solid #dc9d62;
			width: 100%;
		}
		#sidebar{
			background: #e6b98f;
			margin-top: 0px;
			border: 2px solid #dc9d62;
			width: 20%;
			position:fixed;
		    top:50px;
		    bottom:0;
		    left:0;
		    right:0;
		    overflow:hidden;
		}
		#content {
			margin-left: 20%;
			margin-top: 50px;
			width: 80%;
			position:fixed;
		    top:0;
		    bottom:0;
		    left:0;
		    right:0;
		    overflow:scroll;
		}
		#user_logo{
			font-size: 60px;
		}
		#sideNavs{
			background: transparent;
			border: transparent;
		}
		#sideLogo{
			font-size: 30px;
		}
		#sideNavs .active{
			background: #dc9d62;
		}
		.active{
			
			color: #fff !important;
		}
		.modal-content {
	    	margin-left: 25%;
	    	margin-right: 25%;
		  	max-width: 400px;		
	  	}
	  	#studNav {
	  		background-color: #f5f5f5;
	  		margin-top: -20px;
	  		width: 75%;
	  		position: fixed;
	  	}
	  	#studAdd {
	  		float: left;
	  	}
	  	#studSearch {
	  		float: right;
	  		margin-top: 5px;
	  		margin-right: 2px;
	  	}
	  	.clearer {
	  		float: none !important;
	  		clear: both !important;
	  	}
	  	#contentMain {
	  		margin-left: 2px;
	  		margin-left: 2px;
	  	}
	  	#student {
	  		margin-top: 135px;
	  	}
	  	#theader {
	  		margin-top: 20px;
	  		font-weight: bold;

	  	}
	  	#theader ul {
			height: 20px;
	  		margin-left: -30px;
	  		list-style-type: none;			
			overflow: hidden;
	  	}
	  	#theader li {
	  		width: 16.3%;
	  		float: left;
	  	}
	  	table td {
	  		width: 16%;
	  	}
	</style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="197" id="navs">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?php echo base_url();?>" class="navbar-brand">E-Library</a>
		</div>
		<div class="collapse navbar-collapse" id="navBar">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Help!"></span></a></li>
				<?php 
					if($this->session->userdata('username')){

				?>
				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="<?php echo base_url();?>lib/setting">Setting</a></li>
		            <li><a href="<?php echo base_url();?>lib">Logout</a></li>
		          </ul>
		        </li>
				<?php 	
					}else {

				?>
				<li><a href="#"  data-toggle="modal" data-target="#acctLog"><span class="glyphicon glyphicon-user">Sign-In</span></a></li>

				<?php 	
					}
				?>
				
			</ul>
		</div>
	</div>
</nav>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 well" id="sidebar">
			<div class="row">
				<center><span class="glyphicon glyphicon-user" id="user_logo"></span></center>
				<p class="text-center">Name: </p>
			</div>
			<div class="row">
				<nav class="navbar navbar-default" id="sideNavs">
					
						<ul class="nav navbar-pills nav-stacked">
							<li role="presentation" class="active"><a href="<?php echo base_url();?>lib/main"><span class="fa fa-home" id="sideLogo"></span>STUDENTS</a></li>
							<li role="presentation"><a href="<?php echo base_url();?>lib/books"><span class="fa fa-book" id="sideLogo"></span>BOOKS</a></li>
							<li role="presentation"><a href="<?php echo base_url();?>lib/pending"><span class="fa fa-pencil-square-o" id="sideLogo"></span>PENDING BOOKS</a></li>
							<li role="presentation"><a href="<?php echo base_url();?>lib/activity"><span class="fa fa-pencil-square" id="sideLogo"></span>ACTIVITY</a></li>
						</ul>
					
				</nav>
			</div>
		</div>
		<div class="col-md-9 well" id="content">
			<?php if($this->session->flashdata('success')){
			?>
			<div class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Success! </strong><?php echo $this->session->flashdata('success'); ?>
			</div>
			<?php 		
			}


			?>
			<?php if($this->session->flashdata('delete')){
			?>
			<div class="alert alert-danger">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Success! </strong><?php echo $this->session->flashdata('delete'); ?>
			</div>
			<?php 		
			}
			

			?>
			<div class="row" id="contentMain">				
				<div id="studNav">
					<h1 class="text-center">List of Students</h1>
					<div id="studAdd">
						<a href="#" class="btn btn-info" data-toggle="modal" data-target="#addStudent">Add Student</a>						
					</div>
					<div id="studSearch">
						<form>
							<input type="text" name="search">
							<input type="submit" value="Find">
						</form>
					</div>
					<div class="clearer"></div>

					<div id="theader">
						<ul>
							<li>ID</li>
							<li>First Name</li>
							<li>Last Name</li>
							<li>Course</li>
							<li>Year</li>
							<li>Action</li>
							<li class="clearer"></li>
						</ul>
					</div>
				</div>
				<table class="table" id="student">
					<tbody>

					<?php 
							foreach($content as $row){

					?>
						<tr>
							<td><?php echo $row->std_id;?></td>
							<td><?php echo $row->std_fname;?></td>
							<td><?php echo $row->std_lname;?></td>
							<td><?php echo $row->std_course;?></td>
							<td><?php echo $row->std_year;?></td>
							<td>
								<a href="<?php echo base_url();?>lib/edit/<?php echo $row->std_id;?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></a>
							</td>							
						</tr>
					<?php			
							}

					?>						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="addStudent">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url();?>lib/add_student" method="POST" id="formStudent">
					<div class="form-group">
						<label >ID Number</label>
						<input type="text" name="idNum" id="idNum" class="form-control">
					</div>

					<div class="form-group">
						<label >First Name</label>
						<input type="text" name="fname" id="fname" class="form-control">
					</div>
					<div class="form-group">
						<label >Last Name</label>
						<input type="text" name="lname" id="lname" class="form-control">
					</div>

					<div class="form-group">
						<label>Course</label>
						<select name="course" id="course">
							<option value="BSIT">BSIT</option>
							<option value="BSCS">BSCS</option>
							<option value="ACT">ACT</option>
							<option value="BSCRIM">BSCRIM</option>
						</select>

						<label>Year</label>
						<select name="year" id="year">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
					</div>
					<div class="form-group">
						<input type="button" value="submit" class="btn btn-warning" id="submitBtn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h3>Are you sure to delete?</h3>
			</div>
			<div class="modal-body">
				<a href="<?php echo base_url();?>lib/main/<?php echo $row->std_id;?>" class="btn btn-danger">Yes</a>
				<a href="<?php echo base_url();?>lib/main" class="btn btn-warning">No</a>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
	function check(id){
		var div = $("#"+id).closest("div");
		div.removeClass("has-error has-success has-feedback");
		$("#glyp"+id).remove();
		if($("#"+id).val() == null || $("#"+id).val() == ""){
			div.addClass("has-error has-feedback");
			div.append('<span id="glyp'+id+'" class="glyphicon glyphicon-alert form-control-feedback"></span>');
			return false;
		}else {
			div.addClass("has-success has-feedback");
			div.append('<span id="glyp'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');
			return true;
		}
	}
	
	$(document).ready(function(){
		$("#submitBtn").click(function(){
			if(!check("idNum")){
				return false;
			}
			if(!check("fname")){
				return false;
			}
			if(!check("lname")){
				return false;
			}
			$("form#formStudent").submit();
		});

	});

</script>
</html>

