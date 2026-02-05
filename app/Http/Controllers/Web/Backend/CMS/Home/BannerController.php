<?php

namespace App\Http\Controllers\Web\Backend\CMS\Home;

use App\Enum\PageEnum;
use App\Enum\SectionEnum;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    public function index(Request $request){

        $data = CMS::where('page_name', PageEnum::HOME)
                    ->where('section_name', SectionEnum::HOME_BANNER)
                    ->latest()->get();

        return view('backend.layouts.cms.home_banner.index', compact('data'));
    }

    public function create(Request $request){
        return view('backend.layouts.cms.home_banner.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string',
            'sub_title'=> 'required|string',
            'description' => 'required|string',
            'background_image' => 'required|image',
        ]);

        CMS::create([
            'page_name' => PageEnum::HOME,
            'section_name' => SectionEnum::HOME_BANNER,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'background_image' => uploadImage($request->file('background_image'), 'banner'),
        ]);

        return redirect()->route('admin.cms.banner.index')->with('t-success', 'Data created successfully');
    }

    public function changeStatus($id){
        $data = CMS::findOrFail($id);
        if($data->status == 'active'){
            $data->status = 'inactive';
        }else{
            $data->status = 'active';
        }
        $data->save();

        return redirect()->route('admin.cms.banner.index')->with('t-success', 'Status changed successfully');
    }

    public function edit($id){
        $data   = CMS::where('page_name',PageEnum::HOME)->where('section_name',SectionEnum::HOME_BANNER)->where('id',$id)->first();
        return view('backend.layouts.cms.home_banner.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'description' => 'required|string',
            'background_image' => 'nullable|image',
        ]);

        // Try to find the record
        $data = CMS::where('page_name', PageEnum::HOME)
            ->where('section_name', SectionEnum::HOME_BANNER)
            ->where('id', $id)
            ->first();

        $imageName = $data?->background_image; // use existing if exists

        // If a new file is uploaded
        if ($request->hasFile('background_image')) {
            // Delete old image if exists
            if ($data && $data->background_image) {
                $path = public_path($data->background_image);
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            // Upload new one
            $imageName = uploadImage($request->file('background_image'), 'banner');
        }

        $data->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'background_image' => $imageName,
        ]);

        return redirect()
            ->route('admin.cms.banner.index')
            ->with('t-success', 'Banner updated successfully');
    }



    public function delete(Request $request,$id){
        $data = CMS::where('page_name', PageEnum::HOME)
            ->where('section_name', SectionEnum::HOME_BANNER)
            ->where('id', $id)
            ->first();

        if ($data) {
            // Delete image if exists
            if ($data->background_image) {
                $path = public_path($data->background_image);
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $data->delete();
            return redirect()
                ->route('admin.cms.banner.index')
                ->with('t-success', 'Banner deleted successfully');
        }

        return redirect()
            ->route('admin.cms.banner.index')
            ->with('t-error', 'Banner not found');
    }

}