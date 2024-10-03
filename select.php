<?php
// MySQL接続情報

try {
    $db_name = 'team-gias_gs_db';
    $db_host = '';
    $db_id = '';
    $db_pw = '';

    $server_info = 'mysql:dbname='.$db_name.';charset=utf8;host='.$db_host;
    $pdo = new PDO($server_info, $db_id, $db_pw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // エラーモードを設定
} catch (PDOException $e) {
    exit('DB Connection Error: ' . $e->getMessage());
}

// アンケート結果を取得
$sql = "SELECT * FROM gs_an_table";
$stmt = $pdo->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

        <?php if (count($results) > 0): ?>
            <?php foreach ($results as $row): ?>
                <?php
                // 「はい」と答えた数をカウント
                $star_count = $row['eco_bag'] + $row['my_bottle'] + $row['walking_bike'] + $row['power_bike'];
                $stars = str_repeat('★', $star_count); // ★の数を決定
                ?>
                <tr>
                    <td><?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= $row['eco_bag'] ? 'はい' : 'いいえ' ?></td>
                    <td><?= $row['my_bottle'] ? 'はい' : 'いいえ' ?></td>
                    <td><?= $row['walking_bike'] ? 'はい' : 'いいえ' ?></td>
                    <td><?= $row['power_bike'] ? 'はい' : 'いいえ' ?></td>
                    <td><?= $stars ?></td> <!-- 評価として★を表示 -->
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">データがありません。</td>
            </tr>
        <?php endif; ?>
    </table>
</body
