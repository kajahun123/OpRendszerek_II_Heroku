<?php 
if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	$_GET['P'] = 'home';

switch ($_GET['P']) {

	    case 'test': require_once PROTECTED_DIR.'permission/permission_test.php'; break;

	    case 'login': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'felhasznalo/login.php' : header('Location: index.php'); break;

        case 'cars': IsUserLoggedIn() ? require_once PROTECTED_DIR.'cars/cars.php' : header('Location: index.php'); break;
        
	    case 'logout': IsUserLoggedIn() ? UserLogout() : header('Location: index.php'); break;
        
        case 'addcar': IsUserLoggedIn() ? require_once PROTECTED_DIR.'cars/addcar.php' : header('Location: index.php'); break;
        
        case 'delcar': IsUserLoggedIn() ? require_once PROTECTED_DIR.'cars/delcar.php': header('Location: index.php'); break;
}

?>