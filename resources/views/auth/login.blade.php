@include('components.navbar')

<div style="width:100%; height:100vh; background:url('/img/background-hospital.jpg'); background-size:cover;">
    <div style="width:400px; margin:auto; padding-top:120px;">
        <h2 style="color:white; font-size:28px; text-align:center;">
            SELAMAT DATANG DI MYMEDICAL
        </h2>

        <!-- FORM LOGIN -->
        <form action="{{ route('login.process') }}" method="POST"
              style="background:rgba(255,255,255,0.85); padding:20px; border-radius:10px; margin-top:20px;">
            @csrf

            <input type="email" name="email" placeholder="Email" required
                   style="width:100%; padding:10px; margin-bottom:10px;">

            <input type="password" name="password" placeholder="Password" required
                   style="width:100%; padding:10px; margin-bottom:10px;">

            <button style="width:100%; padding:10px; background:#1976d2; color:white; border:none; border-radius:5px;">
                Masuk
            </button>

            <div style="text-align:center; margin-top:10px;">
                <a href="/login-medical">Masuk sebagai Tenaga Medis</a>
            </div>
        </form>
    </div>
</div>
