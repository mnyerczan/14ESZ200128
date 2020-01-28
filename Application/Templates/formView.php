<fieldset class="add-fieldset">
    <legend>New Photo</legend>
    <form action="index.php?page=add" method="POST">
        
        <label for="thumbnail">Thumbnail</label>
        <input type="text" name="thumbnail" id="thumbnail" size="30" required>
        
        <label for="url">Url</label>
        <input type="text" name="url" id="url" size="30" required>

        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
                
        <br>
        <br>
        <input type="submit" name="submit" 
        value="Submit">

    </form>
</fieldset>