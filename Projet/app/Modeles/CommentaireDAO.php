<?php

namespace App\Modeles;
use DB;
use App\Metier\Commentaire;
use Illuminate\Database\Eloquent\Model;

class CommentaireDAO extends Model
{
    //
    public function getLesCommentaires($idArticle)
    {
        $lesCommentaires= array();
        $commentaires=DB::table('commentaire')->select('idCom','idUser','contenuCom')->where('idArticle','=',$idArticle)->get();
        if($commentaires)
        {
            foreach($commentaires as $leCommentaire){
                $user = new UserDAO();
                $leUser= $user->retrieveById($leCommentaire->idUser);
                $idCom = $leCommentaire->idCom;
                $lesCommentaires[$idCom] = $this->creerObjetMetier($leCommentaire);
                $lesCommentaires[$idCom] -> setAuteurCom($leUser);
            }
        }
        return $lesCommentaires;
    }
    protected function creerObjetMetier(\stdClass $objet)
    {
        $leCommentaire = new Commentaire();
        $leCommentaire->setIdCom($objet->idCom);
        $leCommentaire->setContenuCom($objet->contenuCom);
        return $leCommentaire;
    }

    public function creationCommentaire(Commentaire $monCommentaire,$idArticle)
    {
        DB::table('commentaire')->insert(['contenuCom'=>$monCommentaire->getContenuCom(),'idUser'=>$monCommentaire->getAuteurCom()->getAuthIdentifier(),'idArticle'=>$idArticle]);
    }
}
