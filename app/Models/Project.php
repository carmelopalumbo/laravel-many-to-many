<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    protected $fillable = ['name', 'client_name', 'summary', 'cover_image', 'image_original_name', 'slug', 'type_id'];

    public static function generateSlug($string)
    {
        $slug = Str::slug($string, '-');

        //check if slug exists
        $original_slug = $slug;
        $c = 1;
        $exists = Project::where('slug', $slug)->first();

        while ($exists) {
            $slug = $original_slug . '-' . $c++;
            $exists = Project::where('slug', $slug)->first();
        }

        return $slug;
    }
}
