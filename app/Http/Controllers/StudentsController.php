<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use App\Models\Student;


class StudentsController extends Controller
{
    use ValidatesRequests;
    public function index() : View {
        $students = Student::latest()->paginate(5);//get data

        return view('students.index', compact('students'));
    }


    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'name'              => 'required',
            'nisn'              => 'required',
            'gender'            => 'required',
            'date_of_birth'     => 'required',
            'place_of_birth'     => 'required',
            'image'             => 'required',
            
        ]);

        //upload image
        /* $image = $request->file('image');
        $image->storeAs('public/post', $image->hashName()); */
        $images = 'storage/' .  $request->file('image')->store('images/posts','public');

        //create post
        Student::create([
            /* 'image'     => $images,
            'title'     => $request->title,
            'content'   => $request->content */
            'name'     => $request->name,
            'nisn'     => $request->nisn,
            'gender'   => $request->gender,
            'date_of_birth'     => $request->date_of_birth,
            'place_of_birth'     => $request->place_of_birth,
            'image'     => $images,
            'timestamps'   => $request->timestamps
        ]);

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        //get post by ID
        $students = Student::findOrFail($id);

        //render view with post
        return view('students.show', compact('students'));
    }

    public function edit(string $id): View
    {
        //get post by ID
        $students = Student::findOrFail($id);

        //render view with post
        return view('students.edit', compact('students'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            
            'name'     => 'required',
            'nisn'   => 'required',
            'gender'   => 'required',
            'date_of_birth'   => 'required',
            'place_of_birth'   => 'required',          
            
        ]);

        //get post by ID
        $students = Student::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $images = 'storage/' .  $request->file('image')->store('images/posts','public');

            
           
            //update post with new image
            $students->update([
                                'name'     => $request->name,
                'nisn'   => $request->nisn,
                'gender'   => $request->gender,
                'date_of_birth'   => $request->date_of_birth,
                'place_of_birth'   => $request->place_of_birth,
                'image'     => $images, // replace old image with new image if exists   // 'image'     => $images, // replace old image with new image if exists   // 'image


                
            ]);

        } else {

            //update post without image
            $students->update([
                'nisn'   => $request->nisn,
                'gender'   => $request->gender,
                'date_of_birth'   => $request->date_of_birth,
                'place_of_birth'   => $request->place_of_birth,
            ]);
        }

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $students = Student::findOrFail($id);

        
        //delete post
        $students->delete();

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}