<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Condition</title>
</head>
<body>
    
<h1>Condition in php</h1>



    <?php


            // simple condition : if (expression){ // code }
            $success = true;
            if($success == true) {
                echo '<div class="success">Action effectuée</div>';
            }

            // alternative condition : if (expression){ // code } else { // code }
            $success = false;
            if($success == true) {
                echo '<div class="success">Action effectuée</div>';
            }else {
                echo '<div class="error">Erreur détectée</div>';
            }

            // double alternative condition : if (expression){ // code } elseif (expression){ // code } else { // code }
            $success = null;
            if($success == true) {
                echo '<div class="success">Action effectuée</div>';
            }elseif($success == false) {
                echo '<div class="error">Erreur désetectée</div>';
            }else{
                echo '<div class="warning">Attention</div>';
            }
            // Ecriture ternaire ($resultat = condition ? commande 1 : commande 2;)
            $success = true;
            echo $success == true ? '<div class="success">Action effectuée</div>' : '<div class="error">Erreur désetectée</div>';
    ?>

    <!-- Ecriture dans HTML -->
    <?php $success = true;?>
        <div class="<?php if($success) : ?>success<?php else : ?>error<?php endif ?>">
            <?php if($success) : ?>Action effectuée<?php else : ?>Erreur détectée'<?php endif ?>
        </div>

        <!-- <?php if($condition) : ?>
            <a href=" website_name.com "> it is displayed iff $condition is met </a>
        <?php elseif($another_condition) : ?>
            HTML TAG HERE
        <?php else : ?>
            HTML TAG HERE
        <?php endif; ?> -->

</body>
</html>