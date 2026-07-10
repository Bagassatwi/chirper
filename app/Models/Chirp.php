<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsBinary;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chirp extends Model
{
    use SoftDeletes, HasFactory, HasUuids;
    // protected function casts(): array
    // {
    //     return [
    //         'id' => AsBinary::uuid(),
    //         'user_id' => AsBinary::uuid(),
    //     ];
    // }

    protected $fillable = [
        "message"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
