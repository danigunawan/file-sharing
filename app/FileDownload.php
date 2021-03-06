<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileDownload extends Model
{
    protected $fillable = [
        'file_id',
        'user_id',
    ];

    protected $casts = [
        'file_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function file()
    {
        return $this->hasMany(File::class);
    }
}
