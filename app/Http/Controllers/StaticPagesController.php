<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Http\Controllers\Controller;


class StaticPagesController extends Controller
{
    public function showFaqs() {
        // get faqs
        $faqs = Faq::orderBy('order', 'asc')->get();
        // render views
        return view('pages.info.faq', ['faqs' => $faqs]);
    }
}
