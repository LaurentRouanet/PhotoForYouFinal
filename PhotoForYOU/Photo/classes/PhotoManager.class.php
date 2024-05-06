<?php
class PhotoManager
{
	private $_db;

	public function __construct($db)
	{
		$this->setDB($db);
	}

	public function add(Photo $photo)
	{
		$q = $this->_db->prepare('INSERT INTO photos(nom_photo,taille_pixels_x,taille_pixels_y,poids) VALUES( :nom_photo, :taille_pixels_x, :taille_pixels_y, :poids)');
		$q->bindValue(':nom_photo', $photo->getNomPhoto());
		$q->bindValue(':taille_pixels_x', $photo->getTaillesPixelsX());
		$q->bindValue(':taille_pixels_y', $photo->getTaillesPixelsY());
		$q->bindValue(':poids', $photo->getPoids());
		$q->execute();

		$photo->hydrate([
			'Id' => $this->_db->lastInsertId(),
			'Credit' => 0
		]);
	}


	public function setPoids($poids)
    {
        $this->_poids = $poids;
    }



	public function getUser($sonMail)
	{
		$q = $this->_db->query('SELECT id, Prenom, Mail, Mdp, Type FROM users WHERE Mail = "' . $sonMail . '"');
		$photoInfo = $q->fetch(PDO::FETCH_ASSOC);
		if ($photoInfo) {
			return new User($photoInfo);
		} else {
			return $photoInfo;
		}
	}

	public function count()
	{
		return $this->_db->query("SELECT COUNT(*) FROM users")->fetchColumn();
	}

	public function exists($mailUser, $mdpUser)
	{
		$q = $this->_db->prepare('SELECT COUNT(*) FROM users WHERE mail = :mail AND mdp = :mdp');
		$q->execute([':mail' => $mailUser, ':mdp' => md5($mdpUser)]);
		return (bool) $q->fetchColumn();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}
?>