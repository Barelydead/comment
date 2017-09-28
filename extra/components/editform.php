<h2>Edit</h2>
<form method="post" action="<?=$app->url->create("comment/edit") ?>">
    <div class="form-group">
         <label for="mail">mail</label>
        <input type="text" name="mail" value="<?= $comment['mail']?>" class="form-control">
    </div>

    <div class="form-group">
         <label for="msg">meddelande</label>
         <textarea class="form-control" name="msg" rows="5" id="comment"><?= $comment['msg']?></textarea>
    </div>

    <input type="hidden" name="index" value="<?= $comment['index']?>">

    <div class="form-group">
        <input type="submit" class="btn btn-default" value="edit">
    </div>
</form>
