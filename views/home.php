<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>

<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">


<style>
	.error {
		color: #F00;
		background-color: #FFF;
	}
</style>

<!-- FLASH MESSAGES -->
<?=$this->fetch("parts/flash", ['messages' => $messages])?> 

<header class="header" id="header">
	<!--header-start-->
	<div class="container">
		<figure class=" animated fadeInDown delay-07s">
			<img width="500px" src="img/logo.png">
		</figure>
		<h1 class="animated fadeInDown delay-07s">ME AND THE BOYS</h1>
		<h1 class="animated fadeInDown delay-07s">FITNESS</h1>
		</ul>
		<a class="link animated fadeInUp delay-1s servicelink" href="#add">Get Started</a>
	</div>
</header>
<!--header-end-->


<nav class="main-nav-outer" id="nav">
	<!--main-nav-start-->
	<div class="container">
		<ul class="main-nav">
			<li><a href="#add">Newcomer</a></li>
			<li><a href="#manage">Members Management</a></li>
		</ul>
		<a class="res-nav_click" href="#"><i class="fa fa-bars"></i></a>
	</div>
</nav>
<!--main-nav-end-->

<!--main-section-start-->
<section class="main-section" id="add">
	<div class="row">
		<div class="panel panel-default col-md-8 col-md-offset-2">
			<div class="panel-heading text-center"><h2>Register for newcomer</h2></div>
				<div class="panel-body">   
					<form id="form" class="form-horizontal" role="form" method="POST" action="/add">
						<div class="container col-md-10 col-md-offset-1">
							<div class="form-group>
								<label for="name"><b>Member's name</b></label>
								<input name="name" type="text" placeholder="Enter name" class="form-control">
							</div>	
							<br>
							<div class="form-group>
								<label for="phone"><b>Phone number</b></label>
								<input type="tel" name="tel" placeholder="Enter phone number" minlength="9" maxlength="11" class="form-control">
							</div>
							<br>
							<div class="form-group>
								<label for="courses"><b>Course</b></label>
								<select name="course">
									<option value="1">1 month</option>
									<option value="3">3 month</option>
									<option value="6">6 month</option>
									<option value="12">12 month</option>
								</select>
							</div>
							<br>
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</form>
				</div>
			</div>
		</div>	
	</div>
</section>





<section class="main-section" id="manage">
	<div class="row">
		<div class="container col-xs-10 col-xs-offset-1">
			<table id="manageTable" class="table table-responsive dislpay">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Phone Number</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Manage</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($members as $member): ?>
					<tr>
						<td><?=$this->e($member->id)?></td>
						<td><?=$this->e($member->name)?></td>
						<td><?=$this->e($member->phone)?></td>
						<td><?=$this->e($member->start)?></td>
						<td><?=$this->e($member->end)?></td>
						<td>

							<a href="/edit/<?=$this->e($member->id)?>" class="btn btn-xs btn-warning">
							<i alt="Edit" class="fa fa-pencil"></i></a>

							<form class="delete" action="/delete/<?=$this->e($member->id)?>" method="POST" style="display: inline;">
								<button type="submit" class="btn btn-xs btn-danger" name="delete">
									<i alt="Delete" class="fa fa-trash"></i>
								</button>
							</form>

						</td>
					</tr>
				<?php endforeach ?>  
				</tbody>
			</table>
		</div>
	</div>
</section>


	<!-- Confirm Delete -->
<div id="delete-confirm" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">Do you want to delete this member?</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Delete</button>
				<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
			</div>
		</div>
	</div>
</div>












<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
	$('#manageTable').DataTable();
	
	$(document).ready(function(){
		
		$('button[name="delete"]').on('click', function(e){
			var $form=$(this).closest('form');
			e.preventDefault();
			$('#delete-confirm').modal({ backdrop: 'static', keyboard: false }).one('click', '#delete', function() {
				$form.trigger('submit');
			});
		});
	});

	$("#form").validate({
            rules: {
                name: "required",
                tel: "required",
            },
            messages: {
                name: "Name must be entered",
                tel: {
                    required: "Phone number must be entered",
                    minlength: "phone number must consist 9-11 numbers",
                    maxlength: "phone number must consist 9-11 numbers"
                }
            }
        });
</script>





<?php $this->stop() ?>
