<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqCategory;

class FaqController extends Controller
{
    public function index()
    {
        // Fetch all FAQ categories
        $faq_categories = FaqCategory::with('faqs')->get();

        return view('faq.index', compact('faq_categories'));
    }
}
