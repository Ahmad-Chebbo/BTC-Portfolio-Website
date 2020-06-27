@extends('layouts.front')

@section('content')

<!-- Intro Section -->
<section class="intro-section mb-2">
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-lg-2"></div>
            <div class="col-md-10 col-lg-8">
                <div class="intro">
                    <div class="profile-img"><img src="{{ $media->profile }}" alt=""></div>
                    <h2><b>{{ $user->name }}</b></h2>
                    <span id="typed-text" class="font-color"></span>
                    <ul class="information margin-tb-30" style="text-transform: uppercase">
                        <li><b>born : </b> {{ date('j F, Y', strtotime($user->profile->DOB)) }}</li>
                        <li><b>email : </b><a href="mailTo:{{ $user->email }}">{{ $user->email }}</a></li>
                        <li><b>phone : </b><a href="tel:{{ $user->profile->phone }}">{{ $user->profile->phone }}</a>
                        </li>
                    </ul>
                    <ul class="social-icons">
                        @foreach ($socials as $social)
                        <li><a href="{{ $social->url }}" target="_blank"><i class="fa {{ $social->icon }}"></i></a></li>
                        @endforeach
                    </ul>
                </div><!-- intro -->
            </div><!-- col-sm-8 -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- intro-section -->
<!--/ Intro Section -->

<!-- Quote-section -->
@if ($sections[0]->subtitle == null)

@else
<section class="quoto-section center-text" {{ ($sections[0]->enabled == true ) ? "" : "hidden" }}>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <i class="icon ion-quote"></i>
                <h3><b>{!! $sections[0]->subtitle !!}</b></h3>
            </div><!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- container -->
</section>
@endif
<!-- quoto-section -->

<!-- portfolio-Section -->
@if ($categories->count() > 0 && $projects->count() > 0)
<section class="portfolio-section section" {{ ($sections[1]->enabled == true ) ? "" : "hidden" }}>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="heading">
                    <h3 style="text-transform: capitalize"><b>{{ $sections[1]->header }}</b></h3>
                    <h6 class="font-lite-black uppercase-text"><b>{{ $sections[1]->subtitle }}</b></h6>
                </div>
            </div><!-- col-sm-4 -->
            <div class="col-sm-8">
                <div class="portfolioFilter clearfix margin-b-80">
                    <a href="#" data-filter="*" class="current"><b>ALL</b></a>
                    @foreach ($categories as $category)
                    <a href="#" data-filter=".{{ $category->name }}"
                        style="text-transform: uppercase"><b>{{ $category->name }}</b></a>
                    @endforeach

                </div><!-- portfolioFilter -->
            </div><!-- col-sm-8 -->
        </div><!-- row -->
    </div><!-- container -->
    <div class="portfolioContainer row">
        @foreach ($projects as $project)
        <div class="p-item glry-item {{ $project->category->name }} col-md-3 col-sm-6">
            <div class="portfolio-inner">
                <div class="portfolio-back">
                    <div class="portfolio-buttons">
                        <a href="{{ route('project.single', ['id' => $project->id ]) }}" target="_blank">
                            <i class="fa fa-search"></i>
                        </a>
                        @if ($project->url == null)
                            
                        @else
                            <a href="{{ $project->url }}" class="portfolio-details-link" target="_blank">
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        @endif
                        
                    </div>
                </div>
                <img src="{{ $project->image }}" alt="" class="img-fluid" style="width: 600px;height:400px">
                <h6 class="project-title">{{ $project->title }}</h6>
            </div>
        </div><!-- p-item -->
        @endforeach
    </div><!-- portfolioContainer -->
</section>
@else

@endif
<!-- portfolio-section -->

<!-- About-section -->
<section class="about-section section" {{ ($sections[2]->enabled == true ) ? "" : "hidden" }}>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="heading">
                    <h3 style="text-transform: capitalize"><b>{{ $sections[2]->header }}</b></h3>
                    <h6 class="font-lite-black uppercase-text"><b>{{ $sections[2]->subtitle }}</b></h6>
                </div>
            </div><!-- col-sm-4 -->
            <div class="col-sm-8">
                <p class="margin-b-50">{!! $user->profile->about !!}</p>
                @if ($skills->count() > 0)
                <div class="row">
                    @foreach ($skills as $skill)
                    <div class="col-md-3">
                        <div class="margin-b-30">
                            <div class="radial-progress" data-prog-percent=".{{ $skill->percent }}">
                                <div></div>
                                <h6 class="progress-title text-uppercase" style="font-weight: bold">{{ $skill->skill }}
                                </h6>
                            </div>
                        </div><!-- radial-prog-area-->
                    </div><!-- col-sm-6-->
                    @endforeach
                </div><!-- row -->
                @else

                @endif
            </div><!-- col-sm-8 -->
        </div>
    </div><!-- row -->
    </div><!-- container -->
</section>
<!-- about-section -->

<!-- Experience-section -->
@if ($experiences->count() > 0)
<section class="experience-section section" {{ ($sections[3]->enabled == true ) ? "" : "hidden" }}>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="heading">
                    <h3 style="text-transform: capitalize"><b>{{ $sections[3]->header }}</b></h3>
                    <h6 class="font-lite-black uppercase-text"><b>{{ $sections[3]->subtitle }}</b></h6>
                </div>
            </div><!-- col-sm-4 -->
            <div class="col-sm-8">
                @foreach ($experiences as $experience)
                <div class="experience margin-b-50">
                    <h4><b style="text-transform: uppercase">{{ $experience->title }}</b></h4>
                    <h5 class="font-color" style="text-transform: uppercase"><b>{{ $experience->place }}</b></h5>
                    @if ($experience->to == "")
                    <h6 class="margin-t-10">{{ date('F Y', strtotime($experience->from)) }} - PRESENT</h6>
                    @else
                    <h6 class="margin-t-10">{{ date('F Y', strtotime($experience->from)) }} -
                        {{ date('F Y', strtotime($experience->to)) }}</h6>
                    @endif

                    <p class="font-semi-white margin-tb-30">
                        {!! $experience->description !!}
                    </p>
                </div><!-- experience -->
                @endforeach
            </div><!-- col-sm-8 -->
        </div><!-- row -->
    </div><!-- container -->

</section>
@else
@endif
<!-- experience-section -->

<!-- Education-section -->
@if ($educations->count() > 0)
<section class="education-section section" {{ ($sections[4]->enabled == true ) ? "" : "hidden" }}>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="heading">
                    <h3 style="text-transform: capitalize"><b>{{ $sections[4]->header }}</b></h3>
                    <h6 class="font-lite-black uppercase-text "><b>{{ $sections[4]->subtitle }}</b></h6>
                </div>
            </div><!-- col-sm-4 -->
            <div class="col-sm-8">
                <div class="education-wrapper">
                    @foreach ($educations as $education)
                    <div class="education margin-b-50">
                        <h4 style="text-transform: uppercase"><b>{{ $education->title }}</b></h4>
                        <h5 class="font-color" style="text-transform: uppercase"><b>{{ $education->place_name }}</b>
                        </h5>
                        <h6 class="font-lite-black margin-t-10">GRADUATED IN
                            {{ date('F Y', strtotime($education->to)) }} </h6>
                        <p class="margin-tb-30">
                            Duis non volutpat arcu, eu mollis tellus. Sed finibus aliquam neque sit
                            amet sodales.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla maximus pellentes que velit,
                            quis consequat nulla effi citur at. Maecenas sed massa tristique.Duis non volutpat arcu,
                            eu mollis tellus. Sed finibus aliquam neque sit amet sodales. </p>
                    </div><!-- education -->
                    @endforeach
                </div><!-- education-wrapper -->
            </div><!-- col-sm-8 -->
        </div><!-- row -->
    </div><!-- container -->
</section>
@else
@endif
<!-- Education-section -->


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
<!-- counter-section-->


@endsection
