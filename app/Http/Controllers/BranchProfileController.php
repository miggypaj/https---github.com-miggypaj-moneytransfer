<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\branchprofile;

class BranchProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchProfiles = BranchProfile::all(); // Fetch all branch profiles
        return view('branch_profiles.index', compact('branchProfiles')); // Pass profiles to view
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
            'branch_name' => 'required|string|max:255',
            'branch_code' => 'required|string|unique:branch_profiles', // Ensure unique code
            'country_iso_code' => 'required|size:2|alpha', // ISO code format (2 letters)
        ]);

        $branchProfile = BranchProfile::create([
            'branch_name' => $request->branch_name,
            'branch_code' => $request->branch_code,
            'country_iso_code' => $request->country_iso_code,
        ]);

        return redirect()->route('branch_profiles.index')->with('success', 'Branch profile created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branchProfile = BranchProfile::find($id); // Find branch profile by ID

        if (!$branchProfile) {
            return abort(404); // Handle non-existent branch profile
        }

        return view('branch_profiles.show', compact('branchProfile')); // Pass profile to view
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
        $branchProfile = BranchProfile::find($id);

        if (!$branchProfile) {
            return abort(404); // Handle non-existent branch profile
        }

        $this->validate($request, [
            'branch_name' => 'required|string|max:255',
            'branch_code' => 'required|string|unique:branch_profiles,branch_code,' . $branchProfile->id, // Unique excluding self
            'country_iso_code' => 'required|size:2|alpha',
        ]);

        $branchProfile->update([
            'branch_name' => $request->branch_name,
            'branch_code' => $request->branch_code,
            'country_iso_code' => $request->country_iso_code,
        ]);

        return redirect()->route('branch_profiles.index')->with('success', 'Branch profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branchProfile = BranchProfile::find($id);

        if (!$branchProfile) {
            return abort(404); // Handle non-existent branch profile
        }

        $branchProfile->delete();

        return redirect()->route('branch_profiles.index')->with('success', 'Branch profile deleted successfully!');
    }
}
