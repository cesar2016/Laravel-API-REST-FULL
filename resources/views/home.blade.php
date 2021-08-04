@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">{{ __('COTIZATION DOLLAR IN ARGENTINA') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>ENDPOINT FOR U$D </h3>
                    <strong>{{ __('https://api-dolar-argentina.herokuapp.com/api/dolaroficial') }}</strong>
                    @php
                    
                    echo '<pre>'; print_r($USD);
                    @endphp                    
                </div>
                <div class="container">
                    <h4>ENDPOINTS INTERNALS THIS APP</h4>
                    <div class="alert alert-primary"> 
                        <strong>CLIENTS</strong>                     
                    </div>
                    <ul>
                        <li>GET: <strong>http://apifull.test/api/clients</strong> (get all clients) </li>
                        <li>POST: <strong>http://apifull.test/api/client/create</strong> (create new clients) </li>
                        <li>GET: <strong>http://apifull.test/api/client/find/{id}</strong> (search clients for ID) </li>
                        <li>DELETE: <strong>http://apifull.test/api/client/delete/{id}</strong> (Delete one clients) </li>
                        <li>PUT: <strong>http://apifull.test/api/client/update/{id}</strong> (upgrade clients) </li>
                        
                    </ul>
                    <div class="alert alert-primary"> 
                        <strong>PRODUCTS</strong>                     
                    </div>
                    <ul>
                        <li>GET: <strong>http://apifull.test/api/product</strong> (get all products) </li>
                        <li>POST: <strong>http://apifull.test/api/product</strong> (create new product) </li>                       
                        <li>DELETE: <strong>http://apifull.test/api/product/{id}</strong> (Delete one product) </li>
                        <li>PUT: <strong>http://apifull.test/api/product/{id}</strong> (upgrade product) </li>
                        
                    </ul>

                </div>
            </div>
        </div>
        <ul class="list-group">
            <li class="list-group-item active">DOLLAR TODAY</li>            
                <small class="list-group-item">
                    {{date('d-M-y', strtotime($USD['fecha'])) }}
                </small>
                <li class="list-group-item">COMPRA <strong>{{$USD['compra']}}</strong></li>
                <li class="list-group-item">VENTA <strong>{{$USD['venta']}}</strong></li>                    
            {{-- @endforeach --}}            
             
        </ul>
    </div>
</div>
@endsection
