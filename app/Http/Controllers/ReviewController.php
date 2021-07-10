<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'customer']);
    }

    public function index(){
        $reviews = auth()->user()->review()->latest()->get();
        return view('reviews.index', compact('reviews'));
    }

    public function store(ReviewRequest $request){
        auth()->user()->review()->create($request->only('comments', 'rating', 'product_id'));
        return back();
    }

    public function edit($id){
        $review = auth()->user()->review()->findOrFail($id);
        return view('reviews.edit', compact('review'));
    }

    public function update(UpdateReviewRequest $request, $id){
        auth()->user()->review()->findOrFail($id)->update($request->only('comments', 'rating'));
        return redirect()->route('reviews.index')->with('message', alert('Rating Updated Successfully', 'primary'));
    }

    public function destroy($id){
        auth()->user()->review()->findOrFail($id)->delete();
        return back()->with('message', alert('Rating Deleted Successfully', 'primary'));
    }
}
