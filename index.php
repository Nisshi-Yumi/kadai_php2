<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>脱炭素アクションアンケート</title>
</head>
<body>
    <h1>脱炭素アクションアンケート</h1>
    <form method="POST" action="insert.php">
        <label for="name">名前:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">メールアドレス:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label>
            <input type="checkbox" name="eco_bag" value="1"> エコバッグを使っている
        </label><br>
        <label>
            <input type="checkbox" name="my_bottle" value="1"> マイボトルを使っている
        </label><br>
        <label>
            <input type="checkbox" name="walking_bike" value="1"> 自転車や徒歩で移動している
        </label><br>
        <label>
            <input type="checkbox" name="power_bike" value="1"> 発電バイクがあれば運動して発電する
        </label><br><br>

        <button type="submit">送信</button>
    </form>
</body>
</html>
