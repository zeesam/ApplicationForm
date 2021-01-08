<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
      'userid',
      'emporg',
      'doj',
      'dol',
      'exp',
      'desig'
    ];
    public function AddExperience($data)
    {
      return Experience::create($data);
    }
    public function UpdateExperience($data,$id)
    {
      return Experience::find($id)->update($data);
    }
}
