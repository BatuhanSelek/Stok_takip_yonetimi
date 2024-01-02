<?php
include("baglanti.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['urun_id'])) {
    // Formdan gelen verileri al
    $urun_id = $_POST['urun_id'];
    $urun_miktari = $_POST['urun_miktari'];

    // Güncelleme sorgusu
    $sql_update = "UPDATE urun SET urun_miktari = GREATEST(0, urun_miktari - ?) WHERE urun_id = ?";
    $stmt = $baglanti->prepare($sql_update);

    // MySQLi'de parametreleri bağlama
    $stmt->bind_param("ii", $urun_miktari, $urun_id);

    // Sorguyu çalıştır ve sonucu kontrol et
    if ($stmt->execute()) {
        $message = "Ürün miktarı başarıyla azaltıldı.";
        header("Location: urun_guncelle.php"); // Ana sayfaya yönlendir
        exit(); // İşlemi sonlandır
    } else {
        // Hata mesajı ekle
        $message = "Bir hata oluştu: " . $baglanti->error;
    }
}

// Ürünleri listeleme sorgusu
$sql = "SELECT urun_id, urun_adi, urun_miktari FROM urun";
$result = $baglanti->query($sql);


?>
<!-- ürün ekleme kısmı için pdo bağlantı -->







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ürün Güncelle</title>

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
    <link rel="stylesheet" href="./css/urun_guncelle.css">
    <style>
        main {
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

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        /* Başlık kısmını öne çıkart */
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            background-color: #996699;
            color: white;
            text-align: left;
        }

        /* Tablo satırlarına hover efekti ekle */
        .table tbody tr:hover {
            background-color: #f2f2f2;
        }

        /* Form düzenlemeleri */
        form {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            /* İçerideki elemanlar arası boşluk */
        }

        input[type="number"] {
            width: 60px;
            padding: 0.5rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            font-size: 0.875rem;
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
                <form action="urun_guncelle.php" method="post">
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

        <main>
            <h2 class="dash-title" style="font-size: 55px;"> Ürün Güncelle <i class="fa-solid fa-cubes"></i></h2>
            <!-- ürün güncelleme-->
            <div class="card-single">
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Ürün ID</th>
                                <th scope="col">Ürün Adı</th>
                                <th scope="col">Mevcut Miktar</th>
                                <th scope="col">Miktarı Azalt</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include("baglanti.php");
                            if ($baglanti->connect_error) {
                                die("Bağlantı hatası: " . $baglanti->connect_error);
                            }
                            $search = '';
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
                            $search = $baglanti->real_escape_string($_POST['search']);
                            }
                            $sql = "SELECT urun_id, urun_adi, urun_miktari FROM urun";
                            if ($search !== '') {
                            $sql .= " WHERE urun_adi LIKE '%$search%'";
                            }
                            $result = $baglanti->query($sql);
                            if ($result->num_rows > 0) {
                                // Sonuçları sıralı bir şekilde göster
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>{$row["urun_id"]}</td>
                                        <td>{$row["urun_adi"]}</td>
                                        <td>{$row["urun_miktari"]}</td>
                                        <td>
                                            <form action='urun_guncelle.php' method='post'>
                                                <input type='hidden' name='urun_id' value='{$row["urun_id"]}'>
                                                <input type='number' name='urun_miktari' min='1' required>
                                                <button type='submit'>Azalt</button>
                                            </form>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>Ürün bulunamadı.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>

</html>