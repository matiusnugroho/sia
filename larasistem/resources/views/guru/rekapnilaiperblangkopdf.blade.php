<table class="table table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Nilai</th>
                        <th></th>
                    
                    </tr>
                    </thead>
                    <tbody>
                     @foreach($nilai as $n)
                     <?php $no++; ?>
                     <tr>
                        <td>{{$no}}</td>
                        <td>{{$n->siswa->nis}}</td>
                        <td>{{$n->siswa->nama}}</td>
                        <td>{{$n->nilai}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{url('rekapnilai/'.$n->id)}}" class="btn btn-white btn-bitbucket"><i class="fa fa-eye"></i></a>
                                <a href="{{url('rekapnilai/'.$n->id.'/edit')}}" class="btn btn-white btn-bitbucket"><i class="fa fa-wrench"></i></a>
                            </div>
                        </td>                        
                    </tr>
                    @endforeach
                    </tbody>
                </table>