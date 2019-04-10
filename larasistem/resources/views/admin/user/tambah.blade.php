@extends('admin.index')
@section('isi')

<div class="row  border-bottom white-bg dashboard-header">
                <h2>Buat User / <small>+</small></h2>
            </div>
<div class="wrapper wrapper-content animated fadeInUp">

                    <div class="ibox">
                        <div class="ibox-title">
                        </div>
                        <div class="ibox-content">

                            <div class="project-list">
                            {!! Form::open(['url' => 'user','files'=>true,  'class' => 'form-horizontal']) !!}
                            {!!Form::hidden('ndata',1,['id'=>'ndatahidden'])!!}
                            
                            
                                <table class="table table-hover" id="tb">
                                    
                                    <tr>
                                        <td>
                                            Username
                                        </td>
                                        <td>
                                            email
                                        </td>
                                        <td>
                                            Password
                                        </td>
                                        <td>
                                            Foto
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {!!Form::text('username',null,['class'=>'input-sm form-control'])!!}                                         
                                        </td>
                                        <td>
                                            {!!Form::text('email',null,['class'=>'input-sm form-control'])!!}
                                        </td>
                                        <td>
                                            {!!Form::text('password',null,['class'=>'input-sm form-control'])!!}
                                        </td>
                                        <td>
                                            {!!Form::file('pp',null,['class'=>'input-sm form-control'])!!}
                                        </td>
                                    </tr>
                                   
                                </table>{{-- 
                                {!! Form::button('tambah', ['class'=>'btn btn-primary','id'=>'btn-tambah']) !!} --}}
                                {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
@endsection

@section('jsmore')
<script>
$('#btn-tambah').click(
    function(){
        var tabel = document.getElementById('tb');
        var row = tabel.rows;
        var ntabel = row.length;
        var baris = tabel.insertRow(ntabel);
        var id = baris.insertCell(0);
        id.innerHTML='{!!Form::text('username[]',null,['class'=>'input-sm form-control'])!!}';
        var un = baris.insertCell(1);
        un.innerHTML = '{!!Form::text('email[]',null,['class'=>'input-sm form-control'])!!}';
        var pw = baris.insertCell(2);
        pw.innerHTML = '{!!Form::text('password[]',null,['class'=>'input-sm form-control'])!!}';
        var role = baris.insertCell(3);
        role.innerHTML='{!!Form::text('role[]',null,['class'=>'input-sm form-control'])!!}';
        var foto = baris.insertCell(4);
        foto.innerHTML='{!!Form::file('pp[]',null,['class'=>'input-sm form-control'])!!}';
        var ndatacontainer = document.getElementById('ndatahidden');
        n = parseInt(ndatacontainer.value);
        ndatacontainer.value=n+1;
        console.log(ndatacontainer.value);
    })
</script>
@endsection