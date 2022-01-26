<!DOCTYPE html>
<html lang=de dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no" />
  <title>Cementus</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/swiper.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway:200,400,800,900&display=swap" rel="stylesheet">
  <script src="js/swiper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>

<body id="start-page">
  <picture>
    <source class="header-img" srcset="img/header-mobile.jpg" alt="Cementus Hintergrundbild" title="Cementus Offizielle Website" media="(max-width: 666px)">
    <source class="header-img" srcset="img/header-desktop.jpg" alt="Cementus Hintergrundbild" title="Cementus Offizielle Website" media="(min-width: 667px)">
    <img class="header-img" src="img/header-desktop.jpg" alt="Cementus Hintergrundbild" title="Cementus Offizielle Website">
  </picture>
  <header>
    <div class="header-bg">
      <a class="logo" href="index.html">
        <picture>
          <source class="logo-img" srcset="img/icons/logo.svg" alt="Logo" media="(max-width: 1023px)">
          <source class="logo-img" srcset="img/icons/logo-black.svg" alt="Logo" media="(min-width: 1024px)">
          <img class="logo-img" src="img/icons/logo-black.svg" alt="Logo">
        </picture>
      </a>
      <nav class="mobilemenu" role="navigation">
        <div id="menuToggle">
          <input type="checkbox" />
          <span></span> <!-- burger menu -->
          <span></span> <!-- burger menu -->
          <span></span> <!-- burger menu -->
          <ul id="menu">
            <a href="#">
              <li>Home</li>
            </a>
            <a href="pages/categories.php">
              <li>Produkte</li>
            </a>
            <a href="pages/intranet.php">
              <li>Interner Bereich</li>
            </a>
            <a href="#about">
              <li>Über uns</li>
            </a>
            <a href="#">
              <li>News</li>
            </a>
            <a href="#">
              <li>Transportbeton</li>
            </a>
            <a href="#spezialanfertigung">
              <li>Spezialanfertigungen</li>
            </a>
            <a href="#spezialanfertigung">
              <li>Fotogalerie</li>
            </a>
            <a href="#beratung">
              <li>Kontakt</li>
            </a>
            <a href="pages/impressum.html">
              <li>Impressum</li>
            </a>
          </ul>
        </div>
      </nav>

      <nav class="desktopmenu navbar">
        <div class="dropdown">
          <button class="dropbtn" onclick="myFunction()" href="pages/categories.php">Produkte
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content" id="myDropdown">
            <a href="pages/categories.php">ALLE KATEGORIEN</a>
            <?php include('inc/dbconnect.php');

            $sql_cat = 'SELECT * FROM tbl_categories';
            $result_cat = mysqli_query($conn, $sql_cat);
            // echo var_dump($result_cat);

            if (mysqli_num_rows($result_cat) > 0) {
              while ($row = mysqli_fetch_assoc($result_cat)) {
                $umlaute = array("ä", "ö", "ü");
                $vokale = array("ae", "oe", "ue");
                $linkVok = str_replace($umlaute, $vokale, $row['title']);
                $linkToCat = strtolower(str_replace(" ", "_", $linkVok));
            ?>
                <a href="./pages/products-in-category.php?id=<?php echo $row['category_id']; ?>&name=<?php echo $linkToCat; ?>"><?php echo $row['title']; ?></a>
              <?php }
            } else {
              echo "In dieser Kategorie gibt es noch kein Produkt! <br>"; ?>
              <a class="readmore" href="./pages/intranet.php">Jetzt Produkt anlegen</a>
            <?php
            }

            ?>
          </div>
        </div>
        <a href="pages/intranet.php">Interner Bereich</a>
        <a href="#">Über uns</a>
        <a href="#">News</a>
        <a href="#spezialanfertigung-desktop">Fotogalerie</a>
        <a href="#home">Transportbeton</a>
        <a href="#spezialanfertigung-desktop">Spezialanfertigung</a>
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

    <img class="triangle first" src="img/icons/triangles.svg" alt="Abbildung einer modernen Dreiecksfigur">

  </header>

  <main>
    <section class="headline">
      <h1 class="beton">Beton</h1>
      <p class="slogan">Es kommt darauf an, <br>was man daraus macht!</p>
      <button class="CTA" type="button" name="button" href="#">Jetzt Angebote ansehen ></button>
    </section>

    <!-- START category section -->

    <section class="index productcategories">
      <h1>Kategorieauswahl</h1>
      <div class="categories">
        <?php include('./inc/dbconnect.php');

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
              <a href="./pages/products-in-category.php?id=<?php echo $row['category_id']; ?>&name=<?php echo $linkToCat; ?>">
                <img alt="<?php echo $row['title']; ?>" src="./<?php echo $row['img_path']; ?>">
              </a>
              <a class="categorytitle" href="./pages/products-in-category.php?id=<?php echo $row['category_id']; ?>&name=<?php echo $linkToCat; ?>"><?php echo $row['title']; ?></a>
            </div>

        <?php }
        } else {
          echo "Keine Ausgabe";
        }

        ?>
      </div>
    </section>

    <!-- END category section -->

    <section id="about" class="geschichte geschichte-1">
      <picture>
        <source srcset="img/geschichte1-mobile.png" alt="Bild eines modernen Balkon" title="Moderne Balkone" media="(max-width: 666px)">
        <source srcset="img/geschichte1-desktop.png" alt="Bild eines modernen Balkon" title="Moderne Balkone" media="(min-width: 667px)">
        <img src="img/geschichte1-desktop.png" alt="Bild eines modernen Balkon" title="Moderne Balkone">
      </picture>
      <h2 class="gelbe-headline">Beton hat eine lange Geschichte.</h2>
      <h2 class="gelbe-headline desktop"><strong>Beton</strong> hat eine <br> lange Geschichte.</h2>
      <p>Schon vor 10.000 Jahren verwendeten die Menschen Kalkmörtel für ihre Bauten. Die Ägypter und die Römer
        verbesserten die „künstlichen Steine“. Aus dem lateinischen Begriff opus caementitium leitet sich der Begriff
        Zement ab. Der Baustoff bestand damals aus gebranntem Kalk, Wasser, Sand und Ziegelmehl. Wir knüpfen mit unserem
        Firmennamen an diese Tradition an.</p>
      <button class="CTA geschichte-1" type="button" name="button" href="#">Mehr erfahren ></button>
    </section>
    <section class="geschichte geschichte-2">
      <picture>
        <source srcset="img/geschichte2-mobile.png" alt="Bild eines modernen Geländer" title="Modernes Geländer" media="(max-width: 666px)">
        <source srcset="img/geschichte2-desktop.png" alt="Bild eines modernen Geländer" title="Modernes Geländer" media="(min-width: 667px)">
        <img src="img/geschichte2-desktop.png" alt="Bild eines modernen Geländer" title="Modernes Geländer">
      </picture>
      <h2 class="gelbe-headline">Die Geschichte des Betons ist noch lange nicht zu Ende.</h2>
      <h2 class="gelbe-headline desktop">Die <strong>Geschichte des Betons</strong><br> ist noch lange nicht zu Ende.
      </h2>
      <p>Nach dem Siegeszug des Stahlbetons experimentiert unsere Branche mit Beimischungen zum Färben, zum Veredeln und
        zum Stabilisieren des Materials. Beton kann inzwischen Lärm schlucken und Regenwasser durch-sickern lassen. Es
        lassen sich andere Baustoffe imitieren.</p>
      <button class="CTA geschichte-2" type="button" name="button" href="#">Mehr erfahren ></button>
    </section>

    <img class="triangle second" src="img/icons/triangles_2.svg" alt="Abbildung einer modernen Dreiecksfigur">

    <section id="spezialanfertigung">
      <h1>Spezial<br>anfertigung</h1>
      <p class="slogan">Wir stellen für Sie aus Stahlbeton individuelle Fertigteile her</p>

      <!--SLIDER mit swiper.js--->

      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <h2 class="swiper-headline">Balkon</h2>
            <p class="swiper-slogan">Beton ist nicht grau. <br>Beton schafft Lebensraum.</p>
          </div>
          <div class="swiper-slide">
            <h2 class="swiper-headline">Podest</h2>
            <p class="swiper-slogan">Beton ist vielseitig. <br>Beton sorgt für Überblick.</p>
          </div>
          <div class="swiper-slide">
            <h2 class="swiper-headline">Berüstung</h2>
            <p class="swiper-slogan">Beton ist luftig. <br>Beton gibt Halt.</p>
          </div>
          <div class="swiper-slide">
            <h2 class="swiper-headline">Treppe</h2>
            <p class="swiper-slogan">Beton ist variabel. <br>Beton bringt Bewegung ins Haus.</p>
          </div>
          <div class="swiper-slide">
            <h2 class="swiper-headline">Imitation historischer Bauteile</h2>
            <p class="swiper-slogan">Beton ist wandelbar. <br>Beton ersetzt andere Materialien. </p>
          </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
      </div>
      <script>
        var swiper = new Swiper('.swiper-container', {
          cssMode: true,
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
          pagination: {
            el: '.swiper-pagination'
          },
          mousewheel: true,
          keyboard: true,
        });
      </script>
      <div id="spezialanfertigung-desktop">
        <div class="wrapper">
          <a href="#" class="balkon">
            <div class="balkon-img">
              <img src="img/spezialanfertigung/balkon.png" alt="Balkon">
              <h2 class="swiper-headline">Balkon</h2>
            </div>
            <p class="swiper-slogan">Beton ist nicht grau.<strong> Beton schafft Lebensraum.</strong></p>
            <div class="swiper-text">
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et
                ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
              <img src="img/spezialanfertigung/arrow-right.svg" alt="Ein Pfeil, der nach rechts zeigt">
            </div>
          </a>
          <a href="#" class="podest">
            <div class="podest-img">
              <img src="img/spezialanfertigung/podest.png" alt="Podest">
              <h2 class="swiper-headline">Podest</h2>
            </div>
            <p class="swiper-slogan">Beton ist vielseitig.<strong> Beton sorgt für Überblick.</strong></p>
            <div class="swiper-text">
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et
                ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
              <img src="img/spezialanfertigung/arrow-right.svg" alt="Ein Pfeil, der nach rechts zeigt">
            </div>
          </a>
          <a href="#" class="beruestung">
            <div class="beruestung-img">
              <img src="img/spezialanfertigung/berustung.png" alt="Berüstung">
              <h2 class="swiper-headline">Berüstung</h2>
            </div>
            <p class="swiper-slogan">Beton ist luftig.<strong> Beton gibt Halt.</strong></p>
            <div class="swiper-text">
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et
                ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
              <img src="img/spezialanfertigung/arrow-right.svg" alt="Ein Pfeil, der nach rechts zeigt">
            </div>
          </a>
          <a href="#" class="treppe">
            <div class="treppe-img">
              <img src="img/spezialanfertigung/treppe.png" alt="Treppe">
              <h2 class="swiper-headline">Treppe</h2>
            </div>
            <p class="swiper-slogan">Beton ist variabel.<strong> Beton bringt Bewegung ins Haus.</strong></p>
            <div class="swiper-text">
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et
                ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
              <img src="img/spezialanfertigung/arrow-right.svg" alt="Ein Pfeil, der nach rechts zeigt">
            </div>
          </a>
          <a href="#" class="imitation">
            <div class="imitation-img">
              <img src="img/spezialanfertigung/imitation.png" alt="Imitation historischer Bauteile">
              <h2 class="swiper-headline">Imitation historischer Bauteile</h2>
            </div>
            <p class="swiper-slogan">Beton ist wandelbar.<strong> Beton ersetzt andere Materialien.</strong></p>
            <div class="swiper-text">
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et
                ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
              <img src="img/spezialanfertigung/arrow-right.svg" alt="Ein Pfeil, der nach rechts zeigt">
            </div>
          </a>
          <a href="#" class="weitere">
            <div class="weitere-img">
              <img src="img/spezialanfertigung/triangles-weiteres.svg" alt="Abbildung einer modernen Dreiecksfigur">
              <h2 class="swiper-headline">Weitere entdecken ></h2>
            </div>
          </a>
        </div>
    </section>

    <img class="triangle third" src="img/icons/triangles_3.svg" alt="Abbildung einer modernen Dreiecksfigur">

    <section id="beratung">
      <h1>Kontakt</h1>
      <p class="slogan">Ich wünsche eine kompetente Beratung</p>
      <p>Sie haben noch Fragen oder wünschen eine detaillierte Beratung? Dann verraten Sie etwas über sich, damit wir
        uns ganz individuell für Sie vorbereiten können.</p>
      <div id="kontakt" class="kontakt-content">
        <form class="kontaktformular" action="" method="post">
          <div class="bereich">
            <p>Ich komme aus dem Bereich:</p>

            <label for="Baustoffhandel" class="radio-container">Baustoffhandel
              <input id="Baustoffhandel" type="radio" checked="checked" name="Bereich">
              <span class="radio-checkmark"></span>
            </label>

            <label for="Architektur" class="radio-container">Architektur/Statik
              <input id="Architektur" type="radio" name="Bereich">
              <span class="radio-checkmark"></span>
            </label>

            <label for="Bauingenieurwesen" class="radio-container">Bauingenieurwesen
              <input id="Bauingenieurwesen" type="radio" name="Bereich">
              <span class="radio-checkmark"></span>
            </label>

            <label for="Bauprojektleitung" class="radio-container">Bauprojektleitung
              <input id="Bauprojektleitung" type="radio" name="Bereich">
              <span class="radio-checkmark"></span>
            </label>

            <label for="Denkmalpflege" class="radio-container">Denkmalpflege
              <input id="Denkmalpflege" type="radio" name="Bereich">
              <span class="radio-checkmark"></span>
            </label>

            <label for="Andere" class="radio-container">
              <input id="Andere" type="radio" name="Bereich">
              <span class="radio-checkmark"></span>
              <textarea name="text" id="text" rows="1" placeholder="Andere"></textarea>
            </label>
          </div>

          <div class="bauprojekt">
            <p>Mein Bauprojekt betrifft:</p>

            <label for="Neubau_privat" class="check-container">Neubau privat
              <input id="Neubau_privat" type="checkbox" name="Bauprojekt">
              <span class="check-checkmark"></span>
            </label>

            <label for="Neubau_kommunal" class="check-container">Neubau kommunal
              <input id="Neubau_kommunal" type="checkbox" name="Bauprojekt">
              <span class="check-checkmark"></span>
            </label>

            <label for="Bausanierung" class="check-container">Bausanierung
              <input id="Bausanierung" type="checkbox" name="Bauprojekt">
              <span class="check-checkmark"></span>
            </label>

            <label for="Landschaftsbau" class="check-container">Garten- und Landschaftsbau
              <input id="Landschaftsbau" type="checkbox" name="Bauprojekt">
              <span class="check-checkmark"></span>
            </label>

            <label for="Tiefbau" class="check-container">Tiefbau
              <input id="Tiefbau" type="checkbox" name="Bauprojekt">
              <span class="check-checkmark"></span>
            </label>

            <label for="Stadtmöbel" class="check-container">Stadtmöbel
              <input id="Stadtmöbel" type="checkbox" name="Bauprojekt">
              <span class="check-checkmark"></span>
            </label>

            <label for="Betonmöbel" class="check-container">Betonmöbel
              <input id="Betonmöbel" type="checkbox" name="Bauprojekt">
              <span class="check-checkmark"></span>
            </label>

            <label for="Baumaterialien" class="check-container">Baumaterialien
              <input id="Baumaterialien" type="checkbox" name="Bauprojekt">
              <span class="check-checkmark"></span>
            </label>

            <label for="Weiteres" class="check-container">
              <input id="Weiteres" type="checkbox" name="Bauprojekt">
              <span class="check-checkmark"></span>
              <textarea name="text" id="text" rows="1" placeholder="Weiteres"></textarea>
            </label>
          </div>

          <div class="nachrichtenfeld">
            <p>Folgendes möchte ich zu meinem Projekt noch loswerden:</p>
            <textarea id="nachricht" name="Nachricht" cols="35" rows="5" placeholder="Ihre Nachricht"></textarea>
          </div>
          <div class="mail-phone">
            <p>Ich möchte kontaktiert werden:</p>

            <label for="Mail" class="check-container">Per Mail
              <input id="Mail" type="checkbox" name="Kontakt">
              <span class="check-checkmark"></span>
              <br><textarea name="text" id="text" rows="1" placeholder="Ihre Mailadresse"></textarea>
            </label>

            <label for="Phone" class="check-container">Per Telefon
              <input id="Phone" type="checkbox" name="Kontakt">
              <span class="check-checkmark"></span>
              <br><textarea name="text" id="text" rows="1" placeholder="Ihre Telefonnummer"></textarea>
            </label>
          </div>
          <div class="ergebnis">
            <button class="senden" type="submit" value="Abgeschickt">Senden</button>
            <input type="reset" name="Zurücksetzen" value="Abbrechen">
          </div>
        </form>
      </div>
    </section>
  </main>
  <footer class="mobile">
    <div class="accordeon">
      <input type="checkbox" name="accordeon-title" class="accordeon-checkbox" id="accordeon-title info" />
      <div class="accordeon-content">
        <label for="accordeon-title info" class="accordeon-title-label"></label>
        <h3>Informationen</h3>
        <p>Lorem Ipsum</p>
      </div>
      <input type="checkbox" name="accordeon-title" class="accordeon-checkbox" id="accordeon-title kontakt" />
      <div class="accordeon-content">
        <label for="accordeon-title kontakt" class="accordeon-title-label"></label>
        <h3>Kontakt</h3>
        <p>Lorem Ipsum</p>
      </div>
      <input type="checkbox" name="accordeon-title" class="accordeon-checkbox" id="accordeon-title rechtliches" />
      <div class="accordeon-content">
        <label for="accordeon-title rechtliches" class="accordeon-title-label"></label>
        <h3>Rechtliches</h3>
        <p>Lorem Ipsum</p>
      </div>
      <input type="checkbox" name="accordeon-title" class="accordeon-checkbox" id="accordeon-title impressum" />
      <div class="accordeon-content">
        <label for="accordeon-title impressum" class="accordeon-title-label"></label>
        <h3>Impressum</h3>
        <p>Cementus GmbH <br>Geschäftsführung: Walter Brills<br> 21079 Hamburg <br>Fünfhausener Landweg 130<br><br>+49
          (0)40/767042-0 <br><br>www.cementus.de<br>info@cementus.de<br><br>Handelsregister Amtsgericht Hamburg HRB
          78675<br>USt-Nr. 76 8909 6634<br><br>Verantwortlich im Sinne des Pressegesetzes: <br>Geschäftsführung: Walter
          Brills<br>Inhaltlich Verantwortlicher gemäß § 55 Abs. 2 RStV:<br>Walter Brills (Geschäftsführung)<br>Telefon:
          +49 (0)40/767042-100<br>Verantwortlich für diese Seiten: Anna-Lena Langhans/Meg91</p>
      </div>
    </div>
    <div class="socialmedia">
      <a href="#"><img src="img/icons/facebook.svg" alt="Facebook Icon"></a>
      <a href="#"><img src="img/icons/instagram.svg" alt="Instagram Icon"></a>
      <a href="#"><img src="img/icons/youtube.svg" alt="Youtube Icon"></a>
    </div>
    <div class="copyright">
      <p> 2020 Cementus GmbH // Webdesigner: Anna-Lena Langhans</p>
    </div>
  </footer>
  <footer class="desktop">
    <div class="footer-wrapper">
      <h2>Information</h2>
      <div class="col col1">
        <a href="pages/impressum.html">Impressum</a>
        <a href="index.html">AGB</a>
        <a href="index.html">Datenschutz</a>
        <a href="index.html">Widerrufsrecht</a>
      </div>

      <h2>Kategorien</h2>

      <div class="col col2">
        <a href="index.html">Über Uns</a>
        <a href="index.html">News</a>
        <a href="index.html">Pflastersteine</a>
        <a href="index.html">Transportbeton</a>
        <a href="#spezialanfertigung-desktop">Spezialanfertigung</a>
        <a href="#spezialanfertigung-desktop">Fotogalerie</a>
        <a href="#beratung">Kontakt</a>
        <a href="pages/impressum.html">Impressum</a>
        <a href="pages/intranet.php">Interner Bereich</a>
      </div>

      <h2>Kontakt</h2>

      <div class="col col3">
        <p>Cementus GmbH<br>
          Fünfhausener Landweg 130<br>
          21079 Hamburg<br>
          <br>
          telefon: +49 (0)40/767042-0<br>
          mail: <a href="mailto:info@cementus.de">info@cementus.de</a>
        </p>
      </div>

      <h2>Social Media</h2>

      <div class="col col4">
        <a href="index.html"><img src="img/icons/facebook.svg" alt="Facebook Icon"></a>
        <a href="index.html"><img src="img/icons/instagram.svg" alt="Instagram Icon"></a>
        <a href="index.html"><img src="img/icons/youtube.svg" alt="Youtube Icon"></a>
      </div>

    </div>
    <div class="copyright">
      <p> 2020 Cementus GmbH // Webdesigner: Anna-Lena Langhans</p>
    </div>
  </footer>
</body>

</html>