<?php
$title = 'Inscription';
$style_common = '../assets/css/connexion-inscription.css';
$style = '../assets/css/inscription.css';
// Gestion des erreurs de connexion
// Jeremy

ob_start();
?>

    <main>
        <a id="LogoMainContainer" href="../controller/indexC.php">
            <img id="LogoMain" src="../assets/images/test2.png" alt="logo FreeNote">
        </a>

        <section id="PageTitleContainer">
            <p id="PageTitle">
                Créer votre compte
            </p>
        </section>

        <section id="FormContainer">
            <form action="../controller/registerC.php" method="post">
                <input type="text" name="Surname"  class="FormInput" placeholder="Nom">
                <input type="text" name="Name"  class="FormInput" placeholder="Prénom">
                <input type="text" name="Pseudo" class="FormInput" placeholder="Pseudo">

                <select name="Gender" class="FormInput">
                    <option class="OptionInput" value="Homme">
                        Homme
                    </option>
                    <option class="OptionInput" value="Femme">
                        Femme
                    </option>
                    <option class="OptionInput" value="Autre">
                        Autre
                    </option>
                </select>

                <input type="email" name="Email" class="FormInput" placeholder="Adresse Mail">

                <input type="date" name="Birth" class="FormInput" placeholder="Date">

                <input type="password" name="Pwd" class="FormInput" placeholder="Mot de passe">
                <input type="password" name="Pwd1" class="FormInput" placeholder="Confirmer mot de passe"><br/>

                <?php echo $s_error; ?>

                <div id="SubmitContainer">
                    <input id="submitButton" name="register" type="submit" value="S'inscrire">
                </div>
            </form>

            <p id="LoginLink">
                Vous possédez déja un compte ? <a href="../controller/loginC.php">Se connecter</a>
            </p>
        </section>

    </main>

<?php
$content = ob_get_clean();
require('../template_empty.php');
?>