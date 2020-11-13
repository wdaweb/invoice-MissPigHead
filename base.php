<?php
        $dsn = "mysql:host=localhost;dbname=invoicesys;charset=utf8"; // DBname!!
        $pdo = new PDO($dsn,'root','');
        date_default_timezone_set("Asia/Taipei");
        session_start();
        ?>