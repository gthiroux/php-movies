<?php

$error = [];



if (!empty($_POST)) {
    $movie = new Models\Movie();
    try {
        $movie->setTitle($_POST['title']);
    } catch (\Exception $e) {
        $error['title'] = $e->getMessage();
    }
    try {
        $movie->setType($_POST['type']);
    } catch (\Exception $e) {
        $error['type'] = $e->getMessage();
    }
    try {
        $movie->setRating($_POST['rating']);
    } catch (\Exception $e) {
        $error['rating'] = $e->getMessage();
    }
    try {
        $movie->setGenre($_POST['genre']);
    } catch (\Exception $e) {
        $error['genre'] = $e->getMessage();
    }
    try {
        $movie->setIsWatched($_POST['iswatched']);
    } catch (\Exception $e) {
        $error['iswatched'] = $e->getMessage();
    }

    if (empty($error)) {
        if ($movie->saveMovie()) {
            redirectTo('/movie');
        } else {
            $error['global'] = 'Echec de l\'enregistrement';
        }
    }
}
$movies = new Models\Movie();
$allMovies = $movies->getAll();
// var_dump($allMovies);

render('movie', false, [
    'allMovies' => $allMovies,
    'error' => $error
]);
