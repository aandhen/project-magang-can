<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use App\Models\School;

class SchoolController extends Controller
{
    use ValidatesRequests;
    public function index(): View
    {
        $schools = School::latest()->paginate(5); //get data

        return view('school.index', compact('schools'));
    }


    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('school.create');
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
            'address'           => 'required',
            'description'       => 'required',
            'status'            => 'required',
            'phone'             => 'required',
            'email'             => 'required',
            'website'           => 'required',
            'accreditation'     => 'required',
            'image'             => 'required',

        ]);

        //upload image
        /* $image = $request->file('image');
        $image->storeAs('public/post', $image->hashName()); */
        $images = 'storage/' .  $request->file('image')->store('images/school', 'public');

        //create post
        School::create([
            /* 'image'     => $images,
            'title'     => $request->title,
            'content'   => $request->content */
            'name'         => $request->name,
            'address'      => $request->address,
            'description'  => $request->description,
            'status'       => $request->status,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'website'      => $request->website,
            'accreditation' => $request->accreditation,
            'image'        => $images,
            
        ]);

        //redirect to index
        return redirect()->route('school.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        //get post by ID
        $school = School::findOrFail($id);

        //render view with post
        return view('school.show', compact('school'));
    }

    public function edit(string $id): View
    {
        //get post by ID
        $school = School::findOrFail($id);

        //render view with post
        return view('school.edit', compact('school'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [

            'name'         => 'required',
            'address'      => 'required',
            'description'  => 'required',
            'status'       => 'required',
            'phone'        => 'required',
            'email'        => 'required',
            'website'      => 'required',
            'accreditation' => 'required',
            'phone'        => 'required',
            'image'        => 'required',
            

        ]);

        //get post by ID
        $school = School::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $images = 'storage/' .  $request->file('image')->store('images/posts', 'public');



            //update post with new image
            $school->update([
            'name'         => $request->name,
            'address'      => $request->address,
            'description'  => $request->description,
            'status'       => $request->status,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'website'      => $request->website,
            'accreditation' => $request->accreditation,
            'phone'        => $request->phone,
            'image'        => $images,
            

            ]);
        } else {

            //update post without image
            $school->update([
                'name'         => $request->name,
            'address'      => $request->address,
            'description'  => $request->description,
            'status'       => $request->status,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'website'      => $request->website,
            'accreditation' => $request->accreditation,
            'phone'        => $request->phone,
            
            
            ]);
        }

        //redirect to index
        return redirect()->route('school.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $school = School::findOrFail($id);


        //delete post
        $school->delete();

        //redirect to index
        return redirect()->route('school.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
