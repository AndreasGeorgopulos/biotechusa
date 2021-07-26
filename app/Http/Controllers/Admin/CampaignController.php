<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('admin.campaigns.index', [
            'site_title' => 'Campaigns',
            'site_subtitle' => 'List',
            'models' => Campaign::orderBy('start_date', 'asc')->get(),
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
        return view('admin.campaigns.create', [
            'site_title' => 'Campaigns',
            'site_subtitle' => 'Create',
            'model' => $this->findModel(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CampaignRequest $request
     * @return Redirector|RedirectResponse
     * @throws Exception
     */
    public function store(CampaignRequest $request)
    {
        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return redirect(route('campaigns.create'))->withErrors($validator)->withInput();
        }

        try {
            $this->findModel()->fill($request->all())->save();
        } catch (Exception $exception) {
            return redirect(route('campaigns.create'))->withErrors($exception->getMessage());
        }


        return redirect(route('campaigns.index'))->with('success_message', 'Added new campaign.');
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
            return redirect(route('campaigns.index'))->withErrors($exception->getMessage());
        }

        return view('admin.campaigns.edit', [
            'site_title' => trans('Campaigns'),
            'site_subtitle' => 'Edit: ' . $model->name,
            'model' => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CampaignRequest $request
     * @param  int  $id
     * @return Redirector|RedirectResponse
     */
    public function update(CampaignRequest $request, int $id)
    {
        try {
            $model = $this->findModel($id);
        } catch (Exception $exception) {
            return redirect(route('campaigns.index'))->withErrors($exception->getMessage());
        }

        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return redirect(route('campaigns.create'))->withErrors($validator)->withInput();
        }

        $model->fill($request->all())->save();

        return redirect(route('campaigns.edit', ['campaign' => $model->id]))->with('success_message', 'Campaign updated successfully.');
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
            return redirect(route('campaigns.index'))->withErrors($exception->getMessage());
        }

        $model->coupons()->delete();
        $model->products()->delete();
        $model->posts()->delete();
        $model->delete();

        return redirect(route('campaigns.index'))->with('success_message', 'Campaign deleted successfully.');
    }

    /**
     * @param int|null $id
     * @return Campaign
     * @throws Exception
     */
    private function findModel(int $id = null): Campaign
    {
        /* @var Campaign $model */
        $model = $id !== null ? Campaign::find($id) : new Campaign();
        if (empty($model)) {
            throw new Exception('Campaign model not found');
        }
        return $model;
    }
}
