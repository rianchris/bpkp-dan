@extends('dashboard.layouts.main')
@section('container')
    <div class="h-screen px-3 px-lg-7 flex-grow-1 overflow-y-lg-auto">
        <header class="bg-surface-secondary border-top">
            <div class="container-xl">
                <div class="py-5 border-bottom">
                    <!-- Page heading -->
                    <div>
                        <div class="row align-items-center">
                            <div class="col-md-6 col-6 mb-3 mb-md-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Edit Produk</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <main>
                    <div class="col-lg-8 mt-5">
                        <form method="post" action="/dashboard/produk/{{ $produk->slug }}" class="mb-5" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" accept="" value="{{ old('title') ?? $produk->title }}" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="member" class="form-label">Member</label>
                                <input type="text" class="form-control" id="member" name="member" required value="{{ old('member') ?? $produk->member }}">
                                @error('member')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="hidden" name="oldImage" value={{ $produk->image }}>
                                @if ($produk->image)
                                    <img src="{{ asset('storage/' . $produk->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                                <input class="@error('image') is-invalid @enderror form-control" type="file" id="image" name="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                @error('deskripsi')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') ?? $produk->deskripsi }}">
                                <trix-editor input="deskripsi"></trix-editor>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Produk</button>
                        </form>
                    </div>
                </main>
            </div>
        </header>
    </div>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
