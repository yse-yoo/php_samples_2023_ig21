<?php
// セッションスタート
session_start();
session_regenerate_id(true);

// POSTリクエストのデータを 変数 regist に代入
$regist = check($_POST);

//TODO: データチェック
// パスワードが8文字以上、20文字以内でなければ、入力画面にリダイレクト
if (
    mb_strlen($regist['password']) < 8 ||
    mb_strlen($regist['password']) > 20
) {
    $_SESSION['errors']['password'] = "パスワードは８文字以上、20文字以内で入力してください";
    header('Location: input.php');
}

// セッション保存
$_SESSION['regist'] = $regist;

$genders['male'] = "男性";
$genders['female'] = "女性";


/**
 * サニタイズ
 */
function check($posts)
{
    if (empty($posts)) return;
    foreach ($posts as
        $column => $post) {
        $posts[$column] =
            htmlspecialchars($post, ENT_QUOTES, 'UTF-8');
    }
    return $posts;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('../components/head.php'); ?>

<body>
    <?php include('../components/nav.php'); ?>

    <div class="container">
        <h1>確認画面</h1>
        <p>この内容で登録してもよろしいですか？</p>
        <div>
            <form action="store.php" method="post">
                <div>
                    <label for="">氏名</label>
                    <?= $regist['name'] ?>
                </div>
                <div>
                    <label for="">Email</label>
                    <?= $regist['email'] ?>
                </div>
                <div>
                    <label for="">生年月日</label>
                    <?= $regist['year'] ?>/<?= $regist['month'] ?>/<?= $regist['day'] ?>
                </div>
                <div>
                    <label for="">性別</label>
                    <?= $genders[$regist['gender']] ?>
                </div>
                <button class="btn btn-primary">登録</button>

                <a class="btn btn-outline-primary" href="input.php">戻る</a>
            </form>
        </div>
    </div>
</body>

</html>