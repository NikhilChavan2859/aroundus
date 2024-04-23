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
    //$ppic=$_FILES["profilepic"]["name"];
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


    // update user data
    $result = mysqli_query($mysqli, "UPDATE post SET emailid='$emailid',availability='$availability',title='$title', description='$description',type='$type',country='$country',state='$state',city='$city',address='$address',maplink='$maplink',pincode='$pincode',price='$price',personname='$personname',personnumber='$personnumber',personemailid='$personemailid' WHERE id=$id");

    // Redirect to homepage to display updated user in list
     echo "<div class='alert alert-success text-center'>
    <strong>Form Updated Successfully</strong> 
  </div>";
 header( "refresh:5;url=viewpost.php" );
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM post WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
  $emailid = $user_data['emailid'];
  $availability = $user_data["availability"];
  $title = $user_data["title"];
  $description = $user_data["description"];
  $type = $user_data["type"];
  $country = $user_data["country"];
  $state = $user_data["state"];
  $city = $user_data["city"];
  $address = $user_data["address"];
  $maplink = $user_data["maplink"];
  $pincode = $user_data["pincode"];
  $price = $user_data["price"];
  $personname = $user_data["personname"];
  $personnumber = $user_data["personnumber"];
  $personemailid = $user_data["personemailid"];


  
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
          <li class="breadcrumb-item active">Update Post</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <form class="row g-3 needs-validation" enctype="multipart/form-data" novalidate method="post" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>">
                <div class="col-md-12">
                <img src="assets/img/img.png" class="img-fluid uploadproductimage" id="frame"  alt="Image Will Appear Here" />
                </div>
                <div class="col-md-12">
                  <label for="formFile" class="form-label">Upload Image</label>
                  <input class="form-control" type="file" id="formFile" onchange="preview()" name="profilepic">
                </div>
                <div class="col-md-12">
                  <label for="availability" class="form-label">Availability</label>
                  <select id="type" class="form-select" required name="availability">
                    <option selected disabled value="<?php echo $availability;?>" ><?php echo $availability;?></option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="emailid" class="form-label" >Email ID</label>
                  <input value="<?php echo $emailid;?>" type="email" placeholder="Email ID" class="form-control" id="emailid" required name="emailid" readonly>
                </div>
                <div class="col-md-12">
                  <label for="title" class="form-label" >Title</label>
                  <input value="<?php echo $title;?>" type="text" placeholder="Title" class="form-control" id="title" required name="title">
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="description" class="form-label">Description</label>
                  <textarea value="<?php echo $description;?>" class="form-control" placeholder="Description" id="description" style="height: 100px;" required name="description"><?php echo $description;?></textarea>
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="countySel" class="form-label">Country</label>
                  <select id="countySel" class="form-select" required name="country">
                    <option selected value="<?php echo $country;?>" ><?php echo $country;?></option>
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
                    <option selected value="<?php echo $state;?>" ><?php echo $state;?></option>
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
                    <option selected disabled value="<?php echo $city;?>" ><?php echo $city;?></option>
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
                  <textarea value="<?php echo $address;?>" class="form-control" placeholder="Address Details" id="address" style="height: 100px;" required name="address"><?php echo $address;?></textarea>
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="maplink" class="form-label" >Google Map Location Link ( Optional )</label>
                  <input value='<?php echo $maplink;?>'  type="text" placeholder="Google Map Location Link ( Optional )" class="form-control" id="maplink"  name="maplink">
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="pincode" class="form-label" >PIN Code</label>
                  <input value="<?php echo $pincode;?>" type="number" placeholder="PIN Code)" class="form-control" id="pincode" required name="pincode">
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <iframe width="100%" height="500" <?php echo $maplink;?>
                  
                  
                    </div>
                  </iframe>
                </div>
                <div class="col-md-12">
                  <label for="mrp" class="form-label">Price</label>
                  <input value="<?php echo $price;?>" type="number" min="1000" placeholder="Price" class="form-control" id="mrp" onkeyup="reSum();"  required name="price">
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="personname" class="form-label" >Person Name</label>
                  <input value="<?php echo $personname;?>" type="text" placeholder="Person Name" class="form-control" id="personname" required name="personname">
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="personnumber" class="form-label">Number For Contact</label>
                  <input value="<?php echo $personnumber;?>" type="number" placeholder="Number For Contact" class="form-control" id="personnumber" required name="personnumber">
                  <div class="valid-feedback">
                    Looks good !
                  </div>
                  <div class="invalid-feedback">
                    Looks Bad !
                  </div>
                </div>
                <div class="col-md-12personemailid">
                  <label for="cemailid" class="form-label">Email ID For Contact</label>
                  <input value="<?php echo $personemailid;?>" type="email" placeholder="Email ID For Contact" class="form-control" id="personemailid" required name="personemailid">
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
                  <a href="viewpost.php" class="btn btn-primary">Back</a>
                  <input type="submit" name="update" value="update" class="btn btn-primary">
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