<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ÖĞRETMEN PANELİ </title>
    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="css/main.css">
    <link  rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>

    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <style type="text/css">
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

        .gonder [type="submit"] {
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

    <script>
        $(function () {
            $(document).on( 'scroll', function(){
                console.log('scroll top : ' + $(window).scrollTop());
                if($(window).scrollTop()>=$(".logo").height())
                {
                    $(".navbar").addClass("navbar-fixed-top");
                }

                if($(window).scrollTop()<$(".logo").height())
                {
                    $(".navbar").removeClass("navbar-fixed-top");
                }
            });
        });</script>
</head>

<body  style="background:#eee;">
<div class="header" style="background-color: lightblue">
    <div class="row">
        <div class="col-lg-6">
            <span class="logo" style="font-family: fantasy; color: white">Öğretmen</span></div>
        <?php
        include_once 'dbConnection.php';
        session_start();
        $email=$_SESSION['email'];
        if(!(isset($_SESSION['email']))){
            header("location:index.php");

        }
        else
        {
            $name = $_SESSION['name'];

            include_once 'dbConnection.php';
            echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Merhaba,</span> <a href="ogrenci.php" class="log log1">'.$name. '</a>&nbsp;|&nbsp;<a href="cikis.php?q=ogrenci.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Çıkış Yap</button></a></span>';
        }?>

    </div></div>
<!-- admin start-->

<!--navigation menu-->
<nav class="navbar navbar-default title1">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="panel.php?q=0"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Anasayfa<span class="sr-only"></span></a></li>
                <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="panel.php?q=1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Öğrenciler</a></li>
                <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="panel.php?q=2"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Sıralama</a></li>
                <li class="dropdown <?php if(@$_GET['q']==3 || @$_GET['q']==6) echo'active"'; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Gelen Kutusu<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="panel.php?q=3">Öğrenci</a></li>
                        <li><a href="panel.php?q=6">Misafir</a></li>
                    </ul>
                </li>
                <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Sınav İşlemleri<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="panel.php?q=4">Sınav Ekle</a></li>
                        <li><a href="panel.php?q=5">Sınav Sil</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
    <div class="row">
        <div class="col-md-12">
            <!--home start-->

            <?php if(@$_GET['q']==0) {

                $result = mysqli_query($con,"SELECT * FROM sinav ORDER BY tarih DESC") or die('Error');
                echo  '<div class="panel""><table class="table table-striped title1" >
<tr><td><b></b></td><td><b>Sınav Adı</b></td><td><b>Toplam Soru</b></td><td><b>Puan</b></td><td><b>Süre</b></td><td></td></tr>';
                $c=1;
                while($row = mysqli_fetch_array($result)) {
                    $s_adi = $row['s_adi'];
                    $toplam = $row['toplam'];
                    $s_sayisi = $row['s_sayisi'];
                    $time = $row['time'];
                    $eid = $row['eid'];
                    $q12=mysqli_query($con,"SELECT puan FROM gecmis WHERE eid='$eid' AND email='$email'" )or die('Error98');
                    $rowcount=mysqli_num_rows($q12);
                    if($rowcount == 0){
                        echo '<tr><td>'.$c++.'</td><td>'.$s_adi.'</td><td>'.$toplam.'</td><td>'.$s_sayisi*$toplam.'</td><td>'.$time.'saniye</td>
	<td><b><a href="ogrenci.php?q=sinav&adim=2&eid='.$eid.'&n=1&t='.$toplam.'" >';
                    }

                }
                $c=0;
                echo '</table></div>';

            }

            //ranking start
            if(@$_GET['q']== 2)
            {
                $q=mysqli_query($con,"SELECT * FROM siralama  ORDER BY puan DESC " )or die('Error223');
                echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Sıralama</b></td><td><b>Ad</b></td><td><b>Puan</b></td></tr>';
                $c=0;
                while($row=mysqli_fetch_array($q) )
                {
                    $e=$row['email'];
                    $s=$row['puan'];
                    $q12=mysqli_query($con,"SELECT * FROM kullanici WHERE email='$e' " )or die('Error231');
                    while($row=mysqli_fetch_array($q12) )
                    {
                        $name=$row['ad'];

                    }
                    $c++;
                    echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$name.'</td><td>'.$s.'</td><td>';
                }
                echo '</table></div>';}

            ?>



            <?php if(@$_GET['q']==1) {

                $result = mysqli_query($con,"SELECT * FROM kullanici") or die('Error');
                echo  '<div class="panel"><table class="table table-striped title1" >
<tr><td><b></b></td><td><b>Ad Soyad</b></td><td><b>Email</b></td><td><b>Telefon</b></td><td></td></tr>';
                $c=1;
                while($row = mysqli_fetch_array($result)) {
                    $name = $row['ad'];
                    $mob = $row['mob'];
                    $email = $row['email'];

                    echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$mob.'</td>
	<td><a title="Uye Sil" href="islemler.php?email='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
                }
                $c=0;
                echo '</table></div>';

            }?>


            <?php if(@$_GET['q']==3) {
                $result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `date` DESC") or die('Error');
                echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b></b></td><td><b>Konu</b></td><td><b>Email</b></td><td><b>Tarih</b></td><td><b>Zaman</b></td><td><b>Gönderen</b></td><td></td><td></td></tr>';
                $c=1;
                while($row = mysqli_fetch_array($result)) {
                    $tarih = $row['date'];
                    $tarih= date("d-m-Y",strtotime($tarih));
                    $time = $row['time'];
                    $subject = $row['subject'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $id = $row['id'];
                    echo '<tr><td>'.$c++.'</td>';
                    echo '<td><a title=" " href="panel.php?q=3&fid='.$id.'">'.$subject.'</a></td><td>'.$email.'</td><td>'.$tarih.'</td><td>'.$time.'</td><td>'.$name.'</td>
	<td><a title="Aç" href="panel.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
                    echo '<td><a title="Sil" href="islemler.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>
                    <td><a title="Yanıtla" href="panel.php?q=3&fidd='.$id.'"><b><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></b></a></td>
	</tr>';
                }
                echo '</table></div>';
            }
            ?>

            <?php if(@$_GET['fidd']) {
                $id=@$_GET['fidd'];
                $result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id'") or die('Error');
            while($row = mysqli_fetch_array($result)) {
                $tarih = $row['date'];
                $tarih= date("d-m-Y",strtotime($tarih));
                $time = $row['time'];
                $subject = $row['subject'];
                $name = $row['name'];
                $email = $row['email'];
                $id = $row['id'];
                echo '   <form role="form"  method="post" action="islemler.php?q=ogrenci" >      
  <input name="email" type="text" class="feedback-input" value="'.$email.'"  /> 
  <textarea name="mesaj2" class="feedback-input" placeholder="Mesajınız"></textarea>
  <input type="submit" id="gonder" value="GÖNDER" style=" font-family: \'Montserrat\', Arial, Helvetica, sans-serif;
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
            font-weight:700;"/>
</form>';
            }}?>

            <?php if(@$_GET['q']==6) {
                $result = mysqli_query($con,"SELECT * FROM `misafir` ORDER BY `tarih` DESC") or die('Error');
                echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b></b></td><td><b>Mesaj</b></td><td><b>Email</b></td><td><b>Tarih</b></td><td><b>Zaman</b></td><td><b>Gönderen</b></td><td></td><td></td></tr>';
                $c=1;
                while($row = mysqli_fetch_array($result)) {
                    $tarih = $row['tarih'];
                    $tarih= date("d-m-Y",strtotime($tarih));
                    $time = $row['zaman'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $mesaj = $row['mesaj'];
                    $id = $row['id'];
                    echo '<tr><td>'.$c++.'</td>';
                    echo '<td><a title=" " href="panel.php?q=3&fid='.$id.'"></a>'.$mesaj.'</td><td>'.$email.'</td><td>'.$tarih.'</td><td>'.$time.'</td><td>'.$name.'</td>';

                }
                echo '</table></div>';
            }
            ?>





            <?php if(@$_GET['fid']) {
                echo '<br />';
                $id=@$_GET['fid'];
                $result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
                while($row = mysqli_fetch_array($result)) {
                    $name = $row['name'];
                    $subject = $row['subject'];
                    $tarih = $row['date'];
                    $tarih= date("d-m-Y",strtotime($tarih));
                    $time = $row['time'];
                    $feedback = $row['feedback'];



                    echo '<div class="panel" <h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
                    echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>Tarih:</b>&nbsp;'.$tarih.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Zaman:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>Gönderen</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
            }?>

            <?php
            if(@$_GET['q']==4 && !(@$_GET['adim']) ) {
                echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Sınav Detayları</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="islemler.php?q=sinavekle"  method="POST">
 <form class="form-horizontal title1" name="form" action="ogrenci.php?q=sinav"  method="POST">
<fieldset>


<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Sınav Adı" class="form-control input-md" type="text" required>
    
  </div>
</div>



<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Soru Sayısı" class="form-control input-md" type="number" required>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Doğru Cevap Puanı" class="form-control input-md" min="0" type="number" required>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Yanlış Cevap Puanı" class="form-control input-md" min="0" type="number" required>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Sınav Süresi" class="form-control input-md" min="1" type="number" required>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="tag"></label>  
  <div class="col-md-12">
  <input id="tag" name="tag" placeholder="Sınav Kodu" class="form-control input-md" type="text" required>
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Sınav Açıklaması" required></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Onayla" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></form></div>';



            }
            ?>

            <?php
            if(@$_GET['q']==4 && (@$_GET['adim'])==2 ) {
                echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Sınav Detayları</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="islemler.php?q=soruekle&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';

                for($i=1;$i<=(@$_GET['n']);$i++)
                {
                    echo '<b>Soru Numarası&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder=" '.$i.'.Soruyu Yazın" ></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="A Şıkkı" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="B Şıkkı" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="C Şıkkı" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="D Şıkkı" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Doğru Cevabı Seçin</b>:<br />
<select id="cevap'.$i.'" name="cevap'.$i.'"  class="form-control input-md" >
  <option value="a">A Şıkkı</option>
  <option value="b">B Şıkkı</option>
  <option value="c">C Şıkkı</option>
  <option value="d">D Şıkkı</option> </select><br /><br />';
                }

                echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Onayla" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



            }
            ?>



            <?php if(@$_GET['q']==5) {

                $result = mysqli_query($con,"SELECT * FROM sinav ORDER BY tarih DESC") or die('Error');
                echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b></b></td><td><b>Sınav Adı</b></td><td><b>Soru Sayısı</b></td><td><b>Puan</b></td><td><b>Soru Süresi</b></td><td></td></tr>';
                $c=1;
                while($row = mysqli_fetch_array($result)) {
                    $s_adi = $row['s_adi'];
                    $toplam = $row['toplam'];
                    $s_sayisi = $row['s_sayisi'];
                    $time = $row['time'];
                    $eid = $row['eid'];
                    echo '<tr><td>'.$c++.'</td><td>'.$s_adi.'</td><td>'.$toplam.'</td><td>'.$s_sayisi*$toplam.'</td><td>'.$time.'&nbsp;sn</td>
	<td><b><a href="islemler.php?q=sinavsil&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Sil</b></span></a></b></td></tr>';
                }
                $c=0;
                echo '</table></div>';

            }
            ?>


        </div>
    </div></div>
</body>
</html>
