<?php
// baglanti.php dosyanızı dahil edin
include 'baglanti.php';

// SQL sorgusunu çalıştırın
$sorgu = $baglanti->query("SELECT kategori.kategori_ad, COUNT(urun.urun_id) AS urun_sayisi FROM urun JOIN kategori ON urun.kategori_id = kategori.kategori_id GROUP BY kategori.kategori_ad");

// Sonuçları diziye aktarın
$kategoriler = [];
while ($row = $sorgu->fetch_assoc()) {
    $kategoriler[] = $row;
}

// JavaScript için JSON'a dönüştürün
$kategoriler_json = json_encode($kategoriler);




include 'baglanti.php';

// SQL sorgusunu çalıştırın
$sorgu = $baglanti->query("SELECT tedarikci.tedarikci_adi, COUNT(urun.urun_id) AS urun_sayisi FROM urun JOIN tedarikci ON urun.tedarikci_id = tedarikci.tedarikci_id GROUP BY tedarikci.tedarikci_adi");

// Sonuçları diziye aktarın
$tedarikciler = [];
while ($row = $sorgu->fetch_assoc()) {
    $tedarikciler[] = $row;
}

// JavaScript için JSON'a dönüştürün
$tedarikciler_json = json_encode($tedarikciler);








?>


<!DOCTYPE html>


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Analiz</title>

    <script src="https://kit.fontawesome.com/5c2368ed16.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Collegiate+One:ital@1&family=Dancing+Script:wght@700&family=Lato&family=Montserrat&family=Nunito+Sans:ital,opsz,wght@1,6..12,200&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"
        integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>











    <style>
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

        .chart-container canvas {
            width: 600px;
            /* İstenen genişlik */
            height: 600px;
            /* İstenen yükseklik */

            margin: 50px auto;
            margin-top: 100px;
            display: block;

        }

        #barChart {
            margin-top: 300px;
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


            <!-- Canvas boyutlarını ayarlayın -->
            <div class="chart-container">
                <h2 class="dash-title" style="font-size: 65px;">Kategori Ürün Sayısı <i
                        class="fa-solid fa-chart-simple"></i></h2>
                <canvas id="pieChart"></canvas>
            </div>
            <div class="chart-container">
                <h2 class="dash-title" style="font-size: 65px;">Tedarikci Ürün Sayısı <i
                        class="fa-solid fa-chart-simple"></i></h2>
                <canvas id="barChart"></canvas>
            </div>



            <script>
                // PHP'den JSON olarak aldığınız verileri kullanın
                var kategoriler = <?php echo $kategoriler_json; ?>;

                // Pasta Grafiği İçin Veri ve Yapılandırma
                var pieData = {
                    labels: kategoriler.map(function (kategori) { return kategori.kategori_ad; }),
                    datasets: [{
                        data: kategoriler.map(function (kategori) { return kategori.urun_sayisi; }),
                        backgroundColor: [
                            '#FF6384', // Örnek renkler
                            '#36A2EB',
                            '#FFCE56',
                            // Diğer renkleri buraya ekleyebilirsiniz
                        ],
                        hoverOffset: 4
                    }]
                };

                // Pasta Grafiğini Oluşturun
                var pieChart = new Chart(document.getElementById('pieChart'), {
                    type: 'pie',
                    data: pieData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    }
                });






                // Çubuk Grafiği İçin Benzer Bir Yapılandırma Kullanabilirsiniz

                var tedarikciler = <?php echo $tedarikciler_json; ?>;

                // Pasta Grafiği İçin Veri ve Yapılandırma
                var barData = {
                    labels: tedarikciler.map(function (tedarikci) { return tedarikci.tedarikci_adi; }),
                    datasets: [{
                        data: tedarikciler.map(function (tedarikci) { return tedarikci.urun_sayisi; }),
                        backgroundColor: [
                            '#FF6384', // Örnek renkler
                            '#36A2EB',
                            '#FFCE56',
                            // Diğer renkleri buraya ekleyebilirsiniz
                        ],
                        hoverOffset: 4
                    }]
                };

                // Bar Grafiğini Oluşturun
                var barChart = new Chart(document.getElementById('barChart'), {
                    type: 'bar',
                    data: barData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            },
                            tooltip: {
                                enabled: true
                            }
                        }
                    }
                });









            </script>


        </main>
    </div>




    </div>

</body>

</html>