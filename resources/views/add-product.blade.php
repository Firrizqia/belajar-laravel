
<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ $title }} Produk</h4>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ $action }}">
                            @csrf

                            {{-- jadi form ini bukan hanya untuk create tapi juga bisa buat update --}}
                            {{-- jangan lupa apa bedanya POST dan PUT --}}
                            @if ($method === 'PUT')
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Produk</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $product->name ?? '') }}" placeholder="Masukkan nama produk">

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <input type="number" name="price" id="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price', $product->price ?? '') }}" placeholder="Contoh: 10000">

                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
