<div class="col-lg-3">
    <div class="hero__categories">
        <div class="hero__categories__all">
            <i class="fa fa-bars"></i>
            <span>All Categories</span>
        </div>
        <ul>
            @foreach ($allkategori as $kat)
                <li><a href="{{ url('/kategori'.'/'.$kat->id) }}">{{ $kat->nama_kategori }}</a></li>
            @endforeach
        </ul>
    </div>
</div>