<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelsPost extends Model
{
    // Naziv tabele koju koristimo
    protected $table = 'models_posts';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
