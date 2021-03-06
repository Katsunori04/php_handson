<?php
$err_msg = "";

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  try {
    $db = new PDO('mysql:host=db;dbname=sample', 'phper', 'secret');
    $sql = 'select count(*) from users where username=? and password=?';
    $stmt = $db->prepare($sql);
    $stmt->execute(array($username, $password));
    $result = $stmt->fetch();
    $stmt = null;
    $db = null;

    if ($result[0] != 0) {
      header('Location: http://localhost:8080/home.php');
    } else {
      $err_msg = 'ユーザ名またはパスワードが誤りです。<br>';
    }

    exit;
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
  </head>

  <body>

    <h1>ログイン画面</h1>
    <?php if ($err_msg != null && $err_msg != "") {
    echo $err_msg;
  } ?>
    <form action="" method="POST">
      ユーザ名 <input type="text" name="username" value=""><br>
      パスワード <input type="password" name="password" value=""><br>
      <input type="submit" name="login" value="ログイン">
    </form>
    <a href="signin.php">新規登録</a>

  </body>

</html>
