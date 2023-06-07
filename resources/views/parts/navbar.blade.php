<div class="container">
    <div class="d-flex flex-fill justify-content-between m-3">
        <img class="m-0" src="{{ asset('image/konsulikan-logo.webp') }}" alt="">
        <ul class="nav m-0 p-0">
            <li class=" nav-item">
                <a href="<?=route('home')?>" class="nav-link">
                    Dashboard
                </a>
            </li>
            <li class=" nav-item">
                <a href="<?=route('home.profil')?>" class="nav-link">
                    Profil
                </a>
            </li>
            <li class=" nav-item">
                <a href="<?=route('home.konsultasi')?>" class="nav-link">
                    Konsultasi
                </a>
            </li>
            <li class=" nav-item">
                <a href="<?=route('home.riwayat')?>" class="nav-link">
                    Riwayat
                </a>
            </li>
            <li class=" nav-item">
                <a href="<?=route('home.pakan')?>" class="nav-link">
                    Panduan Pakan
                </a>
            </li>
            <li class=" nav-item">
                <a href="<?=route('home.panen')?>" class="nav-link">
                    Evaluasi Panen
                </a>
            </li>
        </ul>
        <div class="m-0 p-0">
            <span class="d-flex align-items-center">
                <i class="fa-solid fa-circle-user fs-3 me-2" style="color: #2963c7;"></i>
                <small><b> <?= $query[0] -> nama ?> </b></small>
            </span>
            
        </div>
        
    </div>

</div>
