
<style>
    a.bt:visited, a.bt:link {
        background-color: #256d6d;
        color: white;
        padding: 5px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border-radius: 1rem;
    }

    a.bt:hover, a.bt:active {
        background-color: #38abab;
    }

</style>
<hr>

<?php if(!IsUserLoggedIn()) : ?>
	<a class="bt" href="index.php?P=login">Belépés</a>
<?php else : ?>
	<a class="bt" href="index.php?P=test">Hozzáférés leellenőrzés</a>
        <span> &nbsp; | &nbsp; </span>
        <a class="bt" href="index.php?P=cars">Autók</a>
        <span> &nbsp; | &nbsp; </span>
	<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 1) : ?>
        <a class="bt" href="index.php?P=addcar">Autó hozzáadása</a>
        <span> &nbsp; | &nbsp; </span>
        <a class="bt" href="index.php?P=delcar">Autó törlése</a>
        <span> &nbsp; | &nbsp; </span>
	<?php else : ?>
	<?php endif; ?>
	<a class="bt" href="index.php?P=logout">Kilépés</a>
<?php endif; ?>

<hr>