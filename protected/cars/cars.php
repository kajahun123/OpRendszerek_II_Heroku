<?php require_once 'protected/database.php'; ?>
<?php require_once USER_MANAGER; ?>
<?php
    $query = "SELECT * FROM cars ORDER BY rendszam;";
    $records = select($query);
    ?>
<!DOCTYPE html>
<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Autók</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="<?=PUBLIC_DIR.'style.css?'.date('YmdHis', filemtime(PUBLIC_DIR.'style.css'))?>">
        
</head>
<body>
    
    
<div style="padding:1px 16px;height:1000px;">
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
th{
    color: white;
}
</style>
<h1>Autók</h1>
            <br>
        <table>
        <thead>
            <tr>
                <th>Rendszám</th>
                <th>Típus</th>
                <th>Ár</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($records as $record):?>
            <tr>
                <td><?=$record['rendszam']?></td>
                <td><?=$record['tipus']?></td>
                <td><?=$record['ar']?> Ft</td>
            </tr>
            <?php endforeach;?>
        </tbody>
        </div>
	<div class="container-fluid">
		<header><?php include_once PROTECTED_DIR.'header.php'; ?></header>
		<nav><?php require_once PROTECTED_DIR.'nav.php'; ?></nav>
		<content><?php require_once PROTECTED_DIR.'routing.php'; ?></content>
	</div>
</body>
</html>