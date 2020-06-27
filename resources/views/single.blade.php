@extends('layouts.front')

@section('content')

<section class="intro-section center-text">
    <div class="container">
        <div class="intro">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-img margin-b-30">
                        <a href="/">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </a>
                    </div>
                </div><!-- col-sm-8 -->
            </div><!-- row -->
        </div><!-- intro -->
    </div><!-- container -->
</section><!-- intro-section -->

<section class="project-section center-text">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><b>{{ $project->title }}</b></h1>
            </div><!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- quoto-section -->

<section class="project-single mt-5 mb-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="portfolio-carousel owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="item">
                        <img src="{{ $project->image }}" class="img-fluid" alt="slider image"
                            style="width: 1200px;height:740px">
                    </div>
                </div>
            </div>
        </div>
        <div class="project-single-inner">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <p class="project-inner-text"></p>
                    <p>{!! $project->description !!}</p>

                    <br>
                    @if ($project->url == null)
                        
                    @else
                        <div class="center-text">
                            <a href="{{ $project->url }}" type="button" class="btn button-color" target="_blank">Visit</a>
                        </div>
                    @endif
                    
                </div>
                <div class="col-md-6">
                    <div class="project-details">
                        <h4 class="inner-header-title">Project Detail</h4>
                        <ul class="project-info">
                            <li class="d-flex justify-content-between">
                                <b>Project Name</b>
                                <span>{{ $project->title }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <b>Category</b>
                                <span>{{ $project->category->name }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <b>Developer</b>
                                <span>{{ $user->name }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <b>Start Date</b>
                                <span>{{ date('F, Y', strtotime($project->from)) }}</span>
                            </li>

                            <li class="d-flex justify-content-between">
                                <b>End Date</b>
                                @if ($project->to == "")
                                <span>PRESENT</span>
                                @else
                                <span>{{ date('F, Y', strtotime($project->to)) }}</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- .row -->
        </div>
    </div>
</section>


<div class="col-lg-12">
    <div class="container">
        <div class="pagination-arrow">
            @if($prev)
            <a href="{{ route('project.single', ['id' => $prev->id ]) }}" class="btn-prev-wrap">
                <i class="fa fa-arrow-left fa-4x mr-4" aria-hidden="true"></i>
                <div class="btn-content">
                    <div class="btn-content-title">Previous Project</div>
                    <p class="btn-content-subtitle">{{ $prev->title }}</p>
                </div>
            </a>
            @endif

            @if($next)
            <a href="{{ route('project.single', ['id' => $next->id ]) }}" class="btn-next-wrap">
                <div class="btn-content">
                    <div class="btn-content-title">Next Project</div>
                    <p class="btn-content-subtitle">{{ $next->title }}</p>
                </div>
                <i class="fa fa-arrow-right fa-4x" aria-hidden="true"></i>
            </a>
            @endif
        </div>
    </div>
</div>




<!-- Counter-section -->
@if ($counters->count() > 0)
<section class="counter-section" id="counter" {{ ($sections[5]->enabled == true ) ? "" : "hidden" }}>
    <div class="container">
        <div class="row">
            @foreach ($counters as $counter)
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="counter margin-b-30">
                    <h1 class="title">
                        <i class="fa {{ $counter->icon }}" aria-hidden="true"></i>
                        <b><span class="counter-value" data-duration="700"
                                data-count="{{ $counter->number }}">0</span></b></h1>
                    <h5 class="desc"><b>{{ $counter->header }}</b></h5>
                </div><!-- counter -->
            </div><!-- col-md-3-->
            @endforeach
        </div><!-- row-->
    </div><!-- container-->
</section>
@else

@endif
@endsection


