class DokterController extends Controller
{
    public function index() {
        $dokters = Dokter::all();
        return view('dokter.index', compact('dokters'));
    }

    public function create() {
        return view('dokter.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'spesialis' => 'required',
        ]);

        Dokter::create($request->all());

        return redirect()->route('dokter.index');
    }

    public function edit($id) {
        $dokter = Dokter::findOrFail($id);
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id) {
        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->all());

        return redirect()->route('dokter.index');
    }

    public function destroy($id) {
        Dokter::destroy($id);
        return back();
    }
}
