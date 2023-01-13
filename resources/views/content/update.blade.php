@extends('layout.index')
@section('content')
  <!-- breadcrumb-section -->
  <div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
          <div class="breadcrumb-text">
            <p>Kelola Space Work Anda</p>
            <h1>Ubah Space</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end breadcrumb section -->

  <div class="checkout-section mt-150 mb-150">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="checkout-accordion-wrap">
            <div class="accordion" id="accordionExample">
              <div class="card single-accordion">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                      aria-controls="collapseOne">
                      Data Space
                    </button>
                  </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                  <div class="card-body">
                    <div class="billing-address-form">
                      @foreach ($spacework as $sp)
                        <!-- form input -->
                        <form action="{{ route('manage.update', $sp->id_space) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <!-- form input -->
                            <div class="row">
                              <div class="col-6 mb-3">
                                <label for="">Upload Gambar Space</label>
                                <div class="input-group ">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" value="{{ $sp->image }}">
                                    <label class="custom-file-label" aria-describedby="inputGroupFileAddon02">Upload
                                      Gambar</label>
                                  </div>
                                  <div class="input-group-append">
                                    <!-- <span class="input-group-text" id="inputGroupFileAddon02">Upload</span> -->
                                    <a class="btn input-group-text" data-toggle="modal" data-target="#imgPreview{{ $sp->id_space }}"><i
                                        class="fa fa-eye" aria-hidden="true"></i></a>
                                  </div>
                                </div>
                                @error('image')
                                  <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <div class="col-6 mb-3">
                                <label for="">Pemilik</label>
                                <input type="hidden" name="location" id="location" value="{{ $sp->lokasi }}">
                                <input class="form-control" type="text" placeholder="Default input" name="pemilik" value="{{ $sp->pemilik_space }}">
                                @error('pemilik')
                                  <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <div class="col-6 mb-3">
                                <label for="">Nama
                                  Space</label>
                                <input class="form-control" type="text" placeholder="Default input" name="nama_space" value="{{ $sp->nama_space }}">
                                @error('nama_space')
                                  <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                              <div class="col-6">
                                <label for="">Harga
                                  /Orang</label>
                                <!-- <label class="sr-only" for="inlineFormInputGroup">Username</label> -->
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      Rp.
                                    </div>
                                  </div>
                                  <input type="number" class="form-control" placeholder="0" name="harga" value="{{ $sp->harga }}">
                                </div>
                                @error('harga')
                                  <div class="alert alert-danger">
                                    {{ $message }}
                                  </div>
                                @enderror
                              </div>
                            </div>

                            <h3 class="mt-3">
                              <strong>Fasilitas</strong>
                            </h3>
                            <div class="row">
                              <div class="col-6 mt-2">
                                <input type="text" class="form-control" name="fas1" value="{{ $sp->fasilitas_1 }}">
                              </div>
                              <div class="col-6 mt-2">
                                <input type="text" class="form-control" name="fas2" value="{{ $sp->fasilitas_2 }}">
                              </div>
                              <div class="col-6 mt-2">
                                <input type="text" class="form-control" name="fas3" value="{{ $sp->fasilitas_3 }}">
                              </div>
                              <div class="col-6 mt-2">
                                <input type="text" class="form-control" name="fas4" value="{{ $sp->fasilitas_4 }}">
                              </div>

                              {{-- TOMBOL --}}
                              <div class="col-6 mt-4">
                                <a href="#" onclick="return hapusData('/destroy/{{ $sp->id_space }}')" class="btn btn-danger">Hapus</a>
                              </div>
                              <div class="col-6 mt-4 text-right">
                                <button type="submit" class="btn btn-primary" id="btn-upload">Simpan</button>
                              </div>
                              {{-- END tOMBOL --}}
                            </div>
                            <!--  -->
                          </div>
                        </form>
                        <!--  -->
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- map --}}
        <div class="col-lg-5">
          <div class="checkout-accordion-wrap">
            <div class="accordion" id="accordionExample">
              <div class="card single-accordion">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                      aria-controls="collapseOne">
                      Pilih Lokasi Space
                    </button>
                  </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                  <div class="card-body">
                    <div class="billing-address-form">
                      <div id="map" style="width: 370px; height: 400px;">
                      </div>
                      @error('location')
                        <div class="alert alert-danger mt-2">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- end map --}}
      </div>
    </div>
  </div>

  {{-- Image Preview --}}
  @foreach ($spacework as $sp)
    <div class="modal fade" id="imgPreview{{ $sp->id_space }}" tabindex="-1" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog modal-dialog- modal-lg" style="max-width: 866px">
        <div class="modal-content" style="border: transparent; background-color: transparent">
          <img src="<?= asset('storage/storage/' . $sp->image) ?>" alt="">
        </div>
      </div>
    </div>
  @endforeach
  {{-- end Image Preview --}}


  @foreach ($spacework as $sp)
    <script>
      var map = L.map('map').setView([{{ $sp->lokasi }}], 19);

      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
      }).addTo(map);


      // menambhkan kordinat
      var locationInput = document.querySelector("[name=location]");
      var locationCur = [{{ $sp->lokasi }}];
      map.attributionControl.setPrefix(false);
      var marker = L.marker(locationCur, {
        draggable: 'true',
      });
      marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
          draggable: 'true',
        }).bindPopup(position).update();
        $("#location").val(position.lat + ',' + position.lng);
      });
      map.addLayer(marker);

      map.on("click", function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
          marker = L.marker(e.latlng).addTo(map);
        } else {
          marker.setLatLng(e.latlng);
        }
        locationInput.value = lat + ',' + lng;
      });

      //   button delete

      function hapusData(url) {
        Swal.fire({
          title: 'Apakah Kamu Yakin?',
          text: "Ingin Menghapus Data ini!",
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
    </script>
  @endforeach
@endsection
