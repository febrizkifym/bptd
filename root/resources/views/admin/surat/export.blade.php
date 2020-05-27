<style>
    table,tr,td,th{
        border:1px solid black
    }
</style>
<table>
    <thead>
        <tr>
            <th>No. Urut</th>
            <th>Nomor Surat</th>
            <th>Tanggal Surat</th>
            <th>Tujuan</th>
            <th>Perihal</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        @foreach($surat as $s)
        <tr>
            <td>{{$s->no_urut}}@isset($s->sub){{'.'.$s->sub}}@endisset</td>
            <td>{{$s->kode_surat}}/{{$s->no_urut}}@isset($s->sub){{'.'.$s->sub}}@endisset/{{$s->bulan}}/BPTD-GTLO/{{date("Y",strtotime($s->tgl_surat))}}</td>
            <td>{{$s->tgl_surat}}</td>
            <td>{{$s->tujuan}}</td>
            <td>{{$s->perihal}}</td>
            <td>{{$s->ket}}</td>
        </tr>
        @endforeach
    </tbody>
</table>