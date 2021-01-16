<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
<style>
    h1{
        color: #7ac4ac;
    }
</style>
	<h1>Belépve userként</h1>
	
<?php else : ?>
	<h1>Belépve adminként</h1>
	
<?php endif; ?>