<a href="<?=$di->get("url")->create("comment/new") ?>" class="btn btn-success">Lägg till kommentar</a>
<hr>

<h2>Kommentarer</h2>
<?php foreach ($comments as $comment) : ?>
    <div class="comment">
        <?= $profilePic ?>
        <span class="text-muted"><?=$comment->userMail ?> - <?=$comment->postDate ?></span>

        <?php if (is_object($user)) : ?>
            <?php if ($user->userType == "admin") : ?>
                <a href="<?=$this->di->get("url")->create("comment/edit/" . $comment->id) ?>"><span class="glyphicon glyphicon-pencil pull-right margin-right"></span></a>
                <a href="<?=$this->di->get("url")->create("comment/delete/" . $comment->id) ?>"><span class="glyphicon glyphicon-remove pull-right margin-right"></span></a>

            <?php elseif ($comment->userId == $user->id) : ?>
                <a href="<?=$this->di->get("url")->create("comment/edit/" . $comment->id) ?>"><span class="glyphicon glyphicon-pencil pull-right margin-right"></span></a>
                <a href="<?=$this->di->get("url")->create("comment/delete/" . $comment->id) ?>"><span class="glyphicon glyphicon-remove pull-right margin-right"></span></a>

            <?php endif;?>
        <?php endif; ?>

        <h4><?= $comment->heading ?></h4>
        <p><?=$this->di->get("textfilter")->markdown($comment->msg) ?></p>
    </div>
<?php endforeach; ?>
