@if (session('update'))
    <div class="alert alert-info w-75 m-auto text-center my-4" role="alert">
        {!! session('update') !!}
    </div>
@elseif (session('delete'))
    <div class="alert alert-danger w-75 m-auto text-center my-4" role="alert">
        {!! session('delete') !!}
    </div>
@elseif (session('create'))
    <div class="alert alert-success w-75 m-auto text-center my-4" role="alert">
        {!! session('create') !!}
    </div>
@else
    <h3 class="text-center fw-bold py-4">GESTISCI I LINGUAGGI ED I FRAMEWORK PRESENTI NEL DB</h3>
@endif
