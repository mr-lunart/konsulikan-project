<?php
$query = session('userSession');
$urlToken = session() -> get('urlToken');
?>
@extends('layouts.app')

@section('sidebar')
    @include('parts.sidebarKlien')
@endsection

@section('navbar')
    @include('parts.navbar')
@endsection

@section('content')
    <div class="container">
    <div class="row justify-content-center">
            <div class="col-6 card my-4">
                <div class="dflex m-3">
                @if (isset($urlToken))
                    <p>Silahkan Lakukan Proses Pembayaran</p>
                @elseif(isset($transaksi) && count($transaksi) != 0 )
                    <div class="text-center">
                        <strong class="fs-5 fw-bold">NOTA TRANSAKSI</strong>
                    </div>
                    <hr>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-column mx-5 text-start">
                            <small><b>NAMA KONSULTAN</b></small>
                            <small><p><?=$transaksi['nama_konsultan']?></p></small>
                            <small><b>JENIS IKAN</b></small>
                            <small><p><?=ucfirst($transaksi['jenis_ikan'])?></p></small>
                            <small><b>TARIF KONSULTASI</b></small>
                            <small><p><?= 'IDR '.number_format(floatval($transaksi['tarif']),0,'.','.')?></p></small>
                        </div>
                        <div class="d-flex flex-column mx-5 text-start">
                            <small><b>NAMA KLIEN</b></small>
                            <small><p><?=$transaksi['nama_klien']?></p></small>
                            <small><b>METODE PEMBAYARAN</b></small>
                            <small><p> BRI-ePAY (BRIMo) </p></small>
                            <small><b>TOTAL TAGIHAN</b></small>
                            <small><p> <?= 'IDR '.number_format(floatval($transaksi['tarif']),0,'.','.')?> </p></small>
                        </div>
                    </div>
                @endif
                    <hr>
                    <strong><small>Catatan</small></strong><br>
                    <small class="mx-3">Silahkan Kembali ke Homepage apabila telah melakukan pembayaran</small>
                    <br>
                    <hr>
                    <div>
                        @if (isset($urlToken))
                            <div class="d-flex flex-row justify-content-around">
                                <button onclick="OpenPayment()" class="btn btn-success">Lakukan Pembayaran</button>
                            </div>
                        @elseif (isset($transaksi) && count($transaksi) != 0 )
                        <form action="<?=route('home.tagihan')?>" method="post">
                        @csrf                         
                                
                                
                                
                                    <input type="hidden" name="id_klien" value="<?=$transaksi['id_klien']?>">
                                    <input type="hidden" name="nama_klien" value="<?=$transaksi['nama_klien']?>">
                                    <input type="hidden" name="nama_konsultan" value="<?=$transaksi['nama_konsultan']?>">
                                    <input type="hidden" name="jenis_ikan" value="<?=$transaksi['jenis_ikan']?>">
                                    <input type="hidden" name="id_konsultan" value="<?=$transaksi['id_konsultan']?>">
                                    <input type="hidden" name="tarif" value="<?=$transaksi['tarif']?>">
                                    <input type="hidden" name="ikan" value="<?=$transaksi['ikan']?>">
                                    <div class="d-flex flex-row justify-content-around">
                                        <button  class="btn btn-primary ">Bayar</button>
                                        <a onclick="CancelConfirm()" class="btn btn-danger "> Cancel </a>
                                    </div>
                                                        
                        </form>
                        @endif 
                    </div>
                </div>
            </div>
            </div>
    </div>
@endsection

@section('footer')
    <script>
        function CancelConfirm(){
            
            if(confirm("Apakah Anda Yakin ingin Membatalkan Transaksi?"))
            {
                window.location.replace('<?= route('home.konsultasi') ?>')
            }
            
        }

        function OpenPayment() {
        <?php if(isset($urlToken)): ?>
            window.open('<?=$urlToken?>', '_blank').focus();
        <?php endif; ?>
            
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
@endsection