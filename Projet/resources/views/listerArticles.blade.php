@extends('template')

@section('titrePage')
    Liste des articles
    @endsection
@section('titreItem')
    <h1>Les articles</h1>
    @endsection
@section('contenu')
    @foreach ($lesArticles as $article)
        <article>
            <h2>{{$article->getTitreArticle()}}</h2>
            <p>{{$article->getContenueArticle()}}</p>
            <div class="lireSuite"><a href="{{ url('/Article') }}/{{ $article->getIdArticle() }}">Afficher ou ajouter des commentaires</a></div>
        </article>
        @endforeach
    @endsection
