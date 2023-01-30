<nav class="navbar is-primary" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('home') }}">
                <img src="{{ asset("logo.png") }}" height="28">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
               data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a href="{{ route('home') }}" class="navbar-item @if(request()->routeIs('home')) is-active @endif">
                    Feed
                </a>

            </div>

            <div class="navbar-end">

                <!--
                    Task 1 Authorization
                    The right items should appear:

                    User name and moderator only for logged users (and moderator user)
                    Sign out only for logged users
                    Sign up only for guest users
                -->

                    <!--
                        Task 1 User, step 1:
                        the HTML tag with class name should not be present in ths page for guest users
                    -->


                @if (Auth::check())
                    <div class="navbar-item">
                        <!--
                            Task 1 User, step 1:
                            add name of logged user
                        -->
                        <p>Signed in as <b class="user-name-nav"> {{Auth::user()->name}} </b>
                        @if (Auth::user()->role == 'moderator')
                            <!--
                                Task 1 Moderator, step 1:
                                This span should only appear when the user is a moderator

                                not: to check for moderator er normal user, get the enum here
                                            $table->enum('role', ['standard', 'moderator'])->default('standard');

                                elseif (true)
                            -->

                                <span class="ml-2 tag is-link moderator">Moderator</span>
                        @endif
                    </div>
                    <div class="navbar-item logout-link">
                        <div class="buttons">
                            <!--
                                Task 2 User, step 2:
                                add correct link
                            -->
                            <a href=" {{ route('logOut') }}" class="button is-primary logout-link logout-link">
                                <strong>Sign out</strong>
                            </a>
                        </div>
                    </div>
                @endif

                @if (!Auth::check())
                <div class="navbar-item">
                        <div class="buttons">
                            <!--
                                Task 2 User, step 2:
                                authenticated users should not have access to this link
                            -->
                            <!--
                                Task 2 Guest, step 2:
                                add correct link in href
                            -->
                            <a href="register" class="button is-primary register-link">
                                <strong>Sign up</strong>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
</nav>
