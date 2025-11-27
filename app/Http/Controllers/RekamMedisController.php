<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Patient;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index($patient_id)
    {
        $patient = Patient::findOrFail($patient_id);
        $records = RekamMedis::where('patient_id', $patient_id)->get();
        return view('rekam_medis.index', compact('patient','records'));
    }

    public function create($patient_id)
    {
        $patient = Patient::findOrFail($patient_id);
        return view('rekam_medis.create', compact('patient'));
    }

    public function store(Request $request, $patient_id)
    {
        $request->validate([
            'diagnosa' => 'required',
            'resep' => 'nullable',
            'tindakan' => 'nullable'
        ]);

        RekamMedis::create([
            'patient_id' => $patient_id,
            'diagnosa' => $request->diagnosa,
            'resep' => $request->resep,
            'tindakan' => $request->tindakan
        ]);

        return redirect()->route('rekam.index', $patient_id)->with('success','Rekam medis ditambahkan.');
    }
}
