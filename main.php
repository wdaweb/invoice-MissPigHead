<h3 class="text-center">統一發票紀錄與對獎</h3>

<!-- 驗證數字 -->
<script>
    function validateForm(form){
        if (checkCreditCardNumber(form.cardNumber)){
            alert("資料正確無誤，立刻送出表單！");
            form.submit();
            return(true);
        }
        alert("資料有誤，表單將不送出！");
        form.cardNumber.focus();
        return(false);
    }

    function checkCreditCardNumber(control){
        var number=control.value;
        var character;
        var digit;
        if (number.length!=19){
            alert("<"+number+">：卡號長度有誤，請查核！");
            return false;
        }
        for (i=0; i<19; i++){
            character=number.charAt(i);
            if ((i==4)||(i==9)||(i==14)){	// 檢查是否是 "-"
                if (character!="-"){
                    alert("<"+number+">：卡號輸入有誤（請以「-」分開四碼），請查核！");
                    return false;
                }
            } else {	// 檢查是否是數字
                if (isNaN(parseInt(character))){
                    alert("<"+number+">：卡號輸入有誤，請查核！");
                    return false;
                }
            }
        }
        return true;
    }
</script>



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
        <input type="text" name="inv_code" style="width:50px">
        <input type="number" name="inv_number" minlength="2" maxlength="8" style="width:150px">
    </div>
    <div>
        發票金額:<input type="number" name="payment_amount">
    </div>
    <div class="text-center">
        <input type="submit" value="送出">
    </div>
</form>
