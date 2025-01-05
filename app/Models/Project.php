<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function user():BelongsTo { return $this->belongsTo (User::class); }
    public function client():BelongsTo { return $this->belongsTo(Client::class);}

    public function casts()
    {
        return [
            'status'=> ProjectStatus::class
        ];
    }

}
