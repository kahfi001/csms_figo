<?php

namespace App\Http\Controllers;

use App\Models\Prequalification;
use App\Http\Requests\StorePrequalificationRequest;
use App\Http\Requests\UpdatePrequalificationRequest;
use App\Models\Category;
use App\Models\PrequalificationMinutes;
use App\Models\Result;
use App\Models\User;
use App\Models\UserResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PrequalificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category = Category::with('criteria')->get();
        if ($request->ajax()) {
            $prequalification = Prequalification::with(['user.vendordetail'])->select('prequalifications.*');

            return DataTables::eloquent($prequalification)
                ->addIndexColumn()
                ->addColumn('action', function ($prequalification) {
                    return view('prakualifikasi.action', compact('prequalification'));
                })
                ->addColumn('is_accepted', function ($prequalification) {
                    return view('prakualifikasi.is_accepted', compact('prequalification'));
                })
                ->make(true);
        }


        return view('prakualifikasi.index', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'responses' => 'required|array',
            'responses.*.response' => 'required|in:ya,tidak,na',
            'responses.*.description' => 'nullable',
            'responses.*.attachment' => 'nullable|file|mimes:jpeg,png,pdf,doc,docx|max:2048'
        ]);

        $prequalification_number = 'PRE-' . str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
        $prequalification = Prequalification::create([
            'user_id' => auth()->user()->id,
            'prequalification_number' => $prequalification_number
        ]);

        foreach ($validatedData['responses'] as $criteria_id => $response) {
            $attachmentPath = null;

            if (isset($response['attachment'])) {
                // Handle file upload
                $attachmentPath = $response['attachment']->store('attachments');
            }

            // Save the response to the database
            UserResponse::create([
                'prequalification_id' => $prequalification->id,
                'criteria_id' => $criteria_id,
                'response' => $response['response'],
                'description' => $response['description'],
                'attachment_path' => $attachmentPath,
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Responses saved successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::with('criteria')->get();
        $response = UserResponse::with(['prequalification', 'criteria'])->where('prequalification_id', $id)->get();

        // dd($response);
        return view('prakualifikasi.detail', [
            'category' => $category,
            'response' => $response
        ]);
    }

    public function storeScore(Request $request)
    {
        $totalScore = 0;
        $prequalification_id = $request->input('prequalification_id');
        $jumlahItem = count(UserResponse::where('prequalification_id', $prequalification_id)->where('response', '!=', 'na')->get());

        foreach ($request->input('scores') as $score) {
            $totalScore += intval($score);
        }

        $finalScore = $totalScore / ($jumlahItem * 3) * 100;
        $prequalificationData = Prequalification::where('id', $prequalification_id)->first();
        Prequalification::where('id', $prequalification_id)->update([
            'is_accepted' => true
        ]);

        Result::create([
            'prequalification_id' => $prequalification_id,
            'user_id' => $prequalificationData->user_id,
            'score' => $finalScore
        ]);

        $manager = User::where('role', 'manager')->first();

        $berita = PrequalificationMinutes::create([
            'user_id' => $prequalificationData->user_id,
            'hse_name' => auth()->user()->name,
            'manager_name' => $manager->name,
            'score' => $finalScore,
            'prequalification_id' => $prequalification_id
        ]);

        PrintController::beritaAcara($berita->id);

        return redirect()->route('prakualifikasi')->with('success', 'Responses saved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prequalification $prequalification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrequalificationRequest $request, Prequalification $prequalification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prequalification $prequalification)
    {
        //
    }
}
