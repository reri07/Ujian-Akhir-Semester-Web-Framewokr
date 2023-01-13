@extends('layout.index')
@section('content')
  <!-- breadcrumb-section -->
  <div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
          <div class="breadcrumb-text">
            <p>Kelola Space Work Anda</p>
            <h1>Tambah Space</h1>
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
                      <!-- form input -->
                      <form action="{{ route('manage.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <input type="hidden" name="location" id="location">
                          <div class="col-6 mb-3">
                            <label for="">Upload Gambar Space</label>
                            <div class="input-group ">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile02" name="image" value="{{ old('image') }}">
                                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose
                                  file</label>
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
                            <input class="form-control" type="text" placeholder="Default input" name="pemilik" value="{{ old('pemilik') }}">
                            @error('pemilik')
                              <div class="alert alert-danger mt-2">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="col-6 mb-3">
                            <label for="">Nama Space</label>
                            <input class="form-control" type="text" placeholder="Default input" name="nama_space" value="{{ old('nama_space') }}">
                            @error('nama_space')
                              <div class="alert alert-danger mt-2">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>

                          <div class="col-6">
                            <label for="">Harga /Orang</label>
                            <!-- <label class="sr-only" for="inlineFormInputGroup">Username</label> -->
                            <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                              </div>
                              <input type="number" class="form-control" placeholder="0" name="harga" value="{{ old('harga') }}">
                            </div>
                            @error('harga')
                              <div class="alert alert-danger">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="col-6">
                            <label for="">No Rekenening</label>
                            <!-- <label class="sr-only" for="inlineFormInputGroup">Username</label> -->
                            <div class="input-group mb-2">
                              <input type="number" class="form-control" placeholder="xxxxxx" name="no_rek" value="{{ old('no_rek') }}">
                            </div>
                            @error('no_rek')
                              <div class="alert alert-danger">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="col-12 text-right">
                            <button type="submit" class="btn btn-success">Simpan</button>
                          </div>
                        </div>
                      </form>
                      <!--  -->
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
                      <div id="map" style="width: 370px; height: 400px;"></div>
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



  <script>
    var map = L.map('map').setView([-8.6963165848346, 116.26469482081167], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);


    // menambhkan kordinat
    var locationInput = document.querySelector("[name=location]");
    var locationCur = [-8.6963165848346, 116.26469482081167];
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
  </script>
@endsection
