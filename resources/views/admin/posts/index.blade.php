@php
    /* @var \App\Models\Post[] $models */
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
                        <th>{{trans('Title')}}</th>
                        <th>{{trans('Campaign')}}</th>
                        <th>{{trans('Published at')}}</th>
                        <th class="text-right">
                            <a class="btn btn-sm btn-info" href="{{ URL::to(route('posts.create')) }}">
                                <i class="fa fa-plus"></i>
                            </a>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{$model->id}}</td>
                            <td>{{$model->title}}</td>
                            <td>{{$model->campaign->name}}</td>
                            <td>{{$model->published_at}}</td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-info" href="{{ URL::to(route('posts.edit', ['post' => $model->id])) }}">
                                    <i class="fa fa-edit"></i>
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
