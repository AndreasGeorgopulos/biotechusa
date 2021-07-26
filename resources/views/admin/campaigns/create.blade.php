@php
    /* @var \App\Models\Campaign $model */
@endphp

@extends('admin.index')
@section('content')
    @include('admin.blocks.content_header')
    <section class="content">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ URL::to(route('campaigns.store')) }}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label>Name: *</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="description" class="form-control">{{old('description')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Start date: *</label>
                        <input type="text" name="start_date" value="{{old('start_date')}}" class="form-control" placeholder="Date format: Y-m-d" />
                    </div>

                    <div class="form-group">
                        <label>Finish date: *</label>
                        <input type="text" name="finish_date" value="{{old('finish_date')}}" class="form-control" placeholder="Date format: Y-m-d" />
                    </div>

                    <div class="form-group">
                        <label>Is accepted:</label>
                        <select name="is_accepted" class="form-control">
                            <option value="1" {{old('is_accepted') == 1 ? 'selected="selected"' : ''}}>Yes</option>
                            <option value="0" {{old('is_accepted') == 0 ? 'selected="selected"' : ''}}>No</option>
                        </select>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Create</button>
                        <a class="btn btn-default" href="{{ URL::to(route('campaigns.index')) }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
