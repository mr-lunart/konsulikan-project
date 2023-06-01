<?php
$query = session('userSession');
$sesi = session('sesiChat');
?>
@extends('layouts.app')

@section('sidebar')
@include('parts.sidebarKlien')
@endsection

@section('navbar')
@include('parts.navbar')
@endsection

@section('content')
<meta name="csrf-token" content="<?php echo(csrf_token()) ?> ">
<div class="container">
    <div class="card my-3">
        <div class="border">
            <div class="m-3">
                ROOM CHAT
            </div>
        </div>
    </div>
    <div id="chat" class="overflow-auto">
    </div>
    
</div>
    <div class="input-group">
                <input id="pesan" class="form-control rounded-0" placeholder="..." name="pesan">
                <button id="chat-submit" class="btn btn-primary rounded-0" type="submit"> Send </button>
    </div>
    
@endsection

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <script type="text/javascript" src="<?= asset('js/jquery.js') ?>" ></script>
    <script type="text/javascript"  src="<?= asset('js/ajax.js') ?>" ></script>
    <script>
        const push = '<?=route('homepage.chat.push')?>';
        const poll = '<?=route('homepage.chat.poll')?>';
        
        const chat = new PollingChat()
        chat.start(poll);
        $("#chat-submit").click( 
            function(){ 
                chat.pushData(push,poll) 
            } 
            );
    </script>
@endsection