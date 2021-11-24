
 <?php
           include "share/_DBconnect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/site.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <title>
        Profile Page 
    </title>
</head>

<body class="bg-light">


   
   
           
           <?php
           include "share/_navbar.php";
           ?>
           
       

       <div class="col-10" id="productContainerID">
           <div class="product-container">
               <br/>
               <br/>
               <br/>
               <!-------------------------------->

               <section >
  <div class="container py-5">
    <div class="row">
      <div class="col">
       
      </div>
    </div>

    <div class="row">

      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">

            <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-chat/ava3.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;" id="photoAvtar">

            <input type="file" class="text-center center-block file-upload btn-primary" hidden id="uploadPhoto">

                          



            <h5 class="my-3">Ali Alhashim</h5>
            <p class="text-muted mb-1">Full Stack Developer</p>
            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>


            <div class="d-flex justify-content-center mb-2">
              
            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Ali Alhashim</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Ali-alhashim@outlook.com</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">(097) 234-5678</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">(098) 765-4321</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
              </div>
            </div>
<hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Join Date</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">1 - 1 - 2012</p>
              </div>
            </div>
          </div>
        </div>


       
      </div>
    </div>
  </div>
<!---->
  <div class="row">

<div class="col-md-3">
<div class="card mb-4">
<div class="card-body text-center btn">
<img src="icons/icons8_info_32px.png"/> Information
</div>
</div>
</div>


<div class="col-md-3">
<div class="card mb-4">
<div class="card-body text-center btn">
<img src="icons/icons8_agreement_32px.png"/> Contract
</div>
</div>
</div>

<div class="col-md-3">
<div class="card mb-4">
<div class="card-body text-center btn">
<img src="icons/icons8_diploma_32px.png"/> Certification
</div>
</div>
</div>

<div class="col-md-3">
<div class="card mb-4">
<div class="card-body text-center btn">
<img src="icons/icons8_aed_32px.png" /> Medical
</div>
</div>
</div>


</div>
<!---->


<!---->
<div class="row">

<div class="col-md-3">
<div class="card mb-4">
<div class="card-body text-center btn">
<img src="icons/icons8_family_32px.png"/> Dependents
</div>
</div>
</div>


<div class="col-md-3">
<div class="card mb-4">
<div class="card-body text-center btn">
<img src="icons/icons8_money_32px.png"/> Salary
</div>
</div>
</div>

<div class="col-md-3">
<div class="card mb-4">
<div class="card-body text-center btn">
<img src="icons/icons8_honeymoon_32px.png"/> Vacations
</div>
</div>
</div>

<div class="col-md-3">
<div class="card mb-4">
<div class="card-body text-center btn">
<img src="icons/icons8_medal_32px.png" /> Awards
</div>
</div>
</div>


</div>
<!---->

<!---->
<div class="row">

<div class="col-md-3">
<div class="card mb-4">
<div class="card-body text-center btn">
<img src="icons/icons8_money_with_wings_32px.png"/> Deductions
</div>
</div>
</div>


<div class="col-md-3">
<div class="card mb-4">
<div class="card-body text-center btn ">
<img src="icons/icons8_car_32px.png"/> Assets
</div>
</div>
</div>

<div class="col-md-3">
<div class="card mb-4">
<div class="card-body text-center btn">
<img src="icons/icons8_cv_32px.png"/> Job
</div>
</div>
</div>

<div class="col-md-3">
<div class="card mb-4">
<div class="card-body text-center btn">
<img src="icons/icons8_warning_32px.png" /> Warning
</div>
</div>
</div>


</div>
<!---->


</section>
               <!------------------------------->
           </div>
       </div>
   </div>


    <script src="lib/jquery/dist/jquery.min.js"></script>
    <script src="lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <?php
           include "share/_footer.php";
           ?>   
</body>

<script>
                                $(document).ready(function () {
                                    $("#photoAvtar").click(function () {
                                       $("#uploadPhoto").click();
                                    });
                                });
                              </script>
</html>