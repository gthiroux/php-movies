<?php ob_start() ?>

<h1>Ma Collection </h1>
<?php if (!empty($error) && !empty($error['global'])) { ?>
    <h2><?= $error['global'] ?></h2>
<?php } ?>


<form method="POST">
    <label for="title">Title</label>
    <input id="title" type="text" name="title" placeholder="Title Movie" value="<?= !empty($_POST['title']) ? $_POST['title'] : '' ?>" required>
    <?php if (!empty($error) && !empty($error['title'])) { ?>
        <small><?= $error['title'] ?></small>
    <?php } ?>
    <label for="type">Type</label>
    <input id="type" type="text" name="type" placeholder="Type" value="<?= !empty($_POST['type']) ? $_POST['type'] : '' ?>" required>
    <?php if (!empty($error) && !empty($error['type'])) { ?>
        <small><?= $error['type'] ?></small>
    <?php } ?>
    <label for="genre">Genre</label>
    <input id="genre" type="genre" name="genre" placeholder="Genre" value="<?= !empty($_POST['genre']) ? $_POST['genre'] : '' ?>">
    <?php if (!empty($error) && !empty($error['genre'])) { ?>
        <small><?= $error['genre'] ?></small>
    <?php } ?>
    <label for="rating">Rate for the movie</label>
    <input id="rating" type="rating" name="rating" placeholder="Between 1 to 5">
    <?php if (!empty($error) && !empty($error['rating'])) { ?>
        <small><?= $error['rating'] ?></small>
    <?php } ?>
    <label for="iswatched">Are you watched this movie ?</label>
    <input id="iswatched" type="rating" name="iswatched" placeholder="Yes (Y) or No(N)" required>
    <?php if (!empty($error) && !empty($error['iswatched'])) { ?>
        <small><?= $error['iswatched'] ?></small>
    <?php } ?>
    <button name="savemovie" type="submit">Save Your Movie</button>
</form>

<div>
    <?php
    foreach ($allMovies as $key => $value) {
        echo ($key);
        echo ($value);
    }
    ?>

</div>

<?php render('default', true, [
    'title' => 'Movie List',
    'css' => 'movie',
    'content' => ob_get_clean(),
]);
?>