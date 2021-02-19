<?php
include_once "./../../base.php";

if(!preg_match("/[2][0][0-9]{2}/",$_POST['year'])){
    $_SESSION['err']['add_award']['year']="請確認輸入正確西元年4位數字";
}

if(($_POST['year']>$year=date('Y'))||(($_POST['year']==$year=date('Y'))&&($_POST['period']>ceil(date('m')/2)))){
    $_SESSION['err']['add_award']['notyet']="時間未到，請再確認";
}else{
    if(empty($_POST['year'])){$year=date('Y');}else{$year=$_POST['year'];}
    if(empty($_POST['period'])){$period=ceil(date('m')/2)-1;}else{$period=$_POST['period'];}}

if((!empty($_POST['1K']))&&(!preg_match("/[0-9]{8}/",$_POST['1K']))){
    $_SESSION['err']['add_award']['1K']="特別獎獎號應為8位數字";
}elseif(!empty($_POST['1K'])){
    $sql1Kck="select * from `award` where `num`='{$_POST['1K']}' && `year`='{$year}' && `period`='{$period}'";
    if(empty(querySQLall($sql1Kck))){
        $sql1K="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}','{$_POST['1K']}','1K')";
        execSQLall($sql1K);
        $_SESSION['err']['add_award']['1K']="特別獎獎號{$_POST['1K']}新增成功";
    }else{$_SESSION['err']['add_award']['1K']="{$_POST['1K']}已重複紀錄在{$year}年{$periodCH[$period]}的開獎號碼，請確認";}
}

if((!empty($_POST['1M']))&(!preg_match("/[0-9]{8}/",$_POST['1M']))){
    $_SESSION['err']['add_award']['1M']="特獎獎號應為8位數字";
}elseif(!empty($_POST['1M'])){
    $sql1Mck="select * from `award` where `num`='{$_POST['1M']}' && `year`='{$year}' && `period`='{$period}'";
    if(empty(querySQLall($sql1Mck))){
    $sql1M="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}','{$_POST['1M']}','1M')";
    execSQLall($sql1M);
    $_SESSION['err']['add_award']['1M']="特獎獎號{$_POST['1M']}新增成功";
    }else{$_SESSION['err']['add_award']['1M']="{$_POST['1M']}已重複紀錄在{$year}年{$periodCH[$period]}的開獎號碼，請確認";}
}

for($i=0;$i<3;$i++){
    $t=$_POST['1'][$i];
    if((!empty($t))&(!preg_match("/[0-9]{8}/",$t))){
        $_SESSION['err']['add_award'][$i]="頭獎獎號應為8位數字";
    }elseif(!empty($t)){
        $sql1ck="select * from `award` where `num`='{$t}' && `year`='{$year}' && `period`='{$period}'";
        if(empty(querySQLall($sql1ck))){
            $sqlA1="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}','{$t}','1')";
            execSQLall($sqlA1);
            $sqlA12="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}',right('{$t}',7),'2')";
            execSQLall($sqlA12);
            $sqlA13="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}',Right('{$t}',6),'3')";
            execSQLall($sqlA13);
            $sqlA14="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}',Right('{$t}',5),'4')";
            execSQLall($sqlA14);
            $sqlA15="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}',Right('{$t}',4),'5')";
            execSQLall($sqlA15);
            $sqlA16="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}',Right('{$t}',3),'6')";
            execSQLall($sqlA16);
            $_SESSION['err']['add_award'][$i]="頭獎獎號{$t}新增成功";
        }else{$_SESSION['err']['add_award'][$i]="{$t}已重複紀錄在{$year}年{$periodCH[$period]}的開獎號碼，請確認";}
    }
}

for($i=0;$i<3;$i++){
    if($_POST['sp_prize'][$i]=="1M"){
        if(empty($_POST['sp_num'][$i])){
            $_SESSION['err']['add_award']['sp1M'][$i]="請確認是否增加特獎獎號";
        }elseif(!preg_match("/[0-9]{8}/",$_POST['sp_num'][$i])){
            $_SESSION['err']['add_award']['sp1M'][$i]="特獎獎號應為8位數字";
        }else{
            $sp[]=["1M" => $_POST['sp_num'][$i]];
        }
    }elseif($_POST['sp_prize'][$i]=="1"){
        if(empty($_POST['sp_num'][$i])){
            $_SESSION['err']['add_award']['sp1'][$i]="請確認是否增加頭獎獎號";
        }elseif(!preg_match("/[0-9]{8}/",$_POST['sp_num'][$i])){
            $_SESSION['err']['add_award']['sp1'][$i]="頭獎獎號應為8位數字";
        }else{
            $sp[]=["1" => $_POST['sp_num'][$i]];
        }
    }elseif($_POST['sp_prize'][$i]=="6A"){
        if(empty($_POST['sp_num'][$i])){
            $_SESSION['err']['add_award']['sp6A'][$i]="請確認是否增加六獎獎號";
        }elseif(!preg_match("/[0-9]{3}/",$_POST['sp_num'][$i])){
            $_SESSION['err']['add_award']['sp6A'][$i]="增開六獎獎號應為3位數字";
        }else{
            $sp[]=["6A" => $_POST['sp_num'][$i]];
        }
    }elseif(empty($_POST['sp_prize'][$i]) && !empty($_POST['sp_num'][$i])){
        $_SESSION['err']['add_award']['sp'][$i]="請選擇{$_POST['sp_num'][$i]}的獎項";
    }
}

$titleSP=['1M'=>'特獎','1'=>'頭獎','6A'=>'六獎'];
for($i=0;$i<count($sp);$i++){
    foreach($sp[$i] as $k => $v){
        $sqlAspck="select * from `award` where `num`='{$v}' && `year`='{$year}' && `period`='{$period}'";
        if(empty(querySQLall($sqlAspck))){
            $sqlAsp="INSERT INTO `award`(`year`, `period`, `num`, `type`) VALUES ('{$year}','{$period}','{$v}','{$k}')";
            execSQLall($sqlAsp);
            $msg="增開{$titleSP[$k]} 獎號{$v}新增成功";
        }else{$msg="{$v}已重複紀錄在{$year}年{$periodCH[$period]}的開獎號碼，請確認";}
    }
    $_SESSION['err']['add_award']['spA'][$i]=$msg;
}

go("./../../index.php?do=add_award");
?>