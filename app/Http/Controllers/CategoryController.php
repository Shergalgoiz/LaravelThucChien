<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category){
        $this->category = $category;
    }
    public function create() {
        $htmlOption = $this->getCategory($partenID = '');
        return view('category.add', compact('htmlOption'));
    }

    public function store(Request $request) {
        $this->category->create([
            'name' => $request->name,
            'parten_id' => $request->parten_id,
            'slug' => str_slug($request->name)
        ]);
        return redirect()-> route('categories.index');
    }


    public function index() {
        $categories = $this->category->latest()->paginate(5);  
        return view('category.index', compact('categories'));
    }

    public function getCategory($partenID) {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive -> categoryRecusive($partenID);
        return $htmlOption;
    }

    public function edit($id) {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parten_id);
        return view('catogery.edit', compact('category', 'htmlOption'));
    }

    public function delete($id) {
        $this->category->find($id)->delete();
        return redirect()-> route('categories.index');
    }

    public function update($id, Request $request) {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parten_id' => $request->parten_id,
            'slug' => str_slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }
}