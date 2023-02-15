<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
      $bookCount = Book::count();
      $categoryCount = Category::count();
      $userCount = User::count();
      return view('admin.dashboard', ['book_count'=> $bookCount, 'category_count'=> $categoryCount , 'user_count'=>$userCount] );
    }

    public function users()
    {
      $users = User::where('roles_id', 2)->where('status', 'active')->get();
      return view('admin.User.user', ['users' =>$users]);
    }
    public function usersRegistered()
    {
      $usersRegistered = User::where('roles_id', 2)->where('status', 'inactive')->get();
      return view('admin.User.user-registered', ['userRegistered' => $usersRegistered]);
    }
    public function usersDetail($slug)
    {
      $user = User::where('slug', $slug)->first();
      return view('admin.User.user-detail', ['user' => $user]);
    }

    public function usersBan($slug)
    {
      $user = User::where('slug', $slug)->first();
      $user->delete();
      return redirect('users')->with('status', 'User Deleted Successfully');
    }
    public function usersBanned()
    {
      $userBanned = User::onlyTrashed()->get();
      return view('admin.User.user-benned', ['usersBanned' => $userBanned]);
    }
    public function usersRestore($slug)
    {
      $user = User::withTrashed()->where('slug', $slug)->first();
      $user->restore();
      return redirect('users')->with('status', 'User Restore Successfully');
    }


    public function category()
    {
      $categories = Category::all();
      return view('category.category', ['categories'=> $categories]);
    }
    public function categoriesAdd()
    {
      return view('category.add-category');
    }
    public function categoryStore(Request $request)
    {
      $validated = $request->validate([
        'name' => 'required|unique:categories',
      ]);
      $category = Category::create($request->all());
      return redirect('category')->with('status', 'category Added Successfuly');
    }
    public function books()
    {
      $book = Book::all();
      $categories = Category::all();
      return view('admin.books', ['book'=>$book, 'categories'=> $categories]);
    }
    public function booksAdd()
    {
      $categories = Category::all();
      return view ('admin.add-book', ['categories' => $categories]);
    }
     public function booksStore(Request $request) 
     {
      $validated = $request->validate([
        'book_code' => 'required|unique:books',
        'tittle' => 'required'
      ]);


      $newName = '';
      if($request->file('image')){
        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = $request->tittle. '-'.now()->timestamp.'.'.$extension;
        $request->file('image')->storeAs('cover', $newName);
      }
      $request['cover'] = $newName;
      $books = Book::create($request->all());
      $books->categories()->sync($request->categories);
      return redirect('books')->with('success', 'Book added success');
     }
    public function rent_logs()
    {
      return view('admin.rent_logs');
    }

    public function logout()
    {
      return view('admin.logout');
    }

    public function categoryEdit($slug)
    {
      $category = Category::where('slug', $slug)->first();
      return view('category.edit-category', ['category' => $category]);
    }
    public function categoryUpdate(Request $request, $slug)
    {
      $category = Category::where('slug', $slug)->first();
      
      $category->update($request->all());
      return redirect('category')->with('status', 'category Added Successfuly');
    }

    public function booksEdit($slug)
    {
      $books = Book::where('slug', $slug)->first();
      $categories = Category::all();
      return view('Admin.edit-book', ['books' => $books, 'categories' =>$categories]);
    }

    public function booksUpdate(Request $request, $slug)
    {
      if($request->file('image')){
        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = $request->tittle. '-'.now()->timestamp.'.'.$extension;
        $request->file('image')->storeAs('cover', $newName);
        $request['cover'] = $newName;
      }
      $books = Book::where('slug', $slug)->first();
      $books->update($request->all());
      if($request->categories){
        $books->categories()->sync($request->categories);
      }
      return redirect('books')->with('status', 'books Added Successfuly');
    }

    public function booksDestroy($slug)
    {
      $books = Book::where('slug', $slug)->first();
      $books->delete();
      return redirect('books')->with('status', 'book delet successfuly');
    }

    public function usersApprove($slug)
    {
      $user = User::where('slug', $slug)->first();
      $user->status = 'active';
      $user->save();
      return redirect('users-detail/'.$slug)->with('status', 'user Approve Successfully');
    }



   
    
}

