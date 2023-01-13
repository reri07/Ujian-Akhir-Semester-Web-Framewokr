@extends('layout.index')
@section('content')
  <!-- Modal  History-->
  @foreach ($history as $his => $hs)
    <div class="modal fade" id="history{{ $hs->kd_boking }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3><span class="orange-text">Detail</span> Order</h3>
            <a type="button" class="btn close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body">
            <h4><strong>{{ $hs->kd_boking }}</strong></h4>
            <div class="row">
              <div class="col-6">
                <strong>Space :</strong>
              </div>
              <div class="col-6">
                <span>{{ $hs->nama_space }}</span>
              </div>

              <div class="col-6">
                <strong>No. Hp Pemesan :</strong>
              </div>
              <div class="col-6">
                <span>{{ $hs->no_hp }}</span>
              </div>

              <div class="col-6">
                <strong>Rek.Tujuan :</strong>
              </div>
              <div class="col-6">
                <span>{{ $hs->no_rek }}</span>
              </div>

              <div class="col-6">
                <strong>nama pemesan :</strong>
              </div>
              <div class="col-6">
                <span>{{ $hs->name }}</span>
              </div>

              <div class="col-6">
                <strong>nama Pemilik :</strong>
              </div>
              <div class="col-6">
                <span>{{ $hs->pemilik_space }}</span>
              </div>

              <div class="col-6">
                <strong>Tanggal :</strong>
              </div>
              <div class="col-6">
                <span>{{ $hs->tgl_boking }}</span>
              </div>

              <div class="col-6">
                <strong>Jam :</strong>
              </div>
              <div class="col-6">
                <span>{{ $hs->jam_boking }} <strong>s/d</strong> {{ $hs->jam_keluar }}</span>
              </div>

              <div class="col-6">
                <strong>Jumlah Orang :</strong>
              </div>
              <div class="col-6">
                <span>{{ $hs->jml_orang }}</span>
              </div>

              <div class="col-6">
                <strong>Harga per-Orang :</strong>
              </div>
              <div class="col-6">
                <span>Rp. {{ $hs->satuan_harga }}</span>
              </div>

              <div class="col-6">
                <strong>Status Pembayaran :</strong>
              </div>
              <div class="col-6">
                <span class="{{ $hs->status == 'sukses' ? 'badge badge-success' : 'badge badge-secondary' }}">{{ $hs->status }}</span>
              </div>

              <div class="col-6 mt-4">
                <h3><strong>Total:</strong></h3>
              </div>
              <div class="col-6 mt-4">
                <h4><strong>Rp. {{ $hs->satuan_harga * $hs->jml_orang }}</strong></h4>
              </div>
              @if ($hs->status == 'pending')
                <div class="col-8 mt-4">
                  <input type="text" class="form-control" placeholder="Masukkan No Referensi Transfer..">
                </div>
                <div class="col-4 mt-4">
                  <button class="btn btn-primary">Bayar</button>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  <!-- end Modal -->

  <div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
          <div class="breadcrumb-text">
            <p>Check History Boking</p>
            <h1>History</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end breadcrumb section -->


  <!-- cart -->
  <div class="cart-section mt-5 mb-150">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="cart-table-wrap">
            <table class="cart-table">
              <thead class="cart-table-head">
                <tr class="table-head-row">
                  <th class="product-remove">#</th>
                  <th class="product-image">Gambar Space</th>
                  <th class="product-name">Space</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Total Bayar</th>
                  <th class="product-total">Status</th>
                  <th class="product-total">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                @forelse($history as $his)
                  <tr class="table-body-row">
                    <td class="product-remove"><?= $no++ ?></a></td>
                    <td class="product-image"><img src="<?= asset('storage/storage/' . $his->image) ?>" alt=""
                        onclick="return imgHis( '{{ asset('storage/storage/' . $his->image) }}')"></td>
                    <td class="product-price">{{ $his->kd_boking }}</td>
                    <td class="product-name">{{ $his->nama_space }}</td>
                    <td class="product-price">{{ $his->satuan_harga * $his->jml_orang }}</td>
                    @if ($his->status == 'pending')
                      <td class="product-price">
                        <i class="fa fa-spinner text-danger" aria-hidden="true"></i>
                      </td>
                    @else
                      <td class="product-price">
                        <i class="fa fa-check text-success" aria-hidden="true"></i>
                      </td>
                    @endif
                    <td class="product-price">
                      <a href="" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#history{{ $his->kd_boking }}">
                        Detail
                      </a>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7">
                      <p class="text-center">No Data</p>
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
  <!-- end cart -->

  <script>
    function imgHis(img) {
      Swal.fire({
        width: 600,
        imageUrl: img,
        imageWidth: 520,
        imageHeight: 300,
      })
    }
  </script>
@endsection
