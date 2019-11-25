<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>

<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link href="css/style.css" rel="stylesheet" type="text/css">
	
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
					<form class="form-horizontal" role="form" method="POST" action="/add">
						<div class="container col-md-10 col-md-offset-1">
							<div class="form-group>
								<label for="name"><b>Member's name</b></label>
								<input name="name" type="text" placeholder="Enter name" class="form-control">
							</div>	
							<br>
							<div class="form-group>
								<label for="phone"><b>Phone number</b></label>
								<input type="tel" name="tel" placeholder="Enter phone number" class="form-control">
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







		 




<?php $this->stop() ?>
