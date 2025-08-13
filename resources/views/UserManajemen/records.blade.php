<link rel="stylesheet" href="{{ asset('css/user-record.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

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
                            <th>User ID</th>
                            <th>Nama</th>
                            <th>Usia</th>
                            <th>Alamat</th>
                            <th>Pekerjaan</th>
                            <th>No. WA</th>
                            <th>Nilai Pre-Test</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Data Record --}}
                        <tr><td>1</td><td>Ahmad Fauzi</td><td>28</td><td>Surabaya</td><td>Guru</td><td>081234567890</td><td>80</td></tr>
                        <tr><td>2</td><td>Siti Aminah</td><td>25</td><td>Malang</td><td>Perawat</td><td>081234567891</td><td>75</td></tr>
                        <tr><td>3</td><td>Rudi Hartono</td><td>32</td><td>Sidoarjo</td><td>Petani</td><td>081234567892</td><td>60</td></tr>
                        <tr><td>4</td><td>Maria Ulfa</td><td>30</td><td>Gresik</td><td>Wiraswasta</td><td>081234567893</td><td>90</td></tr>
                        <tr><td>5</td><td>Budi Santoso</td><td>27</td><td>Pasuruan</td><td>Mahasiswa</td><td>081234567894</td><td>70</td></tr>
                        <tr><td>6</td><td>Lina Wulandari</td><td>26</td><td>Blitar</td><td>Dokter</td><td>081234567895</td><td>85</td></tr>
                        <tr><td>7</td><td>Andi Prasetyo</td><td>35</td><td>Kediri</td><td>PNS</td><td>081234567896</td><td>65</td></tr>
                        <tr><td>8</td><td>Rina Kurnia</td><td>29</td><td>Banyuwangi</td><td>Karyawan</td><td>081234567897</td><td>78</td></tr>
                        <tr><td>9</td><td>Fajar Setiawan</td><td>33</td><td>Mojokerto</td><td>Pengusaha</td><td>081234567898</td><td>82</td></tr>
                        <tr><td>10</td><td>Yuni Astuti</td><td>31</td><td>Tuban</td><td>Ibu Rumah Tangga</td><td>081234567899</td><td>88</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>