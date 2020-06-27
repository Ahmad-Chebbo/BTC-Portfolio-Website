<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="./liu.png" alt="">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }} </p>
        </div>
    </div>

    <ul class="app-menu">
        <li class="app-menu__header">Dashboard</li>
        <li><a class="app-menu__item {{ Nav::isRoute('manage.dashboard') }}" href="{{ route('manage.dashboard') }}"><i
                    class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li><a class="app-menu__item {{ Nav::isResource('user') }}" href="{{ route('manage.user.profile') }}"><i
                    class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Profile</span></a></li>

        <li><a class="app-menu__item {{ Nav::isResource('title') }}" href="{{ route('manage.settings.title.index') }}"><i
                    class="app-menu__icon fa fa-pencil"></i><span class="app-menu__label">Titles</span></a></li>
                    
        <li class="app-menu__header">Resume</li>
        <li class="treeview  {{ Nav::hasSegmentEx(['wscategory','wsproject'],2) }}">
            <a class="app-menu__item {{ Nav::hasSegment(['wscategory','wsproject'],2)}}" href="#"
                data-toggle="treeview"><i class="app-menu__icon fa fa-industry"></i><span
                    class="app-menu__label">Workshop</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ Nav::isResource('wscategory')}}"
                        href="{{ route('manage.wscategory.index') }}"><i class="icon fa fa-circle-o"></i> Categories</a>
                </li>
                <li><a class="treeview-item {{ Nav::isResource('wsproject')}}"
                        href="{{ route('manage.wsproject.index') }}"><i class="icon fa fa-circle-o"></i> Projects</a>
                </li>
            </ul>
        </li>

        <li><a class="app-menu__item {{ Nav::isResource('education') }}" href="{{ route('manage.education.index') }}"><i
                    class="app-menu__icon fa fa-graduation-cap"></i><span class="app-menu__label">Education</span></a>
        </li>

        <li><a class="app-menu__item {{ Nav::isResource('skill') }}" href="{{ route('manage.skill.index') }}"><i
                    class="app-menu__icon fa fa-sliders"></i><span class="app-menu__label">Skill</span></a></li>

        <li><a class="app-menu__item {{ Nav::isResource('language') }}" href="{{ route('manage.language.index') }}"><i
                    class="app-menu__icon fa fa-language"></i><span class="app-menu__label">Language</span></a></li>

        <li><a class="app-menu__item {{ Nav::isResource('certificate') }}"
                href="{{ route('manage.certificate.index') }}"><i class="app-menu__icon fa fa-certificate"></i><span
                    class="app-menu__label">Certificate</span></a></li>

        <li><a class="app-menu__item {{ Nav::isResource('experience') }}"
                href="{{ route('manage.experience.index') }}"><i class="app-menu__icon fa fa-briefcase"></i><span
                    class="app-menu__label">Experience</span></a></li>

        <li><a class="app-menu__item {{ Nav::isResource('social') }}" href="{{ route('manage.social.index') }}"><i
                    class="app-menu__icon fa fa-thumbs-up"></i><span class="app-menu__label">Social Links</span></a>
        </li>

        <li><a class="app-menu__item {{ Nav::isResource('counter') }}" href="{{ route('manage.counter.index') }}"><i
                    class="app-menu__icon fa fa-clock-o"></i><span class="app-menu__label">Counter</span></a>
        </li>

        <li class="app-menu__header">Settings</li>
        <li><a class="app-menu__item {{ Nav::isResource('color') }}" href="{{ route('manage.settings.color.index') }}"><i
                    class="app-menu__icon fa fa-paint-brush"></i><span class="app-menu__label">Website Colors</span></a>
        </li>
        <li><a class="app-menu__item {{ Nav::isResource('media') }}" href="{{ route('manage.settings.media.index') }}"><i
                    class="app-menu__icon fa fa-image"></i><span class="app-menu__label">Website Media</span></a>
        </li>
        <li><a class="app-menu__item {{ Nav::isResource('section') }}" href="{{ route('manage.settings.section.index') }}"><i
                    class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Website Section</span></a>
        </li>
    </ul>
</aside>
