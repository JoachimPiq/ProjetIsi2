@extends('template')

@section('titrePage')
    Ajouter une conférence
@endsection

@section('titreItem')
    <h1>Ajouter une conférence</h1>
@endsection

@section('contenu')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="card">
            <div class="card-header">Créer une conférence</div>
            <div class="card-body">
                {!! Form::open(['url' => 'saisieConference']) !!}
                <div class="form-group {!! $errors->has('intituleConf') ? 'has-error' : '' !!}">
                    {!! Form::text('intituleConf', null, ['class' => 'form-control', 'placeholder' => 'Intitulé de la conférence']) !!}
                    {!! $errors->first('intituleConf', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('descriptionConf') ? 'has-error' : '' !!}">
                    {!! Form::textarea ('descriptionConf', null, ['class' => 'form-control', 'placeholder' => 'Description de la conférence']) !!}
                    {!! $errors->first('descriptionConf', '<small class="help-block">:message</small>') !!}
                </div>
                {!! Form::submit('Valider', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <p></p>
@endsection