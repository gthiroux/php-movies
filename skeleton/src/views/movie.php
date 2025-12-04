<?php ob_start() ?>


<?php if (!empty($error) && !empty($error['global'])) { ?>
    <h2><?= $error['global'] ?></h2>
<?php } ?>

<form method="POST">
    <h2>Add a movie :</h2>
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

<div id='main'>
    <h1>My Collection </h1>
    <div id='movieList'>
        <h2>My Film :</h2>
        <?php
        foreach ($allMovies as $movie) {
            if ($movie['type'] == 'film') { ?>
                <div class='movie'>
                    <p>Title : <?= $movie['title'] ?></p>
                    <p>Type : <?= $movie['type'] ?></p>
                    <?php if ($movie['genre'] != NULL) {
                    ?><p>Genre : <?= $movie['genre'] ?></p><?php } ?>
                    <?php if ($movie['rating'] != NULL) {
                    ?><p>Rating : <?= $movie['rating'] ?></p><?php } ?>
                    <p><?= $movie['is_watched'] == 0 ? 'A voir' : 'Vu'; ?></p>
                </div>
        <?php
            }
        }
        ?>

        <h2>My Serie :</h2>
        <?php
        foreach ($allMovies as $movie) {
            if ($movie['type'] == 'serie') { ?>
                <div class='movie'>
                    <p>Title : <?= $movie['title'] ?></p>
                    <p>Type : <?= $movie['type'] ?></p>
                    <?php if ($movie['genre'] != NULL) {
                    ?><p>Genre : <?= $movie['genre'] ?></p><?php } ?>
                    <?php if ($movie['rating'] != NULL) {
                    ?><p>Rating : <?= $movie['rating'] ?></p><?php } ?>
                    <p><?= $movie['is_watched'] == 0 ? 'A voir' : 'Vu'; ?></p>
                </div>
        <?php
            }
        }
        ?>

    </div>
</div>

<?php render('default', true, [
    'title' => 'Movie List',
    'css' => 'movie',
    'content' => ob_get_clean(),
]);
?>