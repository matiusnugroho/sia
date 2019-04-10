@extends(Auth::user()->role.'.index')
@section('additionstyle')
<link href="{{url('assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
    <h2>Rekap Nilai</h2>
</div>
<div class="wrapper wrapper-content">
{{-- <div class="col-lg-12"> --}}
            <div class="ibox float-e-margins">                
                <div class="ibox-content p-md">
                {!!Form::open(['route'=>['elearning.store']])!!}
                    <div class="row m-b-sm p-md">
                    <div class="form-group">
                    {!!Form::select('idmapel',$listMapel,['0'=>'Mata Pelajaran'],['class'=>'input-sm form-control','id'=>'idmapelcreate'])!!}
                    </div>
                    <div class="form-group">
                    {!!Form::select('idlokal',["0"=>"Lokal"],null,['class'=>'input-sm form-control','id'=>'lokalnyacreate'])!!}
                    </div>
                     <button type="submit" class="btn btn-small btn-primary" id="editnilaisemuasubmit"><i class="fa fa-wrench"></i></button>
                {!!Form::close()!!}
                    </div>
                    <div class="row m-b-sm p-md">
                        <div class="row m-b-sm p-md">
                            <h2>Daftar Postingan</h2>
                        </div>
                        <div class="row m-b-sm p-md">
                        @if($po->count()>0)
                            <table class="table table-hover">
                                <tr>
                                    <td>Kelas</td>
                                    <td>Mata Pelajaran</td>
                                    <td>Judul</td>
                                    <td>tanggal</td>
                                    <td></td>
                                </tr>
                                @foreach($po as $p)
                                <tr>
                                    <td>{{$p->mataPelajaranLokalGuru->lokal->kelas->kelas." ".$p->mataPelajaranLokalGuru->lokal->nama}}</td>
                                    <td>{{$p->mataPelajaranLokalGuru->mataPelajaran->nama}}</td>
                                    <td>{{$p->judul}}</td>
                                    <td>{{$p->tanggal}}</td>
                                    <td>{!!Form::open(['route'=>['elearning.destroy',$p->id],'method'=>'delete','class'=>'hapuspost','id'=>'hapuspost'.$p->id])!!}<div class="btn-group">
                                <a href="{{url('elearning/'.$p->id)}}" class="btn btn-xs btn-primary btn-bitbucket"><i class="fa fa-eye"></i></a>
                                <a href="{{url('elearning/'.$p->id.'/edit')}}" class="btn btn-xs btn-primary btn-bitbucket"><i class="fa fa-wrench"></i></a>
                                <button type="submit" class="btn btn-xs btn-bitbucket btn-danger"><i class="fa fa-trash"></i></button>
                            </div>{!!Form::close()!!}</td>
                                </tr>
                                @endforeach
                            </table>
                        @else
                          <h1>Tidak ada materi yang dapat ditampilkan</h1>
                        @endif
                        </div>
                    </div>

                </div>
            </div>
        {{-- </div> --}}
</div>
@endsection
@section('jsmore')
<script src="{{url('assets/js/vendor/tinymce/tinymce.min.js')}}"></script>
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
tinymce.init({
  selector: '#isimateri',
  height: 400,
  theme: 'modern',
  extend_valid_elements : 'div[id|class],textarea[id|class]',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
  image_advtab: true,
  templates: [
    { title: 'Kode Snippet', content: '<textarea class="snippet" id="s1"></textarea>' },
    { title: 'Test template 2', content: 'Test 2' }
  ]
 });
</script>
<script type="text/javascript">
    var listLokal = {!!$lokalDariMapelJSON!!}
    window.onload = function(){
        mapelcreate = document.getElementById('idmapelcreate');
        mapelcreate.addEventListener('change',function(){setSelect(this.value,'lokalnyacreate')});
    }
    function setSelect(id,selectlokal) {
        lokal = listLokal[id];
        html="";
        lokalSelek = document.getElementById(selectlokal);
        for(i in lokal){
            html+="<option value='"+lokal[i].id_lokal+"'>"+lokal[i].label+"</option>";
        }
        lokalSelek.innerHTML=html;
    }
</script>
<script type="text/javascript">
    $('.hapuspost').submit(function(event){

        event.preventDefault();
        var id = '#'+this.id;
        console.log(id);
        swal({
        title: "Apakah anda yakin akan menghapus materi ini?",
        text: "Materi yang telah dihapus tidak dapat dikembalikan lagi!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya!",
        closeOnConfirm: true
    }, function () {
        $(id).off('submit');
        $(id).submit();
    });
    })
</script>
@endsection