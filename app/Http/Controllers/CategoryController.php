<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        return $this->authorizeResource(Category::class,'category');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::query();

        // Get the search query from the request
        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $query->where('id', 'LIKE', "%$searchQuery%")
                ->orWhere('name', 'LIKE', "%$searchQuery%")
                ->orWhere('slug', 'LIKE', "%$searchQuery%")
                ->orWhere('description', 'LIKE', "%$searchQuery%")
                ->orWhere('created_at', 'LIKE', "%$searchQuery%");
        }

        $entriesPerPage = $request->input('entries_per_page', 10);

        // Execute the query with pagination
        $categories = $query->paginate($entriesPerPage);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name'], '_', true);
        $data['user_id'] = Auth::id();

        $category = Category::create($data);

        session()->flash('message', 'Successfully created ' . $data['name'] . ' category');

        return to_route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name'], '_', true);
        $data['user_id'] = Auth::id();

        $category->update($data);
        session()->flash('message', 'Successfully updated ' . $data['name'] . ' category');

        return to_route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('message', 'Successfully deleted ' . $category->name . ' category');

        return back();
    }
}
