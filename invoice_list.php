<?php
    include_once "base.php";
    $sql="select * from `invoices` where payment_period='5' and payment_year='2020' order by payment_date desc";
    $rows=$pdo->query($sql)->fetchAll();
?>
<table class="table text-center">
    <thead>
        <tr>
            <th>消費日期</th>
            <th>發票號碼</th>
            <th>發票期別</th>
            <th>消費金額</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($rows as $row){
    ?>
        <tr>
            <td><?=$row['payment_date'];?></td>
            <td class="uppercase"><?=$row['inv_code'].'-'.$row['inv_number'];?></td>
            <td><?=$row['payment_period'];?></td>
            <td><?=$row['payment_amount'];?></td>
            <td>
                <button class="btn-sm btn-primary">
                    <a class="text-light" href="?do=edit_invoice&id=<?=$row['id'];?>">    
                    操作</a>
                </button>
                <button class="btn-sm btn-danger">刪除</button>
                <button class="btn btn-sm btn-success">
                <a class="text-light" href="?do=award&id=<?=$row['id'];?>">對獎</a>
                </button>
            </td>
        </tr>
<?php
    }
?>
    </tbody>
</table>

<?php?>


