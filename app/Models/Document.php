<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [];
    use HasFactory;
    protected $fillable = [
        'doc_type',
        'date',
        'user_id',
        'subject',
        'folder_id',
        'branch_name',
        'document',
        'ext',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
