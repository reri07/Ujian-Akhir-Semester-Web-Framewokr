<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/manage/{{ $spacework->id_space }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="modal-body">
            <!-- form input -->
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="">Upload Gambar Space</label>
                    <div class="input-group ">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" value="">
                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <!-- <span class="input-group-text" id="inputGroupFileAddon02">Upload</span> -->
                            <a class="btn input-group-text"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
                    <input class="form-control" type="text" placeholder="Default input" name="pemilik" value="">
                    @error('pemilik')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-6 mb-3">
                    <label for="">Nama Space</label>
                    <input class="form-control" type="text" placeholder="Default input" name="nama_space" value="">
                    @error('nama_space')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-6 mb-3">
                    <label for="">Lokasi Space</label>
                    <input class="form-control" type="text" placeholder="Default input" name="lokasi" value="">
                    @error('lokasi')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-auto">
                    <label for="">Harga</label>
                    <!-- <label class="sr-only" for="inlineFormInputGroup">Username</label> -->
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="0" name="harga" value="">
                    </div>
                    @error('harga')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <!--  -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-upload">Simpan</button>
        </div>
    </form>
</body>

</html>