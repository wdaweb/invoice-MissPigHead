<?php

include_once "base.php";
$invoices=$pdo->query("select * from `invoices` where payment_period='{$_GET['p']}' and payment_year='{$_GET['y']}'")->fetchAll();
$awards=$pdo->query("select * from awards where payment_year='{$_GET['y']}' && payment_period='{$_GET['p']}'")->fetchALL();

foreach($awards as $award){
    $award_number[]=$award['inv_number'];
    $award_type[]=$award['type'];
}

$award_type=['0'=>"特別獎",
             '1'=>"特獎",
             '2'=>"頭獎",
             '3'=>"頭獎",
             '4'=>"頭獎",
             '5'=>"增開六獎",
             '6'=>"增開六獎",
             '7'=>"增開六獎"];

foreach($invoices as $invoice){
    $invoice_number[]=$invoice['inv_number'];
    $invoice_number_7[]=substr($invoice['inv_number'],-7);
    $invoice_number_6[]=substr($invoice['inv_number'],-6);
    $invoice_number_5[]=substr($invoice['inv_number'],-5);
    $invoice_number_4[]=substr($invoice['inv_number'],-4);
    $invoice_number_3[]=substr($invoice['inv_number'],-3);
}

$regret=1;

for($i=0;$i<count($awards);$i++){
    if(in_array($award_number[$i],$invoice_number) && (4<=$i)){
        echo "<br>".$award_number[$i]."中$award_number[$i]了！";
        $regret=-1;
    }elseif(in_array(substr($award_number[$i],-7),$invoice_number_7) && (2<=$i && $i<=4)){
        echo "<br>".$award_number[$i]."中二獎了！";
        $regret=-1;
    }elseif(in_array(substr($award_number[$i],-6),$invoice_number_6) && (2<=$i && $i<=4)){
        echo "<br>".$award_number[$i]."中三獎了！";
        $regret=-1;
    }elseif(in_array(substr($award_number[$i],-5),$invoice_number_5) && (2<=$i && $i<=4)){
        echo "<br>".$award_number[$i]."中四獎了！";
        $regret=-1;
    }elseif(in_array(substr($award_number[$i],-4),$invoice_number_4) && (2<=$i && $i<=4)){
        echo "<br>".$award_number[$i]."中五獎了！";
        $regret=-1;
    }elseif(in_array(substr($award_number[$i],-3),$invoice_number_3) && (2<=$i && $i<=4)){
        echo "<br>".$award_number[$i]."中六獎了！";
        $regret=-1;
    }elseif(in_array(($award_number[$i]),$invoice_number_3) && (5<=$i)){
        echo "<br>".$invoice_number[array_search('266',$invoice_number_3)]."中增開六獎了！";
        $regret=-1;
    }
}

if($regret==1){
    echo "拍謝，這期沒中獎哦....";
}


?>