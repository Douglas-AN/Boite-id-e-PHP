<?php
include 'header.php';
?>

<h1>Boite à idée</h1>

<form id="form-auth" method="post">
    <h3 align="center">Se connecter</h3>
    <br />
    <?php //echo $error; 
    ?>
    <div class="form-group">
        <!-- <label>Enter votre pseudo</label> -->
        <input type="text" name="pseudo" placeholder="pseudo" class="form-control" />
    </div>
    <div class="form-group">
        <!-- <label>Confirmer votre mot de passe</label> -->
        <input type="password" name="mdp" class="form-control" placeholder="Mot de passe" />
    </div>
    <!-- <div>
        <input type="checkbox" name="remember_me" id="remember_me" value="">
        <label for="remmber_me">Remember me</label>
    </div> -->
    <div class="form-group" align="center">
        <input type="submit" name="submitAuth" class="btn btn-info" value="Submit" />
    </div>
</form>

<div class="row row-cols-1 row-cols-md-3 contain-card">
    <?php
    $row = 1;
    $result = false;
    if (($handle = fopen("idea.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            if ($data[1] != "pseudo") {
            ?>
                <div class="col g-4">
                    <div id="idea<?php echo $data[0] ?>" class="card h-100" style="width: 18rem;">
                        <img src="<?php echo $data[4] ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data[2] ?></h5>
                            <p class="card-text"><?php echo $data[3] ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php
                            if (isset($_SESSION['pseudo']) && $data[1] == $_SESSION['pseudo']) {
                            ?>
                                <li class="list-group-item">
                                    <a href="vote.php?<?php echo $data[0] ?>">Vote</a>
                                    <svg class="dislike" id="a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 203.6 213.2" style="cursor: pointer;">
                                        <defs>
                                            <style>
                                                .b,
                                                .c {
                                                    fill: none;
                                                }

                                                .c {
                                                    stroke: #000;
                                                    stroke-miterlimit: 10;
                                                    stroke-width: 2px;
                                                }
                                            </style>
                                        </defs>
                                        <path class="c" d="M202.55,122.55c-.54-6.91-5.22-13.78-13.84-16.27,1.87-1.03,3.47-2.48,4.81-4.16,2.82-3.52,4.52-8.1,4.81-12.72,.3-4.63-.79-9.29-3.52-12.9-2.73-3.61-7.21-6.03-13.24-6.06h-50.71c2.32-8.55,6.28-16.63,7.65-24.24,.93-5.32,2.1-12.54,1.46-19.74-.64-7.21-3.13-14.43-9.54-19.48-5.38-3.84-9.07-5.93-16.76-5.97h0c-2.39-.04-5.08,.12-8.08,.52-.66,.08-1.21,.71-1.2,1.38l-.09,22.33-26.05,61.29h-14.61c-.72,0-1.38,.66-1.38,1.38v102.32c0,.32,.14,.63,.34,.87,0,0,1.79,2.22,4.3,4.5,2.51,2.28,5.67,4.79,9.11,4.85,21.79,.39,81.9,.09,81.92,.09,8.81,0,15.29-1.85,19.68-4.76,4.4-2.91,6.71-7,7.05-11.08,.48-5.79-2.96-11.49-8.85-14.46,4.71-.84,8.38-2.34,11.09-4.41,4.15-3.19,5.98-7.57,6.02-11.86,.05-5.5-2.68-10.96-6.96-14.11h.6c5.42,.02,9.67-2.1,12.38-5.37,2.71-3.27,3.95-7.65,3.61-11.95Z" />
                                        <g>
                                            <path class="b" d="M27.62,173.72c-4.71,0-8.47,3.89-8.47,8.53s3.75,8.53,8.47,8.53,8.47-3.77,8.47-8.53-3.77-8.53-8.47-8.53Z" />
                                            <path class="c" d="M40.87,74.76H13.97c-7.18,0-12.97,5.94-12.97,13.17v111.21c0,7.22,5.8,13.06,12.97,13.06h26.9c7.18,0,13.07-5.92,13.07-13.06V87.93c0-7.23-5.89-13.17-13.07-13.17Zm-13.25,118.79c-6.19,0-11.22-5.06-11.22-11.3s5.01-11.3,11.22-11.3,11.22,5.15,11.22,11.3-5.03,11.3-11.22,11.3Z" />
                                        </g>
                                    </svg>
                                    <svg class="like" id="a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 203.6 213.2" style="cursor: pointer;">
                                        <defs>
                                            <style>
                                                .b,
                                                .c {
                                                    fill: none;
                                                }

                                                .c {
                                                    stroke: #000;
                                                    stroke-miterlimit: 10;
                                                    stroke-width: 2px;
                                                }
                                            </style>
                                        </defs>
                                        <path class="c" d="M202.55,122.55c-.54-6.91-5.22-13.78-13.84-16.27,1.87-1.03,3.47-2.48,4.81-4.16,2.82-3.52,4.52-8.1,4.81-12.72,.3-4.63-.79-9.29-3.52-12.9-2.73-3.61-7.21-6.03-13.24-6.06h-50.71c2.32-8.55,6.28-16.63,7.65-24.24,.93-5.32,2.1-12.54,1.46-19.74-.64-7.21-3.13-14.43-9.54-19.48-5.38-3.84-9.07-5.93-16.76-5.97h0c-2.39-.04-5.08,.12-8.08,.52-.66,.08-1.21,.71-1.2,1.38l-.09,22.33-26.05,61.29h-14.61c-.72,0-1.38,.66-1.38,1.38v102.32c0,.32,.14,.63,.34,.87,0,0,1.79,2.22,4.3,4.5,2.51,2.28,5.67,4.79,9.11,4.85,21.79,.39,81.9,.09,81.92,.09,8.81,0,15.29-1.85,19.68-4.76,4.4-2.91,6.71-7,7.05-11.08,.48-5.79-2.96-11.49-8.85-14.46,4.71-.84,8.38-2.34,11.09-4.41,4.15-3.19,5.98-7.57,6.02-11.86,.05-5.5-2.68-10.96-6.96-14.11h.6c5.42,.02,9.67-2.1,12.38-5.37,2.71-3.27,3.95-7.65,3.61-11.95Z" />
                                        <g>
                                            <path class="b" d="M27.62,173.72c-4.71,0-8.47,3.89-8.47,8.53s3.75,8.53,8.47,8.53,8.47-3.77,8.47-8.53-3.77-8.53-8.47-8.53Z" />
                                            <path class="c" d="M40.87,74.76H13.97c-7.18,0-12.97,5.94-12.97,13.17v111.21c0,7.22,5.8,13.06,12.97,13.06h26.9c7.18,0,13.07-5.92,13.07-13.06V87.93c0-7.23-5.89-13.17-13.07-13.17Zm-13.25,118.79c-6.19,0-11.22-5.06-11.22-11.3s5.01-11.3,11.22-11.3,11.22,5.15,11.22,11.3-5.03,11.3-11.22,11.3Z" />
                                        </g>
                                    </svg>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <div class="card-body">
                            <a href="idea.php?id=<?php echo $data[0] ?>" class="card-link">Voir l'idée</a>
                        </div>
                        <?php
                        if (isset($_SESSION['pseudo']) && $data[1] == $_SESSION['pseudo']) {
                        ?>
                            <a href="editIdea.php?id=<?php echo $data[0] ?>" class="editIdea card-link">Editer</a>
                            <a href="removeIdea.php?id=<?php echo $data[0] ?>" class="removeIdea card-link">Retirer</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
        }
        fclose($handle);
    }
    ?>
    <!-- <button id="see-more" type="button" class="btn btn-outline-secondary">Voir plus</button> -->
</div>
<?php
include 'footer.php';
?>