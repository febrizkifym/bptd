@extends('layouts/public')

@section('content')
<section id="sejarah">
    <div class="container">
        <h1>Sejarah BPTD</h1>
        <hr>
        <p>
            {{$b->sejarah}}
        </p>
     </div>
</section>
@endsection