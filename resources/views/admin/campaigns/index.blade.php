@php
    /* @var \App\Models\Campaign[] $models */
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
                        <th>{{trans('Name')}}</th>
                        <th>{{trans('Start date')}}</th>
                        <th>{{trans('Finish date')}}</th>
                        <th>{{trans('Is accepted')}}</th>
                        <th>{{trans('Products')}}</th>
                        <th>{{trans('Posts')}}</th>
                        <th>{{trans('Coupons')}}</th>
                        <th class="text-right">
                            <a class="btn btn-sm btn-info" href="{{ URL::to(route('campaigns.create')) }}">
                                <i class="fa fa-plus"></i>
                            </a>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{$model->id}}</td>
                            <td>{{$model->name}}</td>
                            <td>{{$model->start_date}}</td>
                            <td>{{$model->finish_date}}</td>
                            <td><i class="fa {{$model->is_accepted ? 'fa-check' : 'fa-ban'}}"></i></td>
                            <td>{{$model->products()->count()}}</td>
                            <td>{{$model->posts()->count()}}</td>
                            <td>{{$model->coupons()->count()}}</td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-info" href="{{ URL::to(route('campaigns.edit', ['campaign' => $model->id])) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-sm btn-danger" href="{{ URL::to('/admin/campaigns/' . $model->id . '/destroy') }}">
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
