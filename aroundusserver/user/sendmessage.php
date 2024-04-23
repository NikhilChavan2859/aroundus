<?php
session_start();

if($_SESSION["emailid"]) {
?>
<?php
$connect = mysqli_connect("sql102.ultimatefreehost.in","ltm_34029829","Rr240053","ltm_34029829_aroundus")or die("Database not connected");


if(isset($_POST["submit"]))
{

  
  $name = $_POST["name"];
  $emailid = $_POST["emailid"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];
  
      // update user data
    $sql = "INSERT INTO message(name,emailid,subject,message)VALUES('$name','$emailid','$subject','$message')";

    $result = mysqli_query($connect,$sql);
    if($result)
    {
      echo "<div class='alert alert-success text-center'>
    <strong>Form Submitted Successfully. Login To Continue.</strong> 
  </div>";
 header( "refresh:0;url=viewmessage.php" );
    }
    else
    {
      echo "<div class='alert alert-danger'>
    <strong>Form Submitted UnSuccessfully</strong> 
  </div>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AroundUs</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
  <?php include 'header.php';?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include 'sidebar.php';?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Send Admin Message</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <form class="row g-3 needs-validation" novalidate method="post">
                <div class="col-md-12">
                  <label for="name" class="form-label" >Name</label>
                  <input type="name" placeholder="Name" class="form-control" id="name" required name="name" required>
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="emailid" class="form-label" >Email ID</label>
                  <input type="email" value="<?php echo $email =  $_SESSION["emailid"]; ?>" placeholder="Email ID" class="form-control" id="emailid" required name="emailid" readonly required>
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="subject" class="form-label" >Subject</label>
                  <input type="text" placeholder="Subject" class="form-control" id="subject" required name="subject">
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="message" class="form-label">Message</label>
                  <textarea class="form-control" placeholder="Message" id="message" style="height: 100px;" required name="message"></textarea>
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                      Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                      You must agree before submitting.
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                  <button type="reset" onclick="clearImage()" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->
      
    </section>

  </main><!-- End #main -->
  <?php
    }else header( "refresh:0;url=error.php" );;
  ?>

  <!-- ======= Footer ======= -->
  <?php include 'footer.php';?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>