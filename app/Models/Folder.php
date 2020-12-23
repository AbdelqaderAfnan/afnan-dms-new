<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $guarded = [];
    use HasFactory;
    protected $fillable = [
        'folder_name',
        'user_id',
        'branch_name',
        'perent_folder',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , $foreignKey = 'user_id');
    }
    public function document()
    {
        return $this->hasMany(Document::class);
    }
}
