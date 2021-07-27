@php
/* @var \App\Models\Campaign $actual_campaign */
@endphp

@extends('admin.index')

@section('content')

    @include('admin.blocks.content_header')

    <section class="content">
        @if($actual_campaign)
            <h2>{{$actual_campaign->name}}</h2>
            <p>{{$actual_campaign->description}}</p>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Period</span>
                            <span class="info-box-text">{{$actual_campaign->start_date}} - {{$actual_campaign->finish_date}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Products</span>
                            <span class="info-box-number">{{$actual_campaign->products->count()}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-google-plus"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Posts</span>
                            <span class="info-box-number">{{$actual_campaign->posts->count()}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-google-plus"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Coupons</span>
                            <span class="info-box-number">{{$actual_campaign->coupons->count()}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>

            @php($products = $actual_campaign->products->where('published_at', '<=', date('Y-m-d H:i:s')))
            @if(count($products))
                <hr/>
                <h2>Published products</h2>
                <div class="row">
                    @foreach($products as $model)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{$model->name}}</span>
                                    <span class="info-box-text">{{$model->published_at}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    @endforeach
                </div>
            @endif

            @php($posts = $actual_campaign->posts->where('published_at', '<=', date('Y-m-d H:i:s')))
            @if(count($posts))
                <hr/>
                <h2>Published posts</h2>
                <div class="row">
                    @foreach($posts as $model)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{$model->title}}</span>
                                    <span class="info-box-text">{{$model->published_at}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    @endforeach
                </div>
            @endif

            @php($coupons = $actual_campaign->coupons->whereNull('activated_at'))
            @if(count($coupons))
                <hr/>
                <h2>Usable coupons</h2>
                <div class="row">
                    @foreach($coupons as $model)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{$model->code}}</span>
                                    <span class="info-box-number"></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    @endforeach

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <form method="post" action="{{ URL::to(route('admin_coupon_activate')) }}">
                                {{csrf_field()}}
                                <input type="hidden" name="campaign_id" value="{{$actual_campaign->id}}" />

                                <input type="text" name="code" class="form-control" placeholder="Add valid coupon code" />

                                <button class="btn btn-sm btn-primary">Activate coupon</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @else
            <p>There is no actual campaign.</p>
        @endif
    </section>
@endsection
