<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Отзывы</title>
    <link rel="stylesheet" href="<?= baseUrl() . '/js/bootstrap/css/bootstrap.min.css'; ?>" type="text/css">
    <link rel="stylesheet" href="<?= baseUrl() . '/js/font-awesome/css/font-awesome.min.css'; ?>" type="text/css">
    <link rel="stylesheet" href="<?= baseUrl() . '/css/style.css'; ?>" type="text/css">
</head>
<body>
  <div class="top fixed-top text-center">
      <?php if ( !isset($_SESSION['user']) ) : ?>
          <a class="top-nav" href="<?= '/auth/login' ?>">Авторизация</a>
      <?php else : ?>
          <a class="top-nav" href="<?= '/auth/logout' ?>">Выйти</a>
	  <?php endif; ?>
  </div>

  <?php include $subview; ?>

  <script src="<?= baseUrl() . '/js/jquery/jquery-2.1.1.min.js'; ?>"></script>
  <script src="<?= baseUrl() . '/js/bootstrap/js/bootstrap.min.js'; ?>"></script>
  <script src="<?= baseUrl() . '/js/main.js'; ?>"></script>
</body>
</html>