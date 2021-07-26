<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('admin.posts.index', [
            'site_title' => 'Posts',
            'site_subtitle' => 'List',
            'models' => Post::orderBy('published_at', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     * @throws Exception
     */
    public function create()
    {
        return view('admin.posts.create', [
            'site_title' => 'Posts',
            'site_subtitle' => 'Create',
            'model' => $this->findModel(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return Redirector|RedirectResponse
     * @throws Exception
     */
    public function store(PostRequest $request)
    {
        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return redirect(route('posts.create'))->withErrors($validator)->withInput();
        }

        try {
            $this->findModel()->fill($request->all())->save();
        } catch (Exception $exception) {
            return redirect(route('posts.create'))->withErrors($exception->getMessage());
        }

        return redirect(route('posts.index'))->with('success_message', 'Added new post.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Factory|View|RedirectResponse|Redirector
     */
    public function show(int $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View|RedirectResponse|Redirector
     */
    public function edit(int $id)
    {
        try {
            $model = $this->findModel($id);
        } catch (Exception $exception) {
            return redirect(route('posts.index'))->withErrors($exception->getMessage());
        }

        return view('admin.posts.edit', [
            'site_title' => trans('Posts'),
            'site_subtitle' => 'Edit: ' . $model->name,
            'model' => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostRequest $request
     * @param  int  $id
     * @return Redirector|RedirectResponse
     */
    public function update(PostRequest $request, int $id)
    {
        try {
            $model = $this->findModel($id);
        } catch (Exception $exception) {
            return redirect(route('posts.index'))->withErrors($exception->getMessage());
        }

        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return redirect(route('posts.create'))->withErrors($validator)->withInput();
        }

        $model->fill($request->all())->save();

        return redirect(route('posts.edit', ['post' => $model->id]))->with('success_message', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Redirector|RedirectResponse
     */
    public function destroy(int $id)
    {
        try {
            $model = $this->findModel($id);
        } catch (Exception $exception) {
            return redirect(route('posts.index'))->withErrors($exception->getMessage());
        }

        $model->delete();

        return redirect(route('posts.index'))->with('success_message', 'Post deleted successfully.');
    }

    /**
     * @param int|null $id
     * @return Post
     * @throws Exception
     */
    private function findModel(int $id = null): Post
    {
        /* @var Post $model */
        $model = $id !== null ? Post::find($id) : new Post();
        if (empty($model)) {
            throw new Exception('Post model not found');
        }
        return $model;
    }
}
