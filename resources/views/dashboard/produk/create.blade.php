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
                                <h1 class="h2 mb-0 ls-tight">Create News</h1>
                            </div>
                        </div>

                    </div>
                </div>
                <main>
                    <div class="col-lg-8 mt-5">
                        {{-- enctype="multipart/form-data" untuk menambahkan fungsi upload file --}}
                        <form method="post" action="/dashboard/news" class="mb-5" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" autofocus required value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="{{ old('slug') }}" readonly>

                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" name="category_id">
                                    @foreach ($categories as $category)
                                        @if (old('category_id') == $category->id)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Image</label>
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                <input class="@error('image') is-invalid @enderror form-control" type="file"
                                    id="image" name="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>
                                @error('body')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input id="body" type="hidden" name="body" required>
                                <trix-editor input="body"></trix-editor>

                            </div>
                            <button type="submit" class="btn btn-primary">Create News</button>
                        </form>
                    </div>
                </main>
            </div>
        </header>
    </div>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        title.addEventListener('change', function() {
            fetch('/dashboard/news/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

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
