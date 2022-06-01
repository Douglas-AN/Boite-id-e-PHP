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
    foreach ($App->TabIdea as $index => $objIdea) {
        if (isset($_SESSION['id'])) {
        ?>
            <div id="idea<?php echo $index ?>" class="card mb-3">
                <img src="<?php echo $objIdea->Image ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $objIdea->Title ?></h5>
                    <p class="card-text"><?php echo $objIdea->Text ?></p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Vote</li>
                    </ul>
                    <!-- <p class="card-text"><small class="text-muted">Créé le <?php //echo $objIdea->Date->date ?></small></p>
                    <p class="card-text"><small class="text-muted"></small></p> -->
                </div>
                <?php
                if (isset($_SESSION['id'])) {
                ?>
                    <a href="editIdea.php?id=<?php echo $index ?>" class="editIdea card-link">Editer</a>
                    <a href="removeIdea.php?id=<?php echo $index ?>" class="removeIdea card-link">Retirer</a>
                <?php
                }
                ?>
            </div>
        <?php
        }
    }
    ?>
</div>

<?php
include 'footer.php';
?>