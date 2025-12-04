<?php ob_start() ?>

<h1>Acceuil</h1>

<input id="user" type="text" name="" id="">
<small id="userError"></small>
<a href="movie">See your movie List</a>
<?php
$movies = new Models\Movie();
var_dump($movies->getAll());

?>

<?php
render('default', true, [
	'title' => 'Acceuil',
	'css' => 'index',
	'content' => ob_get_clean(),
]);
?>