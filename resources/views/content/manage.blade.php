    @extends('layout.index')
    @section('content')
      <!-- breadcrumb-section -->
      <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
              <div class="breadcrumb-text">
                <p>Kelola Space Work Anda</p>
                <h1>Kelola</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end breadcrumb section -->

      <!-- cart -->
      <div class="row">
        <div class="col-md-12">
          <div class="product-filters">
            <ul>
              <li class="active" id="btn_space">My Space</li>
              <li id="btn_order">List Order</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- my space -->
      <div class="cart-section mb-150" id="my_space">
        <div class="container">
          <a href="{{ route('manage.create') }}" class="boxed-btn black mb-4">
            Tambah Space
          </a>
          <div class="row mt-3">
            <div class="col-lg-12 col-md-12">
              <div class="row">
                @forelse($spacework as $sp)
                  <div class="col-lg-3 col-md-6">
                    <div class="single-latest-news">
                      <a href="single-news.html">
                        <div class="latest-news-bg" style="background-image: url(<?= asset('storage/storage/' . $sp->image); ?>);">
                        </div>
                      </a>
                      <div class="news-text-box text-center">
                        <h3><a href="single-news.html" class="text-uppercase">{{ $sp->nama_space }}</a>
                        </h3>
                        <p class="blog-meta">
                          <span class="author"><i class="fas fa-user"></i>{{ $sp->pemilik_space }}</span>
                        </p>
                        <p class="blog-meta">
                          <span class="date"><i
                              class="fas fa-calendar"></i><?= $sp->id_fasilitas == '' ? 'Tidak Ada Fasilitas' : '<i class="fas fa-check"></i>' ?></span>
                        </p>
                        <a class="boxed-btn black mb-4" href="{{ route('manage.edit', $sp->id_space) }}">
                          Edit
                        </a>
                      </div>
                    </div>
                  </div>
                @empty'
                  <div class="col text-center pt-4 pb-4">
                    No Data
                  </div>
                @endforelse
              </div>
            </div>
          </div>
          <!-- Pagination -->
          <div class="row justify-content-center mt-5">
            {{ $spacework->links() }}
          </div>
        </div>
      </div>
      <!-- end my space -->

      <!-- list order -->
      <div class="cart-section mb-150" id="list_order">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
              <div class="cart-table-wrap">
                <table class="cart-table">
                  <thead class="bg-primary">
                    <tr class="table-head-row">
                      <th><strong>Jumlah Order</strong></th>
                      <th><strong>Pendapatan</strong></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <h3>{{ count($history) }}</h3>
                      </td>
                      <td>
                        <h3>Rp.{{ $harga * $jml_orang }}</h3>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="col-lg-12 col-md-12">
              <div class="cart-table-wrap">
                <table class="cart-table">
                  <thead class="cart-table-head">
                    <tr class="table-head-row">
                      <th class="product-remove">#</th>
                      <th class="product-image">Gambar Space</th>
                      <th class="product-name">Space</th>
                      <th class="product-price">Price</th>
                      <th class="product-quantity">Harga</th>
                      <th class="product-total">Status</th>
                      <th class="product-total">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    @forelse($history as $his)
                      <tr class="table-body-row">
                        <td class="product-remove"><?= $no++ ?></a></td>
                        <td class="product-image">
                          <img src="<?= asset('storage/storage/' . $his->image) ?>" alt=""
                            onclick="return imgHis('{{ asset('storage/storage/' . $his->image) }}')">
                        </td>
                        <td class="product-price">{{ $his->kd_boking }}</td>
                        <td class="product-name">{{ $his->nama_space }}</td>
                        <td class="product-price">{{ $his->satuan_harga * $his->jml_orang }}</td>
                        <td class="product-price">
                          @if ($his->status == 'pending')
                            <i class="fa fa-spinner text-danger" aria-hidden="true"></i>
                          @else
                            <i class="fa fa-check text-success" aria-hidden="true"></i>
                          @endif
                        </td>
                        <td class="product-price">
                          <a class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#history{{ $his->id_boking }}">
                            <i class="fa fa-pen " aria-hidden="true"></i>
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
      <!-- end my space -->


      <!-- Modal  payment-->
      @foreach ($history as $his)
        <div class="modal fade" id="history{{ $his->id_boking }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog- modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h3><span class="orange-text">Terima</span> Transaksi</h3>
                <a type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </a>
              </div>

              <div class="modal-body">
                <h4><strong>{{ $his->kd_boking }}</strong></h4>
                <div class="row">
                  <div class="col-6">
                    <strong>Space :</strong>
                  </div>
                  <div class="col-6">
                    <span>{{ $his->nama_space }}</span>
                  </div>

                  <div class="col-6">
                    <strong>No. Hp Pemesan :</strong>
                  </div>
                  <div class="col-6">
                    <span>{{ $his->no_hp }}</span>
                  </div>

                  <div class="col-6">
                    <strong>Rek.Tujuan :</strong>
                  </div>
                  <div class="col-6">
                    <span>{{ $his->no_rek }}</span>
                  </div>

                  <div class="col-6">
                    <strong>nama pemesan :</strong>
                  </div>
                  <div class="col-6">
                    <span>{{ $his->name }}</span>
                  </div>

                  <div class="col-6">
                    <strong>nama Pemilik :</strong>
                  </div>
                  <div class="col-6">
                    <span>{{ $his->pemilik_space }}</span>
                  </div>

                  <div class="col-6">
                    <strong>Tanggal :</strong>
                  </div>
                  <div class="col-6">
                    <span>{{ $his->tgl_boking }}</span>
                  </div>

                  <div class="col-6">
                    <strong>Jam :</strong>
                  </div>
                  <div class="col-6">
                    <span>{{ $his->jam_boking }} <strong>s/d</strong> {{ $his->jam_keluar }}</span>
                  </div>

                  <div class="col-6">
                    <strong>Jumlah Orang :</strong>
                  </div>
                  <div class="col-6">
                    <span>{{ $his->jml_orang }}</span>
                  </div>

                  <div class="col-6">
                    <strong>Harga per-Orang :</strong>
                  </div>
                  <div class="col-6">
                    <span>Rp. {{ $his->satuan_harga }}</span>
                  </div>

                  <div class="col-6">
                    <strong>Status Pembayaran :</strong>
                  </div>
                  <div class="col-6">
                    <span class="{{ $his->status == 'sukses' ? 'badge badge-success' : 'badge badge-secondary' }}">{{ $his->status }}</span>
                  </div>

                  <div class="col-6 mt-4">
                    <h3><strong>Total:</strong></h3>
                  </div>
                  <div class="col-6 mt-4">
                    <h4><strong>Rp. {{ $his->satuan_harga * $his->jml_orang }}</strong></h4>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @if ($his->status == 'pending')
                  <a class="btn btn-primary text-light" onclick="return payment('/payment/{{ $his->id_boking }}')">Terima</a>
                @endif
              </div>
            </div>
          </div>
        </div>
      @endforeach
      <!-- end Modal -->


      {{-- end getLocation --}}

      <script>
        // document.getElementById('list_order').style.display = "none";
        document.getElementById('list_order').style.display = "none";
        let btn_space = document.getElementById('btn_space');
        let btn_order = document.getElementById('btn_order');
        let btn_history = document.getElementById('btn_history');
        let list_order = document.getElementById('list_order');
        let my_space = document.getElementById('my_space');

        if (btn_order.addEventListener('click', function() {
            list_order.style.display = "";
            my_space.style.display = "none";

          })) {} else if (btn_space.addEventListener('click', function() {
            my_space.style.display = "";
            list_order.style.display = "none";
          })) {

        } {

        };

        var pay = document.getElementById('pay');

        function payment(url) {
          Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Ingin Menerima Pembayaran!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Nggak Jadi'
          }).then((result) => {
            if (result.isConfirmed) {
              document.location = url;
            }
          })
        }

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
