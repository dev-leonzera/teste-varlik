<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>{{ config('app.name', 'Laravents') }}</title>
    @vite('resources/sass/app.scss')
    @yield('custom_styles')

</head>

<body>
    @include('flash-message')
    <div class="page-wrapper">

        @yield('content')
        <footer class="footer d-print-none mt-auto">
            <div class="container-xl">
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">

                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">
                                &copy; {{ date('Y') }}
                                <a href="{{ config('app.url') }}" class="link-secondary">{{ config('app.name') }}</a>
                            </li>
                            <li class="list-inline-item">
                                Version 1.0.0
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Page level custom scripts -->
    @yield('custom_scripts')
</body>
</html>
