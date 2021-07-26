@php
    /* @var \App\Models\Campaign $model */
@endphp

@extends('admin.index')
@section('content')
    @include('admin.blocks.content_header')
    <section class="content">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ URL::to(route('campaigns.update', ['campaign' => $model->id])) }}">
                    @method("PUT")
                    {{csrf_field()}}

                    <input type="hidden" name="id" value="{{$model->id}}">

                    <div class="form-group">
                        <label>Name: *</label>
                        <input type="text" name="name" value="{{old('name', $model->name)}}" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="description" class="form-control">{{old('description', $model->description)}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Start date: *</label>
                        <input type="text" name="start_date" value="{{old('start_date', $model->start_date)}}" class="form-control" placeholder="Date format: Y-m-d" />
                    </div>

                    <div class="form-group">
                        <label>Finish date: *</label>
                        <input type="text" name="finish_date" value="{{old('finish_date', $model->finish_date)}}" class="form-control" placeholder="Date format: Y-m-d" />
                    </div>

                    <div class="form-group">
                        <label>Is accepted:</label>
                        <select name="is_accepted" class="form-control">
                            <option value="1" {{old('is_accepted', $model->is_accepted) == 1 ? 'selected="selected"' : ''}}>Yes</option>
                            <option value="0" {{old('is_accepted', $model->is_accepted) == 0 ? 'selected="selected"' : ''}}>No</option>
                        </select>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Update</button>
                        <a class="btn btn-default" href="{{ URL::to(route('campaigns.index')) }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
