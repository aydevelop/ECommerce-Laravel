@extends('layouts.admin')

@section('content')
        <h4>Orders</h4><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th></th>
                <th>Today</th>
                <th>Week</th>
                <th>Month</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td id="day_val"></td>
                <td id="week_val"></td>
                <td id="month_val"></td>
            </tr>
            </tbody>
    </table>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script>
    $(document).ready(function() {
        $.getJSON("/admin/jsonOrdersGroupBy/d", function( data ) {
            $('#day_val').text(data);
        });

        $.getJSON("/admin/jsonOrdersGroupBy/w", function( data ) {
            $('#week_val').text(data);
        });

        $.getJSON("/admin/jsonOrdersGroupBy/m", function( data ) {
            $('#month_val').text(data);
        });
    });

    </script>

@endsection
