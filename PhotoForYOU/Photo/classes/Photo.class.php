<?php
class Photo
{
	// Attributs
	private $_id_photo;
	private $_nomphoto;
	private $_tailles_pixels_x;
	private $_tailles_pixels_y;
	private $_poids;
	private $_nbrdephoto;
	private $_lien;
	private $_date_publication;

	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}

	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value) {
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

	// Getters

	public function getIdPhoto()
	{
		return $this->_id_photo;
	}

	public function getNomPhoto()
	{
		return $this->_nomphoto;
	}

	public function getTaillesPixelsX()
	{
		return $this->_tailles_pixels_x;
	}

	public function getTaillesPixelsY()
	{
		return $this->_tailles_pixels_y;
	}

	public function getPoids()
	{
		return $this->_poids;
	}

	public function getNbrdePhotos()
	{
		return $this->_nbrdephoto;
	}

	public function getLien()
	{
		return $this->_lien;
	}

	public function getDatePublication()
	{
		return $this->_date_publication;
	}

	// Setters

	public function setIdPhoto($idphoto)
    {
        $idphoto = (int) $idphoto;
        if ($idphoto > 0)
        {
            $this->id_Photo = $Sidphoto;
        }
    }


	public function setNomPhoto($nomphoto)
	{
		if (is_string($nomphoto))
		{
			$this->_nomphoto = $nomphoto;
		}	
	}

	public function setTaillesPixelsX($tailles_pixels_x)
	{
		
		{
			$this->_tailles_pixels_x = $tailles_pixels_x;
		}
	}
	
	public function setTaillesPixelsY($tailles_pixels_y)
	{
		$this->_tailles_pixels_y = $tailles_pixels_y;
	}

	public function setPoids($poids)
	{
		$this->poids = $poids;
	}

	public function setNbrdephoto($nbrdephoto)
	{
		$this->_nbrdephoto = $nbrdephoto;
	}

	public function setLien($lien)
	{
		$this->_lien = $lien;
	}

	public function setDatePublication($date_publication)
	{
		$this->_date_publication = $date_publication;
	}
}
?>