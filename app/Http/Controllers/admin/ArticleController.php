<?php

namespace App\Http\Controllers\admin;

use App\Article;
use App\CategoryArticle;
use App\Http\Controllers\Controller;
use App\Tags;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    use Uploader;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['article'] = Article::latest()->paginate(10);
        $data['tag'] = Tags::all();
        $data['category'] = CategoryArticle::all();
        return view('admin.Article.list', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $file_name = $request->image;
        $file_path = 'site/uploader/article';
        $file = $this->FileUploader($file_name, $file_path);
        $article = Article::create([
            'lang' => $request->lang,
            'title' => $request->title,
            'slug' => $request->slug,
            'short_text' => $request->short_text,
            'image' => $file,
            'text' => $request->text,
        ]);
        $article->Category()->attach($request->input('category'));
        $article->Tag()->attach($request->input('tag'));
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت اضافه شد' : 'Successfully added');
        return back();
    }

    public function ShowIndex(Request $request)
    {
        $id = $request->id;
        $article = Article::where('id', $id)->get();
        $article[0]->update([
            'show_index' => $article[0]->show_index == 0 ? 1 : 0
        ]);
        echo "done";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return void
     */
    public function edit(Article $article)
    {
        $data['article'] = $article;
        $data['tag'] = Tags::all();
        $data['category'] = CategoryArticle::all();
        return view('admin.Article.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Article $article
     * @return void
     */
    public function update(Request $request, Article $article)
    {
        $file_path = 'site/uploader/article/';
        $inputImage = $request->image;
        $DbImage = $article->image;
        $file = $this->FileUpdate($inputImage, $DbImage, $file_path);
        $article->update([
            'lang' => $request->lang,
            'title' => $request->title,
            'slug' => $request->slug,
            'short_text' => $request->short_text,
            'image' => $file,
            'text' => $request->text,
        ]);
        $article->Category()->sync($request['category']);
        $article->Tag()->sync($request->tag, true);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'Successfully Edited');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return Response
     * @throws Exception
     */
    public function destroy(Article $article)
    {
        $path = 'site/uploader/article/' . $article->image;
        $this->FileDelete($path);
        $article->delete();
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت حذف شد' : 'It was successfully removed');
        return back();
    }
}
