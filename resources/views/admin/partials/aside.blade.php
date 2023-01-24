<aside class="col-2 bg-dark text-white option-box pt-5 container-fluid">
    <div class="text-center links fw-bold container">

        <div>
            <a class="{{ Route::currentRouteName() === 'admin.dashboard' ? 'active' : 'notactive' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-house fs-6 pe-2"></i>
                <span>HOME</span>
            </a>
        </div>

        <div>
            <a class="{{ Route::currentRouteName() === 'admin.projects.index' ? 'active' : 'notactive' }}"
                href="{{ route('admin.projects.index') }}">
                <i class="fa-solid fa-code fs-6 pe-2"></i>
                <span>PROGETTI</span>
            </a>
        </div>

        <div>
            <a class="{{ Route::currentRouteName() === 'admin.projects.ordertypes' ? 'active' : 'notactive' }}"
                href="{{ route('admin.projects.ordertypes') }}">
                <i class="fa-brands fa-laravel fs-6 pe-2"></i>
                <span>LINGUAGGI</span>
            </a>
        </div>

        <div>
            <a class="{{ Route::currentRouteName() === 'admin.types.index' ? 'active' : 'notactive' }}"
                href="{{ route('admin.types.index') }}">
                <i class="fa-solid fa-gear fs-6 pe-2"></i>
                <span>GESTISCI</span>
            </a>
        </div>

        <div>
            <a class="notactive" target="_blank" href="https://github.com/carmelopalumbo">
                <i class="fa-brands fa-github fs-6 pe-2"></i>
                GITHUB
            </a>
        </div>
    </div>
</aside>
