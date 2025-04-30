<?php
// Include config file
require_once "../../controller/phpcrud/config.php";


// Define variables and initialize with empty values
$name = $phone = $GENDER = $price = $avaliability = "";
$name_err = $phone_err = $GENDER_err = $price_err = $avaliability_err = "";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate user
    $input_artist_name = trim($_POST["name"]);
    if (empty($input_artist_name)) {
        $name_err = "Please enter a name.";
    } else {
        $name = $input_artist_name;
    }

    // Validate phone
    $input_artist_phone = trim($_POST["PhoneNumberServiceProvider"]);
    if (empty($input_artist_phone)) {
        $phone_err = "Please enter a phone number.";
    } else {
        $phone = $input_artist_phone;
    }

    // Validate GENDER
    $input_artist_GENDER = trim($_POST["GENDER"]);
    if (empty($input_artist_GENDER)) {
        $GENDER_err = "Please enter the GENDER.";
    } else {
        $GENDER = $input_artist_GENDER;
    }
    // Validate price
    $input_artist_price = trim($_POST["PRICE"]);
    if (empty($input_artist_price)) {
        $price_err = "Please enter the price.";
    } else {
        $price = $input_artist_price;
    }
    // Validate avaliability
    $input_artist_avalia = trim($_POST["Availability"]);
    if (empty($input_artist_avalia)) {
        $avaliability_err = "Please enter the Availability.";
    } else {
        $avaliability = $input_artist_avalia;
    }
    // Check input errors before inserting in database
    if (empty($name_err) && empty($phone_err) && empty($GENDER_err) && empty($price_err) && empty($avaliability_err)) {
        // Prepare an insert statement    
        $sql = "INSERT INTO artists (name, PhoneNumberServiceProvider, GENDER, PRICE, Availability) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_phone,  $param_GENDER, $param_price, $param_availability);

            // Set parameters
            $param_name          = $name;
            $param_phone         = $phone;
            $param_GENDER        = $GENDER;
            $param_price         = $price;
            $param_availability  = $avaliability;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                echo 'Created Successfully';
                header("GENDER: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>yousef</title>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords"
        content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template" />
    <meta name="author" content="CodedThemes" />


    <link rel="icon" href="../../assets/images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="../../assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../assets/plugins/animation/css/animate.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body>

    <?php
    include('../components/loader.php')
    ?>

    <?php
    include('../components/side_menu.php')
    ?>

    <?php
    include('../components/header.php')
    ?>

    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Adding a New hall</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                                        method="post">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">name</label>
                                                            <input name="name" type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">phone number</label>
                                                            <input name="PhoneNumberServiceProvider" type="text"
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label name="GENDER"
                                                                for="exampleFormControlSelect1">Gender</label>
                                                            <select class="form-control" name="GENDER" id="">
                                                                <Option value="1">male</Option>
                                                                <Option value="0"> female</Option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Price</label>
                                                            <input name="PRICE" type="number" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Avaliability</label>
                                                            <select class="form-control" name="Availability" id="">
                                                                <Option value="1">Available</Option>
                                                                <Option value="0">Not Avaliable</Option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Create</button>
                                                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                                                    </form>
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
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="../../assets/js/vendor-all.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/js/pcoded.min.js"></script>
</body>

</html>