<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Functions\ProjectHelper;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Data
        $projects = Project::orderBy('id','desc')->get();

        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $data = Category::all();
        $tags = Tag::all();
        return view('admin.project.create',compact('data','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        
        $data = $request->all();

        
        $project = new Project;
        $data['slug'] = ProjectHelper::generateSlug($data['title'], Project::class);
        

        if(array_key_exists('img',$data)){
            $img = Storage::put('uploads', $data['img']);
            $img_original_name = $request->file('img')->getClientOriginalName();
            $data['img'] = $img;
            $data['img_original_name'] = $img_original_name;
        }

        $project->fill($data);
        $project->save();


        if(array_key_exists('tags',$data)){
            $project->tags()->attach($data['tags']);
        }

       
        return redirect()->route('admin.project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        
        $project = Project::find($id);
        return view('admin.project.show', compact('project',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $data = Category::all();
        $project = Project::find($id);
        $tags = Tag::all();
        // $category = Category::all();

        // Gestione della select nella checkbox;
        $selectedTags = $project->tags->pluck('id')->toArray();

        // Gestione della select per i linguaggi;
        // $selectedCategory = $project->category->pluck('id')->toArray();
        return view('admin.project.edit', compact('project','data','tags','selectedTags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $data = $request->all();
        $project = Project::find($id);

        $project->update($data);

        // Validazione dei valori di tag;
        $request->validate([
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id', 
        ]);
        

       $project->tags()->sync($request->input('tags',[]));


        if(array_key_exists('tags',$data)){
            $project->tags()->sync($data['tags']); 
        } else{
            $project->tags()->detach();
        }
        return redirect()->route('admin.project.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.project.index')->with('delete', 'il progetto è stato eliminato');
    }
}
