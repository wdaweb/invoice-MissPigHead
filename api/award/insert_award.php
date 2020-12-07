<?php
include_once "./../../base.php";

if(($_POST['year']>$year=date('Y'))||(($_POST['year']==$year=date('Y'))&&($_POST['period']>ceil(date('m')/2)))){
    $_SESSION['err']['add_award']['notyet']="時間未到，請再確認";
}else{
    if(empty($_POST['year'])){$year=date('Y');}else{$year=$_POST['year'];}
    if(empty($_POST['period'])){$period=ceil(date('m')/2)-1;}else{$period=$_POST['period'];}}

if(!preg_match("/[0-9]{8}/",$_POST['1K'])){
    $_SESSION['err']['add_award']['1K']="特別獎獎號應為8位數字";
}else{
    $sql="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}','{$_POST['1K']}','1K')";
    execSQLall($sql);
    $_SESSION['err']['add_award']['1K']="特別獎獎號{$_POST['1K']}新增成功";
}

if(!preg_match("/[0-9]{8}/",$_POST['1M'])){
    $_SESSION['err']['add_award']['1M']="特獎獎號應為8位數字";
}else{
    $sql="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}','{$_POST['1M']}','1M')";
    execSQLall($sql);
    $_SESSION['err']['add_award']['1M']="特獎獎號{$_POST['1M']}新增成功";
}

for($i=0;$i<3;$i++){
    $t=$_POST['1'][$i];
    if(!preg_match("/[0-9]{8}/",$t)){
        $_SESSION['err']['add_award'][$i]="頭獎獎號應為8位數字";
    }else{
        $sql="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}','{$_POST['1M'][$i]}','1')";
        execSQLall($sql);
        $_SESSION['err']['add_award'][$i]="頭獎獎號{$_POST['1M'][$i]}新增成功";
    }
}

for($i=0;$i<3;$i++){
    if($_POST['sp_prize'][$i]=="1M"){
        $sp_1M_num[]='';
        if(empty($_POST['sp_num'][$i])){
            $_SESSION['err']['add_award']['sp1M']="請確認是否增加特獎獎號";
        }elseif(!preg_match("/[0-9]{8}/",$_POST['sp_num'][$i])){
            $_SESSION['err']['add_award']['sp1M']="特獎獎號應為8位數字";
        }else{
            $sp_1M_num[]=$_POST['sp_num'][$i];
        }
    }elseif($_POST['sp_prize'][$i]=="1"){
        $sp_1_num[]='';         
        if(empty($_POST['sp_num'][$i])){
            $_SESSION['err']['add_award']['sp1']="請確認是否增加頭獎獎號";
        }elseif(!preg_match("/[0-9]{8}/",$_POST['sp_num'][$i])){
            $_SESSION['err']['add_award']['sp1']="頭獎獎號應為8位數字";
        }else{
            $sp_1_num[]=$_POST['sp_num'][$i];         
        }
    }elseif($_POST['sp_prize'][$i]=="6A"){
        $sp_6A_num[]='';                        
        if(empty($_POST['sp_num'][$i])){
            $_SESSION['err']['add_award']['sp6A']="請確認是否增加六獎獎號";
        }elseif(!preg_match("/[0-9]{3}/",$_POST['sp_num'][$i])){
            $_SESSION['err']['add_award']['sp6A']="增開六獎獎號應為3位數字";
        }else{
            $sp_6A_num[]=$_POST['sp_num'][$i];                        
        }
    }elseif(empty($_POST['sp_prize'][$i]=='') && !empty($_POST['sp_num'][$i])){
        $_SESSION['err']['add_award']['sp']="請選擇增加的獎項";
    }
}

if(isset($sp_1M_num)){
    $t1M=count($sp_1M_num);
    for($i=0;$i<$t1M;$i++){
        $sql="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}','$sp_1M_num[$i]','1M'";
        execSQLall($sql);
    }
}

if(isset($sp_1_num)){
    $t1=count($sp_1_num);
    for($i=0;$i<$t1;$i++){
        $sql="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}','$sp_1_num[$i]','1'";
        execSQLall($sql);
    }
}

if(isset($sp_6A_num)){
    $t6A=count($sp_6A_num);
    for($i=0;$i<$t6A;$i++){
        $sql="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}','$sp_6A_num[$i]','6A'";
        execSQLall($sql);
    }
}

print_r($_POST);
echo "<hr>";
// print_r($sp_1M_num);
// echo "<hr>";
// print_r($sp_1_num);
// echo "<hr>";
// print_r($sp_6A_num);
// echo "<hr>";

print_r($_SESSION);
    
go("./../../index.php?do=add_award");

?>