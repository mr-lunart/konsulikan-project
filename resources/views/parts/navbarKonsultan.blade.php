<div class="container">
    <div class="d-flex flex-fill justify-content-between m-3">
        <img class="m-0" src="{{ asset('image/konsulikan-logo.webp') }}" alt="">
        <div class="d-flex align-items-center">
            <ul class="nav m-0 p-0">
                <li class=" nav-item">
                    <a href="<?= route('dashboard') ?>" class="nav-link fs-6">
                        Dashboard
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="<?= route('dashboard.profil') ?>" class="nav-link fs-6">
                        Profil
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="<?= route('dashboard.klien') ?>" class="nav-link fs-6">
                        Pendapatan
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="<?= route('dashboard.chat') ?>" class="nav-link fs-6">
                        Chat
                    </a>
                </li>
            </ul>
            <div class="m-0 p-0">
                <span class="d-flex align-items-center">
                    <i class="fa-solid fa-circle-user fs-3 ms-3 me-1" style="color: #2963c7;"></i>
                    <small><b> <?= $query[0]->nama ?> </b></small>
                </span>
            </div>
        </div>
    </div>
</div>