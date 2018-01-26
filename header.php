<?php 


include 'admin/netting/baglan.php';

$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id' => 0
));

$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


$hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
  'id' => 0
));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
$kullanicisor=$db->prepare("SELECT * FROM kullanici");
$kullanicisor->execute();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>

  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-9">
  <META HTTP-EQUIV="Content-language" CONTENT="tr">
  

  <title><?php echo $ayarcek['ayar_title']; ?></title>
  <meta name="description" content="<?php echo $ayarcek['ayar_description']; ?>">
  <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords']; ?>">
  <meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Add custom CSS here -->

  <link href="css/style.css" rel="stylesheet">
  <link href="css/ekko-lightbox.css" rel="stylesheet">
  <link href="css/flexslider.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
  <div id="boxWrapp">
    <div class="main-nav clearfix">
     <!-- navbar -->
     <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#NavCol">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand bg-primary" href="#about"><?php echo $kullanicicek['kullanici_adsoyad']; ?></a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="NavCol">
         <ul class="nav navbar-nav navbar-right">

           <?php 

           $menusor=$db->prepare("SELECT * FROM menuler where menu_durum=:durum order by menu_sira ASC limit 5");
           $menusor->execute(array(
            'durum' => 1
          ));

           while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {
             ?>
             <li>

              <a href="<?php echo $menucek['menu_url'] ?>" class="linear hire">
              <?php echo $menucek['menu_ad'] ?></a></li>

              <?php } ?>


            </ul>


          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

    </div>
    <!-- Full Page Image Header Area -->
    <div id="about" class="header">

     <div class="maskHeader"></div>
     <div class="main-caption">
      <div class="logo">
       <img src="<?php echo $ayarcek['ayar_logo']; ?>" alt="logo" />
     </div>
     <!-- slider -->
     <div id="flex-head" class="flexslider">
      <ul class="slides">
       <li>
        <h1>Ben <?php echo $kullanicicek['kullanici_adsoyad']; ?></h1>	
        <h2>Hosgeldiniz...</h2>
      </li>
      <li>
        <h1>Developer</h1>	
        <h2>Sorunları netlikle çözmeye yönelik tutkulu bir geliştirici</h2>
      </li>
      <li>
        <h1>Ve Web Tasarımcısı</h1>	
        <h2>Güzel Hazırlanmış Web Tasarımları ve Yapıları</h2>	
      </li>
    </ul>
  </div> 
  <!-- end slider --> 
  <a href="#aboutMore" class="btn btnAbout btn-clear border-color color-primary btn-lg linear">Daha Fazlasi</a>
</div><!--  end main caption -->

</div>
<!-- end header -->
    <!-- /Full Page Image Header Area -->