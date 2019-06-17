<?php


namespace App\Metier;


class Article
{
    private $idArticle;
    private $titreArticle;
    private $contenueArticle;
    private $auteurArticle;
    private $lesCommentaires=array();

    public function getIdArticle()
    {
        return $this->idArticle;
    }

    public function setIdArticle($idArticle)
    {
        $this->idArticle=$idArticle;
    }
    public function getTitreArticle()
    {
        return $this->titreArticle;

    }
    public function setTitreArticle($titreArticle)
    {
        $this->titreArticle = $titreArticle;
    }
    public function getContenueArticle()
    {
        return $this->contenueArticle;

    }
    public function setContenueArticle($contenueArticle)
    {
        $this->contenueArticle = $contenueArticle;
    }
    public function getAuteurArticle()
    {
        return $this->auteurArticle;
    }

    public function setAuteurArticle($auteurArticle)
    {
        $this->auteurArticle=$auteurArticle;
    }

    /**
     * @return array
     */
    public function getLesCommentaires()
    {
        return $this->lesCommentaires;
    }

    /**
     * @param array $lesCommentaires
     */
    public function setLesCommentaires($lesCommentaires): void
    {
        $this->lesCommentaires = $lesCommentaires;
    }
}