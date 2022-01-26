<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no" />
    <title>Produktkategorien</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/swiper.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,400,800,900&display=swap" rel="stylesheet">
    <script src="../js/swiper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body>
    <?php include("./header.php"); ?>
    <main>
        <section class="productcategories">
            <h1>Kategorieauswahl</h1>
            <div class="categories">
                <?php include('../inc/dbconnect.php');

                // Get the right category title for the page title according to the link via GET global

                $sql_cat = 'SELECT * FROM tbl_categories';
                $result_cat = mysqli_query($conn, $sql_cat);

                if (mysqli_num_rows($result_cat) > 0) {
                    while ($row = mysqli_fetch_assoc($result_cat)) {
                        $umlaute = array("ä", "ö", "ü");
                        $vokale = array("ae", "oe", "ue");
                        $linkVok = str_replace($umlaute, $vokale, $row['title']);
                        $linkToCat = strtolower(str_replace(" ", "_", $linkVok));
                ?>
                        <div class="categoryimage">
                            <a href="./products-in-category.php?id=<?php echo $row['category_id']; ?>&name=<?php echo $linkToCat; ?>">
                                <img alt="<?php echo $row['title']; ?>" src="../<?php echo $row['img_path']; ?>">
                            </a>
                            <a class="categorytitle" href="./products-in-category.php?id=<?php echo $row['category_id']; ?>&name=<?php echo $linkToCat; ?>"><?php echo $row['title']; ?></a>
                        </div>

                <?php }
                } else {
                    echo "Keine Ausgabe";
                }

                ?>
            </div>
        </section>


    </main>

    <?php include("./footer.php"); ?>
</body>

</html>