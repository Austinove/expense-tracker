<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html>
    <head>
        <style>
            body {
                font-size: 12px;
            }
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            .td-main, .th-main {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
            font-size: 8px !important;
            }

            .th-inside, .td-inside {
                text-align: left;
                padding: 2px;
                font-size: 8px !important;
            }

            .inside-row:nth-child(even) {
                background-color: whitesmoke;
            }
            .custom-td{
                white-space: break-spaces;
                width: 65%;
            }
        </style>
    </head>
    <body>
        @if (count($collection)>0)
        <div class="year">
            <span style="float: right;">{{$year}} Total Expense: 
                <strong>{{$yearTotal}} UGX</strong>
            </span>
        </div>
            @foreach ($collection as $expenses)
                    <div style="margin-bottom: 5px; margin-top: 20px;">
                        <span>Expenses for
                            <strong>
                                @if ($expenses->month)
                                    @switch($expenses->month)
                                        @case("01")
                                            January
                                            @break
                                        @case("02")
                                            Febrary
                                            @break
                                        @case("03")
                                            March
                                            @break
                                        @case("04")
                                            April
                                            @break
                                        @case("05")
                                            May
                                            @break
                                        @case("06")
                                            June
                                            @break
                                        @case("07")
                                            Jully
                                            @break
                                        @case("08")
                                            August
                                            @break
                                        @case("09")
                                            September
                                            @break
                                        @case("10")
                                            October
                                            @break
                                        @case("11")
                                            November
                                            @break
                                        @case("12")
                                            December
                                            @break
                                        @default
                                            @break
                                    @endswitch
                                    , {{$expenses->monthTotal}} UGX
                                @endif
                            </strong>
                        </span>
                        <br>
                    </div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col" class="th-main" style="width: 60%;">Description</th>
                            <th scope="col" class="th-main">Budget</th>
                            <th scope="col" class="th-main">user</th>
                            <th scope="col" class="th-main">Date/Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenses->expenses as $expense)
                            <tr>
                                <td class="td-main">
                                    {{$expense->desc}}
                                </td>
                                <td class="td-main">{{$expense->budget}}</td>
                                <td class="td-main">{{$expense->name}}</td>
                                <td class="td-main">{{$expense->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        @endif
    </body>
</html>