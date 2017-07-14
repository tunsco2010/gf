
/**
 * Created by PhpStorm.
 * User: Tunsco
 * Date: 7/14/2017
 * Time: 6:58 PM
 */


<ul class="sub-menu dropdown-menu">
                            <li class="">
                                <a href="{{ route('expense_categories.index') }}">
                                    <i class="fa fa-list"></i>
                                        <span class="title">
Expense Categories
</span>
                                    </a>
                                </li>


                                <li class="">
                                    <a href="{{ route('income_categories.index') }}">
                                        <i class="fa fa-list"></i>
                                        <span class="title">
Income Categories
</span>
                                    </a>
                                </li>


                                <li class="">
                                    <a href="{{ route('incomes.index') }}">
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <span class="title">
Incomes
                            </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('expenses.index') }}">
                                        <i class="fa fa-arrow-circle-left"></i>
                                        <span class="title">
Expenses
                            </span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="{{ route('monthly_reports.index') }}">
                                        <i class="fa fa-line-chart"></i>
                                        <span class="title">
Monthly Report
</span>
                                    </a>
                                </li>

                        </ul>
<ul class="dropdown-menu">

    <li class="">
        <a href="{{ url('health/vacines') }}">
            <i class="fa fa-stethoscope"></i>
            <span class="title">Vaccine</span>
        </a>
    </li>

    <li class="">
        <a href="{{ url('health/vacinecategories') }}">
            <i class="fa fa-bars"></i>
            <span class="title">Vaccine Category</span>
        </a>

    <li class="">
        <a href="{{ url('health/feeds') }}">
            <i class="fa fa-glass"></i>
            <span class="title">Feed</span>
        </a>
    </li>

    <li class="">
        <a href="{{ url('consumptions.index') }}">
            <i class="fa fa-cart-arrow-down"></i>
            <span class="title">Feed Consumption</span>
        </a>
    </li>
</ul>