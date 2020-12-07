<?php
  include_once "./base.php";
  $rAll=$_SESSION['rAll'];
  $tAll=$_SESSION['tAll'];
  $tR=$_SESSION['titleR']; // 表頭
  $tN=$_SESSION['tN']; // 欄位數
?>

<div class="container text-center" id="rewardList">
<form action="./api/reward/select_reward_record.php" method="post" >
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
      for($i=0;$i<$tN;$i++){
         if(($i<1 || $i>3)&& $i!=7){
          echo "<li class='list-group-item bg-info'>".$tR[$i]."</li>";
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
          if($j>3&& $j!=7){
            echo "<li class='list-group-item '>".$rAll[$i][$j]."</li>";          
          }elseif($j=0){
            echo "<li class='list-group-item'>".$rAll[$i][$j]."-".$rAll[$i][($j+1)]."</li>";
          }else{
            echo "<li class='d-none'>".$rAll[$i][$j]."</li>";
          }
        }
        echo "</ul>";
      }
    ?>
  </form>
  <div> 
</div>

<?php
  unset($_SESSION['err']);        
  unset($_SESSION['rAll']);                 
  unset($_SESSION['tAll']);                 
?> 