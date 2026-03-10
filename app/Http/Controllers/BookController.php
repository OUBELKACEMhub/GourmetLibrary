<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('category');

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        return response()->json($query->get());
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $books = Book::where('title', 'LIKE', "%{$search}%")
            ->orWhere('chef_name', 'LIKE', "%{$search}%")
            ->orWhereHas('category', function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            })
            ->with('category')
            ->get();

        return response()->json($books);
    }
         }

