<html>
  <head>
    <meta charset="utf-8">
    <title>PHPの基本的な書き方</title>
  </head>
  <body>
    <?php
      if (isset($_POST["sub1"])) {
        $kbn = htmlspecialchars($_POST["sub1"], ENT_QUOTES, "UTF-8");
        switch ($kbn) {
            case "登録する": echo "登録処理";
              file_put_contents ( string $filename , mixed $data [, int $flags = 0 [, resource $context ]] );
              break;
            case "変更する": echo "変更処理"; break;
            case "削除する": echo "削除処理"; break;
            default:  echo "エラー"; exit;
        }
    }
    ?>
    <form method="POST" action="">
    <input type="submit" value="登録する" name="sub1">　
    <input type="submit" value="変更する" name="sub1">　
    <input type="submit" value="削除する" name="sub1">　
    </form>
  </body>
</html>