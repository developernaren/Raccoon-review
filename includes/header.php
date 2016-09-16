<?php
$baseUrl = str_replace("index.php", "", $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--	 <meta http-equiv="refresh" content="30"> -->
    <meta name="keywords" content="HTML, CSS, XML, JSON, JAVA SCRIPT">
    <meta name="description" content="Review of Raccoon">
    <meta name="author" content="Replace with ur name">
    <title>Raccoon Review</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        var baseUrl = "<?php echo $baseUrl ?>";
    </script>
    <script>
        $(document).ready(function () {
            $(".header-menu a").click(function () {
                $("header").remove();
                $(".main-item").remove();
                contentType: "application/json; charset=utf-8",

                    $.ajax({
                        url: baseUrl,
                        success: function (result) {


                            $(".main-item2").html(result);
                        }
                    });
            });

            $(".rac-container .rac-info #nameSort #asc").click(function () {
                $("header").remove();
                $(".main-item").remove();
                contentType: "application/json; charset=utf-8",

                    $.ajax({
                        url: baseUrl + "api/raccoon/sortByAsc",
                        success: function (result) {

                            $(".main-item2").html(result);
                        }
                    });
            });

            $(".rac-container .rac-info #nameSort #desc").click(function () {
                $("header").remove();
                $(".main-item").remove();
                contentType: "application/json; charset=utf-8",

                    $.ajax({
                        url: baseUrl + "api/raccoon/getBySortByDesc", success: function (result) {

                            $(".main-item2").html(result);
                        }
                    });
            });

            $(".rac-container .rac-info #ratingSort #highest").click(function () {
                alert("In progress highest");
            });

            $(".rac-container .rac-info #ratingSort #lowest").click(function () {
                alert("In process lowest");
            });
        });

    </script>
</head>

<body>

<header>
    <!-- Nav Logo -->
    <div class="header_logo"><img src="assets/images/logo.jpg" alt="Reccoon Review"></div>
    <!-- Navbar Menu -->
    <div class="header-menu">
        <ul>
            <li><a>HOME</a></li>
        </ul>
    </div>
</header>
<section class="main-item2"></section>