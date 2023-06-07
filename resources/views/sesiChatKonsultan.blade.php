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
<meta name="csrf-token" content="<?php echo (csrf_token()) ?> ">
<div class="container">
    <div class="card my-3">
        <div class="border">
            <div class="d-flex align-items-center justify-content-between m-3">
                <div>
                    <small><b> Klien </b></small>
                    <br>
                    <small><?= $sesi[0]->nama_klien ?></small>
                </div>
                <a class="btn btn-danger" href="<?=route('dashboard.chat.end')?>">End Chat</a>
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
    const push = '<?= route('dashboard.chat.push') ?>';
    const poll = '<?= route('dashboard.chat.poll') ?>';

    const chat = new PollingChat()
    chat.start(poll);
    $("#chat-submit").click(
        function() {
            chat.pushData(push, poll)
        }
    );
</script>
@endsection