<?php
  include_once "./base.php";
  $rAll=$_SESSION['rAll']; // 中獎發票
  $tAll=$_SESSION['tAll']; // 中獎張數
  $tAmount=$_SESSION['tAmount']; // 總獎金
  $tR=$_SESSION['titleR']; // 表頭中文
  $tN=9; // 欄位數
  $year=$_SESSION['year'];
  $period=$_SESSION['period'];
?>

<div class="container text-center" id="rewardList">
<div class="row mx-lg-3 list-group-horizontal d-flex justify-content-center">
  <div class="col-sm-8 col-md-6 col-lg-5">
    <h4 class="col-12 text-center font-weight-bolder">Hi <?=$_SESSION['acc'];?>~</h4>
    <div class="col-12 text-center mt-3 mb-5">
    <?php if(empty($rAll)){ echo errFeedBack('reward_record','no');}else{echo "恭喜您中了{$tAll}張發票，獎金共計<span class='award-n'>{$tAmount}</span>元！<br>以下為您的中獎發票清單";}?></div>
  </div>
</div>
<?php if(!empty($rAll)){ ?>
  <ul class="list-group row mx-lg-3 list-group-horizontal font-weight-bolder">
  <!-- 列出表頭 -->
    <?php
      for($i=0;$i<$tN;$i++){
         if($i>3&& $i<7){
          echo "<li class='list-group-item bg-info col-2'>".$tR[$i]."</li>";
        }elseif($i==0 || $i==8){
          echo "<li class='list-group-item bg-info col-3'>".$tR[$i]."</li>";
        }else{
          echo "<li class='d-none'>".$tR[$i]."</li>";
        }
      }
    ?>
  </ul>
  <!-- 列出發票 -->
    <?php
      for($i=0;$i<$tAll;$i++){
        echo "<ul class='list-group row mx-lg-3 list-group-horizontal'>
        ";
        for($j=0;$j<$tN;$j++){
          if($j>3&& $j<7){
            echo "<li class='list-group-item col-2'>".$rAll[$i][$j]."</li>";          
          }elseif($j==8){
            echo "<li class='list-group-item col-3'>".$rAll[$i][$j]."</li>";          
          }elseif($j==0){
            echo "<li class='list-group-item col-3'>".$rAll[$i][$j]."-".$rAll[$i][($j+1)]."</li>";
          }else{
            echo "<li class='d-none'>".$rAll[$i][$j]."</li>";
          }
        }
        echo "</ul>";
      }
        }    ?>

  <div> 
</div>

<?php
  unset($_SESSION['err']);        
  unset($_SESSION['rAll']);                 
  unset($_SESSION['tAll']);                 
?> 