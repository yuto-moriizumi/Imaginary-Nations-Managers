<html>
  <head>
    <meta charset="utf-8">
    <title>架空国家第二世界線</title>
  </head>
  <body>
    <h1>架空国家第二世界線</h1>
    <p>架空国家第二世界線のダイスや戦争用ページです。</p>
    <form method="POST" action="">
      <input type="submit" value="普通のダイス" name="sub1">　
      <input type="submit" value="軍事力ダイス" name="sub1">　
      <input type="submit" value="削除する" name="sub1">
      <table>
      <tr><th>攻撃側陣営の軍事力</th><th>防衛側陣営の軍事力</th></tr>
      <tr><td><input type="text" name="atk"></td><td><input type="text" name="def"></td></tr>
      </table>
      <br>
      国名：<input type="text" name="country"><input type="submit" value="参照">
    </form>
    <br>
    <a href="map.png">世界地図はこちら</a><br>
    <a href="map2.png">世界地図（文字無し）</a>
    <br>
    <!-- <a class="twitter-timeline" href="https://twitter.com/YsikiShokurin?ref_src=twsrc%5Etfw">Tweets by YsikiShokurin</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> -->
    <?php

    require_once('TwistOAuth.phar');
    
    $consumer_key = "hhYBDvLE2ka5j0a4mEnxasi69";
    $consumer_secret = "OHW2h9nMEFbtmsnXUsZudfYDIfWT2bE7JK2ts5CmBdNiOCLzkx";
    $access_token = "2993483719-zTGnAgAB7gI3JlDrfC68cXZ7fB1m214BIZptEzq";
    $access_token_secret = "xTh1jqDNsIYdvegAMZsgWUZodOlCIhyB4ZldDmVxJRoFg";
    
    //$filelist = file('list.txt');
    //if( shuffle($filelist) ){
    //  $message = $filelist[0];
    //}

    if (isset($_POST["country"])) {
      $filename = "countries/".$_POST["country"].".txt";
      $FP = fopen($filename,"r");
      $provinces = fread($FP,filesize($filename));
      fclose($FP);
      echo $_POST["country"]."の軍事力：".$provinces;
    }

    if (isset($_POST["sub1"])) {
      $kbn = htmlspecialchars($_POST["sub1"], ENT_QUOTES, "UTF-8");
      switch ($kbn) {
          case "普通のダイス": 
            $message = "通常ダイス結果：".rand(1,100)." #架空国家第二世界線";
            echo $message;
            // TwitterAPIに接続するあらゆる正常時の処理はこのブロックの中で行う
            try {
                // クレデンシャル生成
                $to = new TwistOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
                // ツイート
                $status = $to->post('statuses/update', ['status' => $message ]);
                // レスポンス確認(異常時にはcatchにジャンプするため、ここへの到達は成功を意味する)
                //var_dump($status);
                //$to->post('statuses/update', ['status' => "test" ]);
                $req = $to->OAuthRequest("https://api.twitter.com/1.1/statuses/user_timeline.json","GET",array("screen_name"=>"YsikiShokurin","count"=>"1"));
                $tweet = json_decode($req);
                $retweet = $tweet[0]->text;
                $id = $tweet[0]->id_str;
                $to = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
                $req = $to->OAuthRequest('https://api.twitter.com/1.1/statuses/retweet/'.$id.'.json','POST');
            } catch (TwistException $e) {
              // エラーを表示
              //echo "[{$e->getCode()}] {$e->getMessage()}";
            }
            break;
          case "軍事力ダイス":
            $result = ($_POST["atk"]-$_POST["def"])*5+rand(1,100);
            $message = "軍事力ダイス結果：".$result." #架空国家第二世界線";
            echo $message;
            // TwitterAPIに接続するあらゆる正常時の処理はこのブロックの中で行う
            try {
              // クレデンシャル生成
              $to = new TwistOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
              // ツイート
              $status = $to->post('statuses/update', ['status' => $message ]);
              // レスポンス確認(異常時にはcatchにジャンプするため、ここへの到達は成功を意味する)
              //var_dump($status);
              //$to->post('statuses/update', ['status' => "test" ]);
              $req = $to->OAuthRequest("https://api.twitter.com/1.1/statuses/user_timeline.json","GET",array("screen_name"=>"YsikiShokurin","count"=>"1"));
              $tweet = json_decode($req);
              $retweet = $tweet[0]->text;
              $id = $tweet[0]->id_str;
              $to = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
              $req = $to->OAuthRequest('https://api.twitter.com/1.1/statuses/retweet/'.$id.'.json','POST');
            } catch (TwistException $e) {
              // エラーを表示
              //echo "[{$e->getCode()}] {$e->getMessage()}";
            }
            break;
          case "削除する": echo "削除処理"; break;
          default:  echo "エラー"; exit;
      }
    }
    ?>
  </body>
</html>