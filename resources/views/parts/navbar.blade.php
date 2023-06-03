<div class="container">
    <div class="d-flex flex-row justify-content-center m-3">
        <img class="me-auto" src="{{ asset('image/konsulikan-logo.svg') }}" alt="">
        <ul class="nav">
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
        <div class="">
            <span class="d-flex align-items-center">
                <i class="fa-solid fa-circle-user fs-3 mx-3" style="color: #2963c7;"></i>
                <b> <?= $query[0] -> nama ?> </b>
            </span>
            
        </div>
        
    </div>

</div>
