@php
    /* @var \App\Models\Coupon[] $models */
@endphp

@extends('admin.index')
@section('content')
    @include('admin.blocks.content_header')

    <section class="content">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover datatable">
                    <thead>
                    <tr>
                        <th class="hidden-xs hidden-sm">#</th>
                        <th>{{trans('Code')}}</th>
                        <th>{{trans('Campaign')}}</th>
                        <th>{{trans('Activated at')}}</th>
                        <th class="text-right">
                            <a class="btn btn-sm btn-info" href="{{ URL::to(route('coupons.create')) }}">
                                <i class="fa fa-plus"></i>
                            </a>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{$model->id}}</td>
                            <td>{{$model->code}}</td>
                            <td>{{$model->campaign->name}}</td>
                            <td>{{$model->activated_at}}</td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-info" href="{{ URL::to(route('coupons.edit', ['coupon' => $model->id])) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-danger" href="{{ URL::to('/admin/coupons/' . $model->id . '/destroy') }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
