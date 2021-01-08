<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
      'userid',
      'sbicol',
      'dop'
    ];
    public function AddPayment($data)
    {
      return Payment::create($data);
    }
    public function UpdatePayment($data,$id)
    {
      return Payment::find($id)->update($data);
    }
}
