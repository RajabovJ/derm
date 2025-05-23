<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Assesment;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{

    public function melImages()
    {
        $user = Auth::user();
        $melAssesments = Assesment::with('image', 'diagnosisResult')
            ->whereHas('diagnosisResult', function ($query) {
                $query->where('result', 'mel');
            })
            ->paginate(100); // paginate ishlatilmoqda
            switch ($user->role->name) {
                case 'doctor':
                    return view('doctor.assesments.mel_images', [
                        'melAssesments'=>$melAssesments,
                        'user'=>$user,
                    ]);
                case 'admin':
                    return view('admin.assesments.mel_images', [
                        'melAssesments'=>$melAssesments,
                        'user'=>$user,
                    ]);
                default:
                    abort(403, 'Sizga bu sahifani ko‘rishga ruxsat berilmagan.');
                }

    }
    public function index()
    {
        //
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
    public function store(StoreImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
