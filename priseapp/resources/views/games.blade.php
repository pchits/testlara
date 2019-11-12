@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Saved Games</div>

                <div class="card-body">
                    <ul>
                        @foreach($games as $g)
                            <li>
                                <strong>
                                    {{ $g->user->name }}
                                </strong>
                                <strong>
                                    {{ $g->prise_type }}
                                </strong>
                                <strong>
                                    {{ $g->prise_value }}
                                </strong>
                                <strong>
                                    {{ $g->status }}
                                </strong>
                                <strong>
                                    <?php if ($g->prise): ?>
                                        {{ $g->prise->name }}
                                    <?php endif; ?>
                                </strong>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
