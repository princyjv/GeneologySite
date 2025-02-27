<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    // Add the created_by field to the fillable property
    protected $fillable = [
        'first_name',
        'middle_names',
        'last_name',
        'birth_name',
        'date_of_birth',
        'created_by',  // Add this line to allow mass assignment
    ];

    // Person model (App\Models\Person)

public function creator()
{
    return $this->belongsTo(User::class, 'created_by');
}

    // Define the relationship with parents (inverse of child relationship)
    public function parents()
    {
        return $this->hasMany(Relationship::class, 'child_id');
    }

    // Define the relationship with children (inverse of parent relationship)
    public function children()
    {
        return $this->hasMany(Relationship::class, 'parent_id');
    }

    // Method to find the degree of kinship between two people
    public function getDegreeWith($targetPersonId)
    {
        // Cache to store visited people to avoid repeating work
        $visited = [];
        $queue = [(object) ['person_id' => $this->id, 'degree' => 0]];
    
        while (!empty($queue)) {
            $current = array_shift($queue);
            
            if ($current->person_id === $targetPersonId) {
                return ['degree' => $current->degree];  // Found the target person
            }
    
            if (isset($visited[$current->person_id])) {
                continue; // Skip if already visited
            }
    
            // Mark the current person as visited
            $visited[$current->person_id] = true;
    
            // Fetch relationships for the current person (parents and children)
            $relationships = Relationship::where('parent_id', $current->person_id)
                ->orWhere('child_id', $current->person_id)
                ->get();
    
            // Traverse through relationships
            foreach ($relationships as $relationship) {
                $nextPersonId = $relationship->parent_id === $current->person_id ? $relationship->child_id : $relationship->parent_id;
                
                if (!isset($visited[$nextPersonId])) {
                    $queue[] = (object) ['person_id' => $nextPersonId, 'degree' => $current->degree + 1];
                }
            }
    
            // If the degree exceeds 25, stop the search
            if ($current->degree > 25) {
                return false; // Degree is too large to compute efficiently
            }
        }
    
        return false; // Target person not found within 25 degrees
    }
    

}
