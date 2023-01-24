@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.aside')
            <div class="col-10">
                <h1 class="text-center pt-5 pb-4 welcome">Benvenuto, <strong
                        class="text-uppercase">{{ Auth::user()->name }}</strong>
                    .
                </h1>
                <p class="text-center fw-light">Oggi è il <strong>{{ date('d-m-y') }}</strong></p>
                <p class="text-center fw-light pe-3">Ora attuale: <strong id="clock"></strong></p>

                <div class="info-cards w-50 pt-5 d-flex justify-content-between m-auto">
                    <div class="cp-card">
                        <h3>PROGETTI ATTUALMENTE NEL DB</h3>
                        <p>{{ $projects }}</p>
                    </div>

                    <div class="cp-card">
                        <h3>LINGUAGGI E FRAMEWORK SALVATI NEL DB</h3>
                        <p>{{ $types }}</p>
                    </div>
                </div>

                <div class="socials d-flex justify-content-center">
                    <a target="_blank" href="https://www.facebook.com/iamcarmelopalumbo"><i
                            class="fa-brands fa-facebook"></i></a>
                    <a target="_blank" href="https://www.instagram.com/carmelopalumbo"><i
                            class="fa-brands fa-instagram"></i></a>
                    <a target="_blank" href="https://www.tiktok.com/@carmelo.palumbo"><i
                            class="fa-brands fa-tiktok"></i></a>
                    <a target="_blank" href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>



    <script>
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
    </script>
@endsection

@section('title')
    Dashboard
@endsection
