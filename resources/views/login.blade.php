<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Masuk - Sistem Manajemen Alat Laboratorium Sistem Informasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center px-4">

  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="flex w-full max-w-5xl bg-white rounded-xl shadow-lg overflow-hidden">
      
      <!-- Kiri: Form Login -->
      <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">
        
        <!-- Logo & Universitas -->
        <div class="flex items-center space-x-4 mb-6">
          <img src="{{ asset('images/unib.png') }}" alt="Logo UNIB" class="h-12 w-12 object-contain" />
          <span class="text-lg font-semibold text-gray-800">Universitas Bengkulu</span>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang</h2>
        <p class="text-sm text-gray-500 mb-6">Sistem Manajemen Alat Laboratorium Sistem Informasi</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-1" for="email">Email</label>
                <input class="w-full px-4 py-2 border rounded-md text-gray-700 bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    type="email" id="email" name="email" placeholder="Masukkan email di sini.." />
                @error('email')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-1" for="password">Kata Sandi</label>
                <input class="w-full px-4 py-2 border rounded-md text-gray-700 bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    type="password" id="password" name="password" placeholder="Masukkan kata sandi di sini.." />
                @error('password')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition">
                Masuk
            </button>
        </form>
      </div>

      <!-- Kanan: Ilustrasi -->
      <div class="hidden md:block md:w-1/2 h-auto relative">
        <img src="{{ asset('images/ilustrasi.jpg') }}"
             alt="Ilustrasi Pemeliharaan"
             class="w-full h-full object-cover max-h-[600px]" />
      </div>
    </div>
  </div>
</body>
</html>
