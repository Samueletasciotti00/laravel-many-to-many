<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Questa function viene visualizzata come proprietà [$project->category];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // Fillable delle colonne
    protected $fillable = ['title','slug','description'];
}
