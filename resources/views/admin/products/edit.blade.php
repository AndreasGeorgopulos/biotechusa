@php
    /* @var \App\Models\Product $model */
@endphp

@extends('admin.index')
@section('content')
    @include('admin.blocks.content_header')
    <section class="content">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ URL::to(route('products.update', ['product' => $model->id])) }}">
                    @method("PUT")
                    {{csrf_field()}}

                    <div class="form-group">
                        <label>Campaign: *</label>
                        <select name="campaign_id" class="form-control">
                            <option value="0"></option>
                            @foreach(\App\Models\Campaign::all() as $campaign)
                                <option value="{{$campaign->id}}" @if(old('campaign_id', $model->campaign_id) == $campaign->id) selected="selected" @endif>{{$campaign->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Name: *</label>
                        <input type="text" name="name" value="{{old('name', $model->name)}}" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="description" class="form-control">{{old('description', $model->description)}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Price: *</label>
                        <input type="number" name="price" value="{{old('price', $model->price)}}" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Published at: *</label>
                        <input type="text" name="published_at" value="{{old('published_at', $model->published_at)}}" class="form-control" placeholder="Format: Y-m-d H:i:s" />
                    </div>

                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Update</button>
                        <a class="btn btn-default" href="{{ URL::to(route('products.index')) }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
