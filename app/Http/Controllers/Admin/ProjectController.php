<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Functions\ProjectHelper;
use App\Models\Tag;
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
        return view('admin.project.edit', compact('project','data','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $data = $request->all();
        $project = Project::find($id);

        $project->update($data);
        if(array_key_exists('tags',$data)){
            $project->tags()->sync($data['tags']); 
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
