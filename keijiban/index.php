<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>4eachblog 掲示板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
mb_internal_encoding("utf8");
$pdo = new PDO("mysql:dbname=lesson002;host=localhost;","root","mysql");
$stmt = $pdo->query("select * from 4each_keijiban");
?>
    
<header>
    <div class="logo">
        <img src="4eachblog_logo.jpg">
    </div>
    <div class="header_menu">
        <ul>
            <li>トップ</li>
            <li>プロフィール</li>
            <li>4eachについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</li>    
        </ul>
    </div>
</header>

<main>
    <div class="main-container">
        <div class="left">
            <h1>プログラミングに役立つ掲示板</h1>
            <form method="post" action="insert.php">
                <div class="one">
                    <h2>入力フォーム</h2>
                </div>
                <div>
                    <label class="form">ハンドルネーム</label>
                    <br>
                    <input type="text" name="handlename" size=35 class="form">
                </div>
                <div>
                    <label class="form">タイトル</label>
                    <br>
                    <input type="text" name="title" size=35 class="form">
                </div>
                <div>
            <label class="form">コメント</label>
            <br>
            <textarea name="comments" rows="10" cols="30" class="form"></textarea>
                </div>
                <div>
                    <input type="submit" value="送信する" class="submit">
                </div>
            </form>
            <p></p>
<!--            <form class="area1">-->
            <?php
              while($row = $stmt->fetch()){
                echo "<div class='kiji'>";
                  echo "<h3>".$row['title']."</h3>";
                  echo "<div class='contents'>";
                    echo $row['comments'];
                    echo "<div class='handlename'>posted by".$row['handlename']."</div>";
                  echo "</div>";
                echo "</div>";
              }
            ?>
<!--            </form>-->
        </div>
        <div class="right">
            <h3>人気の記事</h3>
            <ul>
                <li>PHPオススメ本</li>
                <li>PHP MyAdminの使い方</li>
                <li>いま人気のエディタTop5</li>
                <li>HTMLの基礎</li>
            </ul>
            <h3>オススメリンク</h3>
            <ul>
                <li>インターノウス株式会社</li>
                <li>XAMPPのダウンロード</li>
                <li>Eclipseのダウンロード</li>
                <li>Braketsのダウンロード</li>
            </ul>
            <h3>カテゴリ</h3>
            <ul>
                <li>HTML</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>JavaScript</li>
            </ul>
        </div>
    </div>
</main>

<footer>
    copyright internous | 4each blog is the one which provides Ato Z about programing.
</footer>

</body>
</html>