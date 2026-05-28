<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS UNTUK MENAMPILKAN FOTO GEDUNG SEBAGAI BACKGROUND */
        body {
            /* Ganti '/img/office-building.jpg' dengan path foto Anda.
               Pastikan foto sudah ada di folder public/img/.
               Kami menambahkan linear-gradient agar kartu profil tetap mudah dibaca.
            */
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('/img/gedung_tinggi.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
        }

        .card { 
            background: rgba(255, 248, 225, 0.9); /* Sedikit Transparan agar estetik */
            border-radius: 20px; 
            border: none; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            backdrop-filter: blur(5px); /* Efek blur untuk kesan premium */
        }
        
        .card-header { 
            background-color: #5D4037 !important; 
            border-radius: 20px 20px 0 0 !important; 
        }
        
        .text-success { color: #5D4037 !important; }
        .badge.bg-info { background-color: #A1887F !important; color: white; }
        .btn-secondary { background-color: #8D6E63; border: none; }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white">
                    <h4 class="mb-0 text-center">Profil Karyawan</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h3>{{ $targetUser['name'] }}</h3>
                        <p class="text-muted">Username: {{ $targetUser['username'] }}</p>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <p><strong>Email:</strong> {{ $targetUser['email'] }}</p>
                            <p><strong>Telepon:</strong> {{ $targetUser['phone'] }}</p>
                            <p><strong>Koordinat:</strong> 
                                <br>Lat: {{ $targetUser['address']['geo']['lat'] }} 
                                <br>Lng: {{ $targetUser['address']['geo']['lng'] }}
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p><strong>Kota:</strong> {{ $targetUser['address']['city'] }}</p>
                            <p><strong>Perusahaan:</strong> 🏢 {{ $targetUser['company']['name'] }}</p>
                            <p><strong>Alamat Lengkap:</strong> {{ $targetUser['address']['street'] }}, {{ $targetUser['address']['suite'] }}</p>
                        </div>
                    </div>

                    <h5 class="mt-4 text-success text-center">Rekan Terdekat (Estimasi Jarak):</h5>
                    @if($colleagues->count() > 0)
                        <ul class="list-group">
                            @foreach($colleagues->take(5) as $c)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $c['name'] }}</strong>
                                        <br>
                                        <small class="text-muted">
                                            🏢 {{ $c['company']['name'] }} | 
                                            Lat: {{ $c['address']['geo']['lat'] }} / Lng: {{ $c['address']['geo']['lng'] }}
                                        </small>
                                    </div>
                                    <span class="badge bg-info">{{ $c['distance'] }} KM</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted text-center">Tidak ada data rekan lain untuk dihitung jaraknya.</p>
                    @endif

                    <div class="mt-4 text-center">
                        <a href="/employees" class="btn btn-secondary">Kembali ke Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>