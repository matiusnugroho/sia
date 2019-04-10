@extends(Auth::user()->role.'.index')
@section('title')- Materi - Buat Baru @endsection
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
    <h2>Materi / <small>Baru</small></h2>
</div>
<div class="wrapper wrapper-content">
{{-- <div class="col-lg-12"> --}}
            <div class="ibox float-e-margins">
                <div class="ibox-content p-md">
                {!!Form::open(['route'=>['elearning.store'],'class'=>'form-horizontal'])!!}
                    <div class="row m-b-sm p-md">
                        <div class="col-sm-9">
                            <div class="form-group @if($errors->has('judul')) has-error @endif">
                            	<div class="col-md-8"> 
                                {!!Form::text('judul',null,['class'=>'input-sm form-control','placeholder'=>"Ketik judul di sini"])!!}
                                @if($errors->has('judul'))<small class="text-danger pull-left">{{$errors->first('judul')}}</small>@endif
                                </div>
                            </div>
                            <div class="form-group @if($errors->has('isi')) has-error @endif">
                            <div class="col-md-12"> 
                                {!! Form::textArea('isi',null,['id'=>'isimateri','class'=>'form-control']) !!}
                                @if($errors->has('isi'))<small class="text-danger pull-left">{{$errors->first('isi')}}</small>@endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group @if($errors->has('idmapel')) has-error @endif">
                            {!!Form::select('idmapel',$listMapel,['0'=>'Mata Pelajaran'],['class'=>'input-sm form-control','id'=>'idmapelcreate'])!!}
                            @if($errors->has('idmapel'))<small class="text-danger pull-left">{{$errors->first('idmapel')}}</small>@endif
                            </div>
                            <div class="form-group @if($errors->has('idlokal')) has-error @endif">
                            {!!Form::select('idlokal',["0"=>"Lokal"],null,['class'=>'input-sm form-control','id'=>'lokalnyacreate'])!!}
                            @if($errors->has('idlokal'))<small class="text-danger pull-left">{{$errors->first('idlokal')}}</small>@endif
                            </div>
                            <button type="submit" class="btn btn-small btn-primary" id="editnilaisemuasubmit"><i class="fa fa-paper-plane"></i></button>
                        </div>
                    </div>
                {!!Form::close()!!}

                </div>
            </div>
        {{-- </div> --}}
</div>
@endsection
@section('jsmore')
<script src="{{url('assets/js/vendor/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript">
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
@endsection