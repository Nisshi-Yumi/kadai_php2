<?php
try {
    // MySQL接続情報
$db_name = 'team-gias_gs_db';
$db_host = 'mysql3101.db.sakura.ne.jp';
$password = "";     
$dbname = "";   //

} catch (PDOException $e) {
    exit('DB_CONNECT:'.$e->getMessage());
  }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // サニタイズされた入力データをセット
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $eco_bag = isset($_POST['eco_bag']) ? 1 : 0;
        $my_bottle = isset($_POST['my_bottle']) ? 1 : 0;
        $walking_bike = isset($_POST['walking_bike']) ? 1 : 0;
        $power_bike = isset($_POST['power_bike']) ? 1 : 0;

        // SQL文を準備（プレースホルダ付き）
        $sql = "INSERT INTO gs_an_table (name, email, eco_bag, my_bottle, walking_bike, power_bike) 
                VALUES (:name, :email, :eco_bag, :my_bottle, :walking_bike, :power_bike)";
        
        // プリペアドステートメントを準備
        $stmt = $pdo->prepare($sql);
        
        // bindValueでパラメータをバインド
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':eco_bag', $eco_bag, PDO::PARAM_INT);
        $stmt->bindValue(':my_bottle', $my_bottle, PDO::PARAM_INT);
        $stmt->bindValue(':walking_bike', $walking_bike, PDO::PARAM_INT);
        $stmt->bindValue(':power_bike', $power_bike, PDO::PARAM_INT);
        
        // データを挿入
        if ($stmt->execute()) {
            echo "データが正常に挿入されました";
        } else {
            echo "エラー: データ挿入に失敗しました。";
        }

        // データ挿入後、select.phpにリダイレクト
        header('Location: select.php');
        exit();
    }

} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage();
}
?>
