class JadwalController extends Controller
{
    public function index() {
        $jadwals = Jadwal::with('dokter')->get();
        return view('jadwal.index', compact('jadwals'));
    }

    public function create() {
        $dokters = Dokter::all();
        return view('jadwal.create', compact('dokters'));
    }

    public function store(Request $request) {

        $request->validate([
            'dokter_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        Jadwal::create($request->all());
        return redirect()->route('jadwal.index');
    }

    public function edit($id) {
        $jadwal = Jadwal::findOrFail($id);
        $dokters = Dokter::all();
        return view('jadwal.edit', compact('jadwal','dokters'));
    }

    public function update(Request $request, $id) {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());
        return redirect()->route('jadwal.index');
    }

    public function destroy($id) {
        Jadwal::destroy($id);
        return back();
    }
}

