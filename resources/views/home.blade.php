@extends('layouts.app')

@section('content')

<!-- Scripts -->

<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- ... Otras etiquetas head ... -->
   
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
    
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body" id="app">
                    <example-component></example-component>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>

<script src="{{ mix('js/app.js') }}"></script>

    

@endsection



