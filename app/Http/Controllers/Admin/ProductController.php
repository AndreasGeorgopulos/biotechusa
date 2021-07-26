<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('admin.products.index', [
            'site_title' => 'Products',
            'site_subtitle' => 'List',
            'models' => Product::orderBy('published_at', 'asc')->get(),
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
        return view('admin.products.create', [
            'site_title' => 'Products',
            'site_subtitle' => 'Create',
            'model' => $this->findModel(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Redirector|RedirectResponse
     * @throws Exception
     */
    public function store(ProductRequest $request)
    {
        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return redirect(route('products.create'))->withErrors($validator)->withInput();
        }

        try {
            $this->findModel()->fill($request->all())->save();
        } catch (Exception $exception) {
            return redirect(route('products.create'))->withErrors($exception->getMessage());
        }

        return redirect(route('products.index'))->with('success_message', 'Added new product.');
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
            return redirect(route('products.index'))->withErrors($exception->getMessage());
        }

        return view('admin.products.edit', [
            'site_title' => trans('Products'),
            'site_subtitle' => 'Edit: ' . $model->name,
            'model' => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductRequest $request
     * @param  int  $id
     * @return Redirector|RedirectResponse
     */
    public function update(ProductRequest $request, int $id)
    {
        try {
            $model = $this->findModel($id);
        } catch (Exception $exception) {
            return redirect(route('products.index'))->withErrors($exception->getMessage());
        }

        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return redirect(route('products.create'))->withErrors($validator)->withInput();
        }

        $model->fill($request->all())->save();

        return redirect(route('products.edit', ['product' => $model->id]))->with('success_message', 'Product updated successfully.');
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
            return redirect(route('products.index'))->withErrors($exception->getMessage());
        }

        $model->delete();

        return redirect(route('products.index'))->with('success_message', 'Product deleted successfully.');
    }

    /**
     * @param int|null $id
     * @return Product
     * @throws Exception
     */
    private function findModel(int $id = null): Product
    {
        /* @var Product $model */
        $model = $id !== null ? Product::find($id) : new Product();
        if (empty($model)) {
            throw new Exception('Product model not found');
        }
        return $model;
    }
}
