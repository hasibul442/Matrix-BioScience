<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                {{-- <li class="menu-title">Navigation</li> --}}

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fad fa-dice-d20"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                @if (  Auth::user()->user_type  == 'Super_Admin' )
                <li>
                    <a href="{{ route('users') }}">
                        <i class="fas fa-users"></i>
                        <span> User </span>
                    </a>
                </li>
                @endif


                {{-- <li>
                    <a href="{{ route('profile') }}">
                        <i class="fas fa-info-circle"></i>
                        <span> Company Profile </span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('banners') }}">
                        <i class="fad fa-icons"></i>
                        <span> Banner </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('brands') }}">
                        <i class="fas fa-chart-network"></i>
                        <span> Brands Information</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('contact') }}">
                        <i class="fas fa-chart-network"></i>
                        <span> Contact Information </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('bannertext') }}">
                        <i class="fas fa-bezier-curve"></i>
                        <span> Banner Text </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('ourstories') }}">
                        <i class="fas fa-ball-pile"></i>
                        <span> Our Story </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('products') }}">
                        <i class="fab fa-artstation"></i>
                        <span> Products </span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ route('messages') }}">
                        <i class="fas fa-mailbox"></i>
                        <span> Messages </span>
                    </a>
                </li> --}}

                <li>
                    <a href="#">
                        <i class="dripicons-meter"></i>
                        <span>Web Site</span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
