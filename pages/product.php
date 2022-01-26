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

        // Get the right product title for the page title according to the link via GET global

        $productId = $_GET['id'];
        $sqlIdQuery = "SELECT * FROM `tbl_products` WHERE `product_id` = " . $productId;
        $getProductTitle = mysqli_query($conn, $sqlIdQuery);

        if (mysqli_num_rows($getProductTitle) > 0) {
            while ($row = mysqli_fetch_assoc($getProductTitle)) {
                echo "Cementus: " . $row['product_title'];
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
        <section class="productlist">
            <?php

            $sqlProduct = "SELECT * FROM `tbl_products` WHERE `product_id` = " . $productId;
            $singleProduct = mysqli_query($conn, $sqlProduct);

            if (mysqli_num_rows($singleProduct) > 0) {

                // Get output of the right set of data as an array if there are more than 0 entries

                while ($row = mysqli_fetch_assoc($singleProduct)) { ?>
                    <div class="product">
                        <div class="productimage">
                            <img src=" <?php echo $row['image']; ?> " alt="<?php echo $row['product_title']; ?>">
                        </div>
                        <div class="productinfo">
                            <h1><?php echo $row['product_title']; ?></h1>
                            <h3><?php echo $row['price']; ?> €</h3>
                        </div>
                        <div class="productdescription">
                            <h3>Beschreibung</h3>
                            <p><?php echo $row['description']; ?></p>
                            <p class="additionalinfo">Hinzugefügt am <?php echo $row['creation_date']; ?></p>
                            <div class="productincategories">
                                <span>Auch diese Kategorien durchsuchen:<br></span>
                                <?php

                                // Get output of all the categories of the product

                                $sqlCategory = "SELECT *
                                                FROM tbl_products
                                                LEFT JOIN tbl_product_category_relation
                                                ON tbl_products.product_id = tbl_product_category_relation.prod_id
                                                LEFT JOIN tbl_categories
                                                ON tbl_product_category_relation.cat_id = tbl_categories.category_id
                                                WHERE prod_id = " . $productId;

                                $productCategory = mysqli_query($conn, $sqlCategory);

                                if (mysqli_num_rows($productCategory) > 0) {
                                    while ($rowCat = mysqli_fetch_assoc($productCategory)) {
                                        $umlaute = array("ä", "ö", "ü");
                                        $vokale = array("ae", "oe", "ue");
                                        $linkVok = str_replace($umlaute, $vokale, $row['title']);
                                        $linkToCat = strtolower(str_replace(" ", "_", $linkVok));
                                ?>
                                        <a href="./products-in-category.php?id=<?php echo $rowCat['category_id']; ?>&name=<?php echo $linkToCat; ?>"><?php echo $rowCat['title']; ?>, </a>
                                <?php }
                                } else {
                                    echo "Es ist ein Fehler aufgetreten! <br> Error:" . mysqli_connect_error();
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <a class="deletebtn" onclick='javascript:confirmationDelete($(this));return false;' href='./delete.php?id=<?php echo $row['product_id']; ?>'>Produkt löschen</a>

            <?php
                }
            } else {
                echo "Es ist ein Fehler aufgetreten!";
            }
            ?>
            <script>
                function confirmationDelete(anchor) {
                    var conf = confirm('Wirklich löschen?');
                    if (conf)
                        window.location = anchor.attr("href");
                }
            </script>
        </section>
    </main>

    <?php include("./footer.php"); ?>
</body>

</html>