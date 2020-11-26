<?php
// 產生2018/01 ~2020/11 每期開獎獎號
// 特別獎 8碼 1組 (type=1K)
// 特獎 8碼 1組 (type=1M)
// 頭獎 8碼 3組 (type=1)
// 二獎 7碼 3組 (type=2)
// 三獎 6碼 3組 (type=3)
// 四獎 5碼 3組 (type=4)
// 五獎 4碼 3組 (type=5)
// 六獎 3碼 3組 (type=6)
// 增開六獎 3碼 隨機0~3組(type=6A)

// 資料驗證：   => 未完成
// 同期特別獎/特獎/頭獎，獎號 不可重複
// 同期增開6獎 與 頭獎末3碼 不可重複

$dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8";
$pdo = new PDO($dsn,'root','');

for($i=2018;$i<=2020;$i++){  // $i for year
    for($j=1;$j<=6;$j++){ // $j for period
        $num1K=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9); // 隨機8碼 特別獎 1組
        $num1M=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9); // 隨機8碼 特獎 1組
        $pdo->exec("insert into `award`(`num`,`year`,`period`,`type`) values('$num1K','$i','$j','1K')");
        $pdo->exec("insert into `award`(`num`,`year`,`period`,`type`) values('$num1M','$i','$j','1M')");
        for($a=1;$a<=3;$a++){  // 頭~六獎 3組
            $num=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9); // 隨機8碼
            for($t=1;$t<=6;$t++){ // $t for type   
                $num=substr($num,($t-9));
                $pdo->exec("insert into `award`(`num`,`year`,`period`,`type`) values('$num','$i','$j','$t')");
            }
        }
        $k=rand(0,3); // 增開6獎 隨機0~3組
        for($k;$k>0;$k--){
            $num=rand(0,9).rand(0,9).rand(0,9); // 隨機3碼
            $pdo->exec("insert into `award`(`num`,`year`,`period`,`type`) values('$num','$i','$j','6A')");
        }
    }
}

?>