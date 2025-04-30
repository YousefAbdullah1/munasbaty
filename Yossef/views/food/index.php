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
                        <!--[ Recent Users ] start-->

                        <div class="card Recent-Users">
                            <div class="card-header">
                                <h5>Recent Users</h5>
                                <a href="create.php" class="btn btn-success">Create</a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>phone number</th>
                                            <th>Menu Options</th>
                                            <th>Availability</th>
                                            <th>price</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Include config file
                                        require_once "../../controller/phpcrud/config.php";

                                        // Attempt select query execution
                                        $sql = "SELECT * FROM foods";
                                        if ($result = mysqli_query($link, $sql)) {

                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['PhoneNumberServiceProvider'] ?></td>
                                            <td><?= $row['MenuOptions'] ?></td>
                                            <td><?= $row['availability'] == 1 ? 'Available' : 'Not Available' ?></td>
                                            <td><?= $row['PRICE'] ?></td>

                                            <td>
                                                <!-- <a href="update.php?id=<?php echo $row['id'] ?>"
                                                    class="label theme-bg2 text-white f-12">update</a> -->
                                                <a href="delete.php?id=<?php echo $row['id'] ?>"
                                                    class="label theme-bg text-white f-12">delete</a>
                                            </td>

                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--[ Recent Users ] end-->
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