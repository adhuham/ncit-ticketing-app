<?php

namespace App\Models;

use App\Enums\Severity;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected function casts()
    {
        return [
            'severity' => Severity::class,
            'status' => Status::class,
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }   

    public function user()
    {
        return $this->belongsTo(User::class);
    }   

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'id');
    }   
}
