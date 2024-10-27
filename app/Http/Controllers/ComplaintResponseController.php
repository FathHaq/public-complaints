<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComplaintResponseRequest;
use App\Http\Requests\UpdateComplaintResponseRequest;
use App\Models\Complaint;
use App\Models\ComplaintResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComplaintResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ComplaintResponse::all();
        return view('pages.response-complaints.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $data = Complaint::findOrFail($id);
        return view('pages.response-complaints.create', [
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'response' => 'string|required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'response.required' => 'Text Response harus diisi',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg, gif, atau svg',
            'image.max' => 'Ukuran file maksimal 2MB',
        ]);

        try {
            DB::beginTransaction();
            if ($request->image) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = 'response/images';
                $pathImage = $image->storeAs($imagePath, $imageName, 'public');
            }

            $complaint = Complaint::where('id', $id)->first();
            $complaint->status = 'proses';
            $complaint->save();

            $data = [
                'user_id' => Auth::user()->id,
                'complaint_id' => $complaint->id,
                'response' => $request->response,
                'image' => $pathImage ?? null,
            ];

            ComplaintResponse::create($data);
            DB::commit();
            return redirect()->route('complaints.response.index')->with('successMessage', 'Complaint berhasil dibuat');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('complaints.response.index')->with('errorMessage', 'Complaint tidak berhasil dibuat | '. $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ComplaintResponse $complaintResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComplaintResponse $complaintResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplaintResponseRequest $request, ComplaintResponse $complaintResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComplaintResponse $complaintResponse)
    {
        //
    }
}
