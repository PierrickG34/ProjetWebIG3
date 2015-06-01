<?php

	include('../connexion.php');

	class Genres
	{
		private $id_genre;
		private $lib_genre;
		private $db;


		/* Constructeur */
		public function __construct ($id_genre, $lib_genre)
		{
			$this->id_genre = $id_genre;
			$this->lib_genre = $lib_genre;
			$this->db = new PDO('mysql:host=sql2.olympe.in;dbname=7wlzo6a0;charset=utf8', '', '');
		}

		/* Insérer un nouveau genre */
		public function insertGenres ()
		{
			$query = $this->db->prepare("INSERT INTO Genres (id_genre, lib_genre) VALUES ('', :lib_genre);");
			$val = $query->execute(array(
				'lib_genre' => $this->lib_genre
				));
			return $val;
		}

		/* Supprime un genre par son id*/
		public function supprGenres()
		{
			$query = $this->db->prepare("DELETE FROM Genres WHERE id_genre= :id_genre");
			$val = $query->execute(array(
				'id_genre' => $this->id_genre
				));
			return $val;
		}
		
		/* Selectionne tous les genres */
		public function selectAllGenres()
		{
			$query = $this->db->prepare("SELECT id_genre, lib_genre FROM Genres");
			$query->execute();
			return $query->fetchAll();
		}

		/* Récupére les genes par nom*/
		public function rechercheByGenres($recherche)
		{
			//On ne peut pas mettre les '%' du LIKE directement dans la requete, on va donc le rajouter en le concatenant lors de l'execute()
			$query = $this->db->prepare("SELECT * FROM Genres WHERE lib_genre LIKE :recherche");
			$query->execute(array(
				'recherche' => '%' . $recherche .'%'));
			return $query->fetchAll();
		}

		/* Récupere le nom d'un genre par son ID */
		public function selectNomGenre()
		{
			$query = $this->db->prepare("SELECT lib_genre FROM Genres WHERE id_genre = :id_genre");
			$query->execute(array(
				'id_genre' => $this->id_genre
				));
			return $query->fetchAll();
		}

	}