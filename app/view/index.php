<div class="container">
    <?php if ( isset($_SESSION['error']) ) : ?>
        <div class="alert alert-error alert-dismissible fade show" role="alert">
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

    <div class="row mb-3">
        <div class="col-sm-6 col-md-8 col-lg-9">
            <h4>Все отзывы</h4>
        </div>
        <div class="sortcomments col-sm-6 col-md-4 col-lg-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Показать</span>
                </div>
                <select id="sort" class="form-control ">
                    <option selected value="created_at">По дате</option>
                    <option value="username">По имени</option>
                    <option value="phone">По телефону</option>
                    <option value="email">По email</option>
                </select>
            </div>
        </div>
    </div>

    <div id="sortlist">
        <?php include $sortlist; ?>
    </div>

    <div class="pb-4">
            <div id="commentpreview" class="comment-item d-none">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="comment-body">
                        </div>
                        <div class="btn-group float-right" role="group" aria-label="Actions">
                            <button id="back" class="btn btn-secondary" type="button">Вернуться</button>
                            <button id="previewsubmit" class="btn btn-primary ml-1" type="button">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="commentform"  class="row justify-content-center">
                <div class="col-sm-12 col-md-8 col-lg-6">
                    <form id="formcomment" action="<?= baseUrl().'/testimonials/add'; ?>" method="post" class="form-comment needs-validation" enctype="multipart/form-data">
                        <input id="pictureTmp" type="hidden" value="" name="pictureTmp">
                        <h4 class="text-center mb-4">Добавить отзыв</h4>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ваше имя</span>
                            </div>
                            <input name="username" id="username" type="text" class="form-control" maxlength="30" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Телефон +(375)</span>
                            </div>
                            <input name="phone" id="phone" type="tel" class="form-control"
                                   pattern="\s?[\(]{0,1}(25|29|33|44)[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}"
                                   value="(__) ___-__-__"
                                   placeholder="(__) ___-__-__" required >
                            <div class="input-group-append d-none d-sm-block">
                                <span class="input-group-text text-muted form-label">Операторы (25,29,33,44)</span>
                            </div>
                            <small class="d-block d-sm-none w-100 form-label">Коды операторов (25,29,33,44)</small>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ваш e-mail</span>
                            </div>
                            <input name="email" id="email"  type="email"
                                   pattern="^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$"
                                   class="form-control" maxlength="50" required>
                        </div>

                        <div class="form-group">
                            <textarea name="comment" id="comment" class="form-control" rows="10" placeholder="Напишите отзыв" required ></textarea>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="upload">
                                    <input type="file" class="inputfile" name="picture" id="picture" accept=".jpg,.jpeg,.png,.gif">
                                    <label for="picture">
                                        <span id="filename">Файл не выбран</span>
                                        <span id="fileclear"><i class="fa fa-trash-o" aria-hidden="true"></i> <span class="d-none d-sm-inline">Очистить</span></span>
                                        <span id="filelabel"><i class="fa fa-upload" aria-hidden="true"></i> <span class="d-none d-sm-inline">Изображение</span></span>
                                    </label>
                                </div>

                                <div id="thumbnail" class="thumbnail">
                                </div>

                            </div>
                        </div>

                        <hr>

                        <div class="btn-group float-right" role="group" aria-label="Actions">
                            <button id="preview" class="btn btn-secondary" type="button">Предпросмотр</button>
                            <button class="btn btn-primary ml-1" type="submit">Сохранить</button>
                        </div>

                    </form>
                </div>
            </div>
    </div>
</div>