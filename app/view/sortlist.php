<?php if ( isset($testimonials) && count($testimonials) > 0 ) : ?>
    <?php foreach ( $testimonials as $comment ) : ?>
        <?php if ( $comment['published'] > 0 || (isset($user) && $user['role_id'] == 1)) : ?>
            <div class="comment-item <?= $comment['published'] ? '' : 'comment-item-hidden'?> mb-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="comment-body">
                            <p><?= $comment['comment'] ?></p>
                            <?php if ( isset($comment['picture']) && $comment['picture'] !='') : ?>
                                <img class="comment-image" src="<?= baseUrl(). '/images/' . $comment['picture'] ?>" alt="Comment Picture" >
                            <?php endif; ?>
                            <hr>
                            <p class="comment-author"><?= $comment['username'] ?>(<?= $comment['email'] ?>;<?= $comment['phone'] ?>)</p>
                            <p class="comment-date">
                                <?php if ( $comment['created_at'] != $comment['modified_at'] ) : ?>
                                    <?= date('Y-m-d H:i', strtotime($comment['modified_at'])) ?> (изменен администратором)
                                <?php else : ?>
                                    <?= date('Y-m-d H:i', strtotime($comment['created_at'])) ?>
                                <?php endif; ?>
                            </p>
                            <?php if ( isset($user) && $user['role_id'] == 1 ) : ?>
                                <div class="float-right">
                                    <a href="<?= baseUrl().'/testimonials/edit/'.$comment['id'] ?>" class="btn btn-sm btn-primary float-right ml-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span class="d-none d-sm-inline">Редактировать</span></a>
                                    <?php if ( $comment['published'] > 0 ) : ?>
                                        <a href="<?= baseUrl().'/testimonials/hide/'.$comment['id'] ?>" class="btn btn-sm btn-danger float-right ml-1"><i class="fa fa-check-circle-o" aria-hidden="true"></i> <span class="d-none d-sm-inline">Скрыть</span></a>
                                    <?php else : ?>
                                        <a href="<?= baseUrl().'/testimonials/show/'.$comment['id'] ?>" class="btn btn-sm btn-success float-right ml-1"><i class="fa fa-check-circle-o" aria-hidden="true"></i> <span class="d-none d-sm-inline">Одобрить</span></a>
                                    <?php endif; ?>
                                    <a href="<?= baseUrl().'/testimonials/remove/'.$comment['id'] ?>" class="btn btn-sm btn-danger float-right" onclick="return confirm('Комментарий будет безвозвратно удалён. Вы уверены?')"><i class="fa fa-trash-o" aria-hidden="true"></i> <span class="d-none d-sm-inline">Удалить</span></a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
