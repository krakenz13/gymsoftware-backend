@extends('layouts.app')

@section('content')

<!-- Scripts -->
@vite('resources/js/app.js') 
<main>
    <div class="row justify-content-center my-5 ">
        <div class="col-sm-8 col-lg-8">
            <div class="tile">
                <div class="tile-body">
                    <div class="card-header text-center fs-4">{{ __('Base De Datos Body Live') }}</div>

                    <div class="card-body col-md-12  my-4" id="tableApp">
                        <ExampleComponent></ExampleComponent>
                        
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <!-- Include the DataTables JS after Vue.js -->
  
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
</main>

@endsection
    




