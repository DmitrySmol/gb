    <div class="container">
      <h4 class="text-center mb-4">Авторизация</h4>
      <form class="form-signin" method="post" action="<?php echo baseUrl().'/auth/login'; ?>">
        <?php if ( isset($_SESSION['error']) ) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
        <?php endif; ?>

        <?php if ( isset($_SESSION['message']) ) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
        </div>
        <?php endif; ?>

        <label for="username" class="sr-only">Email</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Имя пользователя" autocomplete="username" required autofocus>
        <label for="password" class="sr-only">Пароль</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Пароль" autocomplete="current-password" required>
        <button class="btn btn-primary btn-block" type="submit">Войти</button>
      </form>
        <div class="text-center"><small>(Имя пользователя: admin, пароль: 123)</small></div>
    </div>