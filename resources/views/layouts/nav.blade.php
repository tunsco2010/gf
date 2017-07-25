<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button"
                    class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#navbar" aria-expanded="false"
                    aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">GF Farms</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse pull-right">
            <ul class="nav navbar-nav">

                @if (Auth::check())
                    <li><a href="/order/create">Sales</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">
                            <span class="title">Expense Mgt</span>
                            <span class="fa arrow caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/expenses">Expenses</a></li>
                            <li><a href="/expense_categories">Exp.Category</a></li>
                            <li><a href="/incomes">Income</a></li>
                            <li><a href="/income_categories">Income Category</a></li>
                            <li><a href="/monthly_reports">Report</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">
                            <span class="title">Time Mgt</span>
                            <span class="fa arrow caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/time_work_types">Work Types</a></li>
                            <li><a href="/time_projects">Projects</a></li>
                            <li><a href="/time_entries">Time Entries</a></li>
                            <li><a href="/time_reports">Report</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                                            data-toggle="dropdown" role="button" aria-haspopup="true"
                                            aria-expanded="false">Manage Products<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/product">Products</a></li>
                            <li><a href="/category">Categories</a></li>
                            <li><a href="/item">Sales Items</a></li>
                            <li><a href="/supplier">Suppliers</a></li>
                            <li><a href="/customer">Customers</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">
                            <span class="title">Health</span>
                            <span class="fa arrow caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="">
                                <a href="{{ url('health/feeds') }}">
                                    <i class="fa fa-glass"></i>
                                    <span class="title">Feed</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ url('health/consumptions') }}">
                                    <i class="fa fa-glass"></i>
                                    <span class="title">Feed Request</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ url('health/vacines') }}">
                                    <i class="fa fa-glass"></i>
                                    <span class="title">Vaccine</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ url('health/vacinecategories') }}">
                                    <i class="fa fa-glass"></i>
                                    <span class="title">Types of Vaccine</span>
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                                            data-toggle="dropdown" role="button" aria-haspopup="true"
                                            aria-expanded="false">Inventories<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('inventory/receiving') }}">Receiving</a></li>
                            <li><a href="{{ url('inventory/adjustment') }}">Adjustment</a></li>
                            <li><a href="{{ url('inventory/tracking') }}">Tracking</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/logout"
                                   onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li><img class="circ" src="{{ Gravatar::get(Auth::user()->email)  }}"></li>
                @else
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>

                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>