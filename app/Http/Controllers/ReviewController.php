<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDOException;

class ReviewController extends Controller
{
    /**
   * Show reviews' page
   */

  public function showReviews() {
    if (!Auth::check()) return redirect('/sign_in');

    $reviews = Auth::user()->reviews()->orderBy('date', 'desc')->get();

    return view('pages.profile.review', ['reviews' => $reviews]);
  }

  public function addReview(Request $request) {
    if (!Auth::check()) return redirect('/sign_in');

    $reviews = Auth::user()->reviews();

    $score = $request['rating'];
    $title = $request['title'];
    $body = $request['body'];
    $item = $request['item'];

    /**
     * TODO: Validate input; 
     */

    $review = new Review(['id_item' => $item, 'id_user' => Auth::user()->id, 'title' => $title, 'body' => $body, 'score' => $score]);
    
    try {
        $reviews->save($review);
    } catch (PDOException $e) {
        /** 
         * TODO: Do something here
         */
    }

    return redirect()->route('profile.purchased_history');
  }

  public function updateReview(Request $request) {
    if (!Auth::check()) return redirect('/sign_in');

    $reviews = Auth::user()->reviews();
    /**
     * TODO: Validate input; 
     */
    $score = $request['rating'];
    $title = $request['title'];
    $body = $request['body'];
    $item = $request['item'];

    try {
        $reviews->where('id_item', '=', $item)->update(['title' => $title, 'body' => $body, 'score' => $score]);
    } catch (PDOException $e) {
        /** 
         * TODO: Do something here
         */    
    }

    return redirect()->route('profile.reviews');
  }

  public function deleteReview(Request $request) {
    if (!Auth::check()) return redirect('/sign_in');

    $reviews = Auth::user()->reviews();
    $item = $request['item'];

    try {
        $reviews->where('id_item', '=', $item)->delete();
    } catch (PDOException $e) {
        redirect()->back()->withErrors(['delete' => 'Could not delete review']);
    }

    return redirect()->route('profile.reviews');
  }
}
