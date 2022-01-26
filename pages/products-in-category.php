<!DOCTYPE html>
<html lang=de dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/swiper.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,400,800,900&display=swap" rel="stylesheet">
    <script src="../js/swiper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <title>
        <?php
        include('../inc/dbconnect.php');

        // Get the right category title for the page title according to the link via GET global

        $categoryId = $_GET['id'];
        $sqlCategory = "SELECT * FROM `tbl_categories` WHERE `category_id` = " . $categoryId;
        $singleCategory = mysqli_query($conn, $sqlCategory);

        if (mysqli_num_rows($singleCategory) > 0) {
            while ($row = mysqli_fetch_assoc($singleCategory)) {
                echo "Cementus: " . $row['title'];
            }
        } else {
            echo "Error" . mysqli_connect_error();
        }

        ?>
    </title>
</head>

<body>
    <?php include("./header.php"); ?>

    <main>
        <?php

        // Get the right category title for the page title according to the link via GET global

        $sqlCategory = "SELECT * FROM `tbl_categories` WHERE `category_id` = " . $categoryId;
        $singleCategory = mysqli_query($conn, $sqlCategory);

        if (mysqli_num_rows($singleCategory) > 0) {
            while ($row = mysqli_fetch_assoc($singleCategory)) { ?>
                <h1 class="categoryheadline"><?php echo $row['title']; ?></h1>
        <?php
            }
        } else {
            echo "Error";
        }

        ?>
        <section class="categoryproducts">
            <?php

            // Get the right category-product-realtion with SQL query of relations table in database

            $sqlCategoryQuery = "SELECT *
                            FROM tbl_products
                            LEFT JOIN tbl_product_category_relation
                            ON tbl_products.product_id = tbl_product_category_relation.prod_id
                            LEFT JOIN tbl_categories
                            ON tbl_product_category_relation.cat_id = tbl_categories.category_id
                            WHERE category_id = " . $categoryId;

            $singleCategoryQuery = mysqli_query($conn, $sqlCategoryQuery);

            if (mysqli_num_rows($singleCategoryQuery) > 0) {

                // Get output of the right set of data as an array if there are more than 0 entries

                while ($row = mysqli_fetch_assoc($singleCategoryQuery)) { ?>
                    <div class="product">
                        <div class="productimage">
                            <a href="./product.php?id=<?php echo $row['prod_id']; ?>">
                                <img src=" <?php echo $row['image']; ?> " alt=" <?php echo $row['title']; ?>">
                            </a>
                        </div>
                        <div class="productinfo">
                            <h2><?php echo $row['product_title']; ?></h2>
                            <h3><?php echo $row['price']; ?> €</h3>
                        </div>
                        <div class="productdescription">
                            <button class="readmore" onclick="window.location.href='./product.php?id=<?php echo $row['prod_id']; ?>';">Mehr erfahren ></button>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "Es ist ein Fehler aufgetreten! <br> Error:" . mysqli_connect_error();
            }
            ?>

        </section>
    </main>

    <?php include("./footer.php"); ?>
</body>

</html>