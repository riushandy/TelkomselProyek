<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->paginate(10);

        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'department_name' => [
                'required',
                'string',
                'max:100',
                'unique:departments,department_name',
            ],

            'department_description' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        Department::create($validated);

        return redirect()
            ->route('department.index')
            ->with('success', 'Department created successfully.');
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([

            'department_name' => [

                'required',
                'string',
                'max:100',

                Rule::unique('departments')
                    ->ignore($department->id),

            ],

            'department_description' => [

                'nullable',
                'string',
                'max:255',

            ],

        ]);

        $department->update($validated);

        return redirect()
            ->route('department.index')
            ->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()
            ->route('department.index')
            ->with('success', 'Department deleted successfully.');
    }
}
