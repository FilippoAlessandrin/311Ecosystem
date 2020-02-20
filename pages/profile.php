<?php

?>
<!DOCTYPE html>
<html lang="it">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>311Ecosystem | Dashboard</title>
	<link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="shortcut icon" href="../images/favicon.png" />
</head>
<body>
	<div class="container-scroller">

		<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
				<a class="navbar-brand brand-logo mr-5" href="../index.html"><img src="../images/logo.svg" class="mr-2" alt="logo"/></a>
				<a class="navbar-brand brand-logo-mini" href="../index.html"><img src="../images/logo-mini.svg" alt="logo"/></a>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
				<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
					<span class="ti-view-list"></span>
				</button>
				<ul class="navbar-nav mr-lg-2">
					<li class="nav-item nav-search d-none d-lg-block">
						<div class="input-group">
							<div class="input-group-prepend hover-cursor" id="navbar-search-icon">
								<span class="input-group-text" id="search">
									<i class="ti-search"></i>
								</span>
							</div>
							<input type="text" class="form-control" id="navbar-search-input" placeholder="Ricerca" aria-label="search" aria-describedby="search">
						</div>
					</li>
				</ul>
				<ul class="navbar-nav navbar-nav-right">
						<li class="nav-item dropdown">
						<a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
							<i class="ti-bell mx-0"></i>
							<span class="count"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
							<p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-success">
										<i class="ti-info-alt mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">Application Error</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										Just now
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-warning">
										<i class="ti-settings mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">Settings</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										Private message
									</p>
								</div>
							</a>
							<a class="dropdown-item">
								<div class="item-thumbnail">
									<div class="item-icon bg-info">
										<i class="ti-user mx-0"></i>
									</div>
								</div>
								<div class="item-content">
									<h6 class="font-weight-normal">New user registration</h6>
									<p class="font-weight-light small-text mb-0 text-muted">
										2 days ago
									</p>
								</div>
							</a>
						</div>
					</li>
					<li class="nav-item nav-profile dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
							<img src="../images/faces/face28.jpg" alt="profile"/>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
							<a class="dropdown-item">
								<i class="ti-settings text-primary"></i>
								Impostazioni
							</a>
							<a class="dropdown-item">
								<i class="ti-power-off text-primary"></i>
								Logout
							</a>
						</div>
					</li>
				</ul>
				<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
					<span class="ti-view-list"></span>
				</button>
			</div>
		</nav>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<!-- partial:partials/_sidebar.html -->
			<nav class="sidebar sidebar-offcanvas" id="sidebar">
				<ul class="nav">
					
				<li class="nav-item active">
						<a class="nav-link" href="../index.html">
							<i class="ti-home menu-icon"></i>
							<span class="menu-title">Home</span>
						</a>
					</li>

					
					<li class="nav-item">
						<a class="nav-link" href="tables/basic-table.html">
							<i class="ti-user menu-icon"></i>
							<span class="menu-title">Profilo</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="forms/basic_elements.html">
							<i class="ti-agenda menu-icon"></i>
							<span class="menu-title">Progetti</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="charts/chartjs.html">
							<i class="ti-calendar menu-icon"></i>
							<span class="menu-title">Prenotazione Aule</span>
						</a>
					</li>
					
				</ul>
			</nav>
			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">

					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card position-relative">
								<div class="card-body">

                                    <div class="row">
                                        <div class="col-12 col-sm-4 text-center">
                                            <img src="http://via.placeholder.com/200x200" class="img-fluid rounded-circle">
                                        </div>
                                        <div class="col-12 col-sm-8">
									        <h4 class="mt-3 mb-3 text"><span class="bio-nome">Guglielmo</span> <span class="bio-cognome">Ruffo</span> | <span class="bio-username">Ruffo46</span></h4>
                                            <ul class="list-unstyled">
                                                <li class="text-muted align-middle">
                                                    <i class="ti-email mr-2"></i><span class="bio-email">guglielmoruffo@libero.it</span>
                                                </li>
                                                <li class="text-muted align-middle">
                                                    <i class="ti-gift mr-2"></i><span class="bio-birthdate">15/05/1995</span>
                                                </li>
                                                <li class="text-muted align-middle">
                                                    <i class="ti-mobile mr-2"></i><span class="bio-number">+39 3428005110</span>
                                                </li>
                                                <li class="text-muted align-middle">
                                                    <i class="ti-id-badge mr-2"></i><span class="bio-profession">Spara cazzate</span>
                                                </li>
                                                <li class="text-muted align-middle">
                                                    <i class="ti-pencil mr-2"></i><span class="bio-description">Sono un ludopatico da anni, mi occupo principalmente di scommesse sulle battaglie illegali tra galli</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>



								</div>
							</div>  
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 grid-margin stretch-card">
							<div class="card position-relative">
								<div class="card-body">
									<p class="card-title">Le mie competenze</p>
									<div class="row">
										<div class="col-md-12 col-xl-3 d-flex flex-column justify-content-center">
											<div class="ml-xl-4">
												<h3 class="font-weight-light mb-xl-4">7 Competenze totali</h3>
											</div>  
										</div>

										<div class="col-md-12 col-xl-9">
											<div class="row">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Competenza</th>
                                                            <th>Caregoria</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>PHP</td>
                                                            <td><label class="badge badge-danger">Back-end</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td>HTML</td>
                                                            <td><label class="badge badge-warning">Front-end</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Javascript</td>
                                                            <td><label class="badge badge-info">IOT</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Peter</td>
                                                            <td><label class="badge badge-success">Completed</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dave</td>
                                                            <td><label class="badge badge-warning">In progress</label></td>
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
					</div>
				</div>

				<footer class="footer">
					<div class="d-sm-flex justify-content-center justify-content-sm-between">
						<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Team Alpha © 2020 | 311Ecosystem</span>
					</div>
				</footer>
			</div>
		</div>
	</div>

	<script src="../vendors/base/vendor.bundle.base.js"></script>
	<script src="../vendors/chart.js/Chart.min.js"></script>
	<script src="../js/off-canvas.js"></script>
	<script src="../js/hoverable-collapse.js"></script>
	<script src="../js/template.js"></script>
	<script src="../js/todolist.js"></script>
	<script src="../js/dashboard.js"></script>
</body>

</html>

