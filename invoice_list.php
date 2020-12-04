<?php
  include_once "./base.php";
  $year=$_SESSION['year'];
  $period=$_SESSION['period'];
  $pLine=$_SESSION['pLine'];
  $inv=$_SESSION['inv'];
  $col=$_SESSION['col'];
  $columnN=$_SESSION['columnN'];
  $t_inv=$_SESSION['t_inv'];
  $t_col=$_SESSION['t_col'];
  $pNum=$_SESSION['pNum'];
?>


<div class="container text-center">
  <ul class="list-group row mx-lg-3 list-group-horizontal font-weight-bolder">
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
  <form action="./api/select_invoice_single.php" method="post">
    <?php
      for($i=0;$i<$t_inv;$i++){
        echo "<ul class='list-group row mx-lg-3 list-group-horizontal'>
        ";
        for($j=0;$j<$t_col;$j++){
          if($j==1){
            echo "<li class='list-group-item col-1 px-0 invoice-list-".$j."'><input type='hidden' name='id' value='".$inv[$i][$col[($j-1)]]."'><button type='submit' class='btn btn-outline-info p-1'></li>";          
          }elseif($j==2){
            echo "<li class='list-group-item col-5 col-sm-3 col-md-3 px-1 invoice-list-".$j."'>".$inv[$i][$col[($j-1)]]."-".$inv[$i][$col[$j]]."</li>";
          }elseif($j==3){
            echo "<li class='list-group-item col-3 col-sm-2 px-1 invoice-list-".$j."'>".$inv[$i][$col[$j]]."</li>";
          }elseif($j==4){
            echo "<li class='list-group-item col-3 col-sm-2 col-md-1 pr-2 pl-0 text-right invoice-list-".$j."'>".$inv[$i][$col[$j]]."</li>";
          }elseif($j==5){
            echo "<li class='list-group-item col-sm-4 col-md-3 px-1 d-none d-sm-block invoice-list-".$j."'>".$inv[$i][$col[$j]]."</li>";
          }elseif($j==6){
            echo "<li class='list-group-item col-md-2 px-1 d-none d-md-block invoice-list-".$j."'>".$inv[$i][$col[$j]]."</li>";
          }else{
            echo "<li class='d-none'>".$inv[$i][$col[$j]]."</li>";
          }
        }
        echo "</ul>";
      }
    ?>
  </form>
<div>

  <form class="row justify-content-center mt-2" action="./list_invoice.php" method="post">
    <ul class="pagination">
      <li class="page-item"><input type='hidden' name='page' value="<?php if(empty($_SESSION['page'])||($_SESSION['page']==1)){echo "1";}?>"><input class="page-link" type="submit" value="<<"></li>

<?php
  $pNum=ceil($t_inv/$pLine);
  if($pNum>2){
    for($i=0;$i<$pNum;$i++){
?>
      <li class="page-item">
        <input type='hidden' name='page' value="<?php echo $i;?>"><input class="page-link" type="submit" value="<?php echo $i;?>">  
      </li>
<?php
    }
  }
?>

      <li class="page-item"><input type='hidden' name='page' value="<?php if(empty($_SESSION['page'])){echo "2";}else{echo ($_SESSION['page']+1);}?>"><input class="page-link" type="submit" value=">>"></li>
    </ul>
    </form>
</div>
