<?php
// セッションをスタートする。
session_start();
session_regenerate_id();

// ワンタイムトークンを生成してセッションに保存します。
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] = $token;

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>共有レシピ帳【ユーザー登録】</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <span class="navbar-brand">共有レシピ帳</span>
    </nav>

    <!-- コンテナ -->
    <div class="container">
        <div class="container">
            <div class="row my-2">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 alert alert-info">
                    ユーザーを登録してください
                </div>
                <div class="col-sm-3"></div>
            </div>

            <!-- エラーメッセージ -->
            <div class="row my-2">
                <div class="col-sm-3"></div>
                <?php if (isset($_SESSION['err_msg']['add'])) : ?>
                    <div class="col-sm-6 alert alert-danger alert-dismissble fade show">
                        <p class="warning"><?= $_SESSION['err_msg']['add'] ?><button class="close" data-dismiss="alert">&times;</button></p>
                    </div>
                <?php endif ?>
                <div class="col-sm-3"></div>
            </div>
            <!-- エラーメッセージ ここまで -->

            <!-- 入力フォーム -->
            <div class="row my-2">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form action="./add_action.php" method="post">
                        <input type="hidden" name="token" value="<?= $token ?>">

                        <div class="form-group">
                            <label for="user">ユーザーID</label>
                            <input type="text" class="form-control" id="user" name="user" value="<?php if (isset($_SESSION['login']['user'])) echo $_SESSION['login']['user'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="family_name">姓</label>
                            <input type="text" class="form-control" id="family_name" name="family_name" value="<?php if (isset($_SESSION['login']['family_name'])) echo $_SESSION['login']['family_name'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="first_name">名</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php if (isset($_SESSION['login']['first_name'])) echo $_SESSION['login']['first_name'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">パスワード</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php if (isset($_SESSION['login']['password'])) echo $_SESSION['login']['password'] ?>">
                        </div>
                        <input type="submit" value="登録" class="btn btn-primary">
                        <input type="button" value="キャンセル" class="btn btn-outline-primary" onclick="location.href='./';">
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <!-- 入力フォーム ここまで -->

        </div>
    </div>
    <!-- コンテナ ここまで -->

</body>

</html>