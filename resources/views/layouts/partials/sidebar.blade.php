        {{-- <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('admin/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Snacked</h4>
                </div>
                <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <div class="parent-icon"><i class="bi bi-house-fill"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li class="menu-label">UI Elements</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bi bi-cloud-arrow-down-fill"></i>
                        </div>
                        <div class="menu-title">Categories</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('dashboard.categories.index') }}"><i class="bi bi-circle"></i>Categories</a>
                        </li>
                        <li> <a href="{{ route('dashboard.categories.create') }}"><i class="bi bi-circle"></i>Create Category</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end navigation-->
        </aside>
        <!--end sidebar --> --}}
