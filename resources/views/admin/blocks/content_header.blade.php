<section class="content-header">
    <h1>
        {{isset($site_title) ? $site_title : 'n/a'}}
        <small>{{isset($site_subtitle) ? $site_subtitle : 'n/a'}}</small>
    </h1>
    <ol class="breadcrumb">
        @if(isset($breadcrumb) && is_array($breadcrumb))
            @foreach ($breadcrumb as $b)
                @if(!empty($b['url']))
                    <li><a href="{{$b['url']}}">@if(!empty($b['icon']))<i class="fa {{$b['icon']}}"></i> @endif{{$b['title']}}</a></li>
                @else
                    <li @if($loop->last)class="active"@endif>@if(!empty($b['icon']))<i class="fa {{$b['icon']}}"></i> @endif{{$b['title']}}</li>
                @endif
            @endforeach
        @endif
    </ol>

    @if(!empty($errors) && !empty($errors->all()))
        <br />
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{$e}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success_message'))
        <br />
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="fa fa-check"></i> Success!</h4>
            {{session('success_message')}}
        </div>
    @endif
</section>
