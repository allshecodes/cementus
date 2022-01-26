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

        $productId = $_GET['id'];
        $sqlDeleteQuery = "DELETE FROM `tbl_products` WHERE `product_id` = " . $productId;
        $sqlImagePath = mysqli_query($conn, "SELECT `image` FROM `tbl_products` WHERE `product_id` = " . $productId);

        if (mysqli_num_rows($sqlImagePath) > 0) {
            while ($row = mysqli_fetch_assoc($sqlImagePath)) {
                if (!unlink($row['image'])) {
                    echo "Es gab einen Fehler beim Löschen." . mysqli_connect_error();
                    echo '<button class="uploadBtn" onclick="history.back()">Zurück</button>';
                } else {
                    mysqli_query($conn, $sqlDeleteQuery);
                    echo "Das Produkt wurde gelöscht.";
                    echo '<button class="uploadBtn" onclick="window.location.href=\'./categories.php\';">Zur Kategorieübersicht</button>';
                    echo '<button class="uploadBtn" onclick="window.location.href=\'../index.php\';">Startseite</button>';
                }
            }
        } else {
            echo "Es gab einen Fehler beim Löschen." . mysqli_connect_error();
        }
        ?>
    </main>
    <?php include("./footer.php"); ?>
</body>

</html>