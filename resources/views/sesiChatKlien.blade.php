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
<meta name="csrf-token" content="<?php echo (csrf_token()) ?> ">
<div class="container">
    <div class="card my-3">
        <div class="border">
            <div class="m-3">
                <div class="d-flex justify-content-between">
                    <b>SESI CHAT</b>
                    <div class="d-flex">
                        <b> </b>
                        <i class="fa-solid fa-circle-user fs-3 mx-3" style="color: #2963c7;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="chat" class="overflow-auto">
    </div>
</div>

<div class="input-group my-2">
    <input class="form-control bg-transparent border-0 " placeholder="" name="pesan" disabled>
</div>
<div id="pesanBox" class="d-flex ">
    <div class="flex-fill d-flex m-1">
        <div class="input-group">
            <input id="pesan" class="form-control flex-fill bg-white border-0 my-1" placeholder="" name="pesan">
        </div>
        <button id="chat-submit" class="btn btn-primary mx-2" type="submit"> >> </button>
    </div>
</div>

@endsection

@section('footer')
<script type="text/javascript" src="<?= asset('js/ajax.js') ?>"></script>
<script>
    const push = '<?= route('homepage.chat.push') ?>';
    const poll = '<?= route('homepage.chat.poll') ?>';

    const chat = new PollingChat()
    chat.start(poll);
    $("#chat-submit").click(
        function() {
            chat.pushData(push, poll)
        }
    );
</script>
@endsection