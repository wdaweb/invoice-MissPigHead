<table>
  <thead>
    <tr>
<?php
include_once("./base.php");
echo "<pre>";
$t="0987987987";
$tel=intval($t);
$id="C221146515";
$res=preg_match("/^09/",$t);
$res1=preg_match("/[0-9]{10}/",$t);
$res2=preg_match("/^[A-Z]{1}[12ABCD]{1}[0-9]{8}$/", $id);

echo $t;
echo "<hr>";
echo $tel;
echo "<hr>";
echo $res;
echo "<hr>";
echo $res1;
// [invs] => Array ( 
//   [0] => Array ( [0] => Array ( [id] => 648 [code] => GC [num] => 38697804 [RIGHT(`date`,5)] => 09-20 [amount] => 590 [desCH] => 日用、清潔、雜貨 [name] => 家樂福 [user_id] => 1 ) [1] => Array ( [id] => 648 [code] => GC [num] => 38697804 [RIGHT(`date`,5)] => 09-20 [amount] => 590 [desCH] => 日用、清潔、雜貨 [name] => 好市多 [user_id] => 1 ) [2] => Array ( [id] => 648 [code] => GC [num] => 38697804 [RIGHT(`date`,5)] => 09-20 [amount] => 590 [desCH] => 日用、清潔、雜貨 [name] => 全聯 [user_id] => 1 ) [3] => Array ( [id] => 469 [code] => HC [num] => 25941034 [RIGHT(`date`,5)] => 09-25 [amount] => 4700 [desCH] => 衣物、鞋、包、錶 [name] => Momo [user_id] => 1 ) [4] => Array ( [id] => 469 [code] => HC [num] => 25941034 [RIGHT(`date`,5)] => 09-25 [amount] => 4700 [desCH] => 衣物、鞋、包、錶 [name] => NET [user_id] => 1 ) [5] => Array ( [id] => 469 [code] => HC [num] => 25941034 [RIGHT(`date`,5)] => 09-25 [amount] => 4700 [desCH] => 衣物、鞋、包、錶 [name] => Lativ [user_id] => 1 ) [6] => Array ( [id] => 197 [code] => JU [num] => 52728214 [RIGHT(`date`,5)] => 10-02 [amount] => 8000 [desCH] => 交通、通訊 [name] => 中國石油 [user_id] => 1 ) [7] => Array ( [id] => 197 [code] => JU [num] => 52728214 [RIGHT(`date`,5)] => 10-02 [amount] => 8000 [desCH] => 交通、通訊 [name] => 台塑石油 [user_id] => 1 ) [8] => Array ( [id] => 957 [code] => OD [num] => 77000102 [RIGHT(`date`,5)] => 10-02 [amount] => 58 [desCH] => 日用、清潔、雜貨 [name] => 全聯 [user_id] => 1 ) [9] => Array ( [id] => 197 [code] => JU [num] => 52728214 [RIGHT(`date`,5)] => 10-02 [amount] => 8000 [desCH] => 交通、通訊 [name] => CHT [user_id] => 1 ) ) 
//   [1] => Array ( [0] => Array ( [id] => 957 [code] => OD [num] => 77000102 [RIGHT(`date`,5)] => 10-02 [amount] => 58 [desCH] => 日用、清潔、雜貨 [name] => 家樂福 [user_id] => 1 ) [1] => Array ( [id] => 197 [code] => JU [num] => 52728214 [RIGHT(`date`,5)] => 10-02 [amount] => 8000 [desCH] => 交通、通訊 [name] => TWN [user_id] => 1 ) [2] => Array ( [id] => 957 [code] => OD [num] => 77000102 [RIGHT(`date`,5)] => 10-02 [amount] => 58 [desCH] => 日用、清潔、雜貨 [name] => 好市多 [user_id] => 1 ) [3] => Array ( [id] => 197 [code] => JU [num] => 52728214 [RIGHT(`date`,5)] => 10-02 [amount] => 8000 [desCH] => 交通、通訊 [name] => FET [user_id] => 1 ) [4] => Array ( [id] => 197 [code] => JU [num] => 52728214 [RIGHT(`date`,5)] => 10-02 [amount] => 8000 [desCH] => 交通、通訊 [name] => T-Star [user_id] => 1 ) [5] => Array ( [id] => 86 [code] => TR [num] => 96844839 [RIGHT(`date`,5)] => 10-07 [amount] => 21 [desCH] => 日用、清潔、雜貨 [name] => 全聯 [user_id] => 1 ) [6] => Array ( [id] => 86 [code] => TR [num] => 96844839 [RIGHT(`date`,5)] => 10-07 [amount] => 21 [desCH] => 日用、清潔、雜貨 [name] => 家樂福 [user_id] => 1 ) [7] => Array ( [id] => 86 [code] => TR [num] => 96844839 [RIGHT(`date`,5)] => 10-07 [amount] => 21 [desCH] => 日用、清潔、雜貨 [name] => 好市多 [user_id] => 1 ) [8] => Array ( [id] => 530 [code] => WK [num] => 50148033 [RIGHT(`date`,5)] => 10-10 [amount] => 710 [desCH] => 日用、清潔、雜貨 [name] => 全聯 [user_id] => 1 ) [9] => Array ( [id] => 530 [code] => WK [num] => 50148033 [RIGHT(`date`,5)] => 10-10 [amount] => 710 [desCH] => 日用、清潔、雜貨 [name] => 家樂福 [user_id] => 1 ) ) 
//   [2] => Array ( [0] => Array ( [id] => 530 [code] => WK [num] => 50148033 [RIGHT(`date`,5)] => 10-10 [amount] => 710 [desCH] => 日用、清潔、雜貨 [name] => 好市多 [user_id] => 1 ) [1] => Array ( [id] => 451 [code] => MN [num] => 18466470 [RIGHT(`date`,5)] => 10-15 [amount] => 430 [desCH] => 藥妝、保養 [name] => 康是美 [user_id] => 1 ) [2] => Array ( [id] => 451 [code] => MN [num] => 18466470 [RIGHT(`date`,5)] => 10-15 [amount] => 430 [desCH] => 藥妝、保養 [name] => 屈臣氏 [user_id] => 1 ) [3] => Array ( [id] => 814 [code] => CM [num] => 88082411 [RIGHT(`date`,5)] => 10-16 [amount] => 55 [desCH] => 藥妝、保養 [name] => 康是美 [user_id] => 1 ) [4] => Array ( [id] => 814 [code] => CM [num] => 88082411 [RIGHT(`date`,5)] => 10-16 [amount] => 55 [desCH] => 藥妝、保養 [name] => 屈臣氏 [user_id] => 1 ) [5] => Array ( [id] => 961 [code] => HQ [num] => 34345717 [RIGHT(`date`,5)] => 10-22 [amount] => 15 [desCH] => 日用、清潔、雜貨 [name] => 好市多 [user_id] => 1 ) [6] => Array ( [id] => 961 [code] => HQ [num] => 34345717 [RIGHT(`date`,5)] => 10-22 [amount] => 15 [desCH] => 日用、清潔、雜貨 [name] => 全聯 [user_id] => 1 ) [7] => Array ( [id] => 961 [code] => HQ [num] => 34345717 [RIGHT(`date`,5)] => 10-22 [amount] => 15 [desCH] => 日用、清潔、雜貨 [name] => 家樂福 [user_id] => 1 ) [8] => Array ( [id] => 855 [code] => AK [num] => 65896206 [RIGHT(`date`,5)] => 10-23 [amount] => 5000 [desCH] => 交通、通訊 [name] => 台塑石油 [user_id] => 1 ) [9] => Array ( [id] => 855 [code] => AK [num] => 65896206 [RIGHT(`date`,5)] => 10-23 [amount] => 5000 [desCH] => 交通、通訊 [name] => CHT [user_id] => 1 ) ) 
//   [3] => Array ( [0] => Array ( [id] => 855 [code] => AK [num] => 65896206 [RIGHT(`date`,5)] => 10-23 [amount] => 5000 [desCH] => 交通、通訊 [name] => TWN [user_id] => 1 ) [1] => Array ( [id] => 855 [code] => AK [num] => 65896206 [RIGHT(`date`,5)] => 10-23 [amount] => 5000 [desCH] => 交通、通訊 [name] => FET [user_id] => 1 ) [2] => Array ( [id] => 855 [code] => AK [num] => 65896206 [RIGHT(`date`,5)] => 10-23 [amount] => 5000 [desCH] => 交通、通訊 [name] => T-Star [user_id] => 1 ) [3] => Array ( [id] => 855 [code] => AK [num] => 65896206 [RIGHT(`date`,5)] => 10-23 [amount] => 5000 [desCH] => 交通、通訊 [name] => 中國石油 [user_id] => 1 ) [4] => Array ( [id] => 763 [code] => TH [num] => 45887642 [RIGHT(`date`,5)] => 10-29 [amount] => 5600 [desCH] => 衣物、鞋、包、錶 [name] => Momo [user_id] => 1 ) [5] => Array ( [id] => 763 [code] => TH [num] => 45887642 [RIGHT(`date`,5)] => 10-29 [amount] => 5600 [desCH] => 衣物、鞋、包、錶 [name] => NET [user_id] => 1 ) [6] => Array ( [id] => 763 [code] => TH [num] => 45887642 [RIGHT(`date`,5)] => 10-29 [amount] => 5600 [desCH] => 衣物、鞋、包、錶 [name] => Lativ [user_id] => 1 ) ) ) 
//   [col] => Array ( [0] => id [1] => code [2] => num [3] => RIGHT(`date`,5) [4] => amount [5] => desCH [6] => name [7] => user_id ) 
//   [columnN] => Array ( [0] => id [1] => 字軌 [2] => 號碼 [3] => 日期 [4] => 金額 [5] => 消費類型 [6] => 消費商家 [7] => user_id ) 
//   [t_inv] => 37 
//   [t_col] => 8 
//   [pNum] => 4 )
echo "</pre>";


?>
