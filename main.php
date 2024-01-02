<?php

session_start();
if (isset($_SESSION["kullanici_adi"]))

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Anasayfa</title>

    <script src="https://kit.fontawesome.com/5c2368ed16.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Collegiate+One:ital@1&family=Dancing+Script:wght@700&family=Lato&family=Montserrat&family=Nunito+Sans:ital,opsz,wght@1,6..12,200&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./css/main.css">
    <style>
        main {
            position: relative;
            bottom: 40px;
            background-image: url(./images/body.jpg);
            background-size: cover;
            background-position: center center;
            /* Resmi tam ortada konumlandırır */
            background-repeat: no-repeat;
            /* Resmin tekrarlanmasını önler */
            height: 100%;
            min-height: 100vh;
            /* En az pencere boyu kadar yükseklik ayarlar */
        }

        .sidebar-menu ul {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li a {


            display: block;
            padding: 16px;

        }


        .sidebar-menu li a:hover {

            background-color: #cc99cc;
            border-left: 4px solid var(--hover-color);
            border-radius: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* Çift çizgileri kaldırır */
            margin-top: 20px;
            /* Tablonun üst kısmında boşluk bırakır */
        }

        th,
        td {
            padding: 15px;
            /* İçerik ve hücre arasında boşluk ekler */
            text-align: left;
            /* Metni sola hizalar */
            border-bottom: 1px solid #ddd;
            /* Hücreler arasına ince çizgi ekler */
        }

        th {
            background-color: #996699;
            /* Başlık arka plan rengini belirler */
            color: white;
            /* Başlık yazı rengini beyaza çevirir */
        }

        tr:hover {
            background-color: #f3e5f5;
            /* Üzerine gelindiğinde satırın rengini değiştirir */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Çift satırların arka planını ayarlar */
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
            /* Tek satırların arka planını ayarlar */
        }
        button {
            padding: 0.5rem 1rem;
            background-color: #cc99cc;
            border: none;
            border-radius: 0.25rem;
            color: white;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #087f23;
        }

        /* Buton ve input focus hali */
        button:focus,
        input[type="number"]:focus {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
        }

        /* Yanlışlıkla seçimi engelle */
        button,
        input[type="number"] {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
    </style>


</head>

<body>

    <a href="logout.php">Çıkış Yap</a>
    <div id="root">
        <input type="checkbox" id="sidebar-toggle" />
        <!--side bar-->
        <div class="sidebar">
            <!--sidebar-header-->
            <div class="sidebar-header">
                <h3 class="brand">
                    <span style="color: white; font-family: 'Dancing Script', cursive;">
                        Lady Beezy Butik
                    </span>

                </h3>
                <label for="sidebar-toggle" style="cursor: pointer">
                    <i class="fa fa-bars"> </i>
                </label>
            </div>

            <!--sidebar-menu-->
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <span>
                            <i class="fas fa-home fa-lg"
                                style="color:  white; font-size: 25px; position: relative; left: 75px; "> </i>
                        </span>
                        <a href="main.php">
                            <span
                                style="color: white; font-size: 20px; font-family:iternal; font-weight: bolder;  position: relative; left: 25px;">Anasayfa</span>
                        </a>
                    </li>
                    <li>
                        <span>
                            <i class="fas fa-chart-pie fa-lg"
                                style="color:  white; font-size: 25px; position: relative; left: 75px;"> </i>
                        </span>
                        <a href="dashboard.php">
                            <span
                                style="color: white; font-size: 20px; font-family:iternal; font-weight: bolder;  position: relative; left: 35px;">Analiz</span>
                        </a>
                    </li>

                    <li>
                        <span>
                            <i class="fa-solid fa-circle-plus"
                                style="color: white; font-size: 25px; position: relative; left: 75px;"></i>
                        </span>
                        <a href="urun_ekle.php">
                            <span
                                style="color: white; font-size: 20px; font-family:iternal; font-weight: bolder;  position: relative; left: 10px;">Ürün
                                Ekleme</span>
                        </a>
                    </li>
                    <li>
                        <span>
                            <i class="fa-solid fa-square-pen"
                                style="color: white; font-size: 25px; position: relative; left: 75px;"></i>
                        </span>
                        <a href="urun_guncelle.php">
                            <span
                                style="color: white; font-size: 20px; font-family:iternal; font-weight: bolder;  position: relative; right: 10px">Ürün
                                Güncelleme</span>
                        </a>
                    </li>
                </ul>
            </div>
            <ul>
                <li class="sign-out">

                    <span>
                        <i class="fas fa-sign-out-alt fa-lg" style="color:  #996699"> </i>
                    </span>
                    <span><a href="logout.php" style="color:  #996699;">Çıkış</a></span>

                    </a>
                </li>

            </ul>
        </div>


        <!--Main-content-->
        <div class="main-content">
            <!--header-->
            <header>
                <div class="search-wrapper">
                <form action="main.php" method="post">
                    <span>
                        <i class="fas fa-search"> </i>
                    </span>
                    <input id="searchtext" type="text" name="search" placeholder="Ara" required/>
                    <button type="submit">Ara</button>
                </form>
                </div>

                <div class="social-icons">
                    <span>
                        <i class="fa-regular fa-user" style="color: white;"></i>
                    </span>

                </div>
            </header>
            <!--Header Finished-->

            <!--main-->
            <main>
                <h2 class="dash-title">Hoşgeldiniz !</h2>
                <!--cards-->
                <div class="dash-cards">

                    <?php
                    $host = "localhost";
                    $kullanici = "root";
                    $parola = "";
                    $vt = "beezy_butik";

                    $baglanti = mysqli_connect($host, $kullanici, $parola, $vt);
                    mysqli_set_charset($baglanti, "UTF8");

                    // Bağlantıyı kontrol et
                    if ($baglanti->connect_error) {
                        die("Bağlantı hatası: " . $baglanti->connect_error);
                    }
                    // Ürün sayısını çekmek için SQL sorgusu
                    $sql = "SELECT SUM(urun_miktari) as toplam_urun_sayisi FROM urun";
                    $result = $baglanti->query($sql);

                    // Toplam ürün sayısını al
                    $row = $result->fetch_assoc();
                    $urun_miktari = $row['toplam_urun_sayisi'];

                    // Bağlantıyı kapat
                    $baglanti->close();
                    ?>

                    <div class="card-single">
                        <div class="card-body">
                            <span>
                                <i class="fa-solid fa-bullhorn" style="color: white; font-size:100px;"></i>
                            </span>
                            <div>
                                <h2 style="color:white; font-family:italic;">Toplam Ürün Sayısı</h2>
                                <h1 style="color:white; font-family:italic;">
                                    <?php echo $urun_miktari; ?>
                                </h1>
                            </div>
                        </div>
                    </div>




                    <?php
                    $host = "localhost";
                    $kullanici = "root";
                    $parola = "";
                    $vt = "beezy_butik";

                    $baglanti = mysqli_connect($host, $kullanici, $parola, $vt);
                    mysqli_set_charset($baglanti, "UTF8");

                    // Bağlantıyı kontrol et
                    if ($baglanti->connect_error) {
                        die("Bağlantı hatası: " . $baglanti->connect_error);
                    }
                    // Ürün sayısını çekmek için SQL sorgusu
                    $sql = "SELECT SUM(urun_fiyati) as toplam_urun_fiyati FROM urun";
                    $result = $baglanti->query($sql);

                    // Toplam ürün sayısını al
                    $row = $result->fetch_assoc();
                    $urun_fiyati = $row['toplam_urun_fiyati'];

                    // Bağlantıyı kapat
                    $baglanti->close();
                    ?>

                    <div class="card-single">
                        <div class="card-body">
                            <span>
                                <i class="fa-solid fa-hand-holding-dollar" style="color: white; font-size:100px"></i>
                            </span>
                            <div>
                                <h2 style="color:white; font-family:italic;">Toplam Ürün Fiyatı</h2>
                                <h1 style="color:white; font-family:italic;">
                                    <?php echo $urun_fiyati; ?>
                                </h1>

                            </div>
                        </div>

                    </div>


                </div>









                <?php
                include("baglanti.php");
                $baglanti = mysqli_connect($host, $kullanici, $parola, $vt);
    mysqli_set_charset($baglanti, "UTF8");

    if ($baglanti->connect_error) {
        die("Bağlantı hatası: " . $baglanti->connect_error);
    }

    $search = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        $search = mysqli_real_escape_string($baglanti, $_POST['search']);
    }

    // Arama terimine göre ürünleri çekme sorgusu
    $sql = "SELECT urun_adi, urun_miktari, urun_fiyati, kategori_ad, tedarikci_adi, beden FROM urun,kategori,tedarikci WHERE kategori.kategori_id=urun.kategori_id AND urun.tedarikci_id=tedarikci.tedarikci_id";
    if ($search !== '') {
        $sql .= " AND urun_adi LIKE '%$search%'";
    }

    $result = $baglanti->query($sql);
?>



<?php
    // Çekilen verileri listeleme
    if ($result->num_rows > 0) {
        echo '<section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                        <h3 style="color: white; font-size:bolder; font-family: italic; text-align:center"> Ürün Listesi</h3>
                        <table>
                            <tr>
                                <th>Ürün Adı</th>
                                <th>Miktarı</th>
                                <th>Fiyatı</th>
                                <th>Kategori AD</th>
                                <th>Tedarikçi AD</th>
                                <th>Beden</th>
                            </tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row["urun_adi"] . '</td>
                    <td>' . $row["urun_miktari"] . '</td>
                    <td>' . $row["urun_fiyati"] . '</td>
                    <td>' . $row["kategori_ad"] . '</td>
                    <td>' . $row["tedarikci_adi"] . '</td>
                    <td>' . $row["beden"] . '</td>
                  </tr>';
        }
        echo '</table></div></div></section>';
    } else {
        echo "Ürün bulunamadı.";
    }

    // Bağlantıyı kapatma
    $baglanti->close();


                























?>
            </main>

        </div>
    </div>




    <body>

</html>