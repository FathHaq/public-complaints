<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Complaint::all();
        return view('pages.complaints.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.complaints.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'guest_name' => 'nullable|string',
            'guest_email' => 'email|nullable',
            'guest_telp' => 'nullable',
            'title' => 'required|string',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'guest_name.string' => 'Nama harus berupa string',
            'guest_email.email' => 'Email harus berupa email',
            'title.required' => 'Judul harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'description.max' => 'Deskripsi maksimal 255 karakter',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif, atau svg',
            'image.max' => 'Ukuran file maksimal 2MB',
        ]);

        try {
            if ($request->image) {
                $pathImage = $request->image->save('/public', '/photo');
            }

            $data = [
                'user_id' => Auth::user()->id ?? null,
                'status' => 'pending',
                'title' => $request->title,
                'description' => $request->description,
                'image' => $pathImage ?? null,
            ];

            if (Auth::user() == null) {
                $data['guest_name'] = $request->guest_name;
                $data['guest_email'] = $request->guest_email;
                $data['guest_telp'] = $request->guest_telp;
            }

            Complaint::create($data);

            return redirect()->route('complaints.index')->with('successMessage', 'Complaint berhasil dibuat');
        } catch (\Throwable $th) {
            return redirect()->route('complaints.index')->with('errorMessage', 'Complaint tidak berhasil dibuat');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplaintRequest $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
}
