<div id="sidebar-left" class="sidebar-left">
    <div class="sidebar-title">MAIN MENU</div>
    <div class="scroll-sidebar">
        <div class="scroll-sidebar__container">
            <nav class="sidebar-nav">
                <ul class="sidebar-nav__list">
                    <li><a role="button" data-toggle="collapse" href="#collapseExample1" aria-expanded="true" aria-controls="collapseExample1" class="parent {{Request::segment(1) == 'products' ? '' : 'collapsed'}}">
                            <em>{{trans('menu.params_menu')}}</em>
                            <span class="glyphicon glyphicon-chevron-up"></span></a>
                        <div id="collapseExample1" class="collapse {{Request::segment(1) == 'parameters' ? 'in' : ''}}">
                            <ul>
                                <li class="{{Request::segment(2) == 'tags' ? 'active' : ''}}">
                                    <a href="{{route('tags.index')}}"><span class="glyphicon glyphicon-chevron-right"></span>{{trans('menu.tags')}}</a>
                                </li>
                                <li class="{{Request::segment(2) == 'tasktype' ? 'active' : ''}}">
                                    <a href="{{route('tasks.index')}}"><span class="glyphicon glyphicon-chevron-right"></span>{{trans('menu.tasks_type_menu')}}</a>
                                </li>
                                <li class="{{Request::segment(2) == 'units' ? 'active' : ''}}">
                                    <a href="{{route('units.index')}}"><span class="glyphicon glyphicon-chevron-right"></span>{{trans('menu.measured_units_menu')}}</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li><a role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="true" aria-controls="collapseExample2" class="parent collapsed"><em>Make order</em><span class="glyphicon glyphicon-chevron-down"></span></a>
                        <div id="collapseExample2" class="collapse">
                            <ul>
                                <li class=""><a href="#"><span class="glyphicon glyphicon-chevron-right"></span>Overview</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span>Stock Check-In</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="true" aria-controls="collapseExample3" class="parent collapsed"><em>Activities</em><span class="glyphicon glyphicon-chevron-down"></span></a>
                        <div id="collapseExample3" class="collapse">
                            <ul>
                                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span>Overview</a></li>
                                <li class="active"><a href="#"><span class="glyphicon glyphicon-chevron-right"></span>Stock Check-In</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a role="button" data-toggle="collapse" href="#collapseExample4" aria-expanded="true" aria-controls="collapseExample4" class="parent collapsed"><em>Purchase order</em><span class="glyphicon glyphicon-chevron-down"></span></a>
                        <div id="collapseExample4" class="collapse">
                            <ul>
                                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span>Overview</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a role="button" data-toggle="collapse" href="#collapseExample5" aria-expanded="true" aria-controls="collapseExample5" class="parent collapsed"><em>Orders</em><span class="glyphicon glyphicon-chevron-down"></span></a>
                        <div id="collapseExample5" class="collapse">
                            <ul>
                                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span>Overview</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span>Disable product</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a role="button" data-toggle="collapse" href="#collapseExample6" aria-expanded="true"
                           aria-controls="collapseExample6" class="parent {{Request::segment(1) == 'management' ? '' : 'collapsed'}}">
                            <em>Management</em>
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <div id="collapseExample6" class="collapse {{Request::segment(1) == 'management' ? 'in' : ''}}">
                            <ul>
                                <li class="{{Request::segment(2) == 'users' ? 'active' : ''}}">
                                    <a href="#"><span class="glyphicon glyphicon-chevron-right"></span>Users</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>