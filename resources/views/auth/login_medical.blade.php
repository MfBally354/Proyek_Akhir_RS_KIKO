@include('components.navbar')

<div style="width:100%; height:100vh; background:url('/img/background-hospital.jpg'); background-size:cover;">
    <div style="width:400px; margin:auto; padding-top:120px;">
        <h2 style="color:white; font-size:28px; text-align:center;">
            LOGIN TENAGA MEDIS
        </h2>

        <form style="background:rgba(255,255,255,0.85); padding:20px; border-radius:10px; margin-top:20px;">
            <input type="text" placeholder="Username" style="width:100%; padding:10px; margin-bottom:10px;">
            <input type="password" placeholder="Password" style="width:100%; padding:10px; margin-bottom:10px;">

            <button style="width:100%; padding:10px; background:#00796b; color:white; border:none; border-radius:5px;">
                Masuk
            </button>
        </form>
    </div>
</div>

