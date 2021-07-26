<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('admin.coupons.index', [
            'site_title' => 'Coupons',
            'site_subtitle' => 'List',
            'models' => Coupon::orderBy('campaign_id', 'asc')->get(),
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
        return view('admin.coupons.create', [
            'site_title' => 'Coupons',
            'site_subtitle' => 'Create',
            'model' => $this->findModel(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CouponRequest $request
     * @return Redirector|RedirectResponse
     * @throws Exception
     */
    public function store(CouponRequest $request)
    {
        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return redirect(route('coupons.create'))->withErrors($validator)->withInput();
        }

        try {
            $this->findModel()->fill($request->all())->save();
        } catch (Exception $exception) {
            return redirect(route('coupons.create'))->withErrors($exception->getMessage());
        }

        return redirect(route('coupons.index'))->with('success_message', 'Added new coupon.');
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
            return redirect(route('coupons.index'))->withErrors($exception->getMessage());
        }

        return view('admin.coupons.edit', [
            'site_title' => trans('Coupons'),
            'site_subtitle' => 'Edit: ' . $model->name,
            'model' => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CouponRequest $request
     * @param  int  $id
     * @return Redirector|RedirectResponse
     */
    public function update(CouponRequest $request, int $id)
    {
        try {
            $model = $this->findModel($id);
        } catch (Exception $exception) {
            return redirect(route('coupons.index'))->withErrors($exception->getMessage());
        }

        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return redirect(route('coupons.create'))->withErrors($validator)->withInput();
        }

        $model->fill($request->all())->save();

        return redirect(route('coupons.edit', ['coupon' => $model->id]))->with('success_message', 'Coupon updated successfully.');
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
            return redirect(route('coupons.index'))->withErrors($exception->getMessage());
        }

        $model->delete();

        return redirect(route('coupons.index'))->with('success_message', 'Coupon deleted successfully.');
    }

    /**
     * @param int|null $id
     * @return Coupon
     * @throws Exception
     */
    private function findModel(int $id = null): Coupon
    {
        /* @var Coupon $model */
        $model = $id !== null ? Coupon::find($id) : new Coupon();
        if (empty($model)) {
            throw new Exception('Coupon model not found');
        }
        return $model;
    }
}
