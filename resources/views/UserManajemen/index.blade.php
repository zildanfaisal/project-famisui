<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAMISUI | User Manajemen</title>
    <link rel="stylesheet" href="{{ asset('css/user-record.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div class="layout">
        {{-- Sidebar --}}
        <div class="sidebar">
            <h2>
                <a href="/" class="btn-back">Dashboard</a>
            </h2>

            <ul>
                <li>
                    <a href="{{ route('admin.users.index') }}" class="active">
                    User Manajemen
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.records') }}">
                    User Record
                    </a>
                </li>
            </ul>
        </div>

        {{-- Konten Utama --}}
        <div class="content">
            <h1>USER MANAJEMEN</h1>

            @if(session('success'))
                <div class="alert alert-success" style="margin-bottom: 15px;">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" style="margin-bottom: 15px;">
                    {{ session('error') }}
                </div>
            @endif

            <div class="table-container">
                <div class="table-wrapper">
                    <h1>Daftar Admin</h1>
                    <table style="margin-bottom: 30px;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. WA</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admin as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->phone }}</td>
                                <td><a href="{{ route('admin.users.edit', $d->id) }}" class="btn btn-warning btn-sm" >Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <h1>Daftar User</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Usia</th>
                                <th>No. WA</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->usia }}</td>
                                <td>{{ $user->phone }}</td>
                                <td><a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm" >Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>