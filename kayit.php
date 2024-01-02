<?php

include("baglanti.php");

$username_err = $email_err = $parola_err = $parolatkr_err = "";
if (isset($_POST["kaydet"])) {
    //Kullanıcı adı doğrulama
    if (empty($_POST["kullaniciadi"])) {
        $username_err = "Kullanıcı Adı Boş Geçilemez.";
    } else if (strlen($_POST["kullaniciadi"]) < 6) {
        $username_err = "Kullanıcı Adı En Az 6 Karakterden Oluşmalıdır.";
    } else if (!preg_match('/^[a-z\d_]{5,20}$/i', $_POST["kullaniciadi"])) {
        $username_err = "Kullanıcı Adı Büyük/Küçük Harf ve Rakamlardan Oluşmalıdır.";

    } else {
        $username = $_POST["kullaniciadi"];
    }

    //email doğrulama     
    if (empty($_POST["email"])) {
        $email_err = "E-mail Alanı Boş Geçilemez.";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Geçersiz Email Formatı";
    } else {
        $email = $_POST["email"];
    }
    //parola doğrulama
    if (empty($_POST["parola"])) {
        $parola_err = "Parola Boş Geçilemez.";
    } else {
        $parola = password_hash($_POST["parola"], PASSWORD_DEFAULT);
    }
    //parola tekrarlama
    if (empty($_POST["parolatkr"])) {
        $parolatkr_err = "Parola Tekrar Kısmı Boş Geçilemez.";
    } else if ($_POST["parola"] != $_POST["parolatkr"]) {
        $parolatkr_err = "Parola Eşleşmiyor.";
    } else {
        $parolatkr = $_POST["parolatkr"];
    }


    if (isset($username) && isset($email) && isset($parola)) {











        $ekle = "INSERT INTO kullanicilar(kullanici_adi,email,parola) values ('$username','$email','$parola')";
        $calistirekle = mysqli_query($baglanti, $ekle);

        if ($calistirekle) {
            echo '<div class="alert alert-success" role="alert">
          Kayıt Başarılı Bir Şekilde Eklendi.
        </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
          Kayıt Eklenirken Bir Sorun Oluştu!
        </div>';
        }


        mysqli_close($baglanti);

    }
}


?>

<!doctype html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">

    <title>Kullanıcı Kayıt İşlemi</title>
</head>

<body>


    <div class="container p-5"></div>
    <div class="card p-5">


        <form action="kayit.php" method="POST">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
                <input type="text" class="form-control 
    <?php
    if (!empty($username_err)) {
        echo "is-invalid";
    }
    ?>
    
    
    
    
    
    " id="exampleInputEmail1" name="kullaniciadi">
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <?php
                    echo $username_err;
                    ?>
                </div>


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">E-mail Adresi</label>
                    <input type="text" class="form-control 
    <?php
    if (!empty($email_err)) {
        echo "is-invalid";
    }
    ?>
    
    
    
    " id="exampleInputEmail1" name="email">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php
                        echo $email_err;
                        ?>
                    </div>


                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Parola</label>
                        <input type="password" class="form-control 
    <?php
    if (!empty($parola_err)) {
        echo "is-invalid";
    }
    ?>
    
    
    
    
    " id="exampleInputPassword1" name="parola">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?php
                            echo $parola_err;
                            ?>
                        </div>


                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Parola</label>
                            <input type="password" class="form-control 
    <?php
    if (!empty($parolatkr_err)) {
        echo "is-invalid";
    }
    ?>
    
    
    
    
    " id="exampleInputPassword1" name="parolatkr">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?php
                                echo $parolatkr_err;
                                ?>
                            </div>

                        </div>




                        <button type="submit" name="kaydet" class="btn btn-primary">Kaydet</button>
                        <button type="submit" name="giris" class="btn btn-primary">
                            <a href="login.php" style="color: white; text-decoration: none;">Giriş</a>
                        </button>
                        
        </form>


    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    -->
</body>

</html>