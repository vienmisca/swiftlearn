<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function index()
    {
        // Ambil semua kategori dengan jumlah kursus
        $categories = Category::withCount('courses')->get();

        // Ambil semua kursus, dikelompokkan berdasarkan kategori
        $groupedCourses = Category::with('courses')->get()->mapWithKeys(function ($category) {
            return [$category->name => $category->courses];
        });

        // Kirim data ke view 'pages.kursus'
       return view('pages.kursus', compact('categories', 'groupedCourses'));

    }
}
