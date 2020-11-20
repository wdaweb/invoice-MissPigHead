<?php
$dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8"; // DBname!!
$pdo = new PDO($dsn,'root','');
date_default_timezone_set("Asia/Taipei");
session_start();

$AwardStr=['0','頭','二','三','四','五','六'];


function checkLen($target,$minLen,$maxLen){
    if(strlen($_POST[$target])==0){
        $_SESSION['err'][$target]="<br><span class='text-danger small'> 本欄位不得為空</span>";

    }elseif(strlen($_POST[$target])>$maxLen || strlen($_POST[$target])<$minLen){
        if($minLen==$maxLen){
        $_SESSION['err'][$target]="<br><span class='text-danger small'>本欄位長度需為".$minLen."個字</span>";

        }else{
        $_SESSION['err'][$target]="<br><span class='text-danger small'>本欄位長度需為".$minLen."~".$maxLen."個字以內</span>";

        }
    }
}

function errMsg($target){
    if(!empty($_SESSION['err'][$target])){
        print_r($_SESSION['err'][$target]);}
    }


function sqlWhere($id,$inv_code,$inv_number,$payment_date,$payment_period,$payment_amount){
    $where=[];
    if(!empty($id)){$where[]="`id`='$id'";}
    if(!empty($inv_code)){$where[]="`inv_code`='$inv_code'";}
    if(!empty($inv_number)){$where[]="`inv_number`='$inv_number'";}
    if(!empty($payment_date)){$where[]="`payment_date`='$payment_date'";}
    if(!empty($payment_period)){$where[]="`payment_period`='$payment_period'";}
    if(!empty($payment_amount)){$where[]="`payment_amount`='$payment_amount'";}
    $whereDes="where ".implode(" and ",$where);
    return $whereDes;
} // like, not like... 待增加

function sqlOrderBy($columnName1,$ascOrDesc1,$columnName2,$ascOrDesc2,$columnName3,$ascOrDesc3){
    $OrderByDes="order by ".$columnName1." ".$ascOrDesc1;
    if(!empty($columnName2) && empty($columnName3)){
        $OrderByDes="order by `".$columnName1."` ".$ascOrDesc1.", `".$columnName2."` ".$ascOrDesc2;
    }
    if(!empty($columnName3)){
        $OrderByDes="order by `".$columnName1."` ".$ascOrDesc1.", `".$columnName2."` ".$ascOrDesc2.", `".$columnName3."` ".$ascOrDesc3;
    }
    return $OrderByDes;
} 


// delete or select invoice data
function DelSelInv($delOrSel,$tableName,$whereDes,$orderByDes){
    global $pdo;
    if($delOrSel=='delete'){
        $sqlDes="delete from `".$tableName."` ".$whereDes;
        $pdo->query($sqlDes);
    }elseif($delOrSel=='select'){
        $sqlDes="select * from `".$tableName."` ".$whereDes." ".$orderByDes;
        $invs=$pdo->query($sqlDes)->fetchAll();
        return $invs;
    }
}

function InsUpdCoVa($inv_code,$inv_number,$payment_date,$payment_period,$payment_amount){
    $arg[]=["`inv_code`" => "'$inv_code'"];
    $arg[]=["`inv_number`" => "'$inv_number'"];
    $arg[]=["`payment_date`" => "'$payment_date'"];
    $arg[]=["`payment_period`" => "'$payment_period'"];
    $arg[]=["`payment_amount`" => "'$payment_amount'"];
    return $arg;
}

function InsUpdInv($InsOrUpd,$tableName,$whereDes,...$arg){
    global $pdo;
    foreach($arg as $columnName => $val){
        $column[]=$columnName;
        $value[]=$val;
    }
    // $t=count($value);
    if($InsOrUpd=='insert'){
        $columns=implode(",",$column);
        $values=implode(",",$value);
        $sqlDes="insert into `".$tableName."`(".$columns.") values(".$values.")";
        print_r($sqlDes);
    //     $pdo->query($sqlDes);
    // }elseif($delOrSel=='select'){
    //     $sqlDes="select * from `".$tableName."` ".$whereDes." ".$orderByDes;
    //     $invs=$pdo->query($sqlDes)->fetchAll();
    //     return $invs;
    }
}


// function all($table,...$arg){
//     global $pdo;
//     $sql="select * from $table ";

//     if(isset($arg[0])){
    
//         if(is_array($arg[0])){
//             //製作會在 where 後面的句子字串(陣列格式)
//                 foreach($arg[0] as $key => $value){
//                     $tmp[]=sprintf("`%s`='%s'",$key,$value);
//                 }

//                 $sql=$sql." where ".implode(' && ',$tmp);
            
//         }else{
//             //製作非陣列的語句接在$sql後面
//                 $sql=$sql.$arg[0];       
//         }
//     }

?>