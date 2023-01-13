@extends('layout.index')
@section('content')
  <!-- Modal -->
  <div class="modal fade" id="payment" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog- modal-lg">
      <div class="modal-content">
        <form action="/checkout/<?= $id ?>" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h3><span class="orange-text">Metode</span> Pembayaran</h3>
            <a type="button" class="btn close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          @csrf
          <div class="modal-body">
            <!-- form input -->
            <div class="form-row">
              <div class="col-6">
                <label for="formGroupExampleInput">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= Session::get('name') ?>" disabled>
                <!-- <input type="hidden" class="form-control" placeholder="No Rekening" name=""> -->
                @error('no_hp')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="col-6">
                <label for="formGroupExampleInput">No Hp</label>
                <input type="text" class="form-control" name="noHp" value="<?= Session::get('no_hp') ?>" disabled>
                <!-- <input type="hidden" class="form-control" placeholder="No Rekening" name=""> -->
              </div>
              <div class="col-5">
                <label for="formGroupExampleInput">No Rekenening</label>
                <input type="number" class="form-control" placeholder="No Rekening" name="no_rek">
                <!-- <input type="hidden" class="form-control" placeholder="No Rekening" name=""> -->
              </div>
              <div class="col-5">
                <label for="formGroupExampleInput">Rekening Tujuan</label>
                <input type="number" class="form-control" placeholder=" No Rekening Tujuan" disabled>
              </div>
              <div class="col-2">
                <label for="formGroupExampleInput">Jumlah Orang</label>
                <input type="number" class="form-control" placeholder="Jumlah Pesan" name="jml_orang">
              </div>
              <div class="col-4">
                <label for="formGroupExampleInput">Tanggal Boking</label>
                <input type="date" class="form-control" placeholder="Tanggal Boking" name="tgl_boking">
              </div>
              <div class="col-4">
                <label for="formGroupExampleInput">Jam Boking</label>
                <input type="time" class="form-control" placeholder="Jam Boking" name="jam_boking">
              </div>
              <div class="col-4">
                <label for="formGroupExampleInput">Jam Keluar</label>
                <input type="time" class="form-control" placeholder="Jam Keluar" name="jam_keluar">
              </div>
            </div>
          </div>
          <!--  -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Bayar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- breadcrumb-section -->
  <div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
          <div class="breadcrumb-text">
            <h1>Check Out Now</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end breadcrumb section -->

  <!-- check out section -->
  <div class="checkout-section mt-150 mb-150">
    <div class="container">
      <div class="row">
        @forelse($spacework as $space)
          <div class="col-lg-6">

            <img src="<?= asset('storage/storage/' . $space->image) ?>" alt="">

          </div>
          <div class="col-lg-4">
            <div class="order-details-wrap">
              <table class="order-details">
                <thead>
                  <tr>
                    <th>Space</th>
                    <th>Harga</th>
                    <th>Lokasi</th>
                  </tr>
                </thead>
                <tbody class="order-details-body">
                  <tr>
                    <td>{{ $space->nama_space }}</td>
                    <td>{{ $space->harga }}</td>
                    <td>{{ $space->lokasi }}</td>
                  </tr>
                </tbody>
              </table>
              <a class="boxed-btn black mb-4" data-toggle="modal" data-target="#payment">
                Bayar Sekarang
              </a>
              <a href="#" class="boxed-btn bg-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
            </div>
          </div>

          @if ($space->id_fasilitas)
            {{-- Fasilitas --}}
            <div class="col-lg-6 mt-3">
              <div class="order-details-wrap">
                <table class="order-details">
                  <thead>
                    <tr>
                      <th colspan="4" class="text-center"><strong>Fasilitas</strong></th>
                    </tr>
                  </thead>
                  <tbody class="order-details-body">
                    <tr>
                      <td>{{ $space->fasilitas_1 }}</td>
                      <td>{{ $space->fasilitas_2 }}</td>
                      <td>{{ $space->fasilitas_3 }}</td>
                      <td>{{ $space->fasilitas_4 }}</td>
                    </tr>
                    <tr class="text-center">
                      <?= $space->fasilitas_1 ? '<td><i class="fa fa-check text-success" aria-hidden="true"></i></td>' : '' ?>
                      <?= $space->fasilitas_2 ? '<td><i class="fa fa-check text-success" aria-hidden="true"></i></td>' : '' ?>
                      <?= $space->fasilitas_3 ? '<td><i class="fa fa-check text-success" aria-hidden="true"></i></td>' : '' ?>
                      <?= $space->fasilitas_4 ? '<td><i class="fa fa-check text-success" aria-hidden="true"></i></td>' : '' ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          @endif
        @empty
          <div class="col text-center pt-4 pb-4">
            No Data
          </div>
        @endforelse
      </div>
    </div>
  </div>
  <!-- end check out section -->
@endsection
