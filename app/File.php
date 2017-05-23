<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use Uuid;

    protected $filable = [
        'uuid',
        'label',
        'password',
        'plain_password',
        'path',
        'description',
    ];

    protected $hidden = [
        'password',
        'plain_password',
    ];

    protected $appends = [
        'download',
        'size',
        'extension',
    ];

    public function getDownloadAttribute()
    {
        return route('file.download', [$this->attributes['uuid']]);
    }

    public function getSizeAttribute()
    {
        return \Storage::size($this->attributes['path']);
    }

    public function getExtensionAttribute()
    {
        return \Storage::mimeType($this->attributes['path']);
    }

    public function downloads()
    {
        return $this->hasMany(FileDownload::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getByUuid($uuid, $exception = true)
    {

        $file = self::whereUuid($uuid)->first();

        if ($exception) {
            abort_if(empty($file), 404, 'File not found or has been deleted.');
        }

        return $file;
    }
}