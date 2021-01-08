<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;
    protected $fillable = [
      'userid',
      'exam',
      'board',
      'yearofpassing',
      'pcogpa',
      'division'
    ];
    public function AddAcademic($data)
    {
      return Academic::create($data);
    }
    public function UpdateAcademic($data,$id)
    {
      return Academic::find($id)->update($data);
    }
}
