@extends('template')

@section('titrePage')
    {{$larticle->getTitreArticle()}}
    @endsection
@section('titreItem')
    <h1>{{$larticle->getTitreArticle()}}</h1>
    @endsection

@section('contenu')
    <article>
        <p>{{$larticle->getContenueArticle()}}</p>
        <p>{{($larticle->getAuteurArticle())->getAuthIdentifierName()}}</p>
    </article>
    <br>
    <h2>Comentaires :</h2>
    @if($lesCommentaires)
        @foreach($lesCommentaires as $commentaire)
            <commentaire>
                <h3>{{$commentaire->getAuteurCom()->getAuthIdentifierName()}}</h3>
                <p>{{$commentaire->getContenuCom()}}</p>
            </commentaire>
        @endforeach
    @else
        <strong>Pas encore de commentaire pour cette article</strong>
    @endif
    <h2>Ajouter un commentaire</h2>
    @auth
        <div class="col-sm-offset-3 col-sm-6">
            <div class="card">
                <div class="card-header">Ecrire un commentaire</div>
                <div class="card-body">
                    {!! Form::open(['url'=>'saisieCommentaire/' ]) !!}
                    <div class="form-group {!! $errors->has('contenuCommentaire') ? 'has-error' : '' !!}">
                        {!! Form::textarea ('contenuCommentaire', null, ['class' => 'form-control', 'placeholder' => 'Contenue du commentaire']) !!}
                        {!! $errors->first('contenuCommentaire', '<small class="help-block">:message</small>') !!}
                    </div>
                    <input type="hidden" name="articleId" value={{$larticle->getIdArticle()}}/>
                    {!! Form::submit('Valider', ['class' => 'btn btn-info pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>    @else
    <a href="{{route('login')}}">Se connecter</a> pour ajouter un commentaire.
    @endauth

    @endsection
