@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                    <div class="card-header">Add new Prise</div>
    
                    <div class="card-body">

                        {{ Form::open(array('route' => 'prises.create')) }}
                            <div class="form-group">
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::number('quantity', 1, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Add Prise', array('class'=>'btn btn-primary')) }}
                            </div>
                        {{ Form::close() }}

                    </div>
            </div>

            <div class="card">
                <div class="card-header">Prises</div>

                <div class="card-body">
                    <ul>
                        @foreach($prises as $p)
                            <li>
                                <strong>
                                    {{ $p->name }}
                                </strong>: 
                                <span>
                                    {{ $p->quantity }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
