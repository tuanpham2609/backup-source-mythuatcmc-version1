@extends('webcmc.layouts.master')
@section('title')
    {{$post->name}} | Mỹ thuật cmc
@endsection
@section('keyword')
{{$post->name}}@endsection
@section('description')
{{$post->short_content}} @endsection
@section('img')
http://mythuatcmc.com/img/{{$post->image}} @endsection
@section('metacontent')
{{$post->name}} @endsection
@section('metadescription')
{{$post->short_content}} @endsection
@section('metaurl')
http://mythuatcmc.com/tin-tuc/{{$post->id}}/{{$post->slug}}.html
@endsection

@section('content')
    <div class="link-back-home">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4><a href="index.php">Home</a> Tin tức</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="news-page" id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="right-news-detail">
                        <div class="box-news-page">
                            <img src="img/{{$post->image}}" class="img-responsive">
                            <ul class="date-box-news-page">
                                <li>{{$post->created_at->format('d')}}</li>
                                <li>{{$post->created_at->format('d/m/Y')}}</li>
                            </ul>
                            <div class="txt-box-news-page">
                                <h4>{{$post->name}}</h4>
                                <ul>
                                    <li>Đăng bởi: Tấn Thanh</li>
                                    <li>Ngày đăng: {{$post->created_at->format('d/m/Y')}}</li>
                                </ul>
                            </div>
                            <article class="page-content">
                                <p>{!!$post->description!!}</p>
                            </article>
                            <div class="tag-share">
                                <div class="ed-share">
                                    <h4>Share: </h4>
                                    <div id="share"></div>
                                </div>
                            </div>
                            <div class="news-related-detail">
                                <h4>Tin tức liên quan</h4>
                                <section class="regular3 slider">
                                    @foreach($tuancmc as $tinnoibat)
                                        <div class="col-md-4">
                                            <div class="news-box-home">
                                                <a href="tin-tuc/{{$tinnoibat->id}}/{{$tinnoibat->slug}}.html" class="pic-news-home">
                                                    <img src="img/{{$tinnoibat->image}}" class="img-responsive" alt="{{$tinnoibat->slug}}" title="{{$tinnoibat->slug}}">
                                                </a>
                                                <a href="tin-tuc/{{$tinnoibat->id}}/{{$tinnoibat->slug}}.html">
                                                    <h4>{{$tinnoibat->name}}</h4>
                                                </a>
                                                <p>{{$tinnoibat->short_content}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </section>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    
@endsection