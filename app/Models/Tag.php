<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Project;

class Tag extends Model
{
    use HasFactory;

    public function projects(){
        return $this->BelongsToMany(Project::class);
    }
}
