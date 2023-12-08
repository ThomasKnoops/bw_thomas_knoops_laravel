<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqCategory;

class FaqController extends Controller
{
    // View contact page
    public function index()
    {
        // Fetch all FAQ categories
        $faq_categories = FaqCategory::with('faqs')->get();

        return view('faq.index', compact('faq_categories'));
    }

    // Admin add FAQ category
    public function createCategory()
    {
        return view('faq.createCategory');
    }

    // Admin store FAQ category
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:faq_categories|string|max:255'
        ]);

        FaqCategory::create([
            'name' => $request->name
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ category created successfully!');
    }

    // Admin edit FAQ category
    public function editCategory(FaqCategory $faqcat)
    {
        return view('faq.editCategory', compact('faqcat'));
    }

    // Admin update FAQ category
    public function updateCategory(Request $request, FaqCategory $faqcat)
    {
        $request->validate([
            'name' => 'required|unique:faq_categories|string|max:255'
        ]);

        $faqcat->update([
            'name' => $request->name
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ category updated successfully!');
    }

    // Admin delete FAQ category
    public function deleteCategory(FaqCategory $faqcat)
    {
        if($faqcat->faqs->count() > 0) {
            return redirect()->route('faq.index')->with('error', 'FAQ category cannot be deleted because it has some questions!');
        }
        
        $faqcat->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ category deleted successfully!');
    }

    // Admin add FAQ question
    public function createQuestion()
    {
        $faq_categories = FaqCategory::all();

        return view('faq.createQuestion', compact('faq_categories'));
    }

    // Admin store FAQ question
    public function storeQuestion(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|text',
            'faq_category_id' => 'required'
        ]);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'faq_category_id' => $request->faq_category_id
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ created successfully!');
    }

    // Admin edit FAQ question
    public function editQuestion(Faq $faq)
    {
        $faq_categories = FaqCategory::all();

        return view('faq.editQuestion', compact('faq', 'faq_categories'));
    }

    // Admin update FAQ question
    public function updateQuestion(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|text',
            'faq_category_id' => 'required'
        ]);

        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'faq_category_id' => $request->faq_category_id
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully!');
    }

    // Admin delete FAQ question
    public function deleteQuestion(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully!');
    }
}
