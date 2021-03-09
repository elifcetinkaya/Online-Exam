<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ana Sayfa</title>
    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="css/main.css">
    <link  rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body


        .modal {
            text-align: center;
        }

        @media screen and (min-width: 768px) {
            .modal:before {
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
            }
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }



        {
            font: 400 15px Lato, sans-serif;
            line-height: 1.8;
            color: #818181;
        }
        h2 {
            font-size: 24px;
            text-transform: uppercase;
            color: #303030;
            font-weight: 600;
            margin-bottom: 30px;
        }
        h4 {
            font-size: 19px;
            line-height: 1.375em;
            color: #303030;
            font-weight: 400;
            margin-bottom: 30px;
        }
        .left{
            float:left;
        }

        .right{
            float:right;
        }

        .clear{
            clear:both;
        }
        .jumbotron {
            background-color: lightblue;
            color: #fff;
            padding: 100px 25px;
            font-family: Montserrat, sans-serif;
        }
        .container-fluid {
            padding: 60px 50px;
        }
        .bg-grey {
            background-color: #f6f6f6;
        }
        .logo-small {
            color: #f4511e;
            font-size: 50px;
        }
        .logo {
            color: #f4511e;
            font-size: 200px;
        }

        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }
        .thumbnail img {
            width: 100%;
            height: 100%;
            margin-bottom: 10px;
        }
        .carousel-control.right, .carousel-control.left {
            background-image: none;
            color: #f4511e;
        }
        .carousel-indicators li {
            border-color: #f4511e;
        }
        .carousel-indicators li.active {
            background-color: #f4511e;
        }
        .item h4 {
            font-size: 19px;
            line-height: 1.375em;
            font-weight: 400;
            font-style: italic;
            margin: 70px 0;
        }
        .item span {
            font-style: normal;
        }

        .navbar {
            margin-bottom: 0;

            background-color: #d9edf7;
            z-index: 9999;
            border: 0;

            font-size: 20px;

            letter-spacing: 4px;
            border-radius: 0;
            font-family: Montserrat, sans-serif;
        }
        .navbar li a, .navbar .navbar-brand {
            color: #204d74 !important;
        }
        .navbar-nav li a:hover, .navbar-nav li.active a {
            color: #9acfea !important;
            background-color: #fff !important;

        }
        .navbar-default .navbar-toggle {
            border-color: transparent;
            color: #fff !important;
        }
        footer .glyphicon {
            font-size: 20px;
            margin-bottom: 20px;
            color: #f4511e;
        }
        .slideanim {visibility:hidden;}
        .slide {
            animation-name: slide;
            -webkit-animation-name: slide;
            animation-duration: 1s;
            -webkit-animation-duration: 1s;
            visibility: visible;
        }
        @keyframes slide {
            0% {
                opacity: 0;
                transform: translateY(70%);
            }
            100% {
                opacity: 1;
                transform: translateY(0%);
            }
        }
        @-webkit-keyframes slide {
            0% {
                opacity: 0;
                -webkit-transform: translateY(70%);
            }
            100% {
                opacity: 1;
                -webkit-transform: translateY(0%);
            }
        }
        @media screen and (max-width: 768px) {
            .col-sm-4 {
                text-align: center;
                margin: 25px 0;
            }
            .btn-lg {
                width: 100%;
                margin-bottom: 35px;
            }
        }
        @media screen and (max-width: 480px) {
            .logo {
                font-size: 150px;
            }
        }
        @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

        body { background:#ffffff; }
        form { max-width:1020px; margin:50px auto }

        .feedback-input {
            color:black;
            font-family: Helvetica, Arial, sans-serif;
            font-weight:500;
            font-size: 18px;
            border-radius: 5px;
            line-height: 22px;
            background-color: transparent;
            border:2px solid lightblue;
            transition: all 0.3s;
            padding: 13px;
            margin-bottom: 15px;
            width:100%;
            box-sizing: border-box;
            outline:0;
        }

        .feedback-input:focus { border:2px solid #CC4949; }

        textarea {
            height: 150px;
            line-height: 150%;
            resize:vertical;
        }

        [type="submit"] {
            font-family: 'Montserrat', Arial, Helvetica, sans-serif;
            width: 100%;
            background:lightblue;
            border-radius:5px;
            border:0;
            cursor:pointer;
            color:white;
            font-size:24px;
            padding-top:10px;
            padding-bottom:10px;
            transition: all 0.3s;
            margin-top:-4px;
            font-weight:700;
        }
        [type="submit"]:hover { background:gray; }
    </style>


</head>





<body>

<body id="anasayfa" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#anasayfa"><span class="glyphicon glyphicon-home"></span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#login2">Öğretmen</a></li>
                <li><a href="#" data-toggle="modal" data-target="#myModal">Öğrenci Girişi</a></li>
                <li><a href="#" data-toggle="modal" data-target="#myModal1">Üye Ol</a></li>
                <li><a href="#contact">İletişim</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron text-center">
    <h1>Online Sınav Sistemi</h1>
    <p>Bu sistem, online bir şekilde seviyenizi ölçebileceğiniz sınavlara erişebilmeniz için oluşturuldu.</p>

</div>



<div class="modal fade" id="login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Kapat</span></button>
                <h4 class="modal-title"><span style="color:#f4511e;font-family:Montserrat, sans-serif; font-size: 20px !important;letter-spacing: 4px; "><b>ÖĞRETMEN GİRİŞİ</b></span></h4>
            </div>
            <div class="modal-body title1">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form role="form" method="post" action="admin.php?q=index.php">
                            <div class="form-group">
                                <label for="uname">Yetkili Adı</label>
                                <input type="text" class="form-control" id="uname" >
                            </div>
                            <div class="form-group">
                                <label for="password">Parola:</label>
                                <input type="password" class="form-control" id="password">
                            </div>

                            <div class="form-group" align="center">
                                <input type="submit" name="giris" value="Giriş" class="btn btn-light" />
                            </div>

                        </form>
                    </div><div class="col-md-3"></div></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>



<!----Teacher signin--->
<div class="modal fade" id="login2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"><span style="color:#f4511e;font-family:Montserrat, sans-serif; font-size: 20px !important;letter-spacing: 4px; "><b>ÖĞRETMEN GİRİŞİ</b></span></h4>
            </div>
            <div class="modal-body title1">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form role="form" method="post" action="admin.php?q=index.php">
                            <div class="form-group">
                                <input type="text" name="uname" maxlength="20"  placeholder="E-Mail Adresi" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" maxlength="15" placeholder="Şifre" class="form-control"/>
                            </div>
                            <div class="form-group" align="center">
                                <input type="submit" name="login2" value="Giriş" class="btn btn-primary" />
                            </div>
                        </form>
                    </div><div class="col-md-3"></div></div>
            </div>
        </div>
    </div>
</div>







<!-- Container (USERS section) -->
<!--sign in modal start-->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content title1">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title title1"><span style="color:#f4511e;font-family:Montserrat, sans-serif; font-size: 20px !important;letter-spacing: 4px; "><b>ÖĞRENCİ GİRİŞİ</b></span></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="giris.php?q=index.php" method="POST">
                    <fieldset>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email"></label>
                            <div class="col-md-6">
                                <input id="email" name="email" placeholder="E-Mail Adresi" class="form-control input-md" type="email">

                            </div>
                        </div>


                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="password"></label>
                            <div class="col-md-6">
                                <input id="password" name="password" placeholder="Şifre" class="form-control input-md" type="password">

                            </div>
                        </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Giriş Yap</button>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content title1">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title title1"><span  style="color:#f4511e;font-family:Montserrat, sans-serif; font-size: 20px !important;letter-spacing: 4px; "><b>KAYIT OL</b></span></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" name="form" action="uyeol.php?q=ogrenci.php" onSubmit="return validateForm()" method="POST">
                    <fieldset>


                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name"></label>
                            <div class="col-md-6">
                                <input id="name" name="name" placeholder="Adınız" class="form-control input-md" type="text" required>

                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-3 control-label title1" for="email"></label>
                            <div class="col-md-6">
                                <input id="email" name="email" placeholder="E-mail adresiniz" class="form-control input-md" type="email" required>

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label" for="mob"></label>
                            <div class="col-md-6">
                                <input id="mob" name="mob" placeholder="Telefon numaranız" class="form-control input-md" type="number" required>

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label" for="password"></label>
                            <div class="col-md-6">
                                <input id="password" name="password" placeholder="Şifreniz" class="form-control input-md" type="password" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="cpassword"></label>
                            <div class="col-md-6">
                                <input id="cpassword" name="cpassword" placeholder="Şifrenizi doğrulayın" class="form-control input-md" type="password" required>
                                <?php if(@$_GET['w'])
                                {echo'<script>alert("'.@$_GET['w'].'");</script>';}
                                ?>
                                <script>
                                    function validateForm() {var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
                                        var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("Parola boş bırakılamaz.");return false;}if(a.length<5 || a.length>10){alert("Parolanız 5 - 10 karakter arasında olmalı.");return false;}
                                        var b = document.forms["form"]["cpassword"].value;if (a!=b){alert("Parolalar eşleşmeli");return false;}}
                                </script>
                            </div>
                        </div>
                        <?php if(@$_GET['q7'])
                        { echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];}?>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for=""></label>
                            <div class="col-md-6">
                                <input  type="submit"  style="background: #f4511e;" class="sub" value="Kayıt Ol" <a href="uyeol.php">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>










<div id="services" class="container-fluid text-center">
    <h2>NEDEN YABANCI DİL ÖĞRENMELİYİZ?</h2>

    <br>
    <div class="row slideanim">
        <div class="col-sm-4">
            <i class="material-icons" style="font-size:60px;color:lightblue">group_add</i>
            <h4>SOSYAL</h4>
            <p> Daha fazla insan ile iletişime geçebilirsiniz.</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-briefcase logo-small" style="color:lightblue;"></span>
            <h4>KÜLTÜREL</h4>
            <p>Daha rahat seyahat edebilirsiniz.</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-euro logo-small" style="color:lightblue"></span>
            <h4>EKONOMİK</h4>
            <p>Daha kolay iş bulabileceksiniz.</p>
        </div>
    </div>
    <br><br>

</div>
</div>







<div id="contact" class="container-fluid bg-grey">
    <h2 class="text-center">İLETİŞİM</h2>
    <div class="row">

        <div class="col-sm-7 slideanim">




            <form role="form"  method="post" action="iletisim.php?q=index.php" >


                <?php if(@$_GET['q'])echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
                else
                {echo'


      <form role="form"  method="post" action="iletisim.php?q=index.php" >     
  <input name="ad" type="text" class="feedback-input" placeholder="Ad Soyad" />   
  <input name="email" type="text" class="feedback-input" placeholder="Email" />
    <input name="konu" type="text" class="feedback-input" placeholder="Konu" />   
  <textarea name="mesaj" class="feedback-input" placeholder="Mesajınız"></textarea>
  <input type="submit" value="GÖNDER"/>
</form>';}?>
        </div>
    </div>
</div>
</div>






<footer class="container-fluid text-center">
    <a href="#anasayfa" title="Yukarı">
        <span class="glyphicon glyphicon-chevron-up" style="color: lightblue"></span>
    </a>
    <p> ©Tüm Hakları Saklıdır. </p>
    <p>Elif Cetinkaya</p>
    <p>+90 534 862 11 33</p>
    <p>161307002@kocaeli.edu.tr</p>
</footer>

<script>
    $(document).ready(function(){

        $(".navbar a, footer a[href='#anasayfa']").on('click', function(event) {

            if (this.hash !== "") {

                event.preventDefault();


                var hash = this.hash;

                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function(){


                    window.location.hash = hash;
                });
            }
        });

        $(window).scroll(function() {
            $(".slideanim").each(function(){
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
</script>

</body>


</html>





