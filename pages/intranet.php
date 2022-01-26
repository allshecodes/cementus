<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no" />
    <title>Interner Bereich</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/swiper.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,400,800,900&display=swap" rel="stylesheet">
    <script src="../js/swiper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body>
    <?php include("./header.php"); ?>

    <main id="intranetLayout">
        <h1>Neues Produkt anlegen</h1>

        <form id="newProduct" action="upload.php" method="post" enctype="multipart/form-data">

            <label class="inputInfo" for="prodTitle">
                <h3>Produktbezeichnung</h3>
                <input type="text" name="prodTitle" placeholder="Säule" style="font-size: 15px;" required>
            </label>

            <label class="inputInfo" for="prodDescription">
                <h3>Produktbeschreibung</h3>
                <textarea name="prodDescription" rows="5" placeholder="Dieser Artikel ist so schön..." maxlength="2000" required></textarea>
            </label>

            <label class="inputInfo" for="prodPrice">
                <h3>Preis</h3>
                <span><input type="number" name="prodPrice" min="0.00" max="10000.00" step="0.01" placeholder="19.99" style="font-size: 15px;" required />
                    Euro</span>
            </label>

            <div class="categoryCheckbox">
                <h3>Kategorieauswahl</h3>
                <?php
                include('../inc/dbconnect.php');

                $sql_cat = 'SELECT * FROM tbl_categories';
                $result_cat = mysqli_query($conn, $sql_cat);
                $categories = mysqli_fetch_assoc($result_cat);

                if (mysqli_num_rows($result_cat) > 0) {
                    while ($row = mysqli_fetch_assoc($result_cat)) { ?>
                        <label for="prodCategory[]"><?= $row['title']; ?>
                            <input type="checkbox" class="regular-checkbox" name="prodCategory[]" value="<?= $row['category_id']; ?>">
                        </label>
                <?php }
                } else {
                    echo "Keine Kategorien zur Auswahl! <br> Error:" . mysqli_connect_error();
                }
                ?>
            </div>

            <label class="inputInfo" for="productimage">
                <h3>Produktbild</h3>
                <input type="file" name="productimage" style="font-size: 15px;">
                <span>Unterstützte Formate: JPG, JPEG, PNG, PDF<br>Maximale Dateigröße: 10MB</span>
            </label>

            <button class="uploadBtn" type="submit" name="submit">Upload</button>

        </form>


    </main>

    <?php include("./footer.php"); ?>
</body>

</html>