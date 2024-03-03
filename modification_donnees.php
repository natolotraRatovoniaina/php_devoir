<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_donnees.css">
    <title>Modification</title>
</head>
<body>
    <?php
        $i = $_GET["index_a_modifier"];
        $a = $_GET["a_initial"];
        $b = $_GET["b_initial"];
    ?>
    <div class="div_input">
		<form action="http://www.web.com/affichage.php" method="post">
			<div class="div_input_a">
                <?php
				    echo "<p>Entrez la nouvelle veleur de a : <input type=\"number\" name=\"a_modifier\" value=\"$a\"/></p>";
                ?>
			</div>
			<div class="div_input_b">
				<?php 
                    echo "<p>Entrez la nouvelle valeur de b : <input type=\"number\" name=\"b_modifier\" value=\"$b\"/></p>";
                ?>
            </div>
				<?php
                echo "<button>Envoyer</button>";
                ?>
            <?php
                echo "<input type=\"hidden\" name=\"index_a_modifier\" value=\"$i\">";
            ?>
        </form>
	</div>

</body>
</html>