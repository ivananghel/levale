<header id="header" class="header">
    <div class="header-fixed">
        <div class="logo"><a href="/products">
                <img src="{{asset('assets/img/levalet.png')}}" alt="YourChoise"></a>
        </div><a href="#sidebar-left" class="c-hamburger c-hamburger-sm c-hamburger--htx hidden-lg hidden-md"><span>toggle menu</span></a>
        <div class="container-fluid container-md-30 hidden-xs hidden-sm">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="header-list">
                        <div class="header-search">
                                {{Form::open()}}
                                <input type="text" name="search"
                                       value="{{\Illuminate\Support\Facades\Input::has('search') ? \Illuminate\Support\Facades\Input::get('search') : '' }}"
                                       placeholder="Search on product by Sku or title .."
                                       class="form-control">
                                <button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
                                {{Form::close()}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-lg-offset-2 col-md-6">
                    <div class="header-list text-right">
                        <div class="header-item dropdown user">
                            <a type="button" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle">
                                <span class="name">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                <span class="position">Administrator</span>
                                <span class="circle">
                                    @if(\Illuminate\Support\Facades\Auth::user()->avatar_path != '')
                                        <img src="{{asset('uploads/avatars/'.\Illuminate\Support\Facades\Auth::user()->avatar_path)}}" alt="avatar">
                                    @else
                                        <img src="{{asset('assets/img/avatar.png')}}" alt="User Avatar">
                                    @endif

                                </span>
                            </a>

                            <ul aria-labelledby="dropdownUser" class="dropdown-menu">
                                <li><a href="#">My account</a></li>
                                <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        </div>
                        <div class="header-item dropdown add"><a type="button" id="dropdownAdd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-circle"><span class="glyphicon glyphicon-plus"></span></a>
                            <ul ria-labelledby="dropdownAdd" class="dropdown-menu">
                                <li><a href="#">Make order.</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>