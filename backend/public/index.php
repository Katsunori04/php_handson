<html>

  <body>
  <?php 
    try {
        // host=XXXの部分のXXXにはmysqlのサービス名を指定します
        $dsn = 'mysql:host=db;dbname=sample;';
        $db = new PDO($dsn, 'phper', 'secret');

        $sql = 'SELECT version();';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
    ?>

  </body>

</html>
