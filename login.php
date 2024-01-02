<?php

include("baglanti.php");

$username_err = $parola_err = "";
if (isset($_POST["giris"])) {
    //Kullanıcı adı doğrulama
    if (empty($_POST["kullaniciadi"])) {
        $username_err = "Kullanıcı Adı Boş Geçilemez.";
    } else {
        $username = $_POST["kullaniciadi"];
    }


    //parola doğrulama
    if (empty($_POST["parola"])) {
        $parola_err = "Parola Boş Geçilemez.";
    } else {
        $parola = $_POST["parola"];
    }



    if (isset($username) && isset($parola)) {
        $secim = " SELECT * FROM kullanicilar WHERE kullanici_adi = '$username'";
        $calistir = mysqli_query($baglanti, $secim);
        $kayitsayisi = mysqli_num_rows($calistir); //ya sıfır ya bir 1-0

        if ($kayitsayisi > 0) {
            $ilgilikayit = mysqli_fetch_assoc($calistir);
            $hashlisifre = $ilgilikayit["parola"];

            if (password_verify($parola, $hashlisifre)) {
                session_start();
                $_SESSION["kullanici_adi"] = $ilgilikayit["kullanici_adi"];
                $_SESSION["email"] = $ilgilikayit["email"];
                header("location:main.php");


            } else {
                echo '<div class="alert alert-danger" role="alert">
            Kullanıcı Adı Yanlış
          </div>';
            }

        } else {
            echo '<div class="alert alert-danger" role="alert">
        Kullanıcı Adı Yanlış
      </div>';

        }

        mysqli_close($baglanti);

    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kullanıcı Giriş Sayfası</title>
    <!-- Bootstrap CSS ve diğer stil dosyalarınız -->
    <!-- Stil ayarları -->
    <style>
        body {
            background-image: url('./images/giris.jpg');
            /* Arka plan resminizin yolu */
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 300px;
            /* Kutunun maksimum genişliği, gerektiği gibi ayarlayabilirsiniz */
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            /* Yarı saydam beyaz arka plan */
            padding: 20px;
            /* İç boşluk */
            border-radius: 10px;
            /* Kenar yuvarlatma */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Kutu etrafında gölge */
            display: flex;
            /* Flexbox kullanarak kutuyu düzenle */
            flex-direction: column;
            /* Elemanları dikey olarak hizala */
            align-items: center;
            /* Elemanları yatay merkeze al */
        }

        .form-control,
        .btn-secondary {
            width: calc(100% - 40px);
            /* Kutu genişliği, padding'i çıkart */
            margin-bottom: 10px;
            /* Alt öğeler arasında boşluk */
        }

        .form-label {
            font-weight: bold;
            /* Daha kalın yazı tipi */
            font-size: 18px;
            /* Daha büyük yazı tipi boyutu */
            color: #333;
            /* Koyu renk metin */
            margin-bottom: 10px;
            /* Etiket altında boşluk */
            width: 100%;
            /* Tam genişlik */
            text-align: left;
            /* Metni sola hizala */
        }

        .form-control {
            border: 2px solid #ccc;
            /* Kenarlık kalınlığı */
            border-radius: 5px;
            /* Kenar yuvarlatma */
            font-size: 16px;
            /* Daha büyük yazı tipi boyutu */
            padding: 10px;
            /* İç boşluk */
        }

        .btn-secondary {
            background-color: #5E4C77;
            /* Düğme rengi */
            border: none;
            padding: 10px;
            /* İç boşluk */
            font-size: 16px;
            /* Düğme metin boyutu */
            border-radius: 5px;
            color: white;
            /* Metin rengi */
            cursor: pointer;
            /* İmleç */
            transition: background-color 0.2s;
            /* Renk geçişi */
        }

        .btn-secondary:hover {
            background-color: #4B3F6B;
            /* Hover durumunda düğme rengi */
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
                <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                    id="exampleInputEmail1" name="kullaniciadi">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?php echo $username_err; ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Parola</label>
                <input type="password" class="form-control <?php echo (!empty($parola_err)) ? 'is-invalid' : ''; ?>"
                    id="exampleInputPassword1" name="parola">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?php echo $parola_err; ?>
                </div>
            </div>

            <button type="submit" name="giris" class="btn btn-secondary">Giriş Yap!</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>