<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 

class AuthController extends Controller
{
    // --- LOGIN ---
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // 1. Validasi Input (Wajib Email & Password)
        $credentials = $request->validate([
            'email' => ['required', 'email'], // Cek harus format email
            'password' => ['required'],
        ]);

        // 2. Cek kecocokan di Database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home')->with('success', 'Berhasil Login!');
        }

        // 3. Jika gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // --- REGISTER (DAFTAR BARU) ---
    
    // 1. Tampilkan Form Daftar
    public function register()
    {
        return view('auth.register');
    }

    // 2. Proses Simpan User Baru
    // --- PROSES PENDAFTARAN (REGISTER) ---
    public function store(Request $request)
    {
        // 1. Validasi Input
        // Kita HAPUS validasi 'username' karena form-nya sudah tidak ada
        $request->validate([
            'nama_lengkap' => 'required|max:100',
            'email' => 'required|email|unique:users,email', // Email tidak boleh kembar
            'password' => 'required|min:6',
        ]);

        // 2. Logika Penentuan Role (Admin / Perawat)
        $email = $request->email;
        $role_id = null;

        if (str_ends_with($email, '@admin')) {
            $role_id = 1; // ID 1 = Admin
        } elseif (str_ends_with($email, '@user')) {
            $role_id = 2; // ID 2 = Perawat
        } else {
            // Jika emailnya sembarangan (misal @gmail.com), tolak!
            return back()->withErrors([
                'email' => 'Email wajib menggunakan akhiran @user atau @admin.',
            ])->withInput();
        }

        // 3. LOGIKA AUTO-USERNAME (Langkah 5)
        // Fungsi explode memecah "siti@user" menjadi ["siti", "user"]
        // Kita ambil bagian [0] yaitu "siti"
        $usernameOtomatis = explode('@', $email)[0];

        // Opsional: Cek jika username "siti" sudah dipakai orang lain
        // Kita tambahkan angka acak dibelakangnya, misal "siti45" agar tidak error
        if (User::where('username', $usernameOtomatis)->exists()) {
            $usernameOtomatis = $usernameOtomatis . rand(10, 99);
        }

        // 4. Simpan ke Database
        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $usernameOtomatis, // Ini hasil generate otomatis tadi
            'email' => $email,
            'password' => Hash::make($request->password), // Password dienkripsi
            'id_role' => $role_id,
        ]);

        // 5. Login Otomatis & Masuk Dashboard
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Pendaftaran Berhasil! Selamat Datang.');
    }

    // --- LOGOUT ---
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Berhasil Logout');
    }
}