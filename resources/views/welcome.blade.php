<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Offline Meeting Scheduler - Register</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Formulir Jadwal Kunjungan</h1>
              </div>
              <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror"
                      id="nama" name="nama" placeholder="Nama lengkap Anda" value="{{ old('nama') }}">
                    @error('nama')
                      <div class="text-xs text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                      id="email" name="email" placeholder="Alamat email Anda" value="{{ old('email') }}">
                    @error('email')
                      <div class="text-xs text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user @error('instansi') is-invalid @enderror"
                      id="instansi" name="instansi" placeholder="Nama instansi Anda" value="{{ old('instansi') }}">
                    @error('instansi')
                      <div class="text-xs text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="text"
                      class="form-control form-control-user @error('handphone') is-invalid @enderror" id="handphone"
                      name="handphone" placeholder="Nomor Handphone / WhatsApp Anda" value="{{ old('handphone') }}">
                    @error('handphone')
                      <div class="text-xs text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user @error('tujuan') is-invalid @enderror"
                      id="tujuan" name="tujuan" placeholder="Nama staff atau divisi yang ingin ditemui" value="{{ old('tujuan') }}">
                    @error('tujuan')
                      <div class="text-xs text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="datetime-local"
                      class="form-control form-control-user @error('waktu') is-invalid @enderror" id="waktu"
                      name="waktu" placeholder="Tanggal dan waktu" value="{{ old('waktu') }}">
                    @error('waktu')
                      <div class="text-xs text-danger">{{ $message }}</div>
                    @else
                      <div class="text-xs text-primary">Tulis tanggal dan waktu yang dihendaki</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="3"
                    placeholder="Tulis maksud dan tujuan kedatangan Anda dengan selengkap-lengkapnya">{{ old('deskripsi') }}</textarea>
                  @error('deskripsi')
                    <div class="text-xs text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Buat Jadwal Kunjungan
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('plugins/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
