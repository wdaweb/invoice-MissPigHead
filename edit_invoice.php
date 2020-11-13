<?php

include_once "base.php";

$sql="select * from invoices where id='{$_GET['id']}'";
$inv= $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
?>

<form action="api/update_invoice.php" method="post">
    <div class="form-row">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">發票期別</span>
            </div>
            <select class="form-control" name="payment_period" value="<?=$inv['payment_period'];?>">
                <option value="1">1,2</option>
                <option value="2">3,4</option>
                <option value="3">5,6</option>
                <option value="4">7,8</option>
                <option value="5">9,10</option>
                <option value="6">11,12</option>
            </select>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">發票日期</span>
            </div>
            <input type="date" name="payment_date" value="<?=$inv['payment_date'];?>">
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">發票號碼</span>
            </div>
            <input type="text" name="inv_code" class="uppercase" value="<?=$inv['inv_code'];?>"> - 
            <input type="number" minlength="2" maxlength="8" name="inv_number" value="<?=$inv['inv_number'];?>">
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">發票金額</span>
            </div>
            <input type="number" name="payment_amount" value="<?=$inv['payment_amount'];?>">
            <input type="hidden" name="id" value="<?=$inv['id'];?>">
        </div>
            <input type="submit" value="送出">
            <input type="reset" value="重送">
    </div>
</form>





