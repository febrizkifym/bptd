<style>
    table,tr,td,th{
        border:1px solid black
    }
</style>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Pendaftaran</th>
            <th>Nama Lengkap</th>
            <th>No KTP</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Usia</th>
            <th>Kapal (Tujuan)</th>
            <th>Kelas/Golongan</th>
            <th>Tarif</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        @foreach($penumpang as $p)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$p->uid}}</td>
            <td>{{$p->nama_lengkap}}</td>
            <td>{{$p->no_ktp}}</td>
            <td>{{$p->jenis_kelamin}}</td>
            <td>{{$p->agama}}</td>
            <td>{{$p->jenis_usia==1?"Dewasa (Lebih dari 12 tahun)":"Anak-Anak (Kurang dari 12 Tahun)"}}</td>
            <td>{{$p->nama_kapal}}</td>
            <td>{{$p->kelas}}</td>
            <td>{{$p->harga}}</td>
        </tr>
        @endforeach
    </tbody>
</table>