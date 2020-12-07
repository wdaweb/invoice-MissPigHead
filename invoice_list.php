<?php
  include_once "./base.php";
  $year=$_SESSION['year'];
  $period=$_SESSION['period'];
  $periodCH=$_SESSION['periodCH'];
  $pLine=$_SESSION['pLine'];
  $page=$_SESSION['page'];
  $invs=$_SESSION['invs'];
  $col=$_SESSION['col'];
  $columnN=$_SESSION['columnN'];
  $t_inv=$_SESSION['t_inv'];
  $t_col=$_SESSION['t_col'];
  $pNum=$_SESSION['pNum'];
  $pNext=$_SESSION['pNext']; // 下頁頁數
  $pPre=$_SESSION['pPre']; // 上頁頁數
?>

<div class="container text-center" id="invoiceList">

<!-- 選擇發票期別 -->
<form action="./api/invoice/select_invoice_all.php" method="post" >
  <div class="row justify-content-center mx-1 mx-sm-3 my-1 my-sm-2">
    <div class="input-group col-4 col-md-3 px-0">
      <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 text-07">年度</span>
      </div>
      <input type="number" class="form-control px-1 px-sm-2 px-md-3 text-07" name="year" value="<?=$year;?>">
    </div>
    <div class="input-group col-6 col-md-4 px-0">
      <div class="input-group-prepend">
        <span class="input-group-text px-1 px-sm-2 px-md-3 text-07">月份</span>
      </div>
      <select type="number" class="form-control px-1 px-sm-2 px-md-3 text-07" name="period">
      <option value="<?=$period;?>"><?=$periodCH[$period];?></option>
        <option value="1">01 ~ 02 月</option>
        <option value="2">03 ~ 04 月</option>
        <option value="3">05 ~ 06 月</option>
        <option value="4">07 ~ 08 月</option>
        <option value="5">09 ~ 10 月</option>
        <option value="6">11 ~ 12 月</option>
      </select>
    </div>
    <div class="input-group col-2 px-0 d-flex justify-content-center">
      <button type="submit" class="btn btn-info px-1 px-sm-2 px-md-4 px-lg-5">送出</button>
    </div>
  </div>
</form>  

  <ul class="list-group row mx-lg-3 list-group-horizontal font-weight-bolder">
  <!-- 列出表頭 -->
    <?php
      for($i=0;$i<$t_col;$i++){
        if($i==1){
          echo "<li class='list-group-item bg-info col-1 p-0'><span class='invoice-list-".$i."-th'>編輯</span></li>";
        }elseif($i==2){
          echo "<li class='list-group-item bg-info col-5 col-sm-3 col-md-3 px-1 invoice-list-".$i."'>".$columnN[($i-1)].$columnN[$i]."</li>";
        }elseif($i==3){
          echo "<li class='list-group-item bg-info col-3 col-sm-2 px-1 invoice-list-".$i."'>".$columnN[$i]."</li>";
        }elseif($i==4){
          echo "<li class='list-group-item bg-info col-3 col-sm-2 col-md-1 px-1 invoice-list-".$i."'>".$columnN[$i]."</li>";
        }elseif($i==5){
          echo "<li class='list-group-item bg-info col-sm-4 col-md-3 px-1 d-none d-sm-block invoice-list-".$i."'>".$columnN[$i]."</li>";
        }elseif($i==6){
          echo "<li class='list-group-item bg-info col-md-2 px-1 d-none d-md-block invoice-list-".$i."'>".$columnN[$i]."</li>";
        }else{
          echo "<li class='d-none'>".$columnN[$i]."</li>";
        }
      }
    ?>
  </ul>
  <!-- 列出發票 -->
  <form action="./api/select_invoice_single.php" method="post"> 
    <?php
      for($i=0;$i<$pLine;$i++){
        echo "<ul class='list-group row mx-lg-3 list-group-horizontal'>
        ";
        for($j=0;$j<$t_col;$j++){
          if($j==1){
            echo "<li class='list-group-item col-1 px-0 invoice-list-".$j."'><a href='./api/select_invoice_single.php?id=".$invs[($page-1)][$i][$col[($j-1)]]."'><i class='far fa-check-square'></i></a></li>";          
          }elseif($j==2){
            echo "<li class='list-group-item col-5 col-sm-3 col-md-3 px-1 invoice-list-".$j."'>".$invs[($page-1)][$i][$col[($j-1)]]."-".$invs[($page-1)][$i][$col[$j]]."</li>";
          }elseif($j==3){
            echo "<li class='list-group-item col-3 col-sm-2 px-1 invoice-list-".$j."'>".$invs[($page-1)][$i][$col[$j]]."</li>";
          }elseif($j==4){
            echo "<li class='list-group-item col-3 col-sm-2 col-md-1 pr-2 pl-0 text-right invoice-list-".$j."'>".$invs[($page-1)][$i][$col[$j]]."</li>";
          }elseif($j==5){
            echo "<li class='list-group-item col-sm-4 col-md-3 px-1 d-none d-sm-block invoice-list-".$j."'>".$invs[($page-1)][$i][$col[$j]]."</li>";
          }elseif($j==6){
            echo "<li class='list-group-item col-md-2 px-1 d-none d-md-block invoice-list-".$j."'>".$invs[($page-1)][$i][$col[$j]]."</li>";
          }else{
            echo "<li class='d-none'>".$invs[($page-1)][$i][$col[$j]]."</li>";
          }
        }
        echo "</ul>";
      }
    ?>
  </form>
  <div>
<!-- 選頁：當總頁數只有1頁時，不顯示分頁功能 -->
<?php if($pNum>1){ ?> 
    <form class="row justify-content-center mt-2" action="./api/select_invoice_all.php" method="post">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link text-secondary" href="./api/select_invoice_all.php?page=<?=$pPre;?>"><<</a>
        </li>
<?php if($pNum>2){for($i=1;$i<=$pNum;$i++){?>
        <li class="page-item">
          <a class="page-link text-secondary" href="./api/select_invoice_all.php?page=<?=$i;?>"><?=$i;?></a>
        </li>
<?php } } ?>
        <li class="page-item">
          <a class="page-link text-secondary" href="./api/select_invoice_all.php?page=<?=$pNext;?>">>></a>
        </li>
      </ul>
    </form>
  </div>
<?php } ?> 
</div>