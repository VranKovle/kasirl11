<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="container">
        <div class="row my-3 mx-1">
            <div class="col-12">
                <button wire:click="pilihMenu('lihat')"
                    class="btn {{ $pilihanMenu == 'lihat' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Semua produk
                </button>
                <button wire:click="pilihMenu('tambah')"
                    class="btn {{ $pilihanMenu == 'tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Tambah produk
                </button>
                <button wire:click="pilihMenu('excel')"
                class="btn {{ $pilihanMenu == 'excel' ? 'btn-primary' : 'btn-outline-primary' }}">
                Impor produk
            </button>
                <button wire:loading class="btn btn-info">
                    Loading ...
                </button>
            </div>
        </div>
    </div>
    <div class="row px-5">
        <div class="col-12">
            @if ($pilihanMenu == 'lihat')
                <div class="card border-primary">
                    <div class="card-header">
                        Semua produk
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Data</th>
                            </thead>
                            <tbody>
                                @foreach ($semuaProduk as $produk)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $produk->kode }}</td>
                                        <td>{{ $produk->nama }}</td>
                                        <td>{{ $produk->harga }}</td>
                                        <td>{{ $produk->stok }}</td>
                                        <td>
                                            <button wire:click="pilihEdit({{ $produk->id }})"
                                                class="btn {{ $pilihanMenu == 'edit' ? 'btn-primary' : 'btn-outline-primary' }}">
                                                Edit produk
                                            </button>
                                            <button wire:click="pilihHapus({{ $produk->id }})"
                                                class="btn {{ $pilihanMenu == 'hapus' ? 'btn-primary' : 'btn-outline-primary' }}">
                                                Hapus produk
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @elseif ($pilihanMenu == 'tambah')
                <div class="card border-primary">
                    <div class="card-header">
                        Tambah produk
                    </div>
                    <div class="card-body">
                        <form wire:submit='simpan'>
                            <label for="">Nama</label>
                            <input type="text" class="form-control" wire:model="nama" />
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <label for="">Kode Barcode</label>
                            <input type="text" class="form-control" wire:model="kode" />
                            @error('kode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <label for="">Harga</label>
                            <input type="number" class="form-control" wire:model="harga" />
                            @error('harga')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <label for="">Stok</label>
                            <input type="number" class="form-control" wire:model="stok" />
                            @error('stok')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
            @elseif ($pilihanMenu == 'edit')
                <div class="card border-primary">
                    <div class="card-header">
                        Edit produk
                    </div>
                    <div class="card-body">
                        <form wire:submit='simpanEdit'>
                            <label for="">Nama</label>
                            <input type="text" class="form-control" wire:model="nama" />
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <label for="">Kode Barcode</label>
                            <input type="kode" class="form-control" wire:model="kode" />
                            @error('kode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <label for="">harga</label>
                            <input type="number" class="form-control" wire:model="harga" />
                            @error('harga')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <label for="">Stok</label>
                            <input type="number" class="form-control" wire:model="stok" />
                            @error('stok')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            <button type="button" class="btn btn-secondary mt-3" wire:click="batal">BATAL</button>
                        </form>
                    </div>
                </div>
            @elseif ($pilihanMenu == 'hapus')
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        Hapus produk
                    </div>
                    <div class="card-body">
                        Yakinnn?
                        <p>Nama : {{ $produkTerpilih->nama }}</p>
                        <button class="btn btn-danger" wire:click="hapus">PADAM</button>
                        <button class="btn btn-secondary" wire:click="batal">tidak jadi</button>
                    </div>
                </div>
                @elseif ($pilihanMenu == 'excel')
                <div class="card border-danger">
                    <div class="card-header bg-primary text-white">
                        Import produk
                    </div>
                    <div class="card-body">
                        <form wire:submit='imporExcel'>
                            <input type="file" class="form-control" wire:model='fileExcel'>
                            <br>

                            <button class="btn btn-priamry" type="submit">KIRIM</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
