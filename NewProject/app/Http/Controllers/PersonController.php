<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    // Show the list of people with their creator's name
    // public function index()
    // {
    //     // Get all people with their creator (user)
    //     $people = Person::with('creator')->get();

    //     return view('people.index', compact('people'));
    // }

    public function index()
    {
        // Paginate the people, ensuring you're getting a paginated result
        $people = Person::paginate(10);  // Correct way to paginate
        return view('people.index', compact('people'));  // Pass the paginated results to the view
    }


    // Show details of a specific person with their children and parents
    public function show($id)
    {
        // Eager load parents and children relationships
        $person = Person::with(['parents.parent', 'children.child'])->findOrFail($id);
        
        return view('people.show', compact('person'));
    }


    // Show the form for creating a new person
    public function create()
    {
        return view('people.create');
    }
    
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_names' => 'nullable|string',
            'last_name' => 'required|string|max:255',
            'birth_name' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date|date_format:Y-m-d',
        ]);
    
        // Format the validated data according to the rules
        $first_name = ucfirst(strtolower($validatedData['first_name']));
        $middle_names = isset($validatedData['middle_names']) ? 
                         implode(', ', array_map('ucwords', explode(',', strtolower($validatedData['middle_names'])))) : null;
        $last_name = strtoupper($validatedData['last_name']);
        $birth_name = $validatedData['birth_name'] ? strtoupper($validatedData['birth_name']) : $last_name;
        $date_of_birth = $validatedData['date_of_birth'] ?? null;
    
        // Store the new person in the database
        $person = Person::create([
            'created_by' => auth()->id(), // Set the creator to the authenticated user
            'first_name' => $first_name,
            'middle_names' => $middle_names,
            'last_name' => $last_name,
            'birth_name' => $birth_name,
            'date_of_birth' => $date_of_birth,
        ]);
    
        // Redirect to the person list with a success message
        return redirect()->route('people.index')->with('success', 'Person created successfully.');
    }

    public function checkDegree()
    {
        // Step 1: Enable the query log
        DB::enableQueryLog();
    
        // Step 2: Record the start time
        $timestart = microtime(true);
    
        // Step 3: Fetch the person and calculate the degree
        $person = Person::findOrFail(84); // Find person with ID 84
        $degree = $person->getDegreeWith(1265); // Get degree of kinship with person ID 1265
    
        // Step 4: Check if the result is valid
        if ($degree === false) {
            // Handle the case where the degree is not found or is too large
            return response()->json([
                'error' => 'Degree of kinship is too large or no path found.'
            ]);
        }
    
        // Output the results
        return response()->json([
            'degree' => $degree['degree'], // Degree of kinship
            'execution_time' => microtime(true) - $timestart, // Time taken to execute
            'nb_queries' => count(DB::getQueryLog()), // Number of queries executed
            'queries' => DB::getQueryLog() // Log of all queries executed
        ]);
    }
    
    
    
}
