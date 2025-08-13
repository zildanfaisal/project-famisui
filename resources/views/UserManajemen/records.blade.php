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
                    <a href="{{ route('admin.users.index') }}">
                    User Manajemen
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.records') }}" class="active">
                    User Record
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.reviews') }}">
                    User Review
                    </a>
                </li>
            </ul>
        </div>

        {{-- Konten Utama --}}
        <div class="content">
            <h1>USER RECORD</h1>

            <div class="table-container">
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Pekerjaan</th>
                                <th>No. WA</th>
                                <th>Nilai Pre-Test</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr style="cursor: pointer;" onclick="window.location='{{ route('admin.users.detail-records', $user->id) }}'">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->usia }}</td>
                                    <td>{{ $user->pekerjaan }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->pretest->skor ?? '-' }}</td>
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