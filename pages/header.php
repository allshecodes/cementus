<header>
    <div class="pageheader">
        <a class="logo" href="../index.php">
            <picture>
                <source class="logo-img" srcset="../img/icons/logo.svg" alt="Logo" media="(max-width: 1023px)">
                <source class="logo-img" srcset="../img/icons/logo-black.svg" alt="Logo" media="(min-width: 1024px)">
                <img class="logo-img" src="../img/icons/logo-black.svg" alt="Logo">
            </picture>
        </a>
        <nav class="mobilemenu" role="navigation">
            <div id="menuToggle">
                <input type="checkbox" />
                <span></span> <!-- burger menu -->
                <span></span> <!-- burger menu -->
                <span></span> <!-- burger menu -->
                <ul id="menu">
                    <a href="../index.php">
                        <li>Home</li>
                    </a>
                    <a href="./categories.php">
                        <li>Produkte</li>
                    </a>
                    <a href="./intranet.php">
                        <li>Interner Bereich</li>
                    </a>
                    <a href="../index.php#about">
                        <li>Über uns</li>
                    </a>
                    <a href="../index.php">
                        <li>News</li>
                    </a>
                    <a href="../index.php">
                        <li>Transportbeton</li>
                    </a>
                    <a href="../index.php#spezialanfertigung">
                        <li>Spezialanfertigungen</li>
                    </a>
                    <a href="../index.php#spezialanfertigung">
                        <li>Fotogalerie</li>
                    </a>
                    <a href="../index.php#beratung">
                        <li>Kontakt</li>
                    </a>
                    <a href="./impressum.php">
                        <li>Impressum</li>
                    </a>
                </ul>
            </div>
        </nav>

        <nav class="desktopmenu navbar">
            <div class="dropdown">
                <button class="dropbtn" onclick="myFunction()" href="./categories.php">Produkte
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="./categories.php">ALLE KATEGORIEN</a>
                    <?php include('../inc/dbconnect.php');

                    $sql_cat = 'SELECT * FROM tbl_categories';
                    $result_cat = mysqli_query($conn, $sql_cat);
                    // echo var_dump($result_cat);

                    if (mysqli_num_rows($result_cat) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result_cat)) {
                            $umlaute = array("ä", "ö", "ü");
                            $vokale = array("ae", "oe", "ue");
                            $linkVok = str_replace($umlaute, $vokale, $row['title']);
                            $linkToCat = strtolower(str_replace(" ", "_", $linkVok));
                    ?>
                            <a href="./products-in-category.php?id=<?php echo $row['category_id']; ?>&name=<?php echo $linkToCat; ?>"><?php echo $row['title']; ?></a>
                    <?php }
                    } else {
                        echo "Error" . mysqli_connect_error();
                    }

                    ?>
                </div>
            </div>
            <a href="./intranet.php">Interner Bereich</a>
            <a href="#">Über uns</a>
            <a href="../index.php">News</a>
            <a href="../index.php#spezialanfertigung-desktop">Fotogalerie</a>
            <a href="../index.php">Transportbeton</a>
            <a href="../index.php#spezialanfertigung-desktop">Spezialanfertigung</a>
        </nav>
        <script>
            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }
            window.onclick = function(e) {
                if (!e.target.matches('.dropbtn')) {
                    var myDropdown = document.getElementById("myDropdown");
                    if (myDropdown.classList.contains('show')) {
                        myDropdown.classList.remove('show');
                    }
                }
            }
        </script>

        <section id="desktop-search">
            <form action="" method="get">
                <input type="text" name="search_text" id="search_text" placeholder="Suchen">
                <input type="button" name="search_button" id="search_button">
            </form>
        </section>
        <section id="mobile-search">
            <!-- SEARCHBAR Quelle: Milan Milošev, codepen.io -->
            <form id="search-content">
                <input type="text" name="input" class="input" id="search-input">
                <button type="reset" class="search" id="search-btn"></button>
            </form>
            <script type="text/javascript">
                const input = document.getElementById("search-input");
                const searchBtn = document.getElementById("search-btn");

                const expand = () => {
                    searchBtn.classList.toggle("close");
                    input.classList.toggle("square");
                };

                searchBtn.addEventListener("click", expand);
            </script>
        </section>
    </div>
</header>