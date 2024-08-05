<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">

    <!-- Title -->
    <title><?php echo $data['title']; ?></title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="<?php echo BASE_URL . 'Assets/plugins/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo BASE_URL . 'Assets/plugins/perfectscroll/perfect-scrollbar.css'; ?>" rel="stylesheet">
    <link href="<?php echo BASE_URL . 'Assets/plugins/pace/pace.css'; ?>" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="<?php echo BASE_URL . 'Assets/css/main.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo BASE_URL . 'Assets/css/custom.css'; ?>" rel="stylesheet">

    <link rel="icon" href="<?php echo BASE_URL . 'Assets/images/favicon.ico'; ?>">

</head>
<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="#"><?php echo $data['title'];?></a>
            </div><br>
            <form id="formulario" autocomplete="off">
                <input type="hidden" name="token" value="<?php echo $data['usuario']['token']?>">
                <div class="auth-credentials m-b-xxl">
                    <label for="correo" class="form-label">Contraseña nueva <span class="text-danger">*</span></label>
                    <input type="password" class="form-control m-b-md" id="clave_nueva" name="clave_nueva"  placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">

                    <label for="clave" class="form-label">Confirmar contraseña <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="clave_confirmar" name="clave_confirmar" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Continuar</button>
                </div>
            </form>
        </div>
    </div>

    
    <!-- Javascripts -->
    <script src="<?php echo BASE_URL . 'Assets/plugins/jquery/jquery-3.5.1.min.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/plugins/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script> <!-- Note the use of bootstrap.bundle.min.js instead of bootstrap.min.js -->
    <script src="<?php echo BASE_URL . 'Assets/plugins/perfectscroll/perfect-scrollbar.min.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/plugins/pace/pace.min.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/js/main.min.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/js/sweetalert2@11.js'; ?>"></script>
    <script src="<?php echo BASE_URL . 'Assets/js/alertas.js'; ?>"></script>
    <script>
        const base_url = '<?php echo BASE_URL;?>';
    </script>
    <script src="<?php echo BASE_URL . 'Assets/js/pages/reset.js'; ?>"></script>
</body>
</html>
