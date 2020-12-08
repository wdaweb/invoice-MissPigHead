<?php
  include_once "./base.php";
?>

<div class="container text-center" id="rewardList">
<div class="row mx-lg-3 list-group-horizontal d-flex justify-content-center">
  <div class="col-sm-10 col-md-8 col-lg-6">
    <h4 class="col-12 text-center mt-4 font-weight-bolder">Hi <?=$_SESSION['acc'];?>~</h4>
    <div class="col-12 text-center mt-3 mb-5">
    <?php if(empty($_SESSION['rAll'])){ echo errFeedBack('reward_record','no');}else{echo "恭喜您中了{$_SESSION['tAll']}張發票，獎金共計<span class='award-n'>{$_SESSION['tAmount']}</span>元！<br>以下為您的中獎發票清單";}?></div>
  </div>
</div>
<?php if(!empty($_SESSION['rAll'])){ ?>
  <ul class="list-group row mx-lg-3 list-group-horizontal font-weight-bolder text-07">
  <!-- 列出表頭 -->
    <?php
      for($i=0;$i<9;$i++){
         if($i>3&& $i<7){
          echo "<li class='list-group-item bg-info col-2 px-1 px-md-2 px-lg-3'>".$_SESSION['titleR'][$i]."</li>";
        }elseif($i==0 || $i==8){
          echo "<li class='list-group-item bg-info col-3 px-1 px-md-2 px-lg-3'>".$_SESSION['titleR'][$i]."</li>";
        }else{
          echo "<li class='d-none'>".$_SESSION['titleR'][$i]."</li>";
        }
      }
    ?>
  </ul>
  <!-- 列出發票 -->
    <?php
      for($i=0;$i<$_SESSION['tAll'];$i++){
        echo "<ul class='list-group row mx-lg-3 list-group-horizontal text-07'>
        ";
        for($j=0;$j<9;$j++){
          if($j>3&& $j<7){
            echo "<li class='list-group-item col-2 px-1 px-md-2 px-lg-3'>".$_SESSION['rAll'][$i][$j]."</li>";          
          }elseif($j==8){
            echo "<li class='list-group-item col-3 px-1 px-md-2 px-lg-3'>".$_SESSION['rAll'][$i][$j]."</li>";          
          }elseif($j==0){
            echo "<li class='list-group-item col-3 px-1 px-md-2 px-lg-3'>".$_SESSION['rAll'][$i][$j]."-".$_SESSION['rAll'][$i][($j+1)]."</li>";
          }else{
            echo "<li class='d-none'>".$_SESSION['rAll'][$i][$j]."</li>";
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