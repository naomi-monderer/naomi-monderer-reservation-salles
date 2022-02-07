<?php

require ('header.php');
?>
<main>
    <section>
    <form action="" method="post">
        <label for="login">identifiant:</label>
        <input type="text" name="login" placeholder="identifiant">

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" placeholder="Mot de passe">

        <label for="passwordConfirm">Confirmez le mot de passe</label>
        <input type="password" name="passwordConfrim" placeholder="Mot de passe">
        
        <input type="submit" name="submitCo" value="se connecter">
    </form>
    </section>
</main>

<?php

// si submitCo est cliqué alors j'instancie mon controller inscription et je lui donne login et password

require ('footer.php');
?>