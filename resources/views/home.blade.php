@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                    <!--Formulario de recebimento do csv-->
                    <form method="POST" action="{{route('processamento-csv')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="csv" class="form-label">Selecione o arquivo CSV</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="csv">
                            <div id="emailHelp" class="form-text">Arquivo csv</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
