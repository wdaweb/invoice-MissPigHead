測試中

<?php

// echo "<pre>";
// print_r($_GET['p']);
// echo "</br>";
// print_r($_GET['y']);
// echo "</pre>";
// echo "<hr>";


include_once "base.php";

$invoices=$pdo->query("select * from `invoices` where payment_period='5' and payment_year='2020'")->fetchAll();

$awards=$pdo->query("select * from awards where payment_year='{$_GET['y']}' && payment_period='{$_GET['p']}'")->fetchALL();


$result=1;
for($i=0;$i<count($invoices);$i++){
    $number=$invoices[$i]['inv_number'];
    foreach($awards as $award){
        switch($award['type']){
            case 1:
                //特別號
                if($award['inv_number']==$number){
                    echo "<br>號碼=".$number."<br>";
                    echo "<br>中了特別獎<br>";
                    $result=-1;
                }
                
            break;
            case 2:
                
                if($award['inv_number']==$number){
                    echo "<br>號碼=".$number."<br>";
                    echo "中了特獎<br>";
                    $result=-1;
                }
                
            break;
            case 3:
                for($i=6;$i>0;$i--){
                    $target=mb_substr($award['inv_number'],$i,(8-$i),'utf8');
                    $mynumber=mb_substr($number,$i,(8-$i),'utf8');
                    
                    if($target==$mynumber){
                        echo "<br>號碼=".$number."<br>";
                        echo "中了{$awardStr[$i]}獎<br>";
                        $result=-1;
                    }else{
                    break;
                    //continue
                }
            }
        break;
        case 4:
            if($award['inv_number']==mb_substr($number,5,3,'utf8')){
                echo "<br>號碼=".$number."<br>";
                echo "中了增開六獎";
                $result=-1;
            }
        break;
      }
    }
    
    // if($result){
    // echo "<br>號碼=".$number."沒有中獎";
    // }
}

?>