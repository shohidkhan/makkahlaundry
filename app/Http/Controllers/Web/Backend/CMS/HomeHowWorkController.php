<?php

namespace App\Http\Controllers\Web\Backend\CMS;

use App\Enum\PageEnum;
use App\Enum\SectionEnum;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HomeHowWorkController extends Controller
{
    public function index(Request $request){
        $data = CMS::where('section_name', SectionEnum::HOME_HOW_WORK)->where('page_name',PageEnum::HOME)->first();
        if($request->ajax() ){
            return "ok";
        }else{
            return "no";
        }
        return $request->ajax();
        if ($request->ajax()) {

          $data = CMS::where('section_name', SectionEnum::HOME_HOW_WORKS)->where('page_name',PageEnum::HOME)->latest()
            ->get();
            // dd( $data);
            // return $data;
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('description', function ($data) {
                    $page_content = $data->description;
                    $short_page_content = strlen($page_content) > 60 ? substr($page_content, 0, 60).'...' : $page_content;

                    return '<p>'.$short_page_content.'</p>';
                })
                ->addColumn('action', function ($data) {
                    return '<div class="text-center"><div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="'.route('admin.cms.home-how-work.edit', ['id' => $data->id]).'" class="text-white btn btn-primary" title="Edit">

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
                ->rawColumns(['description', 'action', 'status'])
                ->make(true);
        }
        return view('backend.layouts.cms.home_how_work.index', compact('data'));
    }


    public function homeHowWorkUpdate(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'sub_title' => 'required',
        ]);


        CMS::updateOrCreate(['page_name' => PageEnum::HOME, 'section_name' => SectionEnum::HOME_HOW_WORK], [
            'title' => $request->title,
            'description' => $request->description,
            'sub_title' => $request->sub_title
        ]);

        return redirect()->route('admin.cms.home-how-work.index')->with('t-success', 'Data updated successfully');
    }

    public function create(){
        return view('backend.layouts.cms.home_how_work.create');
    }
    public function edit($id){
        $data   = CMS::where('page_name',PageEnum::HOME)->where('section_name',SectionEnum::HOME_HOW_WORKS)->where('id',$id)->first();
        return view('backend.layouts.cms.home_how_work.edit',compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);


        CMS::create([
            'page_name' => PageEnum::HOME,
            'section_name' => SectionEnum::HOME_HOW_WORKS,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('admin.cms.home-how-work.index')->with('t-success', 'Data created successfully');
    }

    public function update(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        CMS::where('id',$request->id)->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('admin.cms.home-how-work.index')->with('t-success', 'Data updated successfully');
    }

    public function destroy($id){
        CMS::where('id',$id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully.',
        ]);
    }
}
