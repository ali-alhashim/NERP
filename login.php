<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/site.css" />
</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
              <img src="images/logo2022.svg" width="100" class="m-2"/>
             
              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <div class="form-outline form-white mb-4">
             <form action="session.php" method="post">
                <input type="text" id="typeEmailX" class="form-control form-control-lg" placeholder="User Name" name="userName" />
               
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Password" name="Password"/>
                
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

              <input type="submit" class="btn btn-outline-light btn-lg px-5" value="Login"/>
              </form>
             

            </div>

           

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="lib/jquery/dist/jquery.min.js"></script>
    <script src="lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>