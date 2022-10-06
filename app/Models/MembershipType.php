<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembershipType extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'price'];

    /**
     * Get the Membership that owns the MembershipType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Membership()
    {
        return $this->belongsTo(Membership::class, 'membership_types_id', 'id');
    }
}
