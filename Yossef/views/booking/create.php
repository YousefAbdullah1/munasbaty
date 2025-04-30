<?php
// Include config file
require_once "../../controller/phpcrud/config.php";


// Define variables and initialize with empty values
$user_id = $hall_id = $food_id = $artist_id = $booking_date = $special_request = $price = "";
$user_id_err = $hall_id_err = $food_id_err = $artist_id_err = $booking_date_err = $special_request_err = $price_err = "";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate user
    $input_user_id = trim($_POST["user_id"]);
    if (empty($input_user_id)) {
        $user_id_err = "Please enter a user.";
    } else {
        $user_id = $input_user_id;
    }
    // Validate hall_id
    $input_hall_id = trim($_POST["hall_id"]);
    if (empty($input_hall_id)) {
        $hall_id_err = "Please enter a hall.";
    } else {
        $hall_id = $input_hall_id;
    }

    // Validate food_id
    $input_food_id = trim($_POST["food_id"]);
    if (empty($input_food_id)) {
        $food_id_err = "Please enter the food amount.";
    } else {
        $food_id = $input_food_id;
    }

    // Validate artist_id
    $input_artist_id = trim($_POST["artist_id"]);
    if (empty($input_artist_id)) {
        $artist_id_err = "Please enter the artist amount.";
    } else {
        $artist_id = $input_artist_id;
    }
    // Validate booking_date
    $input_booking_date = trim($_POST["booking_date"]);
    if (empty($input_booking_date)) {
        $booking_date_err = "Please enter the booking date amount.";
    } else {
        $booking_date = $input_booking_date;
    }
    // Validate special_request
    $input_special_request = trim($_POST["special_request"]);
    if (empty($input_special_request)) {
        $special_request_err = "Please enter the booking date amount.";
    } else {
        $special_request = $input_special_request;
    }
    // Validate price
    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please enter the booking date amount.";
    } else {
        $price = $input_price;
    }
    // Check input errors before inserting in database
    if (empty($user_id_err) && empty($hall_id_err) && empty($food_id_err) && empty($artist_id_err) && empty($booking_date_err)) {
        // Prepare an insert statement    
        // $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
        $sql = "INSERT INTO booking (user_id, hall_id, food_id, artist_id, booking_date, special_request,price) VALUES (?, ?, ?, ?, ?,?,?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_user_id, $param_hall_id, $param_food_id, $param_artist_id, $param_booking_date, $param_special_request, $param_price);

            // Set parameters
            $param_user_id       = $user_id;
            $param_hall_id       = $hall_id;
            $param_food_id       = $food_id;
            $param_artist_id     = $artist_id;
            $param_booking_date  = $booking_date;
            $param_special_request  = $special_request;
            $param_price          = $price;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                echo 'Created Successfully';
                header("location: index.php");
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

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords"
        content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template" />
    <meta name="author" content="CodedThemes" />

    <!-- Favicon icon -->
    <link rel="icon" href="../../assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="../../assets/fonts/fontawesome/css/fontawesome-all.min.css">

    <!-- animation css -->
    <link rel="stylesheet" href="../../assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body>
    <!-- [ Pre-loader ] start -->
    <?php
    include('../components/loader.php')
    ?>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <?php
    include('../components/side_menu.php')
    ?>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <?php
    include('../components/header.php')
    ?>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
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
                                            <h5>انشاء حجز جديد</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                                        method="post">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">uerss</label>
                                                            <select name="user_id" class="form-control"
                                                                id="exampleFormControlSelect1">
                                                                <?php
                                                                $sql = "SELECT * FROM users ";
                                                                $result = mysqli_query($link, $sql) or die('here');
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    echo '<option value=' . $row['id'] . '>';
                                                                    echo $row['username'];
                                                                    echo '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">halls</label>
                                                            <select name="hall_id" class="form-control"
                                                                id="exampleFormControlSelect1">
                                                                <?php
                                                                $sql = "SELECT * FROM halls ";
                                                                $result = mysqli_query($link, $sql) or die('here');
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    echo '<option value=' . $row['id'] . '>';
                                                                    echo $row['name'];
                                                                    echo '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">foods</label>
                                                            <select name="food_id" class="form-control"
                                                                id="exampleFormControlSelect1">
                                                                <?php
                                                                $sql = "SELECT * FROM foods ";
                                                                $result = mysqli_query($link, $sql) or die('here');
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    echo '<option value=' . $row['id'] . '>';
                                                                    echo $row['name'];
                                                                    echo '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Artists</label>
                                                            <select name="artist_id" class="form-control"
                                                                id="exampleFormControlSelect1">
                                                                <?php
                                                                $sql = "SELECT * FROM artists ";
                                                                $result = mysqli_query($link, $sql) or die('here');
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    echo '<option value=' . $row['id'] . '>';
                                                                    echo $row['name'];
                                                                    echo '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class=" form-group">
                                                            <label for="exampleInputPassword1">Date</label>
                                                            <input name="booking_date" type="date" class="form-control"
                                                                value="<?php echo date('Y-m-d') ?>">
                                                        </div>
                                                        <div class=" form-group">
                                                            <label>Price</label>
                                                            <input name="price" type="number" class="form-control">
                                                        </div>
                                                        <div class=" form-group">
                                                            <label>Special Request</label>
                                                            <textarea name="special_request"
                                                                class="form-control"></textarea>
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