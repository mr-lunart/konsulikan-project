<!-- Fixed -->
@extends('layouts.front')

@section('main')
    <div class="container-fluid">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="m-3">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div>
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Selamat Datang Praktisor!</h1>
                                        </div>
                                        <form method="post" action=" <?php print(route('con.auth')) ?> ">
                                        @csrf    
                                        <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    placeholder="Enter Username" name="user" required>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Password" name="pass" required>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                        </form>
                                        <hr>
                                        <div class="">
                                            <a class="" href="<?=route('root')?>">  
                                                <p><strong>Bukan Konsultan? </strong>Login ke Halaman Klien</strong></p> 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('auth')
    <?php
        $status = session() -> get('status');
        if(isset($status)) {
            if($status) {
                echo("<script> alert(' Username atau Password Anda Salah! ') </script>");
            }    
        } 
    ?>
@endsection

@section('footer')
    <script src="{{ asset('/js/jquery.js') }}" ></script>
@endsection