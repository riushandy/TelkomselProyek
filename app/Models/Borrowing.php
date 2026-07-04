<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

   protected $fillable = [
        'user_id',
        'borrower_name',
        'borrower_phone',
        'borrower_email',
        'borrow_date',
        'return_date',
        'actual_return_date',
        'borrowing_status',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function borrowingDetails()
    {
        return $this->hasMany(BorrowingDetail::class, 'borrowing_id');
    }
}
