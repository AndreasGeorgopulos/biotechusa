@php
    /* @var \App\Models\User[] $models */
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
                        <th>{{trans('E-mail address')}}</th>
                        <th class="text-center">{{trans('Is active')}}</th>
                        <th class="text-center">{{trans('Is admin')}}</th>
                        <th class="text-right">

                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{$model->id}}</td>
                            <td>{{$model->name}}</td>
                            <td>{{$model->email}}</td>
                            <td class="text-center">{!! $model->is_active ? '<i class="fa fa-check text-green"></i>' : '<i class="fa fa-ban text-red"></i>' !!}</td>
                            <td class="text-center">{!! $model->is_admin ? '<i class="fa fa-check text-green"></i>' : '<i class="fa fa-ban text-red"></i>' !!}</td>
                            <td class="text-right">

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
