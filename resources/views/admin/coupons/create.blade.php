@php
    /* @var \App\Models\Coupon $model */
@endphp

@extends('admin.index')
@section('content')
    @include('admin.blocks.content_header')
    <section class="content">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ URL::to(route('coupons.store')) }}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label>Campaign: *</label>
                        <select name="campaign_id" class="form-control">
                            <option value="0"></option>
                            @foreach(\App\Models\Campaign::all() as $campaign)
                                <option value="{{$campaign->id}}" @if(old('campaign_id') == $campaign->id) selected="selected" @endif>{{$campaign->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Code: *</label>
                        <input type="text" name="code" value="{{old('code')}}" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Discount value: *</label>
                        <input type="number" name="discount_value" value="{{old('discount_value')}}" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Discount type: *</label>
                        <select name="discount_type" class="form-control">
                            <option value="1" @if(old('discount_type') == 1) selected="selected" @endif>Percent</option>
                            <option value="2" @if(old('discount_type') == 2) selected="selected" @endif>Amount</option>
                        </select>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Create</button>
                        <a class="btn btn-default" href="{{ URL::to(route('coupons.index')) }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
