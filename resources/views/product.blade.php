
<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                {{-- Php bisa diberi if else. --}}
                {{-- session ini bisa kalian cek di controller ada "->with('success', 'Produk berhasil disimpan');"
            nah success itu kuncinya. teksnya itu "Produk berhasil disimpan"
            --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- tombol tambah --}}
                <div class="card shadow">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                        <h4 class="mb-0">Daftar Produk</h4>
                        <a href="{{ route('product.create') }}" class="btn btn-success">
                            + Tambah Produk
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th class="text-center" style="width: 200px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- products ini diambil dari controller. bisa kalian cek --}}
                                {{-- sisanya kalian pahamin sendiri. saya malas kemarin udah tak jelasin --}}
                                @forelse ($products as $p)
                                    <tr>
                                        <td>{{ $p->name }}</td>
                                        <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('product.edit', $p->id) }}"
                                                class="btn btn-sm btn-primary">
                                                Edit
                                            </a>

                                            <form method="POST" action="{{ route('product.delete', $p->id) }}"
                                                style="display:inline"
                                                onsubmit="return confirm('Yakin hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4">
                                            <em>Tidak ada data produk. Silakan tambah data.</em>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>
