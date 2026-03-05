<h1>Bienvenue sur l'application de gestion d'auto-école</h1>

<p>Bonjour <?php echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?> !</p>

<p>Vous êtes connecté(e) en tant que : <strong><?php echo $_SESSION['role']; ?></strong></p>

<h3>Fonctionnalités disponibles :</h3>
<ul>
    <li>Gestion des candidats (élèves)</li>
    <li>Gestion des moniteurs</li>
    <li>Gestion des véhicules</li>
    <li>Gestion des leçons de conduite</li>
</ul>

<p>Utilisez le menu ci-dessus pour naviguer dans l'application.</p>
