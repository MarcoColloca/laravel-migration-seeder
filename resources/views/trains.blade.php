@extends('layouts.app')

@section('title', 'Treni')

@section('main-content')
    <section class="mt-5 py-1">
        <div class="container bg-dark py-4">
            <h1 class="title text-center text-success">Treni!</h1>
        </div>
    </section>
    

    <div class="section py-5">
        <div class="container">
            <div class="row g-5">
                @foreach ($trains as $train)
                    @if ($train->departure_time >= $date)                    
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <p><span class="text-danger">Agenzia: </span> {{$train->agency}}</p>
                                <p><span class="text-danger">Stazione di Partenza: </span>{{$train->departure_station}}</p>
                                <p><span class="text-danger">Stazione di Arrivo: </span> {{$train->arrival_station}}</p>
                                <p><span class="text-danger">Orario di Partenza: </span> {{$train->departure_time}}</p>
                                <p><span class="text-danger">Orario di Arrivo: </span> {{$train->arrival_time}}</p>
                                <p><span class="text-danger">Carrozze: </span> {{$train->train_carriages}}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                
                @endforeach
            </div>
        </div>
    </div>
@endsection