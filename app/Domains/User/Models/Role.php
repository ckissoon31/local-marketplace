<?php

namespace App\Domains\User\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domains\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    //The users that belong to the role
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

   


}
