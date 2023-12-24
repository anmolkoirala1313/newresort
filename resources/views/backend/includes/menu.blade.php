    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="/" target="_blank">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing">Landing</span>
                        <span class="badge badge-pill bg-success" data-key="t-new">{{auth()->user()->user_type}}</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Components</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.menu.index' ? 'active':''}}" href="{{route('backend.menu.index')}}">
                        <i class="ri-stack-line"></i> <span data-key="t-widgets">Menu</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarHomepageMultilevel" data-bs-toggle="collapse" role="button" aria-controls="sidebarHomepageMultilevel">
                        <i class="ri-ancient-pavilion-line"></i> <span data-key="t-multi-level-homepage">Homepage</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarHomepageMultilevel" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.slider.index') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.slider.index' ? 'active':''}}"
                                   data-key="t-multi-level-homepage"> Slider </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.welcome.create') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.welcome.create' ? 'active':''}}"
                                   data-key="t-multi-level-homepage"> Welcome </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.call_action.create') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.call_action.create' ? 'active':''}}"
                                   data-key="t-multi-level-homepage"> Call Action </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.core_value.create') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.core_value.create' ? 'active':''}}"
                                   data-key="t-multi-level-homepage"> Core Value </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.mission_vision.create') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.mission_vision.create' ? 'active':''}}"
                                   data-key="t-multi-level-homepage"> Mission, Vision & Value </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.why_us.create') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.why_us.create' ? 'active':''}}"
                                   data-key="t-multi-level-homepage">Why Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.recruitment_process.create') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.recruitment_process.create' ? 'active':''}}"
                                   data-key="t-multi-level-homepage">Recruitment Process</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.general_grievance.create') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.general_grievance.create' ? 'active':''}}"
                                   data-key="t-multi-level-homepage">General Grievance</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarBlogMultilevel" data-bs-toggle="collapse" role="button" aria-controls="sidebarBlogMultilevel">
                        <i class="ri-ancient-gate-line"></i> <span data-key="t-multi-level-news">Room</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarBlogMultilevel" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarBasicSetupBlog" class="nav-link collapsed" data-bs-toggle="collapse" role="button" aria-controls="sidebarBasicSetupBlog"
                                   data-key="t-level-basic-blogs"> Basic Setup
                                </a>
                                <div class="menu-dropdown collapse" id="sidebarBasicSetupBlog" style="">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('backend.room.basic_setup.amenity.index') }}"
                                               class="nav-link {{request()->route()->getName() == 'backend.room.basic_setup.amenity.index' ? 'active':''}}"
                                               data-key="t-level-basic-blogs"> Amenity </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.room.index') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.room.index' ? 'active':''}}"
                                   data-key="t-multi-level-news"> List </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarBlogMultilevel" data-bs-toggle="collapse" role="button" aria-controls="sidebarBlogMultilevel">
                        <i class="ri-newspaper-line"></i> <span data-key="t-multi-level-news">News</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarBlogMultilevel" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarBasicSetupBlog" class="nav-link collapsed" data-bs-toggle="collapse" role="button" aria-controls="sidebarBasicSetupBlog"
                                   data-key="t-level-basic-blogs"> Basic Setup
                                </a>
                                <div class="menu-dropdown collapse" id="sidebarBasicSetupBlog" style="">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('backend.news.basic_setup.category.index') }}"
                                               class="nav-link {{request()->route()->getName() == 'backend.news.basic_setup.category.index' ? 'active':''}}"
                                               data-key="t-level-basic-blogs"> Category </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.news.blog.index') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.news.blog.index' ? 'active':''}}"
                                   data-key="t-multi-level-news"> Blog </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.page.index' ? 'active':''}}" href="{{route('backend.page.index')}}">
                        <i class="ri-pages-line"></i> <span data-key="t-widgets">Page</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.testimonial.index' ? 'active':''}}" href="{{route('backend.testimonial.index')}}">
                        <i class="ri-hand-heart-line"></i> <span data-key="t-widgets">Testimonial</span>
                    </a>
                </li>

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'formbuilder::forms.index' || \Request::route()->getName() == 'formbuilder::forms.create' || \Request::route()->getName() == 'formbuilder::forms.edit') active @endif" href="{{route('formbuilder::forms.index')}}">--}}
{{--                        <i class="ri-pages-line"></i> <span data-key="t-widgets">Forms</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.service.index' ? 'active':''}}" href="{{route('backend.service.index')}}">
                        <i class="ri-shopping-bag-line"></i> <span data-key="t-widgets">Service</span>
                    </a>
                </li>

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.managing_director.index' ? 'active':''}}" href="{{route('backend.managing_director.index')}}">--}}
{{--                        <i class="ri-open-arm-line"></i> <span data-key="t-widgets">Managing Director</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.team.index' ? 'active':''}}" href="{{route('backend.team.index')}}">
                        <i class="ri-team-line"></i> <span data-key="t-widgets">Team</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.client.index' ? 'active':''}}" href="{{route('backend.client.index')}}">
                        <i class="ri-user-2-line"></i> <span data-key="t-widgets">Client</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.album.index' ? 'active':''}}" href="{{route('backend.album.index')}}">
                        <i class="ri-gallery-line"></i> <span data-key="t-widgets">Album</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.customer-inquiry.index' ? 'active':''}}" href="{{route('backend.customer-inquiry.index')}}">
                        <i class="ri-discuss-line"></i> <span data-key="t-widgets">Customer Inquiry</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.user.user_management.index' ? 'active':''}}" href="{{route('backend.user.user-management.index')}}">
                        <i class="ri-account-circle-line"></i> <span data-key="t-widgets">User Mgmt.</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
