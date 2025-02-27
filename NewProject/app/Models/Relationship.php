<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'parent_id',
        'child_id',
    ];

    protected $table = 'relationships';

    // Define the inverse of the relationship: parent and child relationships
    public function parent()
    {
        return $this->belongsTo(Person::class, 'parent_id');
    }

    public function child()
    {
        return $this->belongsTo(Person::class, 'child_id');
    }
}
