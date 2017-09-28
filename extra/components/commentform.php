<h2>Skriv en kommentar</h2>
<form method="post" action="<?=$app->url->create("comment/new") ?>">
    <div class="form-group">
         <label for="mail">mail</label>
        <input type="text" name="mail" class="form-control">
    </div>

    <div class="form-group">
         <label for="msg">meddelande</label>
         <textarea class="form-control" name="msg" rows="3" id="comment"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-default" value="skicka kommentar">
    </div>
</form>
