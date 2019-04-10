@extends(Auth::user()->role.'.index')
@section('title')-{{$data->judul}}@endsection
@section('additionstyle')
<link href="{{url('assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('isi')
<div class="row  border-bottom white-bg dashboard-header">
    <h2>E-Learning</h2>
</div>
<div class="wrapper wrapper-content">
    <div class="ibox">
    <div class="ibox-content">
    {!!Form::open(['route'=>['elearning.destroy',$data->id],'method'=>'delete','id'=>'hapuspost'])!!}
        <div class="btn-group pull-right">
            <a class="btn btn-info btn-xs" href="{{url('elearning/'.$data->id.'/edit')}}"><i class="fa fa-wrench"></i> Edit</a>
            <button type="submit" class="btn btn-danger btn-xs" type="button"><i class="fa fa-trash"></i> Hapus</button>
        </div>
    {!!Form::close()!!}
        <div class="text-center article-title">
        <span class="text-muted"><i class="fa fa-clock-o"></i> {{$data->tanggal}}</span>
            <h1>
                {{$data->judul}}
            </h1>
        </div>
        {!!$data->isi!!}
        <hr>
        <div class="row">
            <div class="col-lg-8">
                <h2><i class="fa fa-comments-o"></i> {{count($data->komentar)}} Komentar:</h2>
                {{-- Start komentarbox --}}
                @if(count($data->komentar)>0)
                    @foreach($data->komentar as $komentar)
                        <?php
                        $role = $komentar->user->role;
                        $aktor = $komentar->user->{$role};
                        $nama = $saya->id==$aktor->id?"Saya":$aktor->nama;
                        ?>
                    <div class="social-feed-box shadow" id="komentar{{$komentar->id}}">
                        <div class="social-avatar">
                            <a href="" class="pull-left">
                                <img alt="image" src="{{url('img/'.$komentar->user->username.'/'.$komentar->user->pp)}}">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    {{$nama}}
                                </a>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                {{$komentar->komentar}}
                            </p>                           
                        </div>
                        <?php
                            $replies = $komentar->replies;
                        ?>
                        
                        <div class="social-footer">                            
                        @if(count($replies)>0)
                        @foreach($replies as $r)   
                            <?php
                                $roler = $r->user->role;
                                $aktorr = $r->user->{$roler};
                                $nama = $saya->id==$aktorr->id?"Saya":$aktorr->nama;
                            ?>
                            <div class="social-feed-box" id="reply{{$r->id}}">
                                <div class="social-avatar">
                                    <a href="" class="pull-left">
                                        <img alt="image" src="{{url('img/'.$r->user->username.'/'.$r->user->pp)}}">
                                    </a>
                                    <div class="media-body">
                                        <a href="#">
                                            {{$nama}}
                                        </a>
                                    </div>
                                </div>
                                <div class="social-body">
                                    <p>
                                        {{$r->komentar}}
                                    </p>                           
                                </div>
                            </div>                         
                        @endforeach
                        @endif
                            <div class="social-feed-box">
                                <div class="social-body">
                                    {!!Form::open(['route'=>['elearning.postreply',$komentar->id],'method'=>'post','id'=>'forreply','class'=>'form-horizontal'])!!}
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                        {!! Form::textArea('replykomentar',null,['id'=>'isireplykomentar','class'=>'input-sm form-control','rows'=>'2']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="col-sm-12">
                                    <button type="submit" class="btn btn-xs btn-white pull-right" id="postkomensubmit"><i class="fa fa-paper-plane"></i></button>
                                    </div>
                                    </div>
                                    {!!Form::close()!!}                          
                                </div>
                            </div> 
                        </div>
                        
                    </div>
                    @endforeach
                {{-- End komentar box --}}
                @else
                    <div class="social-feed-box">
                        <h2>Belum ada komentar</h2>
                    </div>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="row">
                <h2>Tambah Komentar</h2>
                </div>
                <div class="row shadow">
                {!!Form::open(['route'=>['elearning.postkomentar',$id],'method'=>'post','id'=>'formkomentar','class'=>'form-horizontal'])!!}
                    <div class="form-group">
                        <div class="col-sm-12">
                        {!! Form::textArea('komentar',null,['id'=>'isikomentar','class'=>'input-sm form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-12">
                    <button type="submit" class="btn btn-small btn-primary pull-right" id="postkomensubmit"><i class="fa fa-paper-plane"></i></button>
                    </div>
                    </div>
                    {!!Form::close()!!}
                 </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
@section('additionstyle')
<link href="{{url('assets/js/vendor/codemirror/lib/codemirror.css')}}" rel="stylesheet">
@endsection
@section('jsmore')
<script src="{{url('assets/js/vendor/codemirror/lib/codemirror.js')}}"></script>
<script src="{{url('assets/js/vendor/codemirror/mode/javascript/javascript.js')}}"></script>
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
@if (session('edit_sukses'))
    window.onload=showNotif('{{session('edit_sukses')}}');
@endif
@if (session('create_sukses'))
    window.onload=showNotif('{{session('create_sukses')}}');
@endif
var editor_two = CodeMirror.fromTextArea(document.getElementById("cd1"), {
                 lineNumbers: true,
                 matchBrackets: true,
                 styleActiveLine: true
             });

</script>
<script type="text/javascript">
    $('#hapuspost').submit(function(event){
        event.preventDefault()
        swal({
        title: "Apakah anda yakin akan menghapus materi ini?",
        text: "Materi yang telah dihapus tidak dapat dikembalikan lagi!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya!",
        closeOnConfirm: true
    }, function () {
        $('#hapuspost').off('submit');
        $('#hapuspost').submit();
    });
    })
</script>
@endsection