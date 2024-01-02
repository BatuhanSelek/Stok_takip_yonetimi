<?php
include("baglanti.php");

// Formdan gelen verileri kontrol etme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Formdan gelen verileri al
        $urun_adi = $_POST["urun_adi"];
        $urun_miktari = $_POST["urun_miktari"];
        $urun_fiyati = $_POST["urun_fiyati"];
        $kategori_id = $_POST["kategori_id"];
        $tedarikci_id = $_POST["tedarikci_id"];
        $beden = $_POST["beden"];

        // SQL sorgusunu oluştur ve çalıştır
        $sql = "INSERT INTO urun (urun_adi, urun_miktari, urun_fiyati, kategori_id, tedarikci_id, beden)
                VALUES ('$urun_adi', '$urun_miktari', '$urun_fiyati', '$kategori_id', '$tedarikci_id', '$beden')";
        // Sorguyu çalıştır
        $baglanti->query($sql);

        echo "Ürün başarıyla eklendi";
    } catch (PDOException $e) {
        echo "Hata: " . $e->getMessage();
    }
}
?>
<!-- ürün ekleme kısmı için pdo bağlantı -->







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://kit.fontawesome.com/5c2368ed16.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Collegiate+One:ital@1&family=Dancing+Script:wght@700&family=Lato&family=Montserrat&family=Nunito+Sans:ital,opsz,wght@1,6..12,200&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/urun_ekle.css">


    <title>Ürün Ekle</title>
    <style>
        main{
            background-image: url(./images/body.jpg);
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

        .urun_ekle_form {
            background: #fff;
            /* Beyaz arka plan */
            border-radius: 8px;
            /* Köşeleri yuvarlat */
            padding: 2rem;
            /* İç boşluk */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            /* Gölge efekti */
            width: 100%;
            /* Genişlik */
            max-width: 500px;
            /* Maksimum genişlik */
            margin: 2rem auto;
            /* Otomatik merkezleme */
        }

        /* Form başlığı */
        .urun_ekle_h2 {
            text-align: center;
            /* Başlığı ortala */
            margin-bottom: 1.5rem;
            /* Alt boşluk */
            color: #996699;
            /* Başlık rengi */
        }

        /* Form elemanları */
        .urun_ekle_form form {
            display: grid;
            grid-gap: 1rem;
            /* Form elemanları arasında boşluk */
        }

        /* Label */
        .urun_ekle_form label {
            font-weight: bold;
            /* Etiket yazı tipini kalın yap */
            margin-bottom: .5rem;
            /* Etiket altındaki boşluk */
            display: block;
            /* Blok seviyesinde göster */
        }

        /* Input ve Select */
        .urun_ekle_form input,
        .urun_ekle_form select {
            padding: 0.5rem;
            /* İç boşluk */
            border: 1px solid #ccc;
            /* Kenarlık */
            border-radius: 4px;
            /* Yuvarlatılmış köşeler */
        }

        /* Button */
        .urun_ekle_form button {
            padding: 0.5rem 1rem;
            /* İç boşluk */
            background-color: #996699;
            /* Buton arka plan rengi */
            border: none;
            /* Kenarlık yok */
            color: white;
            /* Yazı rengi */
            cursor: pointer;
            /* İmleç */
            border-radius: 4px;
            /* Yuvarlatılmış köşeler */
            transition: background-color 0.3s;
            /* Renk geçişi efekti */
        }

        .urun_ekle_form button:hover {
            background-color: #874f87;
            /* Buton üzerine gelindiğinde renk değişimi */
        }
    </style>
</head>

<body>
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
                
            </div>
            <div class="social-icons">
                <span>
                    <i class="fa-regular fa-user" style="color: white;"></i>
                </span>
            </div>
        </header>

        <main>
            <h2 class="dash-title" style="font-size: 55px;"> Ürün Ekle <i class="fa-solid fa-cubes"></i></h2>
            <div class="dash-cards">

                <!-- ürün ekleme kısmı -->
                <div class="card-single">

                    <div class="card-body">
                        <div class="urun_ekle_form">
                            <form action="urun_ekle.php" method="POST">
                                <label for="urun_adi">Ürün Adı:</label>
                                <input type="text" id="urun_adi" name="urun_adi" required>

                                <label for="urun_miktari">Ürün Miktarı:</label>
                                <input type="number" id="urun_miktari" name="urun_miktari" required>

                                <label for="urun_fiyati">Ürün Fiyatı:</label>
                                <input type="number" id="urun_fiyati" name="urun_fiyati" required>

                                <label for="kategori_id">Kategori Adı:</label>
                                <select id="kategori_id" name="kategori_id" required>
                                    <option value="1">Elbise</option>
                                    <option value="2">Alt Giyim</option>
                                    <option value="3">Üst Giyim</option>
                                    <option value="4">Dış Giyim</option>
                                    <option value="5">Bijuteri</option>
                                </select>

                                <label for="tedarikici_id">Tedarikçi Adı:</label>
                                <select id="tedarikci_id" name="tedarikci_id" required>
                                    <option value="1"></option>
                                    <option value="2">Barcodline Toptan</option>
                                    <option value="3">Olssun Toptan</option>
                                    <option value="4">My Model Toptan</option>
                                    <option value="5">Mercan Bijuteri</option>
                                </select>

                                <label for="beden">Beden:</label>
                                <input type="text" id="beden" name="beden">
                                <button type="submit">Ürün Ekle</button>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- ürün ekleme kısmı bitti -->



            </div>
        </main>

    </div>
</body>

</html>