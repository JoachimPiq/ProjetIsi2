<?php


namespace App\Metier;


class Commentaire
{
    private $idCom;
    private $auteurCom;
    private $contenuCom;

    /**
     * @return mixed
     */
    public function getIdCom()
    {
        return $this->idCom;
    }

    /**
     * @return mixed
     */
    public function getAuteurCom()
    {
        return $this->auteurCom;
    }

    /**
     * @param mixed $idCom
     */
    public function setIdCom($idCom): void
    {
        $this->idCom = $idCom;
    }
    /**
     * @param mixed $auteurCom
     */
    public function setAuteurCom( $auteurCom): void
    {
        $this->auteurCom = $auteurCom;
    }
    /**
     * @return mixed
     */
    public function getContenuCom()
    {
        return $this->contenuCom;
    }

    /**
     * @param mixed $contenuCom
     */
    public function setContenuCom($contenuCom): void
    {
        $this->contenuCom = $contenuCom;
    }
}