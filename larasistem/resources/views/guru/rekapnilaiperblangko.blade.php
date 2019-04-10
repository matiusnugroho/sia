@extends('guru.index')
@section('additionstyle')
<link href="{{url('assets/css/plugins/footable/footable.standalone.min.css')}}" rel="stylesheet">
@endsection
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
    <h2>Rekap Nilai</h2>
</div>
<div class="wrapper wrapper-content">
{{-- <div class="col-lg-12"> --}}
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Pilih Rekap Nilai<small class="m-l-sm"></small></h5>
                </div>
                <div class="ibox-content p-md">
                    <div class="row m-b-sm p-md">
                        @if($formNilai->count()==0)
                    <h1>Tidak ada data rekap nilai yang bisa ditampilkan <a data-toggle="modal" class="btn btn-primary" href="#modal-form-blangko">+ Blangko baru</a></h1>
                @else
                {!!Form::open(['route'=>['rekapnilai.editnilai',$id],'method'=>'put','id'=>'dataeditnilai'])!!}
                <div class="btn-group pull-right">
                <a class="btn btn-small btn-primary" href="{{url('rekapnilai/'.$id.'/excel')}}"><i class="fa fa-file-excel-o"></i> Excel</a>
                    <a class="btn btn-small btn-primary" href="{{url('rekapnilai/'.$id.'/pdf')}}"><i class="fa fa-file-pdf-o"></i> PDF</a>
                <a class="btn btn-small btn-white" id="editnilaisemua"><i class="fa fa-pencil"></i></a>
                <button disabled="true" type="submit" class="btn btn-small btn-white" id="editnilaisemuasubmit"><i class="fa fa-check"></i></button
                ></div>
                
                <table class="table table-hover" data-filtering="true" id="fooNilai">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th data-type="text">Nama</th>
                        <th data-type="number">Nilai </th>
                    
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $datIdNilai=[];
                    ?>
                    
                     @foreach($nilai as $n)
                     <?php 
                        $no++; 
                        $datIdNilai[$n->id] = $n->nilai;
                     ?>
                     <tr>
                        <td>{{$no}}</td>
                        <td>{{$n->siswa->nis}}</td>
                        <td>{{$n->siswa->nama}}</td>
                        <td class="dataNilai" id='idnilai{{$n->id}}'>{{$n->nilai}}</td>                  
                    </tr>
                    
                    @endforeach
                    </tbody>
                </table>
                {!! Form::close() !!}
                @endif
                    </div>
                </div>
            </div>
        {{-- </div> --}}
</div>
@endsection
@section('jsmore')
<script type="text/javascript">
    $("#editnilaisemua").click(function(){
        $("#editnilaisemuasubmit").attr('disabled',false);
        var kolomEdit = $('.dataNilai');
        var idDataIdNilai = {!! json_encode($datIdNilai) !!};
        kolomEdit.each(function (i,element) {
            var idx = element.id;
            var id = idx.slice(7);
            var html = "<div class='col-sm-3'><input type='text' class='input-sm form-control' name='nilaibaru["+id+"]' value='"+idDataIdNilai[id]+"'></div";
            $('#'+idx).html(html);
        });
    });
    $("#editnilaisemuasubmit").click(function(){
        $('#dataeditnilai').submit();
    });
</script>
<script src="{{url("assets/js/plugins/footable/footable.min.js")}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#fooNilai').footable(
            {
                "sorting": {
                    "enabled": true
                },
            });

    });

</script>
@endsection