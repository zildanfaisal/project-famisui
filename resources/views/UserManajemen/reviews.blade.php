<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LactaCare | User Manajemen</title>
    <link rel="stylesheet" href="{{ asset('css/user-record.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/testimonials/testimonial-3/assets/css/testimonial-3.css">
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
                    <a href="{{ route('admin.users.records') }}">
                    User Record
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.reviews') }}" class="active">
                    User Review
                    </a>
                </li>
            </ul>
        </div>

        {{-- Konten Utama --}}
        <div class="content">
            <h1>USER REVIEW</h1>

            <!-- Testimonial 3 - Bootstrap Brain Component -->
            <section class="bg-light py-5 py-xl-8">
            <!-- <div class="container">
                <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">Happy Customers</h2>
                    <p class="display-5 mb-4 mb-md-5 text-center">We deliver what we promise. See what clients are expressing about us.</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
                </div>
            </div> -->

            <div class="container overflow-hidden">
                <div class="row gy-4 gy-md-0 gx-xxl-5">
                    <!-- Card 1 -->
                    @forelse ($reviews as $review)
                    <div class="col-12 col-md-4">
                        <div class="card border-0 border-bottom border-primary shadow-sm">
                            <div class="card-body p-4 p-xxl-5 text-center">
                                <figure>
                                    <!-- Hapus gambar -->
                                    <figcaption>
                                        <!-- Bintang review diperbesar & center -->
                                        <div class="bsb-ratings text-warning mb-3 fs-1" data-bsb-star="{{ $review->rating }}" data-bsb-star-off="{{ 5 - $review->rating }}"></div>
                                        <!-- Hapus background icon tanda kutip -->
                                        <blockquote class="mb-4">
                                            {{ $review->feedback }}
                                        </blockquote>
                                        <h4 class="mb-2">{{ $review->user->name }}</h4>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p class="text-center">Belum ada review.</p>
                    @endforelse
                </div>
            </div>
            </section>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>