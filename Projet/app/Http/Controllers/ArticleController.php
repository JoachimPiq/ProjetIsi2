<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertionArticleRequest;
use App\Http\Requests\InsertionCommentaireRequest;
use App\Metier\Article;
use App\Metier\Commentaire;
use App\Modeles\ArticleDAO;
use App\Modeles\CommentaireDAO;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //Selectionner tous les articles
    public function getLesArticles(){
        $article = new ArticleDAO();
        $lesArticles = $article->getLesArticles();
        return view('listerArticles',compact('lesArticles'));
    }

    public function getArticleById($idArticle)
    {
        $article = new ArticleDAO();
        $larticle = $article->getArticleById($idArticle);
        $lesCommentaires = $larticle->getLesCommentaires();
        return view('afficherArticle',compact('larticle','lesCommentaires'));

    }
    public function ajoutArticle()
    {
        return view('formAjoutArticle');
    }

    public function postAjoutArticle(InsertionArticleRequest $request)
    {
        $monArticle=new Article();

        $monArticle->setTitreArticle($request->input('titreArticle'));
        $monArticle->setContenueArticle($request->input('contenuArticle'));
        $monArticle->setAuteurArticle(auth()->user());
        $monArticleDAO = new ArticleDAO();
        $monArticleDAO->creationArticle($monArticle);
        return view('insertionOK');
    }

    public function postAjoutCommentaire(InsertionCommentaireRequest $request)
    {
        $monCommentaire = new Commentaire();

        $monCommentaire->setContenuCom(($request->input('contenuCommentaire')));
        $monCommentaire->setAuteurCom(auth()->user());
        $monCommentaireDao =new CommentaireDAO();
        $articleIdBis = substr($request->input('articleId'),0,1);
        $monCommentaireDao->creationCommentaire($monCommentaire,$articleIdBis  );
        return view('insertionOK');
    }
}
