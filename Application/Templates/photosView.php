<main class="main">
    <?php foreach ( $photos as $photo ): ?> 
        <a href="index.php?page=photo&id=<?=$photo['id']?>">
            <img src="<?= $photo['thumbnail'] ?>" title="<?= $photo['title'] ?>">
        </a>
    <?php endforeach; ?>
</main>