<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no" />
    <title>Neues Produkt anlegen</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/swiper.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,400,800,900&display=swap" rel="stylesheet">
    <script src="../js/swiper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body>
    <?php include("./header.php"); ?>
    <main style="margin-top:auto;">
        <?php
        if (isset($_POST['submit'])) {

            include('../inc/dbconnect.php');

            // DEFINE PRODUCT DATA OUT OF FORM

            $title = $_POST['prodTitle'];
            $description = $_POST['prodDescription'];
            $date = date("Y-m-d");
            $price = $_POST['prodPrice'];
            $category = $_POST['prodCategory'];

            // PRODUCTIMAGE UPLOAD AND DEFINING ERRORS (help reference: Dani Krossing, YouTube: https://ogy.de/yt-tutorial)

            $file = $_FILES['productimage'];

            $fileName = $_FILES['productimage']['name'];
            $fileTmpName = $_FILES['productimage']['tmp_name'];
            $fileSize = $_FILES['productimage']['size'];
            $fileError = $_FILES['productimage']['error'];
            $fileType = $_FILES['productimage']['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png', 'pdf');

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000) {

                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                        $fileDestination = '../uploads/' . $fileNameNew;

                        move_uploaded_file($fileTmpName, $fileDestination);

                        // INSERT DATA INTO DATABASE

                        $prodQuery = "INSERT INTO `tbl_products` SET
                        `product_title`='$title',
                        `description`='$description',
                        `creation_date`='$date',
                        `price`='$price',
                        `image`='$fileDestination';";

                        if (!empty($_POST['prodCategory'])) {
                            if (mysqli_query($conn, $prodQuery)) {
                                $lastProdId = mysqli_insert_id($conn);
                                foreach ($category as $catId) {
                                    $sqlRelationTable = "INSERT INTO `tbl_product_category_relation`(`prod_id`, `cat_id`) VALUES(" . $lastProdId . "," . $catId . ")";
                                    mysqli_query($conn, $sqlRelationTable);
                                }
                                echo "Sie haben das neue Produkt erfolgreich angelegt!";
                                echo '<button class="uploadBtn" onclick="window.location.href=\'./categories.php\';">Zur Kategorieübersicht</button>';
                                echo '<button class="uploadBtn" onclick="window.location.href=\'./product.php?id=' . $lastProdId . '\';">Zum Produkt</button>';
                            } else {
                                echo "Error: " . $prodQuery . "<br>" . mysqli_error($conn);
                            }
                        } else {
                            echo "Bitte wählen Sie mindestens eine Kategorie aus.<br>";
                            echo '<button class="uploadBtn" onclick="history.back()">Zurück</button>';
                        }
                    } else {
                        echo "Diese Datei ist zu groß. Maximale Dateigröße: 10MB!<br>";
                        echo '<button class="uploadBtn" onclick="history.back()">Zurück</button>';
                    }
                } else {
                    echo "Es gab einen Fehler beim Hochladen der Datei.<br>";
                    echo '<button class="uploadBtn" onclick="history.back()">Zurück</button>';
                }
            } else {
                echo "Bitte wähle eine Datei aus, die den erlaubten Dateiformaten entspricht.<br>";
                echo '<button class="uploadBtn" onclick="history.back()">Zurück</button>';
            }
        }
        ?>
    </main>
    <?php include("./footer.php"); ?>
</body>

</html>