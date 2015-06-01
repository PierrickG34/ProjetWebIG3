<?php

	include('../connexion.php');

	class Films
	{
		private $nom_film;
		private $date_sortie_film;
		private $synopsis_film;
		private $id_genre;
		private $lien_img_film;
		private $duree_min_film;
		private $id_realisateur;
		private $db;

		/* Constructeur */
		public function __construct ($nom_film, $date_sortie_film, $synopsis_film, $id_genre, $lien_img_film, $duree_min_film, $id_realisateur)
		{
			$this->nom_film = $nom_film;
			$this->date_sortie_film = $date_sortie_film;
			$this->synopsis_film = $synopsis_film;
			$this->id_genre = $id_genre;
			$this->lien_img_film = $lien_img_film;
			$this->duree_min_film = $duree_min_film;
			$this->id_realisateur = $id_realisateur;
			$this->db = new PDO('mysql:host=sql2.olympe.in;dbname=7wlzo6a0;charset=utf8', '', '');
		}

		/* Insére un film */
		public function insertFilms()
		{
			$query = $this->db->prepare("INSERT INTO Films (nom_film, date_sortie_film, synopsis_film, id_genre, lien_img_film, duree_min_film, id_realisateur) VALUES (:nom_film, :date_sortie_film, :synopsis_film, :id_genre, :lien_img_film, :duree_min_film, :id_realisateur);"); // Creer la requete d'ajout."
			$val = $query->execute(array(
				'nom_film' => $this->nom_film,
				'date_sortie_film' => $this->date_sortie_film,
				'synopsis_film' => $this->synopsis_film,
				'id_genre' => $this->id_genre,
				'lien_img_film' => $this->lien_img_film,
				'duree_min_film' => $this->duree_min_film,
				'id_realisateur' => $this->id_realisateur
				));
			return $val;
		}

		/* Supprime un film */
		public function supprFilms()
		{
			$query = $this->db->prepare("DELETE FROM Films WHERE nom_film = :nom_film");
			$val = $query->execute(array(
				'nom_film' => $this->nom_film
				));
			return $val;
		}
		
		/* Selectionne tous les films */
		public function selectAllFilms()
		{
			$query = $this->db->prepare("SELECT nom_film, date_sortie_film, synopsis_film, id_genre, lien_img_film, duree_min_film, id_realisateur FROM Films");
			$query->execute();
			return $query->fetchAll();
		}

		/* Récupere les informations sur un film suivant sa premiere lettre*/
		public function orderFilmsByFirstLetter($premiereLettre)
		{
			$query = $this->db->prepare("SELECT nom_film, id_genre, id_realisateur FROM Films WHERE nom_film LIKE :premiereLettre");
			$query->execute(array(
				'premiereLettre' => $premiereLettre . '%'
				));
			return $query;
		}

		/* Récupere les informations d'un film grace a son nom, pour la recherche*/
		public function rechercheByFilms($recherche)
		{
			//On ne peut pas mettre les '%' du LIKE directement dans la requete, on va donc le rajouter en le concatenant lors de l'execute()
			$query = $this->db->prepare("SELECT * FROM Films WHERE nom_film LIKE :recherche");
			$query->execute(array(
				'recherche' => '%' . $recherche .'%'));
			return $query->fetchAll();
		}

		/* Recupere les informations d'un film par son nom */
		public function selectAllFilmsWhere($nomFilm)
		{
			$query = $this->db->prepare("SELECT nom_film, date_sortie_film, synopsis_film, id_genre, lien_img_film, duree_min_film, id_realisateur FROM Films WHERE nom_film = :nomFilm;");
			$query->execute(array(
				'nomFilm' => $nomFilm
				));
			return $query->fetchAll();
		}
	}