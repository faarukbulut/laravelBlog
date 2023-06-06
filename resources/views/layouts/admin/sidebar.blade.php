<div class="app-sidebar">
    <div class="logo">
        <a href="index.html" class="logo-icon"><span class="logo-text">Neptune</span></a>
        <div class="sidebar-user-switcher user-activity-online">
            <a href="#">
                <img src="{{asset('assets/admin/images/avatars/avatar.png')}}">
                <span class="activity-indicator"></span>
                <span class="user-info-text">Chloe<br><span class="user-state-info">On a call</span></span>
            </a>
        </div>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Apps
            </li>

            <li class="{{ Route::is('home') ? 'active-page' : '' }}">
                <a href="{{ route('home') }}"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
            </li>

            <li class="{{ Route::is('categories') ? 'active-page' : '' }}">
                <a href="{{ route('admin.categories.list') }}"><i class="material-icons-two-tone">categories</i>Kategori Yönetimi</a>
            </li>

            <li class="{{ Route::is('article') ? 'active-page' : '' }}">
                <a href="{{ route('admin.articles.list') }}"><i class="material-icons-two-tone">article</i>Makale Yönetimi</a>
            </li>



        </ul>
    </div>
</div>