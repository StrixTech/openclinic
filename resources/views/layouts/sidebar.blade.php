
    <aside class="main-sidebar fixed offcanvas b-r sidebar-tabs" data-toggle='offcanvas'>
        <div class="sidebar">
            <div class="d-flex hv-100 align-items-stretch">
                <div class="@settings('darkMode') bg-black @else bg-blue @endsettings text-white">
                    <div class="nav mt-5 pt-5 flex-column nav-pills" id="v-pills-tab" role="tablist"
                         aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                           aria-controls="v-pills-home" aria-selected="true"><i class="icon-inbox2"></i></a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                           aria-controls="v-pills-profile" aria-selected="false"><i class="icon-add"></i></a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                           aria-controls="v-pills-messages" aria-selected="false"><i class="icon-message"></i></a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                           aria-controls="v-pills-settings" aria-selected="false"><i class="icon-settings"></i></a>
                        <a href="">
                            <figure class="avatar">
                                <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" alt="">
                                <span class="avatar-badge online"></span>
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                         aria-labelledby="v-pills-home-tab">
                        <div class="relative brand-wrapper sticky b-b">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <div class="text-xs-center">
                                    <span class="font-weight-lighter s-18">Menu</span>
                                </div>
                                <div class="badge badge-danger r-0">New Panel</div>
                            </div>
                        </div>
                        <ul class="sidebar-menu">
                            <li><a href="/home">
                                    <i class="icon icon-sailing-boat-water s-24"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            @hasanyrole('doctor|admin')
                            <li class="treeview"><a href="#">
                                    <i class="icon icon-sailing-boat-water s-18"></i> <span>Patients</span> <i
                                        class="icon icon-angle-left s-18 pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/patients"><i class="icon icon-folder5"></i>Patients</a>
                                    </li>
                                    <li><a href="/appointments"><i class="icon icon-folder5"></i>Appointments</a>
                                    </li>
                                </ul>
                            </li>
                            @endhasanyrole
                            @hasrole('admin')
                            <li class="treeview"><a href="#">
                                    <i class="icon icon-sailing-boat-water s-18"></i> <span>Admin</span> <i
                                        class="icon icon-angle-left s-18 pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="/admin"><i class="icon icon-folder5"></i>Home</a></li>
                                    <li><a href="{{route('admin.settings')}}"><i class="icon icon-folder5"></i>Settings</a></li>
                                    <li><a href="/admin/roles"><i class="icon icon-folder5"></i>Roles</a></li>
                                    <li><a href="{{route('staff.index')}}"><i class="icon icon-folder5"></i>Staff</a></li>
                                </ul>
                            </li>
                            @endhasanyrole
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="relative brand-wrapper sticky b-b p-3">
                            <form>
                                <div class="form-group input-group-sm has-right-icon">
                                    <input class="form-control form-control-sm light r-30" placeholder="Search" type="text">
                                    <i class="icon-search"></i>
                                </div>
                            </form>
                        </div>
                        <div class="sticky slimScroll">

                            <div class="p-2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>

