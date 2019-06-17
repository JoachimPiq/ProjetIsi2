@extends('template')

@section('titrePage')
    Ajouter un article
    @endsection
@section('titreItem')
    <h2>Ajouter un article</h2>
    @endsection

@section('contenu')
    @auth
        <div class="col-sm-offset-3 col-sm-6">
            <div class="card">
                <div class="card-header">Créer un article</div>
                <div class="card-body">
                    {!! Form::open(['url'=>'saisieArticle']) !!}
                    <div class="form-group {!! $errors->has('titreArticle') ? 'has-error' :'' !!}">
                        {!! Form::text('titreArticle', null,['class'=>'form-control','placeholder' => 'Titre de l article']) !!}
                        {!! $errors->first('titreArticle','<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('contenuArticle') ? 'has-error' : '' !!}">
                        {!! Form::textarea ('contenuArticle', null, ['class' => 'form-control', 'placeholder' => 'Contenue de l article']) !!}
                        {!! $errors->first('contenuArticle', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Valider', ['class' => 'btn btn-info pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @else
        <a href="{{route('login')}}">Se connecter</a> pour ajouter un article.
    @endauth

    @endsection