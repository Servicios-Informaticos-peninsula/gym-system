<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{
    use HasFactory;

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
    public function Membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class, 'membership_types_id', 'id');
    }
}
