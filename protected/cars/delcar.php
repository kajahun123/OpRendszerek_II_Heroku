<style>
    h1 {text-align: center;
        color: #96c8bd;
    }
    table{
        text-align: center;
        border: 3px solid grey;
        margin-left:auto;
        margin-right:auto;
    }
    td{
        border: 3px solid grey;
        font-size: 30px;
        color: white;
    }
a.gomb:visited, a.gomb:link {
    background-color: #256d6d;
    color: white;
    padding: 5px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 0rem;
}
    th{
        color: white;
    }

a.gomb:hover, a.gomb:active {
    background-color: #38abab;
}
</style>
<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	
<?php else : ?>
	<?php 
		if(array_key_exists('d', $_GET) && !empty($_GET['d'])) {
			$query = "DELETE FROM cars WHERE id = :id";
			$params = [':id' => $_GET['d']];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba törlés közben!";
			}
		}
	?>
<?php 
	$query = "SELECT id, rendszam, tipus, ar FROM cars ORDER BY rendszam";
	require_once DATABASE_CONTROLLER;
	$cars = getList($query);
?>
	<?php if(count($cars) <= 0) : ?>
		<h1>Nincs autó az adatbázisban</h1>
	<?php else : ?>
        
		<table>
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Rendszám</th>
					<th scope="col">Típus</th>
					<th scope="col">Ár</th>
					<th scope="col">Törlés</th>					
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($cars as $t) : ?>
					<?php $i++; ?>
					<tr>
						<td scope="row"><?=$i ?></td>
						<td><?=$t['rendszam'] ?></td>
						<td><?=$t['tipus'] ?></td>
						<td><?=$t['ar'] ?></td>
                        <td><a class="gomb" href="?P=delcar&d=<?=$t['id'] ?>">Törlés</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>