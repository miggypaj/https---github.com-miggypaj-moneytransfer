<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usertype;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTypes = UserType::all(); // Fetch all user types
        return view('user_types.index', compact('userTypes')); // Pass user types to view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_type' => 'required|string|max:255|unique:user_types', // Ensure unique user type
        ]);

        $userType = UserType::create([
            'user_type' => $request->user_type,
        ]);

        return redirect()->route('user_types.index')->with('success', 'User type created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userType = UserType::find($id); // Find user type by ID

        if (!$userType) {
            return abort(404); // Handle non-existent user type
        }

        return view('user_types.show', compact('userType')); // Pass user type to view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userType = UserType::find($id);

        if (!$userType) {
            return abort(404); // Handle non-existent user type
        }

        $this->validate($request, [
            'user_type' => 'required|string|max:255|unique:user_types,user_type,' . $userType->id, // Unique excluding self
        ]);

        $userType->update([
            'user_type' => $request->user_type,
        ]);

        return redirect()->route('user_types.index')->with('success', 'User type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userType = UserType::find($id);

        if (!$userType) {
            return abort(404); // Handle non-existent user type
        }

        $userType->delete();

        return redirect()->route('user_types.index')->with('success', 'User type deleted successfully!');
    }
}
