<?php
include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
//mesaj sil
if(isset($_SESSION['key'])){
    if(@$_GET['fdid'] && $_SESSION['key']=='123456') {
        $id=@$_GET['fdid'];
        $sonuc = mysqli_query($con,"DELETE FROM feedback WHERE id='$id' ") or die('Error');
        header("location:panel.php?q=3");
    }
}
//kullanici sil
if(isset($_SESSION['key'])){
    if(@$_GET['email'] && $_SESSION['key']=='123456') {
        $email=@$_GET['email'];
        $r1 = mysqli_query($con,"DELETE FROM siralama WHERE email='$email' ") or die('Error');
        $r2 = mysqli_query($con,"DELETE FROM gecmis WHERE email='$email' ") or die('Error');
        $sonuc = mysqli_query($con,"DELETE FROM kullanici WHERE email='$email' ") or die('Error');
        header("location:panel.php?q=1");
    }
}
//sinav sil
if(isset($_SESSION['key'])){
    if(@$_GET['q']== 'sinavsil' && $_SESSION['key']=='123456') {
        $eid=@$_GET['eid'];
        $sonuc = mysqli_query($con,"SELECT * FROM sorular WHERE eid='$eid' ");
        while($row = mysqli_fetch_array($sonuc)) {
            $s_id = $row['s_id'];
            $r1 = mysqli_query($con,"DELETE FROM siklar WHERE s_id='$s_id'");
            $r2 = mysqli_query($con,"DELETE FROM cevap WHERE s_id='$s_id' ");
        }
        $r3 = mysqli_query($con,"DELETE FROM sorular WHERE eid='$eid' ");
        $r4 = mysqli_query($con,"DELETE FROM sinav WHERE eid='$eid' ");
        $r4 = mysqli_query($con,"DELETE FROM gecmis WHERE eid='$eid' ");

        header("location:panel.php?q=5");
    }
}

//sinav ekle
if(isset($_SESSION['key'])){
    if(@$_GET['q']== 'sinavekle' && $_SESSION['key']=='123456') {
        $name = $_POST['name'];
        $name= ucwords(strtolower($name));
        $toplam = $_POST['total'];
        $s_sayisi = $_POST['right'];
        $y_puan = $_POST['wrong'];
        $time = $_POST['time'];
        $tag = $_POST['tag'];
        $desc = $_POST['desc'];
        $id=uniqid();
        $q3=mysqli_query($con,"INSERT INTO sinav VALUES  ('$id','$name' , '$s_sayisi' , '$y_puan','$toplam','$time' ,'$desc','$tag',NOW(),false)");
        header("location:panel.php?q=4&adim=2&eid=$id&n=$toplam");
    }
}

//soru ekle
if(isset($_SESSION['key'])){
    if(@$_GET['q']== 'soruekle' && $_SESSION['key']=='123456') {
        $n=@$_GET['n'];
        $eid=@$_GET['eid'];
        $ch=@$_GET['ch'];

        for($i=1;$i<=$n;$i++)
        {
            $s_id=uniqid();
            $soru=$_POST['qns'.$i];
            $q3=mysqli_query($con,"INSERT INTO sorular VALUES  ('$eid','$s_id','$soru' , '$ch' , '$i')");
            $oaid=uniqid();
            $obid=uniqid();
            $ocid=uniqid();
            $odid=uniqid();
            $a=$_POST[$i.'1'];
            $b=$_POST[$i.'2'];
            $c=$_POST[$i.'3'];
            $d=$_POST[$i.'4'];
            $qa=mysqli_query($con,"INSERT INTO siklar VALUES  ('$s_id','$a','$oaid')") or die('Error61');
            $qb=mysqli_query($con,"INSERT INTO siklar VALUES  ('$s_id','$b','$obid')") or die('Error62');
            $qc=mysqli_query($con,"INSERT INTO siklar VALUES  ('$s_id','$c','$ocid')") or die('Error63');
            $qd=mysqli_query($con,"INSERT INTO siklar VALUES  ('$s_id','$d','$odid')") or die('Error64');
            $e=$_POST['cevap'.$i];
            switch($e)
            {
                case 'a':
                    $cvp_id=$oaid;
                    break;
                case 'b':
                    $cvp_id=$obid;
                    break;
                case 'c':
                    $cvp_id=$ocid;
                    break;
                case 'd':
                    $cvp_id=$odid;
                    break;
                default:
                    $cvp_id=$oaid;
            }


            $qans=mysqli_query($con,"INSERT INTO cevap VALUES  ('$s_id','$cvp_id')");

        }
        header("location:panel.php?q=0");
    }
}
//sınav başlangıç

if(@$_GET['q']== 'sinav' && @$_GET['adim']== 2) {
    $eid=@$_GET['eid'];
    $sn=@$_GET['n'];
    $toplam=@$_GET['t'];
    $cevap=$_POST['cevap'];
    $s_id=@$_GET['s_id'];
    $q=mysqli_query($con,"SELECT * FROM cevap WHERE s_id='$s_id' " );
    $q2=mysqli_query($con,"UPDATE `sinav` SET `durum` = 1 ");
    while($row=mysqli_fetch_array($q) )
    {
        $cvp_id=$row['cvp_id'];
    }
    if($cevap == $cvp_id)
    {
        $q=mysqli_query($con,"SELECT * FROM sinav WHERE eid='$eid' " );
        while($row=mysqli_fetch_array($q) )
        {
            $s_sayisi=$row['s_sayisi'];
        }
        if($sn == 1)
        {
            $q=mysqli_query($con,"INSERT INTO gecmis VALUES('$email','$eid' ,'0','0','0','0',NOW())")or die('Error');
        }
        $q=mysqli_query($con,"SELECT * FROM gecmis WHERE eid='$eid' AND email='$email' ")or die('Error115');

        while($row=mysqli_fetch_array($q) )
        {
            $s=$row['puan'];
            $r=$row['s_sayisi'];
        }
        $r++;
        $s=$s+$s_sayisi;
        $q=mysqli_query($con,"UPDATE `gecmis` SET `puan`=$s,`seviye`=$sn,`s_sayisi`=$r, `tarih` = NOW()  WHERE  email = '$email' AND eid = '$eid'")or die('Error124');

    }
    else
    {
        $q=mysqli_query($con,"SELECT * FROM sinav WHERE eid='$eid' " )or die('Error129');

        while($row=mysqli_fetch_array($q) )
        {
            $y_puan=$row['y_puan'];
        }
        if($sn == 1)
        {
            $q=mysqli_query($con,"INSERT INTO gecmis VALUES('$email','$eid' ,'0','0','0','0',NOW() )")or die('Error137');
        }
        $q=mysqli_query($con,"SELECT * FROM gecmis WHERE eid='$eid' AND email='$email' " )or die('Error139');
        while($row=mysqli_fetch_array($q) )
        {
            $s=$row['puan'];
            $w=$row['y_puan'];
        }
        $w++;
        $s=$s-$y_puan;
        $q=mysqli_query($con,"UPDATE `gecmis` SET `puan`=$s,`seviye`=$sn,`y_puan`=$w, tarih=NOW() WHERE  email = '$email' AND eid = '$eid'")or die('Error147');    }
    if($sn != $toplam)
    {
        $sn++;
        header("location:ogrenci.php?q=sinav&adim=2&eid=$eid&n=$sn&t=$toplam")or die('Error152');
    }
    else if( $_SESSION['key']!='123456')
    {
        $q=mysqli_query($con,"SELECT puan FROM gecmis WHERE eid='$eid' AND email='$email'" )or die('Error156');
        while($row=mysqli_fetch_array($q) )
        {
            $s=$row['puan'];
        }
        $q=mysqli_query($con,"SELECT * FROM siralama WHERE email='$email'" )or die('Error161');
        $rowcount=mysqli_num_rows($q);
        if($rowcount == 0)
        {
            $q2=mysqli_query($con,"INSERT INTO siralama VALUES('$email','$s',NOW())")or die('Error165');
        }
        else
        {
            while($row=mysqli_fetch_array($q) )
            {
                $puan=$row['puan'];
            }
            $puan=$s+$puan;
            $q=mysqli_query($con,"UPDATE `siralama` SET `puan`=$puan ,zaman=NOW() WHERE email= '$email'")or die('Error174');
        }
        header("location:ogrenci.php?q=sonuc&eid=$eid");
    }
    else
    {
        header("location:ogrenci.php?q=sonuc&eid=$eid");
    }
}
if(@$_GET['q']=='ogrenci'){

   $id=uniqid();
    $email = $_POST['email'];
    $feedback = $_POST['mesaj2'];
    $date=date("Y-m-d");
    $time=date("h:i:sa");
    $q2=mysqli_query($con,"INSERT INTO ogrgelen VALUES ('$id','$email','$feedback','$date','$time') ")or die ("Error1");
    header("location:panel.php?q=3");

}

if(@$_GET['q']=='mesaj'){

    $ref=@$_GET['q'];
    $name = $_POST['ad'];
    $email = $_POST['email'];
    $subject = $_POST['konu'];
    $feedback = $_POST['mesaj'];

    $id=uniqid();
    $date=date("Y-m-d");
    $time=date("h:i:sa");
    $feedback = $_POST['mesaj'];
    $q=mysqli_query($con,"INSERT INTO feedback VALUES  ('$id' , '$name', '$email' , '$subject', '$feedback' , '$date' , '$time')")or die ("Error");


    header("location:ogrenci.php?q=88");

}






?>



