@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div>
                Your mana level: {{ $your_mana }}
            </div>

            @if ($current_game)
                <div class="card">
                    <div class="card-header">Last Game</div>

                    <div class="card-body">

                        <blockquote class="blockquote">
                            <strong>{{ $current_game->prise_type }}</strong>
                            <span>{{ $current_game->prise_value }}</span>
                            {{ $current_prise }}
                        </blockquote>
                        
                        {{ Form::open(array('action'=>'GamesController@save')) }}
                            <div class="form-group">
                                {{ Form::submit('Take the prise', array('class'=>'btn btn-success')) }}
                            </div>
                        {{ Form::close() }}

                        @if ($current_game->prise_type == 'money')

                            {{ Form::open(array('action'=>'GamesController@convert')) }}
                                <div class="form-group">
                                    {{ Form::submit('Convert to mana', array('class'=>'btn btn-danger')) }}
                                </div>
                            {{ Form::close() }}
                        @endif

                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-header">New game</div>

                <div class="card-body">
                    {{ Form::open(array('action'=>'GamesController@generate')) }}
                        <div class="form-group">
                            {{ Form::submit('Play!', array('class'=>'btn btn-primary')) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
