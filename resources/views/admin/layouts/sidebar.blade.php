<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{url('/')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Departments
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    @if(isset(auth()->user()->role->permission['name']['department']['can-add']))
                                        <a class="nav-link" href="{{route('departments.create')}}">Create</a>
                                    @endif
                                    @if(isset(auth()->user()->role->permission['name']['department']['can-list']))
                                    <a class="nav-link" href="{{route('departments.index')}}">View</a>
                                    @endif
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                User 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Roles
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            @if(isset(auth()->user()->role->permission['name']['role']['can-add']))
                                                <a class="nav-link" href="{{route('roles.create')}}">Create Role</a>
                                            @endif
                                            @if(isset(auth()->user()->role->permission['name']['role']['can-list']))
                                                <a class="nav-link" href="{{route('roles.index')}}">View Role</a>
                                            @endif
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        User 
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            @if(isset(auth()->user()->role->permission['name']['user']['can-add']))
                                                <a class="nav-link" href="{{route('users.create')}}">Create User</a>
                                            @endif                                                
                                            @if(isset(auth()->user()->role->permission['name']['user']['can-list']))
                                                <a class="nav-link" href="{{route('users.index')}}">View Users</a>
                                            @endif
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapsePermissions" aria-expanded="false" aria-controls="pagesCollapsePermissions">
                                        Permission 
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapsePermissions" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            @if(isset(auth()->user()->role->permission['name']['permission']['can-add']))
                                                <a class="nav-link" href="{{route('permissions.create')}}">Create Permission</a>
                                            @endif
                                            @if(isset(auth()->user()->role->permission['name']['permission']['can-list']))
                                                <a class="nav-link" href="{{route('permissions.index')}}">View Permissions</a>
                                            @endif
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseLeaves" aria-expanded="false" aria-controls="pagesCollapseLeaves">
                            Staff leave 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseLeaves" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    @if(isset(auth()->user()->role->permission['name']['leave']['can-list']))
                                        <a class="nav-link" href="{{route('leaves.index')}}">Approve leave</a>
                                    @endif    
                                    <a class="nav-link" href="{{route('leaves.create')}}">Create Leave</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseNotice" aria-expanded="false" aria-controls="pagesCollapseNotice">
                                Notice
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseNotice" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    @if(isset(auth()->user()->role->permission['name']['notice']['can-list']))
                                        <a class="nav-link" href="{{route('notices.index')}}">View Notice</a>
                                    @endif    
                                    @if(isset(auth()->user()->role->permission['name']['notice']['can-add']))
                                        <a class="nav-link" href="{{route('notices.create')}}">Create Notice</a>
                                    @endif    
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{Auth()->user()->role->name}}
                    </div>
                </nav>
            </div>