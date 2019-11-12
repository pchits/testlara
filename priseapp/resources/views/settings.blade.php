@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Settings</div>

                <div class="card-body">
                    {{ Form::open(array('route' => 'settings.create')) }}
                        <div class="form-group">
                            {{ Form::number('money_max', $settings->money_max, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::number('money_min', $settings->money_min, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::number('money_limit', $settings->money_limit, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::number('mana_min', $settings->mana_min, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::number('mana_max', $settings->mana_max, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::number('conversion_coef', $settings->conversion_coef, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
