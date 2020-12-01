<?php
  include_once('header.php');
  include_once('base.php');
  ?>
<body>
<section id="menu">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="./index.php">統一發票-紀錄與對獎</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item mx-1">
          <a class="nav-link" href="./index.php">回首頁 <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown mx-1">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="./index.php?do=" role="button" aria-haspopup="true" aria-expanded="false">發票管理及消費紀錄</a>
          <div class="dropdown-menu bg-secondary">
            <a class="dropdown-item text-white" href="./index.php?do=add_invoice">輸入發票資料</a>
            <!-- 參考寫到iframe的方式  <a href="results/leather1.html" target="imain"> -->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-white" href="./index.php?do=list_invoice">發票列表及操作</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-white" href="./index.php?do=">查詢特定發票</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-white" href="./index.php?do=">統計消費紀錄</a>
          </div>
        </li>
        <li class="nav-item dropdown mx-1">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="./index.php?do=" role="button" aria-haspopup="true" aria-expanded="false">開獎號碼及對獎</a>
          <div class="dropdown-menu bg-secondary">
            <a class="dropdown-item text-white" href="./index.php?do=">查詢開獎獎號</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-white" href="./index.php?do=">發票對獎</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-white" href="./index.php?do=add_award">輸入開獎獎號</a>
          </div>
        </li>
        <li class="nav-item dropdown mx-1">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="./index.php?do=" role="button" aria-haspopup="true" aria-expanded="false">使用者資料管理</a>
          <div class="dropdown-menu bg-secondary">
            <a class="dropdown-item text-white" href="./index.php?do=">編輯個人資料</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-white" href="./index.php?do=">查詢得獎記錄</a>
          </div>
        </li>
        <li class="nav-item mx-1">
          <a class="nav-link" href="./index.php" role="button">登入/登出</a>
        </li>
      </ul>
    </div>
  </nav>
</section>

<div class="container mt-1 mt-md-4 mainframe">
  <?php
    if(isset($_GET['do'])){
      $file=$_GET['do'].".php";
      include $file;
    }else{
      include "login.php";
    }
  ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>