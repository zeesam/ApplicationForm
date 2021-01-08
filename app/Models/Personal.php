<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $fillable = [
      'userid',
      'name',
      'fname',
      'email',
      'mobile',
      'gender',
      'dob',
      'addressa',
      'addressb',
      'landmark',
      'state',
      'district',
      'pincode'
    ];
    public function AddPersonal($data)
    {
      return Personal::create($data);
    }
    public function UpdatePersonal($data,$id)
    {
      return Personal::find($id)->update($data);
    }
}
