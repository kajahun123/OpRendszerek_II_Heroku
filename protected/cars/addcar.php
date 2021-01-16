<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>User nem tud hozzáadni telefont!</h1>
<?php else : ?>

	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addcar'])) {
		$postData = [
			'rendszam' => $_POST['rendszam'],
			'tipus' => $_POST['tipus'],
			'ar' => $_POST['ar'],
		];

		if(empty($postData['rendszam']) || empty($postData['tipus']) || empty($postData['ar']) ) {
			echo "Hiányzó adat(ok)!";
		} else {
			$query = "INSERT INTO cars (rendszam, tipus, ar) VALUES (:rendszam, :tipus, :ar)";
			$params = [
				':rendszam' => $postData['rendszam'],
				':tipus' => $postData['tipus'],
				':ar' => $postData['ar'],
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba az adatbevitel során!";
			} header('Location: index.php');
		}
	}
	?>
<style>
    label{
        color:white;
    }
</style>
	<form method="post">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="rendszam">Rendszám</label>
				<input type="text" class="form-control" id="rendszam" name="rendszam">
			</div>
			<div class="form-group col-md-6">
				<label for="tipus">Típus</label>
				<input type="text" class="form-control" id="tipus" name="tipus">
			</div>
                        <div class="form-group col-md-6">
				<label for="ar">Ár</label>
				<input type="text" class="form-control" id="ar" name="ar">
			</div>
		</div>

		<button type="submit" class="btn btn-primary" name="addcar">Autó hozzáadása</button>
	</form>
<?php endif; ?>