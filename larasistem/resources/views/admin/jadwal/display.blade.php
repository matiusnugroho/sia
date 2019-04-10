@extends('admin.index')
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
                <h2>Jadwal Pelajaran {{$namalokal}}</h2>
            </div>
<div class="wrapper wrapper-content animated fadeInUp">

                    <div class="ibox">
                        <div class="ibox-title">
                            <div class="ibox-tools">
                                <a data-toggle="modal" href="#modal-tambah-jam" class="btn btn-primary btn-xs">Tambah Jadwal</a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="project-list">
                            @if(count($sesi) < 1 )
                            <div class="middle-box text-center animated bounceIn">
                                <h3 class="font-bold">Data tidak ditemukan</h3>
                                <div class="error-desc">
                                   Data Jam tidak ditemukan
                                </div>
                            </div>
                            @endif
                                <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <td>ke</td>
                                    @for($i=1; $i<=$maxHari; $i++)
                                        <td colspan="2" class="text-center">{{$hari[$i]}}</td>
                                    @endfor
                                </tr>
                                </thead>
                                    <tbody>
                                    @for($ke=1; $ke<=$maxKe; $ke++)
                                        <tr>
                                            <td>{{$ke}}</td>
                                            @for($i=1; $i<=$maxHari; $i++)
                                                @if(isset($sesi[$i][$ke]))
                                                <td>{{$sesi[$i][$ke]['jam']}}</td>
                                                <td> {{$sesi[$i][$ke]['jadwal'][0]['mapel_lokal']['matapelajaran']['nama']}}</td>
                                                @else
                                                    <td colspan="2">Belum Ada jadwal</td>
                                                @endif
                                            @endfor
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                            <!-- end project list -->
                        </div>
                    </div>
                </div>
                {{-- modal input jam --}}
                <div id="modal-tambah-jam" class="modal fade in">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                               <div class="ibox">
                                   <div class="ibox-content">
                                       <div class="row">
                                       {!! Form::open(['route' => 'jadwal.store','method'=>'post', 'class' => 'form-horizontal']) !!}
                                       <div class="form-group">
                                            <label class="col-sm-3 control-label">Hari</label>
                                            <div class="col-sm-4">
                                                {!!Form::select('hari',$hari,null,['placeholder'=>"Pilih Hari",'class'=>'input-sm form-control','id'=>'selectHari'])!!}
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">Jam</label>
                                            <div class="col-sm-4">
                                            {!!Form::select('id_sesi',["0"=>"Jam"],null,['class'=>'input-sm form-control','id'=>'selectSesi'])!!}
                                            </div>
                                            </div>
                                           <div class="form-group">
                                            <label class="col-sm-3 control-label">Mata Pelajaran</label>
                                            <div class="col-sm-4">
                                                {!!Form::select('id_mapel_lokal',$dataGuruMapel,['0'=>'Pilih Mata Pelajaran'],['class'=>'input-sm form-control'])!!}
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-3">
                                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-ok"></i>OK</button>
                                                </div>
                                            </div>

                                        {!! Form::close() !!}
                                       </div>
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ujung modal blangko --}}
@endsection

@section('jsmore')
<script src="{{url('assets/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{url('assets/js/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{url('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script type="text/javascript">
function showNotif(p)
{
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "progressBar": true,
      "preventDuplicates": false,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "400",
      "hideDuration": "1000",
      "timeOut": "3000",
      "extendedTimeOut": "1000",
      "showEasing": "linear",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    toastr.success(p, "Berhasil");
}

@if (session('sukses'))
    window.onload=showNotif('{{session('sukses')}}');
@endif


</script>
<script type="text/javascript">
    var allSesi = {!!$allSesi!!}
    window.onload = function(){
        selectHari = document.getElementById('selectHari');
        selectHari.addEventListener('change',function(){setSelect(this.value,'selectSesi')});
    }
    function setSelect(id,selectTarget) {
        jam = allSesi[id];
        html="";
        sesiSelek = document.getElementById(selectTarget);
        for(i in jam){
            html+="<option value='"+jam[i].id+"'>"+jam[i].jam+"</option>";
        }
        sesiSelek.innerHTML=html;
    }
</script>
@endsection