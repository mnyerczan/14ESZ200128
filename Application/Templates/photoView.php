<main class="photo-container">    
    <img class="photo-img" src="<?= $photo['url'] ?>" alt="<?= $photo['title'] ?>" title="<?= $photo['title'] ?>">
    <section class="form-section">
        <form action="index.php?page=update" method="POST">
            <div class="title">Update Title</div>
            <label for="title">Title</label>
            <input id="title" name="title" type="text" value="<?= $photo['title'] ?>">
            <input type="submit" name="submit" value="Submit" class="btn btn-green">
            <input type="hidden" name="id" value="<?=$photo['id'] ?>">
        </form>
        <form action="index.php?page=delete" method="POST">
        <div class="title">Delete item</div>
            <input type="submit" value="Submit" class="btn btn-warning">
            <input type="hidden" name="id" value="<?=$photo['id'] ?>">
        </form>
    </section>
</main>