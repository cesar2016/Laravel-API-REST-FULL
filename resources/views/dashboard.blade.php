<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('WELCOME API REST FULL LARAVEL') }}
        </h2>
    </x-slot>

   <p></p>
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
                    <div class="jumbotron">
                        <div class="alert alert-primary"> 
                            <strong>Querys from GuzzleHTTP</strong> 
                        </div>
                        <p><strong>Select to endpoint</strong></p> 
                        <form action="{{ route('guzz')}}" method="POST" >
                            @method('POST')
                            @csrf                 
                           
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                      <i class="custom-control-input" id="customControlAutosizing"></i>
                                      <label class="custom-control-label" for="customControlAutosizing">GET: http://apifull.test/api/{name}</label>
                                    </div>
                                  </div>
                              <div class="col-auto my-1">
                                
                                <select name='endpoint' class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                  <option value="product" selected >product</option>
                                  <option value="clients">clients</option>                       
                                </select>
                              </div>                   
                              <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary">Send</button>
                              </div>
                            </div>
                          </form>

                          <hr>

                        <p><strong>Search for number ID </strong></p> 
                        <form action="{{ route('guzzSearch')}}" method="POST" >
                            @method('POST')
                            @csrf                 
                           
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                      <i class="custom-control-input" id="customControlAutosizing"></i>
                                      <label class="custom-control-label" for="customControlAutosizing">GET: http://apifull.test/api/{name}/find/{ID}</label>
                                    </div>
                                  </div>
                              <div class="col-auto my-1"> 
                                <input type="text" name="id" class="form-control" id="validationTooltip02" placeholder="Insert ID product" required>                                     
                                <select name='nameEndpoint' class="custom-select mr-sm-2">
                                    <option value="product" selected >product</option>
                                    <option value="client">client</option>                       
                                  </select>
                              </div>                   
                              <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary">Send</button>
                              </div>
                            </div>
                          </form>
            
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
                            <li>GET: <strong>http://apifull.test/api/product/find/{id}</strong> (search product for ID) </li>                     
                            <li>DELETE: <strong>http://apifull.test/api/product/{id}</strong> (Delete one product) </li>
                            <li>PUT: <strong>http://apifull.test/api/product/{id}</strong> (upgrade product) </li>
                            
                        </ul>
                        <div class="alert alert-primary"> 
                            <strong>TOKENIZE</strong>                     
                        </div>
                        <ul>                             
                            <li>POST: <strong>http://apifull.test/api/acceso</strong> (create new TOKEN) </li>
                            <li>POST: <strong>http://apifull.test/api/outToken</strong> (remove TOKEN) </li> 
                            
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

    

    <div class="alert alert"></div>
</x-app-layout>
