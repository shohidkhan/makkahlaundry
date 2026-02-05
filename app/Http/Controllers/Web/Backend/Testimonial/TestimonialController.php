<?php

namespace App\Http\Controllers\Web\Backend\Testimonial;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index(Request $request){
        $data = Testimonial::latest()->get();
        // if($request->ajax() ){
        //     return "ok";
        // }else{
        //     return "no";
        // }
        // return $request->ajax();
        if ($request->ajax()) {

          $data = Testimonial::latest()->get();

            // dd( $data);
            // return $data;
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($data) {
                    return '<img src="' . asset($data->image) . '" width="70px" height="70px" />';
                })
                ->addColumn('video', function ($data) {
                    if ($data->video) {
                        $url = asset($data->video);
                        return '<video width="200" height="80" controls>
                                    <source src="' . $url . '" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>';
                    } else {
                        return '<span>No Video Available</span>';
                    }
                })
                ->addColumn('action', function ($data) {
                    return '<div class="text-center"><div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="'.route('admin.testimonial.edit', ['testimonial' => $data->id]).'" class="text-white btn btn-primary" title="Edit">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                </svg>
                                </a>
                                <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" type="button" class="text-white btn btn-danger" title="Delete">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                                </a>
                            </div>';
                })
                ->rawColumns(['image', 'action', 'video'])
                ->make(true);
        }
        return view('backend.layouts.cms.testimonial.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.layouts.cms.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'designation' => 'required|max:255',
            'image' => 'required|image',
            'video' => 'required|file',
            'rating' => 'required|numeric',
        ]);


        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = uploadImage($request->file('image'), 'testimonial');
        }

        $videoName = null;
        if ($request->hasFile('video')) {
            $videoName = uploadImage($request->file('video'), 'testimonial');
        }

        Testimonial::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imageName,
            'video' => $videoName,
            'rating' => $request->rating
        ]);

        return redirect()->route('admin.testimonial.index')->with('t-success', 'Testimonial Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Testimonial::find($id);

        return view('backend.layouts.cms.testimonial.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'designation' => 'required|max:255',
            'image' => 'image',
            'video' => 'file',
            'rating' => 'required|numeric',
        ]);

        $data = Testimonial::find($id);

        $imageName = null;
        $videoName = null;

        if($request->hasFile('image')) {
            if ($data->image) {
                $previousImagePath = public_path($data->image);
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
            $imageName = uploadImage($request->file('image'), 'testimonial');
        }else{
            $imageName = $data->image;
        }


        if($request->hasFile('video')) {
            if ($data->video) {
                $previousVideoPath = public_path($data->video);
                if (file_exists($previousVideoPath)) {
                    unlink($previousVideoPath);
                }
            }
            $videoName = uploadImage($request->file('video'), 'testimonial');
        }else{
            $videoName = $data->video;
        }

        $data->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imageName,
            'video' => $videoName,
            'rating' => $request->rating
        ]);

        return redirect()->route('admin.testimonial.index')->with('t-success', 'Testimonial Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data  = Testimonial::find($id);

        if ($data->image) {
            $previousImagePath = public_path($data->image);
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }
        }

        if ($data->video) {
            $previousVideoPath = public_path($data->video);
            if (file_exists($previousVideoPath)) {
                unlink($previousVideoPath);
            }
        }

        $data->delete();
        return response()->json([
            'success' => true,
            'message' => 'Testimonial Deleted Successfully'
        ]);
    }
}