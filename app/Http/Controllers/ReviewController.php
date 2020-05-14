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

    }

    return redirect()->route('profile.purchased_history');
  }
}
