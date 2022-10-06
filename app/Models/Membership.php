<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['users_id', 'membership_types_id', 'init_date', 'expiration_date', 'asigned_by'];

    /**
     * Get the MembershipType associated with the Membership
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function MembershipType(): HasMany
    {
        return $this->hasMany(MembershipType::class, 'id', 'membership_types_id');
    }
}
