<?php
require_once "../../controller/phpcrud/config.php";
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    require_once "config.php";
    $sql = "DELETE FROM artists WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);


        $param_id = trim($_POST["id"]);
        if (mysqli_stmt_execute($stmt)) {

            header("location: index.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }


    mysqli_stmt_close($stmt);


    mysqli_close($link);
} else {

    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {


        $id =  trim($_GET["id"]);


        $sql = "DELETE FROM artists WHERE id = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "i", $param_id);


            $param_id = trim($_GET["id"]);

            if (mysqli_stmt_execute($stmt)) {

                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
 
    }
    if (empty(trim($_GET["id"]))) {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: index.php");
        exit();
    }
}