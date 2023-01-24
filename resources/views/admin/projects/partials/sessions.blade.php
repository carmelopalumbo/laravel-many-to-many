@if (session('create'))
    <div class="alert alert-info w-75 m-auto text-center my-4" role="alert">
        {!! session('create') !!}
    </div>
@elseif (session('edit'))
    <div class="alert alert-info w-75 m-auto text-center my-4" role="alert">
        {!! session('edit') !!}
    </div>
@elseif (session('delete'))
    <div class="alert alert-info w-75 m-auto text-center my-4" role="alert">
        {!! session('delete') !!}
    </div>
@else
    <h3 class="text-center py-4 fw-bold">I MIEI PROGETTI</h3>
@endif
