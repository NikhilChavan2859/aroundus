<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM post WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
          
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<?php
session_start();

if($_SESSION["emailid"]) {
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
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Read Post</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <form class="row g-3 needs-validation" novalidate method="post">
                <div class="col-md-12">
                <img src="profilepics/<?php  echo $row['ProfilePic'];?>" class="img-fluid uploadproductimage" id="frame"  alt="Image Will Appear Here" />
                
                </div>
                <div class="col-md-12">
                  <label for="availability" class="form-label" >Availability</label>
                  <input type="text" value="<?php echo $row["availability"]; ?>" placeholder="Title" class="form-control" id="availability" readonly name="ttitle">
                </div>
                <div class="col-md-12">
                  <label for="emailid" class="form-label" >E-Mail ID</label>
                  <input type="text" value="<?php echo $row["emailid"]; ?>" placeholder="Title" class="form-control" id="emailid" readonly name="ttitle">
                </div>
                <div class="col-md-12">
                  <label for="title" class="form-label" >Title</label>
                  <input type="text" value="<?php echo $row["title"]; ?>" placeholder="Title" class="form-control" id="title" readonly name="ttitle">
                </div>
                <div class="col-md-12">
                  <label for="productdescription" class="form-label">Description</label>
                  <textarea type="text" value="" class="form-control" placeholder="Description" id="productdescription" style="height: 100px;" readonly name="description"><?php echo $row["description"]; ?></textarea>
                </div>
                <div class="col-md-12">
                  <label for="type" class="form-label" >Type</label>
                  <input type="text" value="<?php echo $row["type"]; ?>" placeholder="Title" class="form-control" id="type" readonly name="ttitle">
                </div>
                <div class="col-md-12">
                  <label for="countySel" class="form-label">Country</label>
                  <input value="<?php echo $row["country"]; ?>" id="countySel" class="form-control" readonly name="country" >
                </div>
                <div class="col-md-12">
                  <label for="stateSel" class="form-label">State</label>
                  <input value="<?php echo $row["state"]; ?>" id="stateSel" class="form-control" readonly name="state">
                </div>
                <div class="col-md-12">
                  <label for="city" class="form-label">City</label>
                  <input value="<?php echo $row["city"]; ?>" id="city" name="city" class="form-control" readonly name="city">
                </div>
                <div class="col-md-12">
                  <label for="address" class="form-label">Address Details</label>
                  <textarea class="form-control" placeholder="Address Details" id="address" style="height: 100px;" readonly name="address"><?php echo $row["address"]; ?></textarea>
                </div>
                <div class="col-md-12">
                  <label for="maplink" class="form-label" >Google Map Location Link ( Optional )</label>
                  <input value='<?php echo $row["maplink"]; ?>' type="text" placeholder="Google Map Location Link ( Optional )" class="form-control" id="maplink" readonly  name="maplink">
                </div>
                <div class="col-md-12">
                  <label for="pincode" class="form-label" >PIN Code</label>
                  <input value="<?php echo $row["pincode"]; ?>" type="number" placeholder="PIN Code)" class="form-control" id="pincode" readonly name="pincode">
                </div>
                <div class="col-md-12">
                  <iframe width="100%" height="500" <?php echo $row["maplink"]; ?>
                  
                  
                    </div>
                  </iframe>
                </div>
                <div class="col-md-12">
                  <label for="mrp" class="form-label">Price</label>
                  <input value="<?php echo $row["price"]; ?>" type="number" placeholder="Price" class="form-control" id="price"   readonly name="price">
                </div>
                <div class="col-md-12">
                  <label for="personname" class="form-label" >Person Name</label>
                  <input value="<?php echo $row["personname"]; ?>" type="text" placeholder="Person Name" class="form-control" id="personname" readonly name="personname">
                </div>
                <div class="col-md-12">
                  <label for="personnumber" class="form-label">Number For Contact</label>
                  <input value="<?php echo $row["personnumber"]; ?>" type="number" placeholder="Number For Contact" class="form-control" id="personnumber" readonly name="personnumber">
                </div>
                <div class="col-md-12">
                  <label for="personemailid" class="form-label">Email ID For Contact</label>
                  <input value="<?php echo $row["personemailid"]; ?>" type="email" placeholder="Email ID For Contact" class="form-control" id="personemailid" readonly name="personemailid">
                </div>
                <div class="text-center">
                  <a href="viewpost.php" class="btn btn-primary">Back</a>
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