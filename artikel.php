<?php
   include('koneksi.php');
   $kd_artikel= $_GET['kd_artikel'];
    $q = "SELECT artikel.kd_artikel, artikel.kategori, artikel.judul,artikel.isi,artikel.tanggal,artikel.gambar,user.nama
        FROM artikel
        INNER JOIN user
        ON (user.kd_user = artikel.kd_user)
        WHERE artikel.kd_artikel = '$kd_artikel'
        ";
    $artikel = mysqli_query($con,$q);   
    $rc = mysqli_fetch_array($artikel,MYSQLI_ASSOC); 
    $kategori = $rc['kategori'];
    $judul = $rc['judul'];
    $isi = $rc['isi'];
    $nama = $rc['nama'];
    $tanggal = $rc['tanggal'];
    $gambar = $rc['gambar'];
    $q2 = "SELECT artikel.kd_artikel, artikel.kategori, artikel.judul,artikel.isi,artikel.tanggal,artikel.gambar,user.nama
        FROM artikel
        INNER JOIN user
        ON (user.kd_user = artikel.kd_user)
        ORDER BY artikel.tanggal DESC
        ";
    $latestartikel = mysqli_query($con,$q2);   
    $q3 = "SELECT artikel.kd_artikel, artikel.kategori, artikel.judul,artikel.isi,artikel.tanggal,artikel.gambar,user.nama
        FROM artikel
        INNER JOIN user
        ON (user.kd_user = artikel.kd_user)
        WHERE artikel.kategori = '$kategori'
        ORDER BY artikel.tanggal DESC
        ";
    $relatedartikel = mysqli_query($con,$q3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>BB37 Kreatif | Blog</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="mosh-preloader"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area clearfix">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <!-- Menu Area Start -->
                <div class="col-12 h-100">
                    <div class="menu_area h-100">
                        <nav class="navbar h-100 navbar-expand-lg align-items-center">
                            <!-- Logo -->
                            <a class="navbar-brand" href="index.html"><img src="img/core-img/logo.png" alt="logo" width=170px></a>

                            <!-- Menu Area -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mosh-navbar" aria-controls="mosh-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                            <div class="collapse navbar-collapse justify-content-end" id="mosh-navbar">
                                <ul class="navbar-nav animated" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                                   
                                    <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                                   
                                    <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
                                </ul>
                                <!-- Search Form Area Start -->
                                <div class="search-form-area animated">
                                    <form action="#" method="post">
                                        <input type="search" name="search" id="search" placeholder="Type keywords &amp; hit enter">
                                        <button type="submit" class="d-none"><img src="img/core-img/search-icon.png" alt="Search"></button>
                                    </form>
                                </div>
                                <!-- Search btn -->
                                <div class="search-button">
                                    <a href="#" id="search-btn"><img src="img/core-img/search-icon.png" alt="Search"></a>
                                </div>
                                <!-- Login/Register btn -->
                                
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcumb Area Start ***** -->
    <div class="mosh-breadcumb-area" style="background-image: url(img/core-img/breadcumb.png);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumbContent">
                        <h2>Blog</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Articles</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Blog Area Start ***** -->
    <section class="blog-area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="mosh-blog-posts">
                        <div class="row">
                            <!-- Single Blog Start -->
                            <div class="col-12">
                                <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
                                    <!-- Post Category -->                         
                                        <br>
                                        <a href="blog.php?search=<?php echo $$kategori;?>"><?php echo $kategori;?></a>
                                        <hr>
                                        <!-- Post Title -->
                                        <h1><?php echo $judul;?></h1>
                                        <div class="blog-post-thumb">
                                            <img src="img/blog-img/<?php echo $gambar;?>" alt="">
                                        </div>
                                        <!-- Post Meta -->
                                        <div class="post-meta">
                                            <?php     
                                                $day = date('D', strtotime($tanggal));
                                                $mon = date('m', strtotime($tanggal));
                                                $dayList = array(
                                                    'Sun' => 'Minggu',
                                                    'Mon' => 'Senin',
                                                    'Tue' => 'Selasa',
                                                    'Wed' => 'Rabu',
                                                    'Thu' => 'Kamis',
                                                    'Fri' => 'Jumat',
                                                    'Sat' => 'Sabtu'
                                                );
                                                $monList = array(
                                                    '01' => 'Januari',
                                                    '02' => 'Februari',
                                                    '03' => 'Maret',
                                                    '04' => 'April',
                                                    '05' => 'Mei',
                                                    '06' => 'Juni',
                                                    '07' => 'Juli',
                                                    '08' => 'Agustus',
                                                    '09' => 'September',
                                                    '10' => 'Oktober',
                                                    '11' => 'November',
                                                    '12' => 'Desember',
                                                );
                                                $strwaktu = $dayList[$day].", ".date('d', strtotime($tanggal))." ".$monList[$mon]." ".date('Y', strtotime($tanggal));
                                            ?>
                                            <h6 align="RIGHT"><a href="blog.php?search=<?php echo $tanggal;?>"><?php echo $strwaktu;?></a></h6>
                                            <h6>By <a href="blog.php?search=<?php echo $nama;?>"><?php echo $nama;?></a></h6>
                                        </div>
                                        <!-- Post Title -->
                                        <!-- Post Excerpt -->
                                        <p><?php echo $isi;?></p>
                                        <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination Area Start -->
                    <div class="row">
                        <div class="col-md-12"><br> <h5>Related Articles</h5><hr>
                            <div class="row">
                            <?php $c = 1; ?>
                            <?php while($row = mysqli_fetch_array($relatedartikel,MYSQLI_ASSOC)): ?>  
                                <div class="col-md-4 single-latest-blog-post d-flex">
                                    <div class="latest-blog-post-thumb">
                                        <img src="img/blog-img/<?php echo $row['gambar'];?>" alt="">
                                    </div>
                                    <div class="latest-blog-post-content">
                                        <h6><a href="artikel.php?kd_artikel=<?php echo $row['kd_artikel']?>"><?php echo $row['judul'];?></a></h6>
                                        <div class="post-meta">
                                            <h6>By <a href="blog.php?search=<?php echo $row['nama'];?>"><?php echo $row['nama'];?></a>/<a href="blog.php?search=<?php echo $row['tanggal'];?>"><?php echo $row['tanggal'];?></a></h6>
                                        </div>
                                    </div>  
                                </div>
                            <?php $c++; ?>
                            <?php endwhile; ?>
                            <?php if(mysqli_num_rows($relatedartikel) < 1): ?>
                            <tr>
                                <td colspan="5" class="bg-danger text-danger text-center">*** TIDAK ADA ARTIKEL ***</td>
                                </tr>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mosh-blog-sidebar">

                        <div class="blog-post-search-widget mb-100">
                            <form action="#">
                                <input type="search" name="search" id="Search">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <div class="latest-blog-posts mb-100">
                            <h5>Latest Posts</h5>
                            <?php $c = 1; ?>
                            <?php while($row = mysqli_fetch_array($latestartikel,MYSQLI_ASSOC)): ?>  
                                <div class="single-latest-blog-post d-flex">
                                    <div class="latest-blog-post-thumb">
                                        <img src="img/blog-img/<?php echo $row['gambar'];?>" alt="">
                                    </div>
                                    <div class="latest-blog-post-content">
                                        <h6><a href="artikel.php?kd_artikel=<?php echo $row['kd_artikel']?>"><?php echo $row['judul'];?></a></h6>
                                        <div class="post-meta">
                                            <h6>By <a href="blog.php?search=<?php echo $row['nama'];?>"><?php echo $row['nama'];?></a>/<a href="blog.php?search=<?php echo $row['tanggal'];?>"><?php echo $row['tanggal'];?></a></h6>
                                        </div>
                                    </div>
                                </div>
                            <?php $c++; ?>
                            <?php endwhile; ?>
                            <?php if(mysqli_num_rows($latestartikel) < 1): ?>
                            <tr>
                                <td colspan="5" class="bg-danger text-danger text-center">*** TIDAK ADA ARTIKEL ***</td>
                                </tr>
                            <?php endif; ?>
                            <CENTER> <a href="blog.php">View All</a></CENTER> 
                        </div>
                        <div class="blog-post-archives mb-100">
                            <h5>Archives</h5>
                            <ul>
                                <li><a href="#">March 2018</a></li>
                                <li><a href="#">April 2018</a></li>
                                <li><a href="#">May 2018</a></li>
                            </ul>
                        </div>

                        <div class="blog-post-categories mb-100">
                            <h5>Categories</h5>
                            <ul>
                                <li><a href="#">Entertaiment</a></li>
                                <li><a href="#">Business &amp; Finance</a></li>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Creative fields</a></li>
                                <li><a href="#">Lifestyle &amp; Travel</a></li>
                                <li><a href="#">Uncategorized</a></li>
                            </ul>
                        </div>

                        <div class="instagram-feeds">
                            <h5>Instagram</h5>
                            <ul>
                                <li><a href="#"><img src="img/blog-img/ins-1.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/blog-img/ins-2.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/blog-img/ins-3.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/blog-img/ins-4.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/blog-img/ins-5.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/blog-img/ins-6.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area clearfix">
        <!-- Top Fotter Area -->
        <div class="top-footer-area section_padding_100_0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-100">
                            <a href="#" class="mb-50 d-block"><img src="img/core-img/logo.png" alt=""></a>
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellent esque sit amet tellus blandit. Etiam nec odio vestibul.</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-100">
                            <h5>Fast links</h5>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Services &amp; Features</a></li>
                                <li><a href="#">Accordions and tabs</a></li>
                                <li><a href="#">Menu ideas</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-100">
                            <h5>Blog</h5>
                            <div class="footer-single--blog-post">
                                <a href="#" class="blog-post-date">
                                    <p>23 September, 2017</p>
                                </a>
                                <a href="#" class="blog-post-title">
                                    <h6>Why we love stock photos</h6>
                                </a>
                            </div>
                            <div class="footer-single--blog-post">
                                <a href="#" class="blog-post-date">
                                    <p>22 September, 2017</p>
                                </a>
                                <a href="#" class="blog-post-title">
                                    <h6>Designin on grid. A few rules. </h6>
                                </a>
                            </div>
                            <div class="footer-single--blog-post">
                                <a href="#" class="blog-post-date">
                                    <p>20 September, 2017</p>
                                </a>
                                <a href="#" class="blog-post-title">
                                    <h6>2017 World Design Congress</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-100">
                            <h5>Contact Info</h5>
                            <div class="footer-single-contact-info d-flex">
                                <div class="contact-icon">
                                    <img src="img/core-img/map.png" alt="">
                                </div>
                                <p>4127/ 5B-C Mislane Road, Gibraltar, UK</p>
                            </div>
                            <div class="footer-single-contact-info d-flex">
                                <div class="contact-icon">
                                    <img src="img/core-img/call.png" alt="">
                                </div>
                                <p>Main: 203-808-8613 <br> Office: 203-808-8648</p>
                            </div>
                            <div class="footer-single-contact-info d-flex">
                                <div class="contact-icon">
                                    <img src="img/core-img/message.png" alt="">
                                </div>
                                <p>office@yourbusiness.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fotter Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="footer-bottom-content h-100 d-md-flex justify-content-between align-items-center">
                            <div class="copyright-text">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                            </div>
                            <div class="footer-social-info">
                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>