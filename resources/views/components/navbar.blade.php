<nav style="display:flex; justify-content:space-between; align-items:center; width: 100%; padding: 15px 40px; box-sizing: border-box; background: #e3f2fd; box-shadow: 0 4px 6px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 1000;">
    
    {{-- KIRI: LOGO --}}
    <div style="font-weight:800; font-size:26px; color:#1565c0; display:flex; align-items:center; gap:10px;">
        <i class="fa-solid fa-square-h"></i>
        <span>MYMEDICAL</span>
    </div>

    {{-- TENGAH: MENU --}}
    <div style="display:flex; gap:30px;">
        <a href="{{ route('home') }}" style="text-decoration:none; color:#333; font-weight:600; font-size:16px; transition:0.3s;">
            BERANDA
        </a>
        <a href="{{ route('home') }}#menu-area" style="text-decoration:none; color:#333; font-weight:600; font-size:16px; transition:0.3s;">
            MENU
        </a>
        <a href="#" style="text-decoration:none; color:#333; font-weight:600; font-size:16px; transition:0.3s;">
            PENGATURAN
        </a>
    </div>

    {{-- KANAN: LOGIKA LOGIN/LOGOUT --}}
    <div>
        @auth
            {{-- JIKA SUDAH LOGIN: Tampilkan Profil --}}
            <a href="{{ route('profile') }}" style="display:flex; align-items:center; gap:10px; text-decoration:none; background:white; padding:8px 20px; border-radius:30px; box-shadow:0 2px 5px rgba(0,0,0,0.1); color:#1565c0; font-weight:bold;">
                <i class="fa-solid fa-circle-user" style="font-size:24px;"></i>
                <span>{{ Auth::user()->nama_lengkap }}</span>
            </a>
        @else
            {{-- JIKA TAMU: Tampilkan Tombol Login --}}
            <a href="{{ route('login') }}" style="display:flex; align-items:center; gap:10px; text-decoration:none; background:#1565c0; padding:8px 25px; border-radius:30px; box-shadow:0 2px 5px rgba(0,0,0,0.2); color:white; font-weight:bold;">
                <i class="fa-solid fa-right-to-bracket"></i>
                <span>Masuk</span>
            </a>
        @endauth
    </div>

</nav>