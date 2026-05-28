<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/img/gedung_tinggi.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .hero {
            text-align: center;
            color: #FFFFFF;
            padding: 40px;
            background: rgba(93, 64, 55, 0.8); 
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            backdrop-filter: blur(10px); 
        }

        h1.display-3 {
            font-weight: 700;
            margin-bottom: 20px;
        }

        .lead {
            font-weight: 400;
            margin-bottom: 30px;
        }

        .btn-custom {
            background-color: #A1887F; 
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #FFFFFF;
            color: #5D4037;
            transform: translateY(-3px); 
        }
    </style>
</head>
<body>
    <div class="hero">
        <h1 class="display-3">Global Partner <br> Employee Directory</h1>
        <p class="lead">Sistem Terintegrasi untuk Manajemen Data Karyawan Multi-Perusahaan</p>
        <a href="/employees" class="btn-custom">Akses Direktori Karyawan</a>
    </div>
</body>
</html>
