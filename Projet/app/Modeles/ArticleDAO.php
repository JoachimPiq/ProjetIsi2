<?php

namespace App\Modeles;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Metier\Article;
class ArticleDAO extends DAO
{
    //Return all articles stored in database

    public function getLesArticles()
    {
        $articles = DB::table('article')->get();
        $lesArticles = array();
        foreach($articles as $larticle) {
            $user = new UserDAO();
            $leUser= $user->retrieveById($larticle->idUser);
            $idArticle = $larticle->idArticle;
            $lesArticles[$idArticle] = $this->creerObjetMetier($larticle);
            $lesArticles[$idArticle]-> setAuteurArticle($leUser);

        }
        return $lesArticles;
    }

    protected function creerObjetMetier(\stdClass $unArticle)
    {
        $larticle = new Article();
        $larticle->setIdArticle($unArticle->idArticle);
        $larticle->setTitreArticle($unArticle->titreArticle);
        $larticle->setContenueArticle($unArticle->contenuArticle);
        $commentaireDao = new CommentaireDAO();
        $lesCommentaires = $commentaireDao->getLesCommentaires($unArticle->idArticle);
        if($lesCommentaires){
            $larticle->setLesCommentaires($lesCommentaires);
        }
        else
            $larticle->setLesCommentaires(null);
        return $larticle;
    }
    public function getArticleById($idArticle)
    {
        $monArticle = DB::table('article')->where('idArticle','=',$idArticle)->first();
        $user = new UserDAO();
        $leUser= $user->retrieveById($monArticle->idUser);
        $article = $this->creerObjetMetier($monArticle);
        $article->setAuteurArticle($leUser);
        return $article;
    }

    public function creationArticle(Article $monArticle)
    {
        DB::table('article')->insert(['titreArticle'=>$monArticle->getTitreArticle(),'contenuArticle'=>$monArticle->getContenueArticle(),'idUser'=>$monArticle->getAuteurArticle()->getAuthIdentifier()]);
    }
}
