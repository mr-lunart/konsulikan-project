<?php
    $query = session('userSession');

    function dataIkan($param,$dataIkan){
        if (isset($dataIkan) && count($dataIkan) > 0 ){
            switch ($param) {
                case 'jenis_ikan_id':
                    $result = $dataIkan[0]->jenis_ikan_id;
                    break;
                case 'umur_ikan':
                    $result = $dataIkan[0]->umur_ikan;
                    break;
            }
        }
        else {
            $result = NULL;
        }
        return $result;
    }

    if (isset($panduan) && count($panduan) > 0 ){
        $headPanduan = array_keys(get_object_vars($panduan[0]));
    }
    else {
        $headPanduan = [];
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
                        <strong class="fs-5 fw-bold">PANDUAN PAKAN</strong>
                    </div>
                    <hr>
                    <form method="post" action="<?=route('home.pakan.panduan')?>">
                    @csrf
                        <div class="row">
                            <div class="form-grup col-6">
                                <strong>Jenis Ikan</strong>
                                <select class="form-select" aria-label="Default select example" name="ikan" id="">
                                    <option value="1" <?php if(dataIkan('jenis_ikan_id',$dataIkan)=='1'){ echo(" selected");}?>>Lele</option>
                                </select>
                            </div>
                            <div class="form-grup col-6">
                                <strong>Umur Ikan</strong> 
                                <input class="form-control" type="text" name="umur" value="<?=dataIkan('umur_ikan',$dataIkan)?>" required>
                            </div>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="m-3">
                    <div class="card">

                        <div>
                            <table class="table">
                                <thead> 
                                    <tr>
                                        @foreach ($headPanduan as $header)
                                        <th class="text-break text-center" scope="col" style="font-size:10pt;"> <?=$header?> </th>
                                        @endforeach
                                    </tr>
                            
                                </thead>
                                <tbody>
                                @foreach ($panduan as $row)
                                <tr>
                                    @foreach ($row as $cell)
                                    <td class="fs-6 text-break text-center" scope="col"> <?=$cell?></td>
                                    @endforeach
                                </tr>
                                @endforeach
                            
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
@endsection