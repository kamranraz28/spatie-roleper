<div class="dashboard-sidebar">
    <nav>
        <ul>
            <li>
                <a href="{{ route('users.dashboard') }}">Dashboard</a>
            </li>
            <li>
                <a href="#">User Settings</a>
                <ul class="submenu"> <!-- Submenu for User Settings -->
                    <li><a href="{{ route('permissions.index') }}">Permissions</a></li>
                    <li><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li><a href="{{ route('users.index') }}">Users</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('userLogout') }}">Logout</a>
            </li>

        </ul>
    </nav>
</div>