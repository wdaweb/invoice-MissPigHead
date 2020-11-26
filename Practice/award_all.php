<?php

include_once "base.php";
$invoices=$pdo->query("select * from `invoices` where payment_period='{$_GET['p']}' and payment_year='{$_GET['y']}'")->fetchAll();
$awards=$pdo->query("select * from awards where payment_year='{$_GET['y']}' && payment_period='{$_GET['p']}'")->fetchALL();

foreach($awards as $award){
    $award_number[]=$award['inv_number'];
    $award_type[]=$award['type'];
}

$award_type=['0'=>"特別獎，獎金1000萬元",
             '1'=>"特獎，獎金200萬元",
             '2'=>"頭獎，獎金20萬元",
             '3'=>"頭獎，獎金20萬元",
             '4'=>"頭獎，獎金20萬元",
             '5'=>"增開六獎，獎金200元",
             '6'=>"增開六獎，獎金200元",
             '7'=>"增開六獎，獎金200元"];

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
        echo "<br>".$award_number[$i]."中$award_number[$i]！";
        $regret=-1;
    }elseif(in_array(substr($award_number[$i],-7),$invoice_number_7) && (2<=$i && $i<=4)){
        echo "<br>".$award_number[$i]."中二獎，獎金4萬元！";
        $regret=-1;
    }elseif(in_array(substr($award_number[$i],-6),$invoice_number_6) && (2<=$i && $i<=4)){
        echo "<br>".$award_number[$i]."中三獎，獎金1萬元！";
        $regret=-1;
    }elseif(in_array(substr($award_number[$i],-5),$invoice_number_5) && (2<=$i && $i<=4)){
        echo "<br>".$award_number[$i]."中四獎，獎金4千元！";
        $regret=-1;
    }elseif(in_array(substr($award_number[$i],-4),$invoice_number_4) && (2<=$i && $i<=4)){
        echo "<br>".$award_number[$i]."中五獎，獎金1千元！";
        $regret=-1;
    }elseif(in_array(substr($award_number[$i],-3),$invoice_number_3) && (2<=$i && $i<=4)){
        echo "<br>".$award_number[$i]."中六獎，獎金200元！";
        $regret=-1;
    }elseif(in_array(($award_number[$i]),$invoice_number_3) && (5<=$i)){
        echo "<br>".$invoice_number[array_search($award_number[$i],$invoice_number_3)]."中增開六獎，獎金200元！";
        $regret=-1;
    }
}

if($regret==1){
    echo "拍謝，這期沒中獎哦....";
}


?>