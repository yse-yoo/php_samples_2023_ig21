<?php
// セッションスタート
session_start();
session_regenerate_id(true);

if (isset($_SESSION['regist'])) {
    $regist = $_SESSION['regist'];
}
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}

$genders['male'] = "男性";
$genders['female'] = "女性";

function checked($value, $checkValue)
{
    return ($value == $checkValue) ? 'checked' : '';
}

function selected($value, $checkValue)
{
    return ($value == $checkValue) ? 'selected' : '';
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- 1つ上の階層の componentsフォルダの head.php を読み込む -->
<?php include('../components/head.php'); ?>

<body>
    <?php include('../components/nav.php'); ?>

    <div class="container">
        <h1>入力画面</h1>

        <ul>
            <?php foreach ($errors as $error) : ?>
                <li class="text-danger"><?= $error ?></li>
            <?php endforeach ?>
        </ul>
        <form action="confirm.php" method="post">
            <div class="form-group">
                <label class="form-label" for="">氏名</label>
                <input class="form-control" type="text" name="name" value="<?= @$regist['name'] ?>">
            </div>
            <div>
                <label class="form-label" for="">Email</label>
                <input class="form-control" type="email" name="email" value="<?= @$regist['email'] ?>">
            </div>
            <div>
                <label class="form-label" for="">パスワード</label>
                <input class="form-control" type="password" name="password">
            </div>
            <div>
                <label class="form-label" for="">生年月日</label>
                <select class="form-control" name="year">
                    <?php foreach (range(1900, date('Y')) as $year) : ?>
                        <option value="<?= $year ?>" <?= selected($year, $regist['year']) ?>><?= $year ?></option>
                    <?php endforeach ?>
                </select>
                <select class="form-control" name="month">
                    <?php foreach (range(1, 12) as $month) : ?>
                        <option value="<?= $month ?>" <?= selected($month, $regist['month']) ?>><?= $month ?></option>
                    <?php endforeach ?>
                </select>
                <select class="form-control" name="day">
                    <?php foreach (range(1, 31) as $day) : ?>
                        <option value="<?= $day ?>" <?= selected($day, $regist['day']) ?>><?= $day ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label class="form-label" for="">性別</label>
                <div class="form-check">
                    <input id="male" type="radio" name="gender" value="male" <?= checked('male', @$regist['gender']) ?>>
                    <label for="male"><?= $genders['male'] ?></label>
                </div>
                <div class="form-check">
                    <input id="female" type="radio" name="gender" value="female" <?= checked('female', @$regist['gender']) ?>>
                    <label for="female"><?= $genders['female'] ?></label>
                </div>
            </div>
            <button class="btn btn-primary">確認</button>
        </form>
    </div>
</body>

</html>