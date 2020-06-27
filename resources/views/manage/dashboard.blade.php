@extends('layouts.dashboard.backend')

@section('content')

<h2>Dashboard</h2>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
</nav>

<!-- section-1 -->
<div class="row">
    <div class="col-md-3">
        <div class="widget-small primary coloured-icon">
            <a href="{{ route('manage.wsproject.index') }}" style="text-decoration: none;color:black">
                <i class="icon fa fa-code fa-3x"></i>
            </a>
            <div class="info">
                <h4>Projects</h4>
                <p><b>{{ $projects_count }}</b></p>
            </div>
        </div>
    </div><!-- end of col -->
    <div class="col-md-3">
        <div class="widget-small danger coloured-icon">
            <a href="{{ route('manage.education.index') }}" style="text-decoration: none;color:black">
                <i class="icon fa fa-graduation-cap fa-3x"></i>
            </a>
            <div class="info">
                <h4>Educations</h4>
                <p><b>{{ $educations_count }}</b></p>
            </div>
        </div>
    </div><!-- end of col -->
    <div class="col-md-3">
        <div class="widget-small warning coloured-icon">
            <a href="{{ route('manage.experience.index') }}" style="text-decoration: none;color:black">
                <i class="icon fa fa-briefcase fa-3x"></i>
            </a>
            <div class="info">
                <h4>Experiences</h4>
                <p><b>{{ $experiences_count }}</b></p>
            </div>
        </div>
    </div><!-- end of col -->
    <div class="col-md-3">
        <div class="widget-small info coloured-icon">
            <a href="{{ route('manage.social.index') }}" style="text-decoration: none;color:black">
                <i class="icon fa fa-thumbs-up fa-3x"></i>
            </a>
            <div class="info">
                <h4>Social Links</h4>
                <p><b>{{ $socials_count }}</b></p>
            </div>
        </div>
    </div><!-- end of col -->

</div><!-- end of row -->
<!-- section-1 -->

<!-- section-2 -->
<div class="tile mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border mb-4">
                    <h3 class="box-title"> <a href="{{ route('manage.skill.index') }}"
                            style="text-decoration: none;color:black">My Skills Progress </a></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @foreach ($skills as $skill)
                                <div class="progress-group col-md-3">
                                    <span class="progress-text">{{ $skill->skill }}</span>
                                    <span class="progress-number"><b> : {{ $skill->percent }}</b>/100</span>
                                    <div class="progress sm mt-3 mb-3">
                                        <div class="progress-bar progress-bar-aqua"
                                            style="width: {{ $skill->percent }}%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                @endforeach
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</div>
<!-- section-2 -->

<!-- section-3 -->
<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">
            <div class="box">
                <div class="box-header with-border mb-4">
                    <h3 class="box-title"> <a href="{{ route('manage.settings.section.index') }}"
                            style="text-decoration: none;color:black">Webiste Sections </a></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Header</th>
                                        <th>Section</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sections as $index=>$section)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>
                                            {{ $section->header }}
                                        </td>
                                        <td>
                                            {{ $section->section }}
                                        </td>
                                        <td>
                                            @if ($section->enabled)
                                            <a href="{{ route('manage.settings.section.disabled', $section->id) }}"
                                                class="btn btn-sm btn-danger">Disable</a>
                                            @else
                                            <a href="{{ route('manage.settings.section.enabled', $section->id) }}"
                                                class="btn btn-sm btn-success">Enable</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- box body -->
            </div>
        </div><!-- end of tile -->
    </div><!-- end of col -->
</div>
<!-- section-3 -->

@endsection
