<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3 mt-2 fw-bold fs-4 navbar-fixed"
    style="max-width: 1200px; margin: 0 auto;">
    <div class="container-fluid">
        <a class="navbar-brand ms-5" href="{{ route('dashboard') }}">SUARA RAKYAT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-1 ms-5" id="navbarSupportedContent">
            <ul class="navbar-nav me-lg-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="" aria-current="page" href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-disabled="true" href="{{ route('input') }}">Input</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" id="refreshLink"><i
                            class="fa fa-refresh"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
