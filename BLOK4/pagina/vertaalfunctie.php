
<?php

$page = 'index';

 require_once 'pagina/header.php';
?>

        <form action="" method="post">
            <select name="taalkeuze">
                <?PHP
                for ($i=0; $i < count ($aTalen); $i++)
                {
                ?>
                    <option value="<?=$aTalen[$i];?>"><?=$aTalen[$i];?></option>
                <?PHP
                }
                ?>
            </select>
            <input name="kiezen" type="submit" value="Kies Taal" />
        </form>
        <?PHP
        
        echo $_LANG['index'];

        ?>
		

<footer class="borderfooter">
	<p><strong>CORONA COMPLEET</strong> in partnership with <a href="https://www.u-earth.eu/">U-EARTH</a></p>
</footer>
</div>

<script src="js/script.js"></script>
</body>
</html>
