<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Http\Controllers\Controller;
use App\Store;

class StaticPagesController extends Controller
{
    public function showFaqs() {
        // get faqs
        $faqs = Faq::orderBy('order', 'asc')->get();
        // render views
        return view('pages.info.faq', ['faqs' => $faqs]);
    }

    public function showAboutUs() {
        // get About Us description
        $store = Store::get()->first();
        // render views
        return view('pages.info.about_us', ['about_us' => $store->about_us]);
    }

    public function showPaymentsShipment() {
        // get About Us description
        $store = Store::get()->first();
        // render views
        return view('pages.info.payments_and_shipment', ['payments_shipment' => $store->payments_shipment]);
    }

    public function showReturns() {
        // get About Us description
        $store = Store::get()->first();
        // render views
        return view('pages.info.returns_and_replacements', ['returns' => $store->returns]);
    }

    public function showWarranty() {
        // get About Us description
        $store = Store::get()->first();
        // render views
        return view('pages.info.warranty', ['warranty' => $store->warranty]);
    }
}
