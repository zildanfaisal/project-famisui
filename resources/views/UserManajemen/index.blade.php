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

        <div class="table-container">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Nama</th>
                            <th>Usia</th>
                            <th>Email</th>
                            <th>No. WA</th>
                            <th>Password</th>
                            <th>Edit Password(?)</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Data User --}}
                        <tr>
                            <td>1</td><td>Ahmad Fauzi</td><td>28</td><td>ahmad@example.com</td><td>081234567890</td><td>******</td>
                            <td>Edit</td>
                        </tr>
                        <tr>
                            <td>2</td><td>Siti Aminah</td><td>25</td><td>siti@example.com</td><td>081234567891</td><td>******</td>
                            <td>Edit</td>
                        </tr>
                        <tr>
                            <td>3</td><td>Rudi Hartono</td><td>32</td><td>rudi@example.com</td><td>081234567892</td><td>******</td>
                            <td>Edit</td>
                        </tr>
                        <tr>
                            <td>4</td><td>Maria Ulfa</td><td>30</td><td>maria@example.com</td><td>081234567893</td><td>******</td>
                            <td>Edit</td>
                        </tr>
                        <tr>
                            <td>5</td><td>Budi Santoso</td><td>27</td><td>budi@example.com</td><td>081234567894</td><td>******</td>
                            <td>Edit</td>
                        </tr>
                        <tr>
                            <td>6</td><td>Lina Wulandari</td><td>26</td><td>lina@example.com</td><td>081234567895</td><td>******</td>
                            <td>Edit</td>
                        </tr>
                        <tr>
                            <td>7</td><td>Andi Prasetyo</td><td>35</td><td>andi@example.com</td><td>081234567896</td><td>******</td>
                            <td>Edit</td>
                        </tr>
                        <tr>
                            <td>8</td><td>Rina Kurnia</td><td>29</td><td>rina@example.com</td><td>081234567897</td><td>******</td>
                            <td>Edit</td>
                        </tr>
                        <tr>
                            <td>9</td><td>Fajar Setiawan</td><td>33</td><td>fajar@example.com</td><td>081234567898</td><td>******</td>
                            <td>Edit</td>
                        </tr>
                        <tr>
                            <td>10</td><td>Yuni Astuti</td><td>31</td><td>yuni@example.com</td><td>081234567899</td><td>******</td>
                            <td>Edit</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>