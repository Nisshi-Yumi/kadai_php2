<?php
// MySQL接続情報
$servername = "localhost";
$username = "root"; // ローカルXAMPPのデフォルト
$password = "";     // デフォルトではパスワードなし
$dbname = "gs_db";  // gs_dbというデータベース名に変更

// MySQL接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続エラーチェック
if ($conn->connect_error) {
    die("接続失敗: " . $conn->connect_error);
}

// アンケート結果を取得
$sql = "SELECT * FROM gs_an_table";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>アンケート結果</title>
</head>
<body>
    <h1>アンケート結果一覧</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>エコバッグを使っている</th>
            <th>マイボトルを使っている</th>
            <th>自転車や徒歩で移動している</th>
            <th>発電バイクで運動したい</th>
            <th>評価</th> <!-- 新たに評価（★）を追加 -->
        </tr>

        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <?php
                // 「はい」と答えた数をカウント
                $star_count = $row['eco_bag'] + $row['my_bottle'] + $row['walking_bike'] + $row['power_bike'];
                $stars = str_repeat('★', $star_count); // ★の数を決定
                ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= $row['eco_bag'] ? 'はい' : 'いいえ' ?></td>
                    <td><?= $row['my_bottle'] ? 'はい' : 'いいえ' ?></td>
                    <td><?= $row['walking_bike'] ? 'はい' : 'いいえ' ?></td>
                    <td><?= $row['power_bike'] ? 'はい' : 'いいえ' ?></td>
                    <td><?= $stars ?></td> <!-- 評価として★を表示 -->
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">データがありません。</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>

<?php
$conn->close();
?>
