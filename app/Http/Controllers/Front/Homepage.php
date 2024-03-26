<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Contact;
use Illuminate\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class Homepage extends Controller
{
    public function index()
    {
        $data['articles']= Article::orderBy('created_at','DESC')->paginate(2);
        $data['categories'] = Category::inRandomOrder()->get();
        return view('front.homepage',$data);
    }

    public function single($category,$slug)
    {   $category = Category::whereSlug($category)->first() ?? abort(403,"Böyle bir kategori yok.");
        $article = Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403,'Böyle bir sayfa bulunamadı.');
        $article->increment('hit');
        $data['article'] = $article;
        $data['categories'] = Category::inRandomOrder()->get();
        return view('front.single',$data);
    }

    public function category($slug)
    {
        $category = Category::whereSlug($slug)->first() ?? abort(403,"Hatalı kategori linki");
        $data['category'] = $category;
        $data['articles'] = Article::where('category_id',$category->id)->orderBy('created_at','DESC')->paginate(1);
        $data['categories'] = Category::inRandomOrder()->get();
        return view('front.category',$data);


    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contactpost(Request $request)
    {
        $rules = [
            'name'=>'required|min:5',
            'email'=>'required|mail',
            'topic'=>'required',
            'message'=>'required|min:10',
        ];
       $validate = Validator::make($request->post(),$rules);
       if($validate->errors()){
           print_r($validate->errors());
       }
        die;
        $contact = New Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->topic = $request->topic;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->route('contact')->with('succes','Mesajınız tarafımıza iletilmiştir. Teşekkürler!');
    }

}
