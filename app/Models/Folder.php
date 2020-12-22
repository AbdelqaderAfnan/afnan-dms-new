<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    protected $fillable = [
        'folder_name',
        'cerate_by',
        'branch_name',
        'perent_folder',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
