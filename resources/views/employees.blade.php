<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #F5F5DC; font-family: 'Poppins', sans-serif; font-weight: 700; }
        
        .sidebar { 
            background: linear-gradient(180deg, #5D4037 0%, #3E2723 100%); 
            color: #D7CCC8; height: 100vh; position: fixed; width: 250px; padding: 20px; 
            font-weight: 700;
        }
        
        .main-content { margin-left: 250px; padding: 40px; }
        
        .card { 
            background: rgba(255, 255, 255, 0.95); 
            border-radius: 20px; 
            box-shadow: 0 10px 30px rgba(93, 64, 55, 0.15); 
            border: none; 
        }

        .table thead { background-color: #A1887F; color: white; }
        .btn-primary { background-color: #5D4037; border: none; }
        .btn-outline-primary { color: #5D4037; border-color: #5D4037; }
        .btn-outline-primary:hover { background-color: #5D4037; color: white; }
        .text-center {font-weight: 700;}

    </style>
</head>

<body>
<div class="sidebar">
    <h4 class="text-center">ADMIN PANEL</h4>
    <hr>
    <nav class="nav flex-column">
        <a class="nav-link text-white" href="/">🏢 Home</a>
        <a class="nav-link text-white" href="/employees">🧑‍💼 Data Karyawan</a>
    </nav>
</div>

<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color: #5D4037; font-weight: 700;">Data Karyawan</h2>
    </div>

    <div class="card p-4">
        <form action="/employees" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama..." value="{{ request('search') }}">
                <button class="btn btn-primary px-4">Cari</button>
            </div>
        </form>

        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>AVATAR</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        <img src="https://api.dicebear.com/7.x/adventurer/svg?seed={{$user['name']}}" 
                             width="40" height="40" class="rounded-circle shadow-sm">
                    </td>
                    <td><strong>{{$user['name']}}</strong></td>
                    <td>{{$user['email']}}</td>
                    <td>
                        <a href="/user/{{$user['id']}}" class="btn btn-sm btn-outline-primary">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
