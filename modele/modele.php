<?php

class Modele {
    private $unPdo;

    public function __construct(){
        $url  = "mysql:host=localhost;dbname=auto_ecole";
        $user = "root";
        $mdp  = "";

        try {
            $this->unPdo = new PDO($url, $user, $mdp);
            $this->unPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $exp){
            echo "<br> Erreur de connexion à ".$url;
            echo $exp->getMessage();
        }
    }

                        /* gestion des users */
    
    public function select_user($email, $mdp){
        $requete = "select * from user 
                    where email = :email 
                    and mdp = :mdp;";
        $donnees = array(":email" => $email, ":mdp" => $mdp);
        $select = $this->unPdo->prepare($requete); 
        $select->execute($donnees);  
        $unUser = $select->fetch();  
        return $unUser;
    }

    public function insert_user($tab) {
        $requete = "insert into user values (null, :email, :mdp, :nom, :prenom, :role);";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(
            ":email"   => $tab["email"],
            ":mdp"     => $tab["mdp"],
            ":nom"     => $tab["nom"],
            ":prenom"  => $tab["prenom"],
            ":role"    => $tab["role"]
        );
        $exec->execute($donnees);
    }

                        /* gestion des candidats */
    
    public function insert_candidat($tab) {
        $requete = "insert into candidat values (null, :nomC, :prenomC, :date_naissanceC, :adresseC, :telephoneC, :date_inscription);";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(
            ":nomC"              => $tab["nomC"],
            ":prenomC"           => $tab["prenomC"],
            ":date_naissanceC"   => $tab["date_naissanceC"],
            ":adresseC"          => $tab["adresseC"],
            ":telephoneC"        => $tab["telephoneC"],
            ":date_inscription"  => $tab["date_inscription"]
        );
        $exec->execute($donnees);
    }

    public function selectAll_candidats(){
        $requete = "select * from candidat order by nomC, prenomC;";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll();
    }

    public function selectLike_candidats($filtre){
        $requete = "select * from candidat 
                    where nomC like :filtre 
                    or prenomC like :filtre 
                    or telephoneC like :filtre;";
        $donnees = array(":filtre" => "%".$filtre."%");
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetchAll();
    }

    public function delete_candidat($id_candidat){
        $requete = "delete from candidat 
                    where id_candidat = :id_candidat;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(":id_candidat" => $id_candidat);
        $exec->execute($donnees);
    }

    public function update_candidat($tab){
        $requete = "update candidat set 
                    nomC = :nomC, 
                    prenomC = :prenomC, 
                    date_naissanceC = :date_naissanceC, 
                    adresseC = :adresseC, 
                    telephoneC = :telephoneC, 
                    date_inscription = :date_inscription 
                    where id_candidat = :id_candidat;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(
            ":nomC"              => $tab["nomC"],
            ":prenomC"           => $tab["prenomC"],
            ":date_naissanceC"   => $tab["date_naissanceC"],
            ":adresseC"          => $tab["adresseC"],
            ":telephoneC"        => $tab["telephoneC"],
            ":date_inscription"  => $tab["date_inscription"],
            ":id_candidat"       => $tab["id_candidat"]
        );
        $exec->execute($donnees);
    }

    public function selectWhere_candidat($id_candidat){
        $requete = "select * from candidat 
                    where id_candidat = :id_candidat;";
        $donnees = array(":id_candidat" => $id_candidat);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetch();
    }

    public function count_lecons_candidat($id_candidat){
        $requete = "select count(*) as nb 
                    from lecon 
                    where id_candidat = :id_candidat;";
        $donnees = array(":id_candidat" => $id_candidat);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        $result = $exec->fetch();
        return $result['nb'];
    }

                        /* gestion des moniteurs */
    
    public function insert_moniteur($tab) {
        $requete = "insert into moniteur values (null, :nomM, :prenomM, :emailM, :telephoneM, :date_embauche);";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(
            ":nomM"          => $tab["nomM"],
            ":prenomM"       => $tab["prenomM"],
            ":emailM"        => $tab["emailM"],
            ":telephoneM"    => $tab["telephoneM"],
            ":date_embauche" => $tab["date_embauche"]
        );
        $exec->execute($donnees);
    }

    public function selectAll_moniteurs(){
        $requete = "select * from moniteur 
                    order by nomM, prenomM;";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll();
    }

    public function selectLike_moniteurs($filtre){
        $requete = "select * from moniteur 
                    where nomM like :filtre 
                    or prenomM like :filtre 
                    or emailM like :filtre;";
        $donnees = array(":filtre" => "%".$filtre."%");
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetchAll();
    }

    public function delete_moniteur($id_moniteur){
        $requete = "delete from moniteur 
                    where id_moniteur = :id_moniteur;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(":id_moniteur" => $id_moniteur);
        $exec->execute($donnees);
    }

    public function update_moniteur($tab){
        $requete = "update moniteur set 
                    nomM = :nomM, 
                    prenomM = :prenomM, 
                    emailM = :emailM, 
                    telephoneM = :telephoneM, 
                    date_embauche = :date_embauche 
                    where id_moniteur = :id_moniteur;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(
            ":nomM"          => $tab["nomM"],
            ":prenomM"       => $tab["prenomM"],
            ":emailM"        => $tab["emailM"],
            ":telephoneM"    => $tab["telephoneM"],
            ":date_embauche" => $tab["date_embauche"],
            ":id_moniteur"   => $tab["id_moniteur"]
        );
        $exec->execute($donnees);
    }

    public function selectWhere_moniteur($id_moniteur){
        $requete = "select * from moniteur 
                    where id_moniteur = :id_moniteur;";
        $donnees = array(":id_moniteur" => $id_moniteur);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetch();
    }

                        /* gestion des vehicules */
    
    public function insert_vehicule($tab) {
        $requete = "insert into vehicule values (null, :immat, :date_Achat, :nb_km, :energie, :marque, :modele, :type_vehicule);";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(
            ":immat"         => $tab["immat"],
            ":date_Achat"    => $tab["date_Achat"],
            ":nb_km"         => $tab["nb_km"],
            ":energie"       => $tab["energie"],
            ":marque"        => $tab["marque"],
            ":modele"        => $tab["modele"],
            ":type_vehicule" => $tab["type_vehicule"]
        );
        $exec->execute($donnees);
    }

    public function selectAll_vehicules(){
        $requete = "select * from vehicule 
                    order by marque, immat;";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll();
    }

    public function selectLike_vehicules($filtre){
        $requete = "select * from vehicule 
                    where immat like :filtre 
                    or marque like :filtre 
                    or type_vehicule like :filtre;";
        $donnees = array(":filtre" => "%".$filtre."%");
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetchAll();
    }

    public function delete_vehicule($id_vehicule){
        $requete = "delete from vehicule 
                    where id_vehicule = :id_vehicule;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(":id_vehicule" => $id_vehicule);
        $exec->execute($donnees);
    }

    public function update_vehicule($tab){
        $requete = "update vehicule set 
                    immat = :immat, 
                    date_Achat = :date_Achat, 
                    nb_km = :nb_km, 
                    energie = :energie, 
                    marque = :marque, 
                    modele = :modele, 
                    type_vehicule = :type_vehicule 
                    where id_vehicule = :id_vehicule;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(
            ":immat"         => $tab["immat"],
            ":date_Achat"    => $tab["date_Achat"],
            ":nb_km"         => $tab["nb_km"],
            ":energie"       => $tab["energie"],
            ":marque"        => $tab["marque"],
            ":modele"        => $tab["modele"],
            ":type_vehicule" => $tab["type_vehicule"],
            ":id_vehicule"   => $tab["id_vehicule"]
        );
        $exec->execute($donnees);
    }

    public function selectWhere_vehicule($id_vehicule){
        $requete = "select * from vehicule 
                    where id_vehicule = :id_vehicule;";
        $donnees = array(":id_vehicule" => $id_vehicule);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetch();
    }

                        /* gestion des lecons */
    
    public function insert_lecon($tab) {
        $requete = "insert into lecon VALUES (null, :id_candidat, :id_moniteur, :id_vehicule, :date_lecon, :libelle, :duree_lecon, :compterendu);";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(
            ":id_candidat"  => $tab["id_candidat"],
            ":id_moniteur"  => $tab["id_moniteur"],
            ":id_vehicule"  => $tab["id_vehicule"],
            ":date_lecon"   => $tab["date_lecon"],
            ":libelle"      => $tab["libelle"],
            ":duree_lecon"  => $tab["duree_lecon"],
            ":compterendu"  => $tab["compterendu"]
        );
        $exec->execute($donnees);
    }

    public function selectAll_lecons(){
        $requete = "select l.*, c.nomC, c.prenomC, m.nomM, m.prenomM, v.immat, v.marque, v.modele 
                    from lecon l
                    left join candidat c on l.id_candidat = c.id_candidat
                    left join moniteur m on l.id_moniteur = m.id_moniteur
                    left join vehicule v on l.id_vehicule = v.id_vehicule
                    ORDER BY l.date_lecon DESC;";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll();
    }

    public function selectLike_lecons($filtre){
        $requete = "select l.*, c.nomC, c.prenomC, m.nomM, m.prenomM, v.immat, v.marque, v.modele 
                    from lecon l
                    left join candidat c on l.id_candidat = c.id_candidat
                    left join moniteur m on l.id_moniteur = m.id_moniteur
                    left join vehicule v on l.id_vehicule = v.id_vehicule
                    where c.nomC like :filtre 
                    or c.prenomC like :filtre 
                    or m.nomM like :filtre 
                    or m.prenomM like :filtre
                    order by l.date_lecon DESC;";
        $donnees = array(":filtre" => "%".$filtre."%");
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetchAll();
    }

    public function delete_lecon($id_lecon){
        $requete = "delete from lecon where id_lecon = :id_lecon;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(":id_lecon" => $id_lecon);
        $exec->execute($donnees);
    }

    public function update_lecon($tab){
        $requete = "update lecon set 
                    id_candidat = :id_candidat, 
                    id_moniteur = :id_moniteur, 
                    id_vehicule = :id_vehicule, 
                    date_lecon = :date_lecon, 
                    libelle = :libelle,
                    duree_lecon = :duree_lecon, 
                    compterendu = :compterendu 
                    where id_lecon = :id_lecon;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(
            ":id_candidat"  => $tab["id_candidat"],
            ":id_moniteur"  => $tab["id_moniteur"],
            ":id_vehicule"  => $tab["id_vehicule"],
            ":date_lecon"   => $tab["date_lecon"],
            ":libelle"      => $tab["libelle"],
            ":duree_lecon"  => $tab["duree_lecon"],
            ":compterendu"  => $tab["compterendu"],
            ":id_lecon"     => $tab["id_lecon"]
        );
        $exec->execute($donnees);
    }

    public function selectWhere_lecon($id_lecon){
        $requete = "select l.*, c.nomC, c.prenomC, m.nomM, m.prenomM, v.immat, v.marque, v.modele 
                    from lecon l
                    left join candidat c on l.id_candidat = c.id_candidat
                    left join moniteur m on l.id_moniteur = m.id_moniteur
                    left join vehicule v on l.id_vehicule = v.id_vehicule
                    where l.id_lecon = :id_lecon;";
        $donnees = array(":id_lecon" => $id_lecon);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetch();
    }

    public function selectLecons_byCandidat($id_candidat){
        $requete = "select l.*, c.nomC, c.prenomC, m.nomM, m.prenomM, v.immat, v.marque, v.modele 
                    from lecon l
                    left join candidat c on l.id_candidat = c.id_candidat
                    left join moniteur m on l.id_moniteur = m.id_moniteur
                    left join vehicule v on l.id_vehicule = v.id_vehicule
                    where l.id_candidat = :id_candidat
                    order by l.date_lecon DESC;";
        $donnees = array(":id_candidat" => $id_candidat);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetchAll();
    }

                        /* gestion des examens */
    
    public function insert_examen($tab) {
        $requete = "insert into examen values (null, :id_candidat, :id_moniteur, :id_vehicule, :type_examen, :lieu_examen, :date_examen, :resultat, :remarques);";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(
            ":id_candidat"         => $tab["id_candidat"],
            ":id_moniteur"         => $tab["id_moniteur"],
            ":id_vehicule"         => $tab["id_vehicule"],
            ":type_examen"         => $tab["type_examen"],
            ":lieu_examen"         => $tab["lieu_examen"],
            ":date_examen"         => $tab["date_examen"],
            ":resultat"            => $tab["resultat"],
            ":remarques"           => $tab["remarques"],
        );
        $exec->execute($donnees);
    }

    public function selectAll_examens(){
        $requete = "select e.*, c.nomC, c.prenomC, m.nomM, m.prenomM, v.immat, v.marque, v.modele 
                    from examen e
                    left join candidat c on e.id_candidat = c.id_candidat
                    left join moniteur m on e.id_moniteur = m.id_moniteur
                    left join vehicule v on e.id_vehicule = v.id_vehicule
                    order by e.date_examen desc;";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll();
    }

    public function selectLike_examens($filtre){
        $requete = "select e.*, c.nomC, c.prenomC, m.nomM, m.prenomM, v.immat, v.marque, v.modele 
                    from examen e
                    left join candidat c on e.id_candidat = c.id_candidat
                    left join moniteur m on e.id_moniteur = m.id_moniteur
                    left join vehicule v on e.id_vehicule = v.id_vehicule
                    where c.nomC like :filtre 
                    or c.prenomC like :filtre 
                    or e.type_examen like :filtre
                    order by e.date_examen desc;";
        $donnees = array(":filtre" => "%".$filtre."%");
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetchAll();
    }

    public function delete_examen($id_examen){
        $requete = "delete from examen 
                    where id_examen = :id_examen;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(":id_examen" => $id_examen);
        $exec->execute($donnees);
    }

    public function update_examen($tab){
        $requete = "update examen set 
                    id_candidat = :id_candidat, 
                    id_moniteur = :id_moniteur, 
                    id_vehicule = :id_vehicule, 
                    type_examen = :type_examen,
                    lieu_examen = :lieu_examen, 
                    date_examen = :date_examen,
                    resultat = :resultat, 
                    remarques = :remarques, date_creation = :date_creation 
                    where id_examen = :id_examen;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = array(
            ":id_candidat"         => $tab["id_candidat"],
            ":id_moniteur"         => $tab["id_moniteur"],
            ":id_vehicule"         => $tab["id_vehicule"],
            ":type_examen"         => $tab["type_examen"],
            ":date_examen"         => $tab["date_examen"],
            ":resultat"            => $tab["resultat"],
            ":remarques"           => $tab["remarques"],
            ":id_examen"           => $tab["id_examen"]
        );
        $exec->execute($donnees);
    }

    public function selectWhere_examen($id_examen){
        $requete = "select e.*, c.nomC, c.prenomC, m.nomM, m.prenomM, v.immat, v.marque, v.modele 
                    from examen e
                    left join candidat c on e.id_candidat = c.id_candidat
                    left join moniteur m on e.id_moniteur = m.id_moniteur
                    left join vehicule v on e.id_vehicule = v.id_vehicule
                    where e.id_examen = :id_examen;";
        $donnees = array(":id_examen" => $id_examen);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetch();
    }

    public function selectExamens_byCandidat($id_candidat){
        $requete = "select e.*, c.nomC, c.prenomC, m.nomM, m.prenomM, v.immat, v.marque, v.modele 
                    from examen e
                    left join candidat c on e.id_candidat = c.id_candidat
                    left join moniteur m on e.id_moniteur = m.id_moniteur
                    left join vehicule v on e.id_vehicule = v.id_vehicule
                    where e.id_candidat = :id_candidat
                    order by e.date_examen desc;";
        $donnees = array(":id_candidat" => $id_candidat);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        return $exec->fetchAll();
    }

    public function count_examens_candidat($id_candidat){
        $requete = "select count(*) as nb from examen 
                    where id_candidat = :id_candidat;";
        $donnees = array(":id_candidat" => $id_candidat);
        $exec = $this->unPdo->prepare($requete);
        $exec->execute($donnees);
        $result = $exec->fetch();
        return $result['nb'];
    }
}
?>
