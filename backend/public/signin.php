<?php
if (isset($_POST['signin'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  try {
    $db = new PDO('mysql:host=db;dbname=sample', 'phper', 'secret');
    $sql = 'insert into users(username, password) values(?, ?)';
    $stmt = $db->prepare($sql);
    $stmt->execute(array($username, $password));
    $stmt = null;
    $db = null;

    header('Location: http://localhost:8080/index.php');
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
    <title>新規登録画面</title>
  </head>

  <body>

    <h1>新規登録画面</h1>
    <form action="" method="POST">
      ユーザ名 <input type="text" name="username" value=""><br>
      パスワード <input type="password" name="password" value=""><br>
      <input type="submit" name="signin" value="新規登録">
    </form>

  </body>

</html>
