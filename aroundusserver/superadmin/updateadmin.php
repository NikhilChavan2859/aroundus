<?php
session_start();

if($_SESSION["emailid"]) {
?>
<?php
// include database connection file
include_once"config1.php";

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST["name"];
    $emailid = $_POST["emailid"];
    $password = $_POST["password"];
    


    // update user data
    $result = mysqli_query($mysqli, "UPDATE admin SET name='$name', emailid='$emailid',password='$password'WHERE id=$id");

    // Redirect to homepage to display updated user in list
     header("Location: viewadmin.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM admin WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
  $name = $user_data["name"];
  $emailid = $user_data["emailid"];
  $password = $user_data["password"];
  
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
          <li class="breadcrumb-item active">Update Admin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <form class="row g-3 needs-validation" novalidate method="post" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>">
                
                <div class="col-md-12">
                  <label for="lastname" class="form-label" >Name</label>
                  <input value="<?php echo $name;?>" type="text" placeholder="Name" class="form-control" id="name" required name="name">
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="emailid" class="form-label" >Email ID</label>
                  <input value="<?php echo $emailid;?>" type="email" placeholder="Email ID" class="form-control" id="emailid" required name="emailid">
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="password" class="form-label" >Password</label>
                  <input value="<?php echo $password;?>" type="text" placeholder="password" class="form-control" id="password" required name="password">
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
                  <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                  <a href="viewadmin.php" class="btn btn-primary">Back</a>
                  <input type="submit" name="update" value="update" class="btn btn-primary">
                  <button type="reset" class="btn btn-secondary">Reset</button>
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