<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PostListController extends Controller
{
    public function index(Request $request)
    {
        $limit = 10;
        $students = DB::table('postlist')->paginate($limit);
        return view('index', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'daylistid' => 'required|string',
            'image' => 'required|image',
            'date' => 'required|date',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(storage_path('images'), $imageName);

        DB::table('postlist')->insert([
            'daylistid' => $request->daylistid,
            'image' => $imageName,
            'date' => $request->date,
        ]);

        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = DB::table('postlist')->where('id', $id)->first();

        if ($student && File::exists(storage_path('images/' . $student->image))) {
            File::delete(storage_path('images/' . $student->image));
        }

        DB::table('postlist')->where('id', $id)->delete();

        return redirect()->route('students.index');
    }

    public function destroyMultiple(Request $request)
    {
        $ids = $request->input('ids', []);
        foreach ($ids as $id) {
            $student = DB::table('postlist')->where('id', $id)->first();

            if ($student && File::exists(storage_path('images/' . $student->image))) {
                File::delete(storage_path('images/' . $student->image));
            }

            DB::table('postlist')->where('id', $id)->delete();
        }

        return redirect()->route('students.index');
    }
}
