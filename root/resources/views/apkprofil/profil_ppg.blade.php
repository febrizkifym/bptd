@extends('apkprofil.layout')
@section('content')
<h3 class="text-center">PELABUHAN PENYEBERANGAN GORONTALO</h3>
<img src="{{asset('asset_apk/ppg1.jpg')}}" alt="Pelabuhan Penyeberangan Gorontalo" class="img-fluid">
<div class="line"></div>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi quisquam voluptate temporibus vel enim esse soluta veritatis ea a et consequuntur repellendus, aliquam non! At qui tempora quia obcaecati eius.</p>
<p>Quo tenetur quia commodi non, officia rerum atque harum mollitia ducimus. Vel consectetur optio quos officiis, exercitationem maxime eligendi dolorem aspernatur commodi, corporis itaque voluptatum, sit facere laudantium adipisci modi.</p>
<div class="line"></div>
<h4>Informasi Kapal</h4>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est dicta, ullam, unde nesciunt at quas quasi quam saepe natus assumenda et eos nulla consectetur nobis expedita deserunt dolorum nemo ratione?</p>
<div class="row">
    <div class="col-md-12">
    <?php
        $no = 1;
    ?>
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                @foreach($kapal as $tab)
                <a class="nav-item nav-link {{$tab->id==1?'active':''}}" id="nav-{{$tab->kd_kapal}}-tab" data-toggle="tab" href="#nav-{{$tab->kd_kapal}}" role="tab" aria-controls="nav-{{$tab->kd_kapal}}" aria-selected="{{$tab->id==1?'true':'false'}}">{{$tab->nama." (".$tab->tujuan.")"}}</a>
                @endforeach
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            @foreach($kapal as $table)
            <div class="tab-pane fade {{$table->id==1?'show active':''}}" id="nav-{{$table->kd_kapal}}" role="tabpanel" aria-labelledby="nav-{{$table->kd_kapal}}-tab">
            <div class="table-responsive">   
                <table class="table table-hover table-sm" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas/Golongan</th>
                                <th>Usia</th>
                                <th>Tarif</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $tarif = App\TarifKapal::join("pbd_kapal","pbd_kapal.id","pbd_tarif.id_kapal")->where("id_kapal","=",$table->id)->get();
                            $break = true;                    
                        ?>
                            @forelse($tarif as $t)
                            @if($t->jenis_usia == null && $break == true)
                            <tr>
                                <td colspan=4><b>Kendaraan</b></td>
                            </tr>
                            <?php $break=false;$no=1; ?>
                            @endif
                            <tr>
                                <td>{{$no++}}</td>
                                <td style="text-transform:uppercase">
                                    @if($t->jenis_usia)
                                    {{$t->kelas}}
                                    @else
                                    GOLONGAN {{$t->kelas}}
                                    @endif
                                </td>
                                <td>
                                    @if($t->jenis_usia==1)
                                        Dewasa (>12 tahun)
                                    @elseif($t->jenis_usia==2)
                                        Anak-Anak (<12 Tahun)
                                    @endif
                                </td>
                                <td>Rp. {{number_format($t->harga)}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan=4>Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <?php $no=1 ?>
            @endforeach
        </div>
    </div>
</div>
<div class="line"></div>
<h4>Contact Person</h4>
@endsection