<form action="api/add_invoice.php" method="post">
    <div>日期:<input type="date" name="payment_date"></div>
    期別:<select name="payment_period">
        <option value="1">1,2</option>
        <option value="2">3,4</option>
        <option value="3">5,6</option>
        <option value="4">7,8</option>
        <option value="5">9,10</option>
        <option value="6">11,12</option>
    </select>
    <div>發票號碼:
        <input type="text" name="inv_code" style="width:50px" class="uppercase">
        <input type="number" name="inv_number" minlength="2" maxlength="8" style="width:150px">
    </div>
    <div>
        發票金額:<input type="number" name="payment_amount">
    </div>
    <div class="text-center">
        <input type="submit" value="送出">
    </div>
</form>
