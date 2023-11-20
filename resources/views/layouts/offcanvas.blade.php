<div
    class="offcanvas offcanvas-start bg-dark"
    tabindex="-1"
    id="sidebar"
    >
    <div class="offcanvas-body p-3">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="text-danger fw-bold text-uppercase">Core</div>
                    <ul class="p-0 ps-3">
                        <li>
                            <a href="{{route('employees.index')}}" @class(['nav-link', 'active' => ($current_route == 'employees.index')])>
                                <span class="me-2">
                                    <i class="fa-solid fa-house"></i>
                                </span>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('employees.create')}}" @class(['nav-link', 'active' => ($current_route == 'employees.create')])>
                                <span class="me-2">
                                    <i class="fa-regular fa-square-plus"></i>
                                </span>
                                <span>Add Employee</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="my-3">
                    <hr class="dropdown-divider bg-secondary" />
                </li>
            </ul>
        </nav>
    </div>
</div>
