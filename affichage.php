
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_tables.css">
    <title>Table</title>
</head>
<body>
    <div class="div_table">
            <?php
                session_start();
                
                if($_POST["a_initial"]!='' && $_POST["b_initial"]!='')
                {   
                    $a = $_POST["a_initial"];
                    $b = $_POST["b_initial"];
                    $_SESSION['b_initial'] = $b;
                }
                else
                {
                    $b = $_SESSION['b_initial'];
                }

                $index_a_modifier = $_POST["index_a_modifier"];
                $index_a_supprimer = $_GET["index_a_supprimer"];
                
                $a_modifier = $_POST["a_modifier"];
                $b_modifier = $_POST["b_modifier"];

                if($index_a_supprimer!='')
                {   
                    $table_a = $_SESSION['initial_table_a'];
                    $table_b = $_SESSION['initial_table_b'];

                    array_splice($table_a,$index_a_supprimer,1);
                    array_splice($table_b,$index_a_supprimer,1);

                    $b = $_SESSION['b_initial'];
                    
                    $b = $b -1;
                    
                    $_SESSION['b_initial'] = $b;
                    
                    $_SESSION['initial_table_a'] = $table_a;
                    $_SESSION['initial_table_b'] = $table_b;
                }

                else if($index_a_modifier!='')
                {    
                    $table_a = $_SESSION['initial_table_a'];
                    $table_b = $_SESSION['initial_table_b'];
                    
                    $table_a[$index_a_modifier] = $a_modifier;
                    $table_b[$index_a_modifier] = $b_modifier;

                    $_SESSION['initial_table_a'] = $table_a;
                    $_SESSION['initial_table_b'] = $table_b;
                }
                
                else
                {
                    for($i = 0; $i < $b; $i++){
                        $table_a[$i] = $a;
                        $table_b[$i] = $i+1;
                    }
                    $_SESSION['initial_table_a'] = $table_a;
                    $_SESSION['initial_table_b'] = $table_b;
                }
            ?>
        <table>
            <tr>
                <td>A</td>
                <td>B</td>
                <td>Résultat</td>
                <td>Action</td>
            </tr>
           <?php 
                for($i = 0; $i < $b; $i++)
                {
                    $resultat = $table_a[$i] * $table_b[$i]; 
                    if($i%2)
                    {
                        echo 
                            "<tr class=\"impair\">
                                <td>$table_a[$i]</td>
                                <td>$table_b[$i]</td>
                                <td>$resultat</td>
                                <td>
                                    <div style=\"display:flex;\">
                                        <a href=\"http://www.web.com/modification_donnees.php?index_a_modifier=$i&a_initial=$table_a[$i]&b_initial=$table_b[$i]\"><button>modifier</button></a>
                                        <a class=\"supprimer\" href=\"http://www.web.com/affichage.php?index_a_supprimer=$i\">supprimer</a>
                                    </div>
                                </td>
                            </tr>";
                    }
                    else
                    {
                        echo 
                            "<tr class=\"pair\">
                                <td>$table_a[$i]</td>
                                <td>$table_b[$i]</td>
                                <td>$resultat</td>
                                <td>
                                    <div style=\"display:flex;\">
                                        <a href=\"http://www.web.com/modification_donnees.php?index_a_modifier=$i&a_initial=$table_a[$i]&b_initial=$table_b[$i]\"><button>modifier</button></a>
                                        <a class=\"supprimer\" href=\"http://www.web.com/affichage.php?index_a_supprimer=$i\">supprimer</a>
                                    </div>
                                </td>
                            </tr>";
                    }
                }
                if($b == 0)
                {
                    header("Location: http://www.web.com/donnees.php");
                }
            ?>
        </table>
    </div>
</body>
</html>