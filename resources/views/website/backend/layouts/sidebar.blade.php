<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>{{ trans('message.admin') }}</h3>
        <ul class="nav side-menu">
            <li>
                <a class="categoryyy">
                    <i class="fas fa-tags"></i>{{ trans('message.category') }}
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li class="categoryes"><a href="{{ route('categories.index') }}">{{ trans('message.category') }}</a></li>
                </ul>
            </li>
            <li>
                <a class="posttt">
                    <i class="fas fa-tags"></i>{{ trans('message.post') }}
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li class="postes"><a href="{{ route('posts.index') }}">{{ trans('message.post') }}</a></li>
                    <li class="requestposttt"><a href="{{ route('postRequest') }}">{{ trans('message.request_post') }}</a></li>
                </ul>
            </li>
            <li>
                <a class="userrr">
                    <i class="fas fa-tags"></i>{{ trans('message.user') }}
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li class="userss"><a href="{{ route('users.index') }}">{{ trans('message.user') }}</a></li>
                    <li class="authorrr"><a href="{{ route('authors.index') }}">{{ trans('message.author') }}</a></li>
                </ul>
            </li>
            <li>
                <a class="requesttt">
                    <i class="fas fa-tags"></i>{{ trans('message.request_writer') }}
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li class="requestrrr"><a href="{{ route('requests.index') }}">{{ trans('message.author') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
