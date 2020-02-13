<?php

?>
<!DOCTYPE html>
<html lang="it">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>311Ecosystem | Login</title>
	<link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="shortcut icon" href="../images/favicon.png" />
</head>
<body>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">

                    <div class="col-lg-6 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="../images/logo.svg" alt="logo">
                            </div>

                            <h4>Sei nuovo di qui?</h4>
                            <h6 class="font-weight-light">Registrati in pochi e semplici passi</h6>

                            <form class="pt-3 registration-form">

                            <fieldset>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="username"
                                        placeholder="Nome utente">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email"
                                        placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password"
                                        placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password-repeat"
                                        placeholder="Ripeti la password">
                                </div>
                                
                                <div class="text-center mt-4 font-weight-light">
                                    Hai già un account? <a href="login.html" class="text-primary">Login</a>
                                </div>

                                <button type="button" class="btn btn-dark btn-next float-right mt-3">Next</button>
                            </fieldset>

                            <fieldset>
                                <button type="button" class="btn btn-previous">Previous</button>
                                <button type="button" class="btn btn-next">Next</button>
                            </fieldset>

                            <fieldset>
                                <div class="mt-3">
                                    <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        href="../index.php">SIGN UP</a>
                                </div>
                            </fieldset>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>


    <script src="../vendors/base/vendor.bundle.base.js"></script>
	<script src="../js/off-canvas.js"></script>
	<script src="../js/hoverable-collapse.js"></script>
	<script src="../js/template.js"></script>
	<script src="../js/todolist.js"></script>
	<script src="../js/form-script.js"></script>
</body>

</html>