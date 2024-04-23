<?php
session_start();

if($_SESSION["emailid"]) {
?>
<?php
$connect = mysqli_connect("sql102.ultimatefreehost.in","ltm_34029829","Rr240053","ltm_34029829_aroundus")or die("Database not connected");


if(isset($_POST["submit"]))
{

  $ppic=$_FILES["profilepic"]["name"];
  $availability = $_POST["availability"];
  $emailid = $_POST["emailid"];
  $title = $_POST["title"];
  $description = $_POST["description"];
  $type = $_POST["type"];
  $country = $_POST["country"];
  $state = $_POST["state"];
  $city = $_POST["city"];
  $address = $_POST["address"];
  $maplink = $_POST["maplink"];
  $pincode = $_POST["pincode"];
  $price = $_POST["price"];
  $personname = $_POST["personname"];
  $personnumber = $_POST["personnumber"];
  $personemailid = $_POST["personemailid"];

  // get the image extension
$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$imgnewfile=md5($imgfile).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["profilepic"]["tmp_name"],"profilepics/".$imgnewfile);
// Query for data insertion
}

    // update user data
    $sql = "INSERT INTO post(ProfilePic,availability,emailid,title,description,type,country,state,city,address,maplink,pincode,price,personname,personnumber,personemailid)VALUES('$imgnewfile','$availability','$emailid','$title','$description','$type','$country','$state','$city','$address','$maplink','$pincode','$price','$personname','$personnumber','$personemailid')";

    $result = mysqli_query($connect,$sql);
    if($result)
    {
      echo "<div class='alert alert-success text-center'>
    <strong>Form Submitted Successfully</strong> 
  </div>";
 header( "refresh:5;url=viewpost.php" );
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
          <li class="breadcrumb-item active">Create post</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="card">
            <div class="card-body">
              <h5 class="card-title">Create Post</h5>

              <!-- Custom Styled Validation -->
              <form class="row g-3 needs-validation" enctype="multipart/form-data" novalidate method="post">
                <div class="col-md-12">
                <img src="assets/img/img.png" class="img-fluid uploadproductimage" id="frame" alt="Image Will Appear Here" />
                </div>
                <div class="col-md-12">
                  <label for="formFile" class="form-label">Upload Image</label>
                  <input class="form-control" type="file" id="formFile validationCustom01" onchange="preview()" name="profilepic" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom04" class="form-label">Availability</label>
                  <select class="form-select" id="validationCustom04" name="availability" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="emailid" class="form-label" >Email ID</label>
                  <input type="emailid" value="<?php echo $emailid =  $_SESSION["emailid"]; ?>" placeholder="Email ID" class="form-control" id="emailid validationCustom01" required name="emailid" readonly required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Title</label>
                  <input type="text" class="form-control" id="validationCustom01" placeholder="Title" name="title" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" placeholder="Description" id="description" style="height: 100px;" required name="description"></textarea>
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom04" class="form-label">Type</label>
                  <select class="form-select" id="validationCustom04" name="type" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="Sell">Sell</option>
                    <option value="Rent">Rent</option>
                    <option value="Service">Service</option>
                  </select>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="countySel" class="form-label">Country</label>
                  <select id="countySel" class="form-select" required name="country">
                    <option selected disabled value="" >Select Country</option>
                    <option disabled value="" >China</option>
                    <option disabled value="" >Pakistan</option>
                  </select>
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="stateSel" class="form-label">State</label>
                  <select id="stateSel" class="form-select" required name="state">
                    <option selected disabled value="" >Select State</option>
                  </select>
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="city" class="form-label">City</label>
                  <select id="city" name="city" class="form-select" required name="city">
                    <option selected disabled value="" >Select City</option>
                  </select>
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="address" class="form-label">Address Details</label>
                  <textarea class="form-control" placeholder="Address Details" id="address" style="height: 100px;" required name="address"></textarea>
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="maplink" class="form-label" >Google Map Location Link ( Optional )</label>
                  <input type="text" placeholder="Google Map Location Link ( Optional )" class="form-control" id="maplink"  name="maplink">
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="pincode" class="form-label" >PIN Code</label>
                  <input type="number" placeholder="PIN Code)" class="form-control" id="pincode" required name="pincode">
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Price</label>
                  <input type="number" class="form-control" id="validationCustom01" placeholder="Price" name="price" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="personname" class="form-label" >Person Name</label>
                  <input type="text" placeholder="Person Name" class="form-control" id="personname" required name="personname">
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="cnumber" class="form-label">Number For Contact</label>
                  <input type="number" placeholder="Number For Contact" class="form-control" id="cnumber" required name="personnumber">
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="cemailid" class="form-label">Email ID For Contact</label>
                  <input type="email" placeholder="Email ID For Contact" class="form-control" id="cemailid" required name="personemailid">
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
              </form><!-- End Custom Styled Validation -->

            </div>
          </div>
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
  <script>
            function preview() {
                frame.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage() {
                document.getElementById('formFile').value = null;
                frame.src = "";
            }
        </script>
        <script>

        function reSum()
        {
            var mrp = parseInt(document.getElementById("mrp").value);
            
            document.getElementById("Sum").value = mrp / 100;

        }

    </script>
    <script>
      var stateObject = {
"India": { 
"AndhraPradesh": [],
"ArunachalPradesh": [],
"Assam": [],
"Bihar": [],
"Chhattisgarh": [],
"Goa": [],
"Gujarat": [],
"Haryana": [],
"HimachalPradesh": [],
"Jharkhand": [],
"Karnataka": [],
"Kerala": [],
"MadhyaPradesh": [],
"Maharashtra": ["Ahmednagar","Akola","Amravati","Aurangabad","Beed","Bhandara","Buldhana","Chandrapur","Dhule","Gadchiroli","Gondia","Hingoli","Jalgaon","Jalna","Kolhapur","Latur","Mumbai","Nagpur","Nanded","Nandurbar","Nashik","Osmanabad","Palghar","Parbhani","Pune","Raigad","Ratnagiri","Sangli","Satara","Sindhudurg","Solapur","Thane","Wardha","Washim","Yavatmal"],
"Manipur": [],
"Meghalaya": [],
"Mizoram": [],
"Nagaland": [],
"Odisha": [],
"Punjab": [],
"Rajasthan": [],
"Sikkim": [],
"TamilNadu": [],
"Telangana": [],
"Tripura": [],
"UttarPradesh": [],
"Uttarakhand": [],
"WestBengal": [],
},
}
window.onload = function () {
var countySel = document.getElementById("countySel"),
stateSel = document.getElementById("stateSel"),
city = document.getElementById("city");
for (var country in stateObject) {
countySel.options[countySel.options.length] = new Option(country, country);
}
countySel.onchange = function () {
stateSel.length = 1; // remove all options bar first
city.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done
for (var state in stateObject[this.value]) {
stateSel.options[stateSel.options.length] = new Option(state, state);
}
}
countySel.onchange(); // reset in case page is reloaded
stateSel.onchange = function () {
city.length = 1; // remove all options bar first
if (this.selectedIndex < 1) return; // done
var district = stateObject[countySel.value][this.value];
for (var i = 0; i < district.length; i++) {
city.options[city.options.length] = new Option(district[i], district[i]);
}
}
}
    </script>

</body>

</html>