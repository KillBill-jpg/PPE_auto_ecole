<?php 
require_once('modele/modele.php');

class Controleur {
 
    private $unModele;
    
    public function __construct(){
        $this->unModele = new Modele();
    }
 

    // ***************** gestion des users ***************** 

    public function select_user($email, $mdp){
        $unUser = $this->unModele->select_user($email, $mdp);
        return $unUser;
    }

    public function insert_user($tab){
        $this->unModele->insert_user($tab);
    }


    // ***************** gestion des candidats ***************** 

    public function insert_candidat($tab){
        $this->unModele->insert_candidat($tab);
    }

    public function selectAll_candidats(){
        $lesCandidats = $this->unModele->selectAll_candidats();
        return $lesCandidats; 
    }

    public function selectLike_candidats($filtre){
        $lesCandidats = $this->unModele->selectLike_candidats($filtre); 
        return $lesCandidats; 
    }

    public function delete_candidat($id_candidat){
        $this->unModele->delete_candidat($id_candidat);
    }

    public function update_candidat($tab){
        $this->unModele->update_candidat($tab);
    }

    public function selectWhere_candidat($id_candidat){
        $unCandidat = $this->unModele->selectWhere_candidat($id_candidat);
        return $unCandidat;
    }

    public function count_lecons_candidat($id_candidat){
        return $this->unModele->count_lecons_candidat($id_candidat);
    }


    // ***************** gestion des moniteurs ***************** 

    public function insert_moniteur($tab){
        $this->unModele->insert_moniteur($tab);
    }

    public function selectAll_moniteurs(){
        $lesMoniteurs = $this->unModele->selectAll_moniteurs();
        return $lesMoniteurs;
    }

    public function selectLike_moniteurs($filtre){
        $lesMoniteurs = $this->unModele->selectLike_moniteurs($filtre); 
        return $lesMoniteurs; 
    }

    public function delete_moniteur($id_moniteur){
        $this->unModele->delete_moniteur($id_moniteur);
    }

    public function update_moniteur($tab){
        $this->unModele->update_moniteur($tab);
    }

    public function selectWhere_moniteur($id_moniteur){
        $unMoniteur = $this->unModele->selectWhere_moniteur($id_moniteur);
        return $unMoniteur;
    }


    // ***************** gestion des véhicules ***************** 

    public function insert_vehicule($tab){
        $this->unModele->insert_vehicule($tab);
    }

    public function selectAll_vehicules(){
        $lesVehicules = $this->unModele->selectAll_vehicules();
        return $lesVehicules;
    }

    public function selectLike_vehicules($filtre){
        $lesVehicules = $this->unModele->selectLike_vehicules($filtre); 
        return $lesVehicules; 
    }

    public function delete_vehicule($id_vehicule){
        $this->unModele->delete_vehicule($id_vehicule);
    }

    public function update_vehicule($tab){
        $this->unModele->update_vehicule($tab);
    }

    public function selectWhere_vehicule($id_vehicule){
        $unVehicule = $this->unModele->selectWhere_vehicule($id_vehicule);
        return $unVehicule;
    }


    // ***************** gestion des leçons ***************** 

    public function insert_lecon($tab){
        $this->unModele->insert_lecon($tab);
    }

    public function selectAll_lecons(){
        $lesLecons = $this->unModele->selectAll_lecons();
        return $lesLecons;
    }

    public function selectLike_lecons($filtre){
        $lesLecons = $this->unModele->selectLike_lecons($filtre); 
        return $lesLecons; 
    }

    public function delete_lecon($id_lecon){
        $this->unModele->delete_lecon($id_lecon);
    }

    public function update_lecon($tab){
        $this->unModele->update_lecon($tab);
    }

    public function selectWhere_lecon($id_lecon){
        $uneLecon = $this->unModele->selectWhere_lecon($id_lecon);
        return $uneLecon;
    }

    public function selectLecons_byCandidat($id_candidat){
        $lesLecons = $this->unModele->selectLecons_byCandidat($id_candidat);
        return $lesLecons;
    }
}
 
?>
