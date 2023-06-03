<?php
$query = session('userSession');
if (isset($data) && count($data) > 0 ){
    $headTabel = array_keys(get_object_vars($data[0]));
}
else {
    $headTabel = [];
}
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
            <div class="m-3">
            <div class="card ">
                <div class="dflex m-3">
                    <div class="text-center">
                        <strong class="fs-5 fw-bold">EVALUASI PANEN</strong>
                    </div>
                    <hr>
                    <form method="post" action="<?=route('home.ep')?>">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-grup">
                                    <strong>Nama Kolam</strong>
                                    <input class="form-control" type="text" name="namaKolam" value="" required>
                                </div>
                                <div class="form-grup">
                                    <strong>Tanggal Tebar</strong>
                                    <input class="form-control" type="date" name="tglTebar" value="" required>
                                </div>
                                <div class="form-grup">
                                    <strong>Total Berat Pakan</strong>
                                    <input class="form-control" type="text" name="brtPakan" value="" required>
                                </div>
                                <div class="form-grup">
                                    <strong>Berat Ikan Panen</strong>
                                    <input class="form-control" type="text" name="brtPanen" value="" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-grup">
                                    <strong>Jenis Ikan</strong>
                                    <select class="form-select" aria-label="Default select example" name="ikan" id="">
                                        <option value="1">Lele</option>
                                    </select>
                                </div>
                                <div class="form-grup">
                                    <strong>Tanggal Panen</strong>
                                    <input class="form-control" type="date" name="tglPanen" value="" required>
                                </div>
                                <div class="form-grup">
                                    <strong>Berat Awal Ikan</strong>
                                    <input class="form-control" type="text" name="brtAwal" value="" required>
                                </div>
                                <div class="form-grup">
                                    <strong>Berat Ikan Mati</strong>
                                    <input class="form-control" type="text" name="brtMati" value="" required>
                                </div>
                            </div>
                           
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit Data</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="m-3 mb-0">
                <h4>Tabel Evaluasi Panen </h4> 
                </div>
                <hr>
                <div class="">
                    <table class="table">
                        <thead>
                            
                            <tr>
                                @foreach ($headTabel as $header)
                                <th class="text-break text-center" scope="col" style="font-size:10pt;"> <?=$header?> </th>
                                @endforeach
                                <th class="text-break text-center" scope="col" style="font-size:10pt;"> Efisiensi Pakan </th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr>
                                @foreach ($row as $cell)
                                <td class="fs-6 text-break text-center" scope="col"> <?=$cell?></td>
                                @endforeach
                                <td class="fs-6 text-break text-center" scope="col"> 
                                <?php 
                                $tambah = $row->{'Bobot Ikan Panen'} + $row->{'Bobot Ikan Mati'};
                                $atas = $tambah - $row ->{'Bobot Ikan Awal'};
                                $bawah = $atas / $row->{'Bobot Pakan'};
                                echo(round($bawah * 100));
                                ?>
                                 % </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection

@section('footer')
    
@endsection