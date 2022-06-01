<?php
include 'header.php';

// function find_user($filename, $pseudo)
// {
//     $f = fopen($filename, "r");
//     $result = false;
//     $row = fgetcsv($f);
//     print_r($row);
//     while ($row[1] == $pseudo) {

//         $result = array($row[0], $row[2], $row[3]);
//     //     if ($row[1] == $pseudo) {

//     //         break;
//     //     }
//     }
//     fclose($f);
//     return $result;
// }

// $f_pointer=fopen("idea.csv","r"); // file pointer

// while(! feof($f_pointer)){
// $ar=fgetcsv($f_pointer);
// echo print_r($ar); // print the array 
// echo "<br>";
// }

//print_r(find_user("idea.csv", $_SESSION['pseudo']));
?>
<h1>Mes Idées</h1>

<div class="row row-cols-1 row-cols-md-3 contain-card">
    <?php
    $row = 1;
    $result = false;
    if (($handle = fopen("idea.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            if ($data[1] == $_SESSION['pseudo']) {
            ?>
                <div class="col">
                    <div class="card h-100" style="width: 18rem;">
                        <img src="<?php echo $data[4] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data[2] ?></h5>
                            <p class="card-text"><?php echo $data[3] ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Vote</li>
                        </ul>
                        <div class="card-body">
                            <a href="idea.php" class="card-link">Voir l'idée</a>
                        </div>
                        <a href="editIdea.php" class="editIdea card-link">Editer</a>
                        <a href="removeIdea.php" class="removeIdea card-link">Retirer</a>
                    </div>
                </div>
            <?php
            }
        }
        fclose($handle);
    }
    ?>
</div>

<?php
include 'footer.php';
?>