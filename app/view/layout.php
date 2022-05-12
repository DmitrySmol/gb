<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Отзывы</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="<?= baseUrl() . '/js/main.js'; ?>"></script>
</body>
</html>