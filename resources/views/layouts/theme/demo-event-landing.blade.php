<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">

    <!--Vendors css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/fonts/boxicons/css/boxicons.min.css') }}">
    <link href="{{ URL::asset('assets/fonts/iconsmind/iconsmind.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/glightbox.min.css') }}">
    <link href="{{ URL::asset('assets/vendor/node_modules/css/aos.css') }}" rel="stylesheet">
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet'>

    <!-- Google fonts CSS -->
    <link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
    <link
        href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Jost:wght@100..900&family=Source+Serif+Pro:ital@0;1&display=swap') }}"
        rel="stylesheet">
    <!--Swiper slider-->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
    <!-- Main CSS -->
    <link href="{{ URL::asset('assets/css/theme-orange.min.css') }}" rel="stylesheet">

    <title>Assan 4</title>
</head>

<body data-bs-spy="scroll" data-bs-target="#mainNavbarTheme">

    <!--Preloader Spinner-->
    <div class="spinner-loader bg-primary-subtle">
        <div class="spinner-border text-primary" role="status">
        </div>
        <span class="small d-block ms-2">Loading...</span>
    </div>

    <!--Header Start-->
    <header class="z-fixed header-transparent header-fixed-top sticky-fixed">
        <nav class="navbar navbar-expand-lg navbar-light navbar-link-white">
            <!--Navbar-fixed-background-->
            <div class="navbar-fixed-bg position-absolute"></div>
            <div class="container position-relative">
                <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                    <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-sticky">
                    <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-transparent">
                </a>
                <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                    <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                        data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i></i>
                        </span>
                    </button>
                    <div class="nav-item me-3 me-lg-0">
                        <a href="{{ URL::asset('#contact') }}" class="btn btn-info btn-hover-text">
                            <span class="btn-hover-label label-default">Book Now</span>
                            <span class="btn-hover-label label-hover">Book Now</span>
                        </a>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="mainNavbarTheme">
                    <ul class="navbar-nav ms-auto me-lg-5">
                        <li class="nav-item">
                            <a href="{{ URL::asset('#home') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item ms-lg-4">
                            <a href="{{ URL::asset('#about') }}" class="nav-link">about</a>
                        </li>
                        <li class="nav-item ms-lg-4">
                            <a href="{{ URL::asset('#speakers') }}" class="nav-link">Speakers</a>
                        </li>
                        <li class="nav-item ms-lg-4">
                            <a href="{{ URL::asset('#schedule') }}" class="nav-link">Schedule</a>
                        </li>
                        <li class="nav-item ms-lg-4">
                            <a href="{{ URL::asset('#pricing') }}" class="nav-link">Pricing</a>
                        </li>
                        <li class="nav-item ms-lg-4">
                            <a href="{{ URL::asset('#faqs') }}" class="nav-link">Faqs</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--Hero-->
    <section class="position-relative bg-dark" id="home">
        <!--background-image-->
        <img src="{{ URL::asset('assets/img/backgrounds/bg4.jpg') }}" class="bg-image opacity-75" alt="">

        <div class="position-absolute start-0 bottom-0 w-100 h-100 bg-gradient-dark"></div>

        <!--Hero Content-->
        <div class="container text-center pt-lg-15 pt-12 pb-12 position-relative z-1">
            <h4 class="text-uppercase text-white text-opacity-75">Prague, Czech Republic</h4>
            <h1 class="text-white my-4 display-1 text-uppercase"><span>Designers</span><br><span
                    class="text-success"></span>
                Conference</h1>
            <p class="lead text-white mb-5 mb-lg-7">July 01-02, 2023</p>
            <div class="d-flex mb-5 justify-content-center align-items-center">
                <a href="{{ URL::asset('#pricing') }}" class="btn btn-white px-lg-5 py-lg-3 me-3">Participate</a>
                <a href="{{ URL::asset('https://vimeo.com/353105087') }}" data-glightbox data-gallery="gallery1"
                    class="btn btn-primary px-lg-5 py-lg-3">
                    <i class="bx bx-play fs-4 align-middle"></i> Watch Teasor
                </a>
            </div>
        </div>

        <!--Divider-->
        <svg preserveAspectRatio="none" class="position-absolute start-0 bottom-0 flip-y z-1" width="100%"
            style="color:var(--bs-body-bg)" height="32" viewBox="0 0 1920 16" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1809.19 10.5474C1809.19 9.89547 1809.19 9.89547 1808.63 9.55029C1802.96 12.1964 1794.97 9.35856 1788.47 10.8541C1787.12 10.2357 1785.69 9.69675 1784.21 9.24347C1782.13 9.97509 1779.83 10.3566 1777.48 10.3556L1776.85 9.74203L1771.99 10.5474L1772.61 9.55029C1766.37 10.9692 1757.27 9.20512 1752.11 9.74203C1738.07 11.1226 1720.75 10.1255 1705.73 11.1993C1700.81 11.5444 1694.41 10.2406 1688.75 10.8541C1680.93 11.5119 1673.03 11.4086 1665.25 10.5474C1659.57 10.5475 1653.91 10.765 1648.27 11.1993C1644.2 10.8156 1640.09 10.8156 1636.03 11.1993C1634.39 11.4677 1631.79 10.2022 1629.97 10.3556C1619.11 11.3143 1606.36 10.3556 1593.33 11.0076C1588.65 10.7317 1583.95 10.7959 1579.29 11.1993L1578.52 11.1202C1576.52 10.9169 1574.56 10.7172 1572.56 10.5474C1570.29 10.3557 1571.31 11.2377 1570.47 11.5061C1569.61 11.7746 1561.52 10.7007 1559.13 10.8541C1548.44 11.5828 1537.45 10.6241 1528.96 10.8541C1526.97 11.1609 1525.05 11.5061 1523.29 11.8129C1520.81 11.9229 1518.33 11.7014 1515.99 11.1609L1509.25 11.5061C1506.88 11.6748 1504.49 11.5049 1502.23 11.0076C1498.52 11.6385 1494.68 11.7559 1490.91 11.3527C1490.91 10.394 1491.31 10.279 1490.28 9.70373H1490C1489.87 10.1935 1489.53 10.6491 1489.04 11.021C1488.56 11.3929 1487.92 11.6668 1487.23 11.8129C1482.65 11.4237 1478.01 11.5925 1473.52 12.3114C1469.73 12.3492 1465.95 12.1824 1462.2 11.8129L1454.55 12.3114C1447.64 12.3114 1437.56 12.1196 1431.91 11.8129C1431.91 12.9248 1431.91 13.4236 1430.43 13.7687C1430.44 13.4514 1430.32 13.1381 1430.11 12.857C1429.89 12.5759 1429.57 12.3357 1429.19 12.158C1426.6 12.6962 1423.84 12.6962 1421.25 12.158C1421.05 12.1421 1420.84 12.1421 1420.64 12.158L1421.25 12.6181C1422.96 13.0783 1424.71 13.5002 1426.41 13.922V14.2289H1424.93C1415.43 11.7362 1409.31 12.6949 1397.41 12.158L1397.13 12.6181L1398.04 13.922H1396.85L1394.69 12.4649C1386.56 11.7915 1378.31 12.0638 1370.29 13.2701C1370.19 13.5463 1369.99 13.8043 1369.73 14.0285C1369.47 14.2526 1369.13 14.4382 1368.76 14.574C1367.8 14.574 1364.47 13.4235 1365.08 13.2701C1360.13 12.7151 1355.08 12.7151 1350.13 13.2701C1348.49 13.2701 1346.91 12.925 1345.27 12.7716C1337.07 13.4987 1328.79 11.6488 1320.52 11.4577L1319.9 10.8058C1319.41 11.1423 1318.77 11.3697 1318.09 11.4577C1317.47 10.9974 1316.73 10.9975 1315.99 10.6524C1318.65 9.88539 1318.31 7.77621 1322.96 8.38981C1321.99 7.58448 1321.37 7.73787 1321.77 6.93253L1323.1 6.91488V5.30421H1322.13C1319.53 6.0712 1321.54 6.20389 1319.33 6.93253H1315.03C1312.7 7.42027 1311.46 9.41285 1310.82 10.4326L1310.78 10.4989C1310.21 10.2974 1309.58 10.1921 1308.94 10.1921C1308.3 10.1921 1307.67 10.2974 1307.1 10.4989V11.1509L1308.97 12.1096L1308.35 12.5698H1306.82C1305.96 11.9932 1304.91 11.5601 1303.76 11.3043L1303.14 11.6111C1304.27 11.8795 1303.87 11.6111 1304.38 12.263L1300.99 12.6082H1300.7C1300.7 11.5727 1300.36 11.6494 1299.8 10.6524C1302.55 10.8957 1305.34 10.5039 1307.73 9.54021L1305.29 9.86176H1304.38C1303.87 10.6321 1302.99 9.14187 1301.89 9.54021L1297.65 10.5137V10.2069C1299.23 9.93845 1300.08 9.09483 1299.51 8.25115C1298.95 7.40752 1298.78 7.40741 1297.99 6.9856H1297.65C1296.24 8.18304 1295.39 9.63888 1295.21 11.1656C1294.28 11.3893 1293.37 9.53461 1292.49 9.84704L1290.34 9.38688L1292.49 11.6111L1294.65 11.9562C1295.61 11.2276 1295.89 11.1508 1297.36 11.4577L1298.27 12.9149H1297.65C1297.42 12.9149 1295.44 12.4931 1294.31 12.263L1294.02 13.912L1293.12 13.5669C1290.91 11.7645 1286.83 13.3368 1283.04 13.5669C1282.07 13.03 1282.13 12.9917 1280.6 13.1067L1280.26 11.3043H1280.89C1282.92 10.9209 1284.96 10.5757 1287 10.1922H1286.38C1285.94 10.079 1285.49 9.98032 1285.04 9.89616C1285.02 9.94779 1284.99 10.0002 1284.96 10.0535C1283.41 10.2482 1281.87 10.5172 1280.38 10.8588L1280.46 10.517C1279.8 10.8128 1279.06 11.0326 1278.28 11.1656C1277.95 11.0433 1277.61 10.9415 1277.26 10.8605C1277.25 11.3922 1277.27 11.9239 1277.32 12.4547C1275.51 12.7615 1275.28 13.2601 1273.07 13.4134C1270.86 13.5668 1271.83 12.9149 1271.83 12.6082C1270.3 12.9917 1270.13 13.4518 1268.49 13.7586C1267.18 13.4518 1266.96 13.4517 1266.33 12.7615C1264.52 13.2599 1262.71 13.7587 1260.67 14.2187L1260.05 12.7615C1258.41 13.0299 1258.12 13.5285 1257.33 14.2187C1253.73 13.9484 1250.09 14.1702 1246.63 14.8707C1243.8 14.8707 1240.97 14.6406 1238.08 14.5639C1231.51 14.2961 1224.92 14.7231 1218.54 15.8294L1217.35 15.0242C1213.28 16.8649 1206.59 15.0242 1201.78 15.3693C1199.25 15.7368 1196.62 15.6708 1194.14 15.1774C1186.74 16.4276 1179.08 14.1501 1171.49 13.6613L1170.92 13.3162C1173.7 10.7852 1167.07 10.9386 1163.9 10.9002L1164.18 12.2041H1164.81C1166.33 12.339 1167.87 12.339 1169.39 12.2041L1170.3 13.3545C1166.63 13.1912 1162.96 13.6252 1159.6 14.6201C1157.79 15.387 1139.16 10.9032 1134 12.3604C1132.25 12.859 1121.43 11.7468 1119.62 12.0536L1118.77 12.7822H1117.24C1116.34 12.7822 1116.11 11.8618 1114.19 12.1302C1109.65 12.7139 1105.02 12.8689 1100.43 12.5905C1097.2 12.5905 1093.91 13.4689 1090.69 13.6223C1086.48 13.5875 1082.29 13.2663 1078.17 12.6636C1070.81 11.8966 1067.81 14.3126 1061.18 12.0117C1061.18 12.0117 1048.39 13.469 1046.86 13.3156C1041.2 12.7403 1033.44 12.3569 1028.85 12.0117C1027.32 12.0117 1027.49 12.6253 1026.7 12.817C1023.91 13.1586 1021.03 12.9317 1018.43 12.1651L1010.51 13.3156C1008.85 12.7785 1007.13 12.3422 1005.35 12.0117C1002.78 12.8393 999.92 13.1709 997.087 12.9704C995.784 11.8583 993.18 11.8967 991.877 11.2064C986.215 13.4307 985.535 11.82 980.552 11.2064C978.061 10.8996 979.193 12.0117 977.155 11.2064L970.756 12.817C968.548 12.2418 967.981 11.4748 965.093 11.3597C963.351 12.0089 961.417 12.3887 959.432 12.4719L956.091 11.0146C952.24 11.0146 950.995 12.3569 947.54 12.1651L941.425 10.7079C939.608 11.6152 937.552 12.2789 935.367 12.6636L929.704 11.0146C928.941 12.4533 927.917 12.8274 925.975 13.5364L925.74 13.6223H925.457C922.408 12.3058 918.799 11.7155 915.199 11.9446C911.599 12.1739 908.215 13.2096 905.583 14.8878C899.777 14.6684 894.269 13.0812 890.011 10.401H889.728C889.547 11.8234 888.692 13.1683 887.293 14.2359C884.801 14.2359 882.989 14.2359 882.083 12.9704C880.271 13.2772 877.949 13.9675 876.024 14.4277C865.719 11.3214 867.98 14.4276 857.164 11.9733C856.797 12.4837 856.237 12.9192 855.541 13.2357C854.845 13.5523 854.037 13.7385 853.201 13.7757C851.389 13.4306 849.576 13.1238 847.539 12.817C839.101 13.0087 830.551 13.2388 822.227 13.4306C819.396 12.9321 816.565 11.7815 814.583 12.3185C812.828 14.8111 803.541 13.8907 798.728 14.2359C796.225 12.9258 793.292 12.0444 790.179 11.6666C788.989 11.6666 787.857 13.2005 785.592 13.1238L777.041 12.3185L777.023 12.3222C775.104 12.7044 773.185 13.0866 771.379 13.4306C754.901 13.0471 737.915 13.6607 723.136 13.9291C712.887 13.9291 700.487 15.233 692.049 13.2772C689.841 15.0412 685.707 12.7403 683.159 13.2772C681.969 13.2772 681.177 14.3893 679.535 14.581C676.195 14.9261 674.948 13.7757 672.797 13.7757C667.417 13.7757 659.944 16.3835 651.111 15.3864L641.993 14.2359C636.903 14.4531 631.796 14.4531 626.705 14.2359L620.024 13.7757C601.168 16.1533 624.711 12.817 602.344 14.7344H587.055C573.672 15.5654 583.743 15.7833 570.316 15.3864C567.485 15.1563 564.653 14.9645 561.765 14.7344L557.803 15.6931H548.347C537.456 16.1938 526.52 16.0269 515.675 15.1946C513.757 15.3549 511.863 15.6244 510.012 16C504.797 15.8082 499.6 15.437 494.44 14.8878C491.884 14.7317 489.307 14.835 486.796 15.1946C480.397 15.1946 473.999 15.0029 467.6 14.8878L434.928 15.1492C427.624 14.3822 419.527 13.922 411.712 13.5386C410.524 13.7686 409.277 13.9604 408.089 14.1905C406.9 14.4206 397.047 13.3851 397.047 13.3851C396.707 14.037 397.331 13.8454 396.141 14.1905C390.479 15.8012 384.816 13.04 378.475 13.3851C374.873 13.3956 371.283 13.1254 367.772 12.5798C365.847 12.3497 362.733 12.8099 360.128 12.5798C350.492 11.2437 340.689 13.7374 330.853 13.6707C330.311 13.1999 329.555 12.8631 328.701 12.712C328.249 13.3639 328.701 13.2872 327.173 13.5173C324.852 12.1751 316.584 12.9804 313.131 13.5173C312.2 12.9867 311.463 12.3172 310.979 11.5614H310.412V13.1722C309.393 13.1722 309.449 13.4405 308.544 13.3638C303.344 13.7923 298.071 12.4519 293.029 11.4919C290.933 13.486 280.515 10.8783 278.363 11.9521C275.136 12.4122 269.36 11.4919 267.039 11.9521C260.831 12.8829 254.484 13.3204 248.127 13.2559C241.529 12.2628 234.731 12.0424 228.024 12.6041C225.476 13.0259 204.016 12.3739 203.903 12.2972C196.541 14.5981 181.649 11.5686 169.928 12.9108C158.208 14.253 142.523 12.3739 129.329 13.2559C117.381 14.0229 105.717 11.4259 96.0908 11.9627C92.6935 12.1929 89.3527 12.3845 86.0117 12.6146C82.9776 12.2519 79.8729 12.2519 76.8387 12.6146C76.1025 12.6146 76.4423 13.2666 75.0267 13.2666C72.1955 13.2666 71.2896 12.0778 69.3644 11.9627C68.4584 12.6147 67.5523 13.2666 66.5897 13.8802C63.2489 13.5734 59.2852 14.9922 55.2649 14.5321C53.7361 14.5321 53.7928 13.4967 52.8301 13.2666C49.9424 12.538 45.8087 13.6117 43.0341 12.9214L39.4103 10.6589C35.8429 10.6589 32.2756 12.6004 28.7083 12.4854C20.7421 11.0335 5.83436 14.0833 0 10.1333V3.05719e-06L1917.01 5.43705e-09C1917.97 1.00276e-08 1919.33 -8.83169e-09 1920 5.43705e-09V10.1333C1916.07 10.1027 1911.73 10.8118 1908.23 12.0017C1898.71 9.12555 1890.61 12.8099 1879.23 11.3527C1874.03 10.7391 1864.4 11.8895 1861.79 9.89541C1857.08 10.6817 1852.17 10.6817 1847.47 9.89541V10.0871L1848.37 10.8925H1847.47C1846.01 10.4479 1844.47 10.1755 1842.88 10.0871C1842.88 9.4352 1842.88 9.58864 1842.25 9.28181C1839.76 8.97504 1835.63 10.7775 1832.45 10.5474L1830.03 9.74203C1823.05 9.58635 1816.08 9.85595 1809.19 10.5474Z"
                fill="currentColor" />
        </svg>
    </section>

    <main>
{{$slot}}
    </main>

    <!-- begin:Back to Top button -->
    <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4"
                stroke-dasharray="0, 251.2"></circle>
        </svg>
        <i class="bx bxs-up-arrow"></i>
    </a>
    <!-- begin:Back to Top button -->
    <!--Footer-->
    <footer class="bg-dark" data-bs-theme="dark">
        <div class="container pt-9 pt-lg-12 pb-5">
            <div class="row">
                <div class="col-md-4 mb-6">
                    <a href="{{ URL::asset('#!') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" class="width-10x mb-4 h-auto" alt="">
                    </a>

                    <p class="text-body-secondary mb-0">
                        Duis aute irure dolor in reprehenderit in dolore eu fugiat nulla pariatur. Excepteur sint
                        occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                        laborum.
                    </p>
                    <div class="position-relative">
                        <x-partials.color-mode />
                    </div>
                </div>
                <div class="col-md-3 mx-xl-auto mb-6">
                    <h5 class="mb-3">Need info?</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <a href="{{ URL::asset('#!') }}">Contact Us</a>
                        </li>
                        <li class="mb-3">
                            <a href="{{ URL::asset('#!') }}">Press & Media</a>
                        </li>
                        <li class="mb-3">
                            <a href="{{ URL::asset('#!') }}">Legal Notice</a>
                        </li>
                        <li class="mb-3">
                            <a href="{{ URL::asset('#!') }}">Terms</a>
                        </li>
                        <li>
                            <a href="{{ URL::asset('#!') }}">Our Policy</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-5 col-xl-4 mb-6">
                    <h5 class="mb-3">Get notification</h5>
                    <form novalidate class="needs-validation mb-5">
                        <div class="position-relative">
                            <input type="email" required class="form-control mb-2 bg-transparent"
                                placeholder="Enter email..">
                            <span class="mb-3 small invalid-feedback start-0 ms-4 w-100">Enter valid email
                                address</span>
                            <button type="submit" class="btn btn-primary w-100">
                                Subscribe <i class="bx bx-send fs-5 align-middle ms-1"></i>
                            </button>
                        </div>
                    </form>
                    <div class="d-flex align-items-center flex-wrap">
                        <a href="{{ URL::asset('#!') }}"
                            class="width-4x height-4x me-3 d-flex align-items-center justify-content-center p-0 btn btn-outline-secondary text-white rounded-pill">
                            <i class="bx bxl-facebook fs-5"></i>
                        </a>
                        <a href="{{ URL::asset('#!') }}"
                            class="width-4x height-4x me-3 d-flex align-items-center justify-content-center p-0 btn btn-outline-secondary text-white rounded-pill">
                            <i class="bx bxl-twitter fs-5"></i>
                        </a>
                        <a href="{{ URL::asset('#!') }}"
                            class="width-4x height-4x me-3 d-flex align-items-center justify-content-center p-0 btn btn-outline-secondary text-white rounded-pill">
                            <i class="bx bxl-instagram fs-5"></i>
                        </a>
                        <a href="{{ URL::asset('#!') }}"
                            class="width-4x height-4x me-3 d-flex align-items-center justify-content-center p-0 btn btn-outline-secondary text-white rounded-pill">
                            <i class="bx bxl-linkedin fs-5"></i>
                        </a>
                    </div>
                </div>
            </div>

            <hr class="mb-5 mt-0">
            <div class="text-center small text-body-secondary">
                <span class="d-block lh-sm small text-body-secondary">© Copyright
                    <script>
                        document.write(new Date().getFullYear())

                    </script>. Assan
                </span>
            </div>
        </div>
    </footer>
    <!-- scripts -->
    <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>
    <!--Swiper slider-->
    <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
    <script>
        const swiper = new Swiper('.swiper-speakers', {
            slidesPerView: 1,
            spaceBetween: 16,
            loop: true,
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 16,
                },
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiperS-button-next',
                prevEl: '.swiperS-button-prev',
            },
        });
        //swiper-Testimonials
        var swiperTestimonails = new Swiper(".swiper-testimonials", {
            autoHeight: true,
            pagination: {
                el: ".swiper-testimonials-pagination",
                clickable: true
            }
        });

    </script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <script>
        mapboxgl.accessToken =
            'pk.eyJ1IjoiZGVzaWdubXlsaWZlIiwiYSI6ImNqeHlkMzljejAwaHAzbXFtaXphYWI3NmYifQ.IRPz2gseBSE-DQMzurY4ZA';
        var officeLocation = [14.437800, 50.075539];
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/light-v10',
            center: officeLocation,
            zoom: 11
        });
        // create the popup
        var popup = new mapboxgl.Popup({
            offset: 18
        }).setHTML(
            '<h2 class="text-primary mb-2 fw-normal">Location</h2><small class="text-body fs-6">124 Lorem, Prague, Czech Republic</small>'
        );
        // create DOM element for the marker
        var el = document.createElement('div');
        el.id = 'marker';
        // disable map zoom when using scroll
        map.scrollZoom.disable();
        // create the marker
        new mapboxgl.Marker(el)
            .setLngLat(officeLocation)
            .setPopup(popup) // sets a popup on this marker
            .addTo(map);

    </script>

</body>

</html>
