<?php
// セッションスタート
session_start();
session_regenerate_id(true);

if (isset($_SESSION['regist'])) {
    $regist = $_SESSION['regist'];
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include('../components/head.php'); ?>

<body>
    <?php include('../components/nav.php'); ?>

    <div class="container">
        <h1>入力画面</h1>
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
                        <option value="<?= $year ?>"><?= $year ?></option>
                    <?php endforeach ?>
                </select>
                <select class="form-control" name="month">
                    <?php foreach (range(1, 12) as $month) : ?>
                        <option value="<?= $month ?>"><?= $month ?></option>
                    <?php endforeach ?>
                </select>
                <select class="form-control" name="day">
                    <?php foreach (range(1, 31) as $day) : ?>
                        <option value="<?= $day ?>"><?= $day ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label class="form-label" for="">性別</label>
                <input id="male" type="radio" name="gender" value="male">
                <label for="male">Male</label>
                <input id="female" type="radio" name="gender" value="female">
                <label for="female">Female</label>
            </div>
            <button class="btn btn-primary">確認</button>
        </form>
    </div>
</body>

</html>