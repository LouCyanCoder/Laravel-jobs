<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class ListingController extends Controller
{
    // Show all listings
    public function index(Request $request) 
    {
        return view('listings.index', [
        'listings' => Listing::latest()
                    ->filter(request(['tag', 'search']))
                    ->paginate(8)
        ]);
    }

    // show create form
    public function create()
    {
        return view('listings.create');
    }

    //Show single listing
    public function show(Listing $listing) 
    {
        return view('listings.show', [
        'listing' => $listing,
        ]);
    }

    // store listing data
    public function store(Request $request) 
    {
        $formFields = $request->validate([
            'title'   => 'required',
            'company' => ['required', Rule::unique('listings')],
            'location'   => 'required',
            'website'   => 'required',
            'email'   => ['required', 'email'],
            'tags'   => 'required',
            'description'   => 'required',
        ]);
        
        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing successfully created!');
    }

    // show edit form
    public function edit(Listing $listing) {        
        return view('listings.edit', ['listing' => $listing]);
    }

    // update listing data
    public function update(Request $request, Listing $listing) 
    {
        $formFields = $request->validate([
            'title'   => 'required',
            'company' => ['required'],
            'location'   => 'required',
            'website'   => 'required',
            'email'   => ['required', 'email'],
            'tags'   => 'required',
            'description'   => 'required',
        ]);
        
        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        

        $listing->update($formFields);

        return back()->with('message', 'Listing successfully updated!');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete;
        return redirect('/')->with('message', 'Listing successfully deleted!');
    }
}