<?php
$query = session('consultantSession');
$sesi = session('sesiChat');
?>
@extends('layouts.appKonsultan')

@section('sidebar')
    @include('parts.sidebarKonsultan')
@endsection

@section('navbar')
    @include('parts.navbarKonsultan')
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
   
    <script type="text/javascript"  src="<?= asset('js/ajax.js') ?>" ></script>
    <script>
        const push = '<?=route('dashboard.chat.push')?>';
        const poll = '<?=route('dashboard.chat.poll')?>';
        
        const chat = new PollingChat()
        chat.start(poll);
        $("#chat-submit").click( 
            function(){ 
                chat.pushData(push,poll) 
            } 
            );
    </script>
@endsection