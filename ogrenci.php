<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> </title>
    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="css/main.css">
    <link  rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/TimeCircles.js"></script>

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
       .gonder [type="submit"]:hover { background:gray; }
    </style>


    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <?php if(@$_GET['w'])
    {echo'<script>alert("'.@$_GET['w'].'");</script>';}
    ?>

</head>
<?php
include_once 'dbConnection.php';
?>
<body>


<div class="header" style="background-color: lightblue">
    <div class="row">
        <div class="col-lg-6">
            <span class="logo" style="color: white; font-family: fantasy;">Öğrenci</span></div>
        <div class="col-md-4 col-md-offset-2">
            <?php
            include_once 'dbConnection.php';
            session_start();
            if(!(isset($_SESSION['email']))){
                header("location:index.php");

            }
            else
            {
                $email= $_SESSION['email'];
            $q=mysqli_query($con,"SELECT * FROM kullanici WHERE email='$email'");
            while($row=mysqli_fetch_array($q)){
                $name=$row['ad'];}



                include_once 'dbConnection.php';

                echo '<span class="pull-right top title1" style="color: white" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Merhaba,</span> <a href="ogrenci.php?q=1" class="log log1">'.$name. '</a>&nbsp;|&nbsp;<a href="cikis.php?q=ogrenci.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Çıkış Yap</button></a></span>';
            }?>
        </div>
    </div></div>
<div class="bg">


    <nav class="navbar navbar-default title1">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="ogrenci.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Anasayfa<span class="sr-only">(current)</span></a></li>
                    <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="ogrenci.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Geçmiş</a></li>
                    <li <?php if(@$_GET['q']==77) echo'class="active"'; ?>><a href="ogrenci.php?q=77"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Gelen Kutusu</a></li>
                    <li <?php if(@$_GET['q']==88) echo'class="active"'; ?>><a href="ogrenci.php?q=88"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Mesaj Yaz</a></li>

            </div>
        </div
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php if(@$_GET['q']==1) {

                    $sonuc = mysqli_query($con,"SELECT * FROM sinav ORDER BY tarih DESC ") or die('Error');
                    echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b></b></td><td><b>Sınav Adı</b></td><td><b>Soru Sayısı</b></td><td><b>Toplam Puan</b></td><td><b>Soru Süresi</b></td><td><b>Açıklama</b></td></tr>';
                    $c=1;
                    while($row = mysqli_fetch_array($sonuc)) {
                        $s_adi = $row['s_adi'];
                        $toplam = $row['toplam'];
                        $s_sayisi = $row['s_sayisi'];
                        $time = $row['time'];
                        $eid = $row['eid'];
                        $durum = $row['durum'];
                        $aciklama = $row['bilgi'];
                        $q12=mysqli_query($con,"SELECT puan FROM gecmis WHERE eid='$eid' AND email='$email'" )or die('Error98');
                        $rowcount=mysqli_num_rows($q12);
                        if($rowcount == 0){
                            echo '<tr><td>'.$c++.'</td><td>'.$s_adi.'</td><td>'.$toplam.'</td><td>'.$s_sayisi*$toplam.'</td><td>'.$time.'&nbsp;sn</td><td>'.$aciklama.'</td>
	<td><b><a href="ogrenci.php?q=sinav&adim=2&eid='.$eid.'&n=1&t='.$toplam.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32">
	<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Başla</b></span></a></b></td></tr>';


                        }
                        else if($durum == 1)
                        {
                            echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$s_adi.'&nbsp;<span title="Bu sınav daha önce uygulanmış." class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$toplam.'</td><td>'.$s_sayisi*$toplam.'</td><td>'.$time.'&nbsp;min</td>
    ';}
                    }
                    $c=0;
                    echo '</table></div>';

                }?>
                <?php if(@$_GET['q']==77) {

                    $sonuc = mysqli_query($con,"SELECT * FROM `ogrgelen` WHERE email='$email' ORDER BY `date` DESC ") or die('Error');
                    echo  '<div class="panel"><table class="table table-striped title1">
<tr><td><b></b></td><td><b>Mesaj</b></td><td><b>Tarih</b></td><td><b>Zaman</b></td><td></td></tr>';
                    $c=1;
                    while($row = mysqli_fetch_array($sonuc)) {
                        $tarih = $row['date'];
                        $tarih= date("d-m-Y",strtotime($tarih));
                        $time = $row['time'];
                        $feedback = $row['feedback'];
                        $id = $row['id'];
                         echo '<tr><td>'.$c++.'</td>';

                        echo '<tr><td>'.$c++.'</td>';
                        echo '<td>'.$id.'"<td></td>'.$feedback.'</td><td>'.$tarih.'</td><td>'.$time.'</td>';

                    }
                    echo '</table></div>';}

                if(@$_GET['q']==88){
                    $q=mysqli_query($con,"SELECT * FROM kullanici WHERE email='$email'");
                    while($row=mysqli_fetch_array($q)){
                        $name=$row['ad'];

                echo'<form role="form"  method="post" action="islemler.php?q=mesaj" >

      <form role="form"  method="post" action="islemler.php?q=mesaj" >     
  <input name="ad" type="text" class="feedback-input" value="'.$name.'" readonly />   
  <input name="email" type="text" class="feedback-input" value="'.$email.'" readonly/>
    <input name="konu" type="text" class="feedback-input" placeholder="Konu" />   
  <textarea name="mesaj" id="gonder" class="feedback-input" placeholder="Mesajınız"></textarea>
  <input type="submit" id="gonder" name="gonder" value="GÖNDER" style=" font-family: \'Montserrat\', Arial, Helvetica, sans-serif;
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
</form>';}}

                ?>






                <!--sınav başla-->
                <?php
                // bir önceki sayfaya geçişi engelleme
                echo '<script type = "text/javascript" >
        function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};
    </script>';


                if(@$_GET['q']== 'sinav' && @$_GET['adim']== 2) {

                    $sn=@$_GET['n'];
                    $eid=@$_GET['eid'];
                    $toplam=@$_GET['t'];


                    $q=mysqli_query($con,"SELECT * FROM sorular WHERE eid='$eid'AND sn='$sn'" );
                        echo '<div class="panel" style="margin:5%">';
                    while($row=mysqli_fetch_array($q) )
                    {
                        $soru=$row['soru'];
                        $s_id=$row['s_id'];


                        echo '<b>Soru &nbsp;'.$sn.'&nbsp;:<br />'.$soru.'</b><br /><br />';
                    }
                    $q=mysqli_query($con,"SELECT * FROM siklar WHERE s_id='$s_id' " );
                    echo '<form action="islemler.php?q=sinav&adim=2&eid='.$eid.'&n='.$sn.'&t='.$toplam.'&s_id='.$s_id.'" method="POST"  class="form-horizontal">
<br />';

                    while($row=mysqli_fetch_array($q) )
                    {
                        $siklar=$row['siklar'];
                        $siklar_id=$row['siklar_id'];

                        echo'<input type="radio" name="cevap" value="'.$siklar_id.'">'.$siklar.'<br /><br />';
                    }
                    echo'<br /><button type="submit" class="btn btn-success" style="margin-left: 400px"><span aria-hidden="true"></span>&nbsp Cevabı onayla</button></form></div>';

                    $s = mysqli_query($con, "SELECT * FROM sinav WHERE eid = '$eid'");
                    while($row = mysqli_fetch_array($s)){
                        $zaman = $row['time'];}

                    echo'<span id="countdown" class="timer" style="color: #204d74"></span>';
                    echo "<script> secondPassed(); </script>";


                }


                if(@$_GET['q']== 'sonuc' && @$_GET['eid'])
                {
                    $eid=@$_GET['eid'];
                    $q=mysqli_query($con,"SELECT * FROM gecmis WHERE eid='$eid' AND email='$email' " )or die('Error157');
                    echo  '<div class="panel">
<center><h1 class="title" style="color:#660033">Sonuç</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

                    while($row=mysqli_fetch_array($q) )
                    {
                        $s=$row['puan'];
                        $w=$row['y_puan'];
                        $r=$row['s_sayisi'];
                        $qa=$row['seviye'];
                        echo '<tr style="color:#66CCFF"><td>Soru</td><td>'.$qa.'</td></tr>
      <tr style="color:#99cc32"><td>Doğru&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
	  <tr style="color:red"><td>Yanlış&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
	  <tr style="color:#66CCFF"><td>Puan&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
                    }
                    $q=mysqli_query($con,"SELECT * FROM siralama WHERE  email='$email' " )or die('Error157');
                    while($row=mysqli_fetch_array($q) )
                    {
                        $s=$row['puan'];
                        echo '<tr style="color:#990000"><td>Ortalama Puan&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
                    }

                    echo '</table></div>';





                }
                ?>

                <script>
                    var seconds = <?php echo $zaman; ?> ;

                    function secondPassed() {
                        var minutes = Math.round((seconds - 30) / 60);
                        var remainingSeconds = seconds % 60;
                        if (remainingSeconds < 10) {
                            remainingSeconds = "0" + remainingSeconds;
                        }
                        document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
                        if (seconds == 0) {
                            clearInterval(countdownTimer);
                            document.getElementById('countdown').innerHTML = "Süre doldu";
                            location.href = "http://localhost:8080/online-sinav-projesi/ogrenci.php?q=1";

                        } else {
                            seconds--;
                        }
                    }
                    var countdownTimer = setInterval('secondPassed()', 1000);
                </script>


                <?php
                if(@$_GET['q']== 2)
                {
                    $q=mysqli_query($con,"SELECT * FROM gecmis WHERE email='$email' ORDER BY tarih DESC " )or die('Error197');
                    echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:red"><td><b></b></td><td><b>Sınav</b></td><td><b>Soru Sayısı</b></td><td><b>Doğru</b></td><td><b>Yanlış<b></td><td><b>Puan</b></td>';
                    $c=0;
                    while($row=mysqli_fetch_array($q) )
                    {
                        $eid=$row['eid'];
                        $s=$row['puan'];
                        $w=$row['y_puan'];
                        $r=$row['s_sayisi'];
                        $qa=$row['seviye'];
                        $q23=mysqli_query($con,"SELECT s_adi FROM sinav WHERE  eid='$eid' " )or die('Error208');
                        while($row=mysqli_fetch_array($q23) )
                        {
                            $s_adi=$row['s_adi'];
                        }
                        $c++;
                        echo '<tr><td>'.$c.'</td><td>'.$s_adi.'</td><td>'.$qa.'</td><td>'.$r.'</td><td>'.$w.'</td><td>'.$s.'</td></tr>';
                    }
                    echo'</table></div>';
                }

                if(@$_GET['q']== 3)
                {
                    $q=mysqli_query($con,"SELECT * FROM siralama  ORDER BY puan DESC " )or die('Error223');
                    echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Sıralama</b></td><td><b></b>Puan</b></td></tr>';
                    $c=0;
                    while($row=mysqli_fetch_array($q) )
                    {
                        $e=$row['email'];
                        $s=$row['puan'];
                        $q12=mysqli_query($con,"SELECT * FROM kullanici WHERE email='$e' " )or die('Error231');
                        while($row=mysqli_fetch_array($q12) )
                        {
                            $name=$row['name'];

                        }
                        $c++;
                        echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$name.'</td><td>'.$s.'</td><td>';
                    }
                    echo '</table></div>';}
                ?>



            </div></div></div></div>






</body>
</html>
