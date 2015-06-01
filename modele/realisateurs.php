<?php

	include('../connexion.php');

	class realisateurs
	{
		private $id_realisateur;
		private $prenom_realisateur;
		private $nom_realisateur;
		private $natio_realisateur;
		private $date_naiss_realisateur;
		private $nb_film;
		private $lien_img_realisateur;
		private $db;

		/* Constructeur */
		public function __construct ($id_realisateur, $prenom_realisateur, $nom_realisateur, $natio_realisateur, $date_naiss_realisateur, $nb_film, $lien_img_realisateur)
		{
			$this->id_realisateur = $id_realisateur;
			$this->prenom_realisateur = $prenom_realisateur;
			$this->nom_realisateur = $nom_realisateur;
			$this->natio_realisateur = $natio_realisateur;
			$this->date_naiss_realisateur = $date_naiss_realisateur;
			$this->nb_film = $nb_film;
			$this->lien_img_realisateur = $lien_img_realisateur;
			$this->db = new PDO('mysql:host=sql2.olympe.in;dbname=7wlzo6a0;charset=utf8', '', '');
		}

		/* Insere un realisateur dans la base de données */
		public function insertRealisateurs()
		{
			$query = $this->db->prepare("INSERT INTO Realisateurs (id_realisateur, nom_realisateur, prenom_realisateur, natio_realisateur, date_naiss_realisateur, nb_films, lien_img_realisateur)
				VALUES (:id_realisateur, :nom_realisateur, :prenom_realisateur, :natio_realisateur, :date_naiss_realisateur, :nb_films, :lien_img_realisateur);");
			$val = $query->execute(array(
				'id_realisateur' => $this->id_realisateur,
				'nom_realisateur' => $this->nom_realisateur,
				'prenom_realisateur' => $this->prenom_realisateur,
				'natio_realisateur' => $this->natio_realisateur,
				'date_naiss_realisateur' => $this->date_naiss_realisateur,
				'nb_films' => 0	,
				'lien_img_realisateur' => $this->lien_img_realisateur
				));
			return $val;
		}

		/* Supprime un réalisateur de la base de données */
		public function supprRealisateurs()
		{
			$query = $this->db->prepare("DELETE FROM Realisateurs WHERE prenom_realisateur= :prenom_realisateur");
			$val = $query->execute(array(
				'prenom_realisateur' => $this->prenom_realisateur
				));
			return $val;
		}
		
		/* Recupere tous les réalisateurs de la base de données */
		public function selectAllRealisateurs()
		{
			$query = $this->db->prepare("SELECT id_realisateur, nom_realisateur, prenom_realisateur, natio_realisateur, date_naiss_realisateur, nb_films, lien_img_realisateur FROM Realisateurs");
			$query->execute();
			return $query->fetchAll();
		}

		/* Récupere toutes les informations d'un réalisateurs par son prenom */
		public function rechercheByRealisateurPrenoms($recherche)
		{
			//On ne peut pas mettre les '%' du LIKE directement dans la requete, on va donc le rajouter en le concatenant lors de l'execute()
			$query = $this->db->prepare("SELECT * FROM Realisateurs WHERE prenom_realisateur LIKE :recherche");
			$query->execute(array(
				'recherche' => '%' . $recherche .'%'));
			return $query->fetchAll();
		}

		/* Récupere toutes les informations d'un réalisateurs par son om */
		public function rechercheByRealisateurNoms($recherche)
		{
			//On ne peut pas mettre les '%' du LIKE directement dans la requete, on va donc le rajouter en le concatenant lors de l'execute()
			$query = $this->db->prepare("SELECT * FROM Realisateurs WHERE nom_realisateur LIKE :recherche");
			$query->execute(array(
				'recherche' => '%' . $recherche .'%'));
			return $query->fetchAll();
		}

		/* Récupere le prenom et le nom par l'id du réalisateur */
		public function selectNomRealisateur()
		{
			$query = $this->db->prepare("SELECT prenom_realisateur, nom_realisateur FROM Realisateurs WHERE id_realisateur = :id_realisateur");
			$query->execute(array(
				'id_realisateur' => $this->id_realisateur
				));
			return $query->fetchAll();
		}

		/* Recupere les informations d'un réalisateur par son nom et prenom */
		public function selectAllRealisateursWhere()
		{
			$query = $this->db->prepare("SELECT nom_realisateur, prenom_realisateur, natio_realisateur, date_naiss_realisateur, nb_films, lien_img_realisateur FROM Realisateurs WHERE nom_realisateur = :nom_realisateur AND prenom_realisateur = :prenom_realisateur;");
			$query->execute(array(
				'nom_realisateur' => $this->nom_realisateur,
				'prenom_realisateur' => $this->prenom_realisateur
				));
			return $query->fetchAll();
		}

		/* Récupere toutes les réalisateurs commençant par une certaine lettre */
		public function orderRealisateursByFirstLetter($premiereLettre)
		{
			$query = $this->db->prepare("SELECT nom_realisateur, prenom_realisateur FROM Realisateurs WHERE nom_realisateur LIKE :premiereLettre");
			$query->execute(array(
				'premiereLettre' => $premiereLettre . '%'
				));
			return $query;
		}

		/* Pas besoin de le gérer à la main, les triggers marchent en ligne 
		public function augmenteNbFilm()
		{
			$query = $this->db->prepare("UPDATE Realisateurs SET nb_films = nb_films+1 WHERE id_realisateur = :id_realisateur");
			$query->execute(array(
				'id_realisateur' => $this->id_realisateur));
			return $query;
		}

		public function diminueNbFilm()
		{
			$query = $this->db->prepare("UPDATE Realisateurs SET nb_films = nb_films-1 WHERE id_realisateur = :id_realisateur");
			$query->execute(array(
				'id_realisateur' => $this->id_realisateur));
			return $query;
		}*/
	}