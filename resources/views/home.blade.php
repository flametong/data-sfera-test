<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Data Sfera test assignment</title>

        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body class="antialiased">
        <div>
            <p>
                <a href="{{ route('api.incomes.index') }}">
                    Get Incomes
                </a>
            </p>
            <p>
                <a href="{{ route('api.orders.index') }}">
                    Get Orders
                </a>
            </p>
            <p>
                <a href="{{ route('api.sales.index') }}">
                    Get Sales
                </a>
            </p>
            <p>
                <a href="{{ route('api.stocks.index') }}">
                    Get Stocks
                </a>
            </p>
        </div>
        <h1>Examples of data from the DB</h1>
        <div>
            <h2>Incomes</h2>
            @if (count($incomes) === 0)
                <p>Incomes are empty</p>
            @else
                <div>
                    @for ($i = 0; $i < 3; $i++)
                        <p>
                            <p>date: {{ $incomes[$i]['date'] }}</p>
                            <p>last_change_date: {{ $incomes[$i]['last_change_date'] }}</p>
                            <p>date_close: {{ $incomes[$i]['date_close'] }}</p>
                            <p>supplier_article: {{ $incomes[$i]['supplier_article'] }}</p>
                            <p>tech_size: {{ $incomes[$i]['tech_size'] }}</p>
                            <p>barcode: {{ $incomes[$i]['barcode'] }}</p>
                            <p>quantity: {{ $incomes[$i]['quantity'] }}</p>
                            <p>status: {{ $incomes[$i]['status'] }}</p>
                        </p>
                        <hr>
                    @endfor
                </div>
            @endif
        </div>
        <div>
            <h2>Orders</h2>
            @if (count($orders) === 0)
                <p>Orders are empty</p>
            @else
                <div>
                    @for ($i = 0; $i < 3; $i++)
                        <p>
                            <p>g_number: {{ $orders[$i]['g_number'] }}</p>
                            <p>date: {{ $orders[$i]['date'] }}</p>
                            <p>last_change_date: {{ $orders[$i]['last_change_date'] }}</p>
                            <p>supplier_article: {{ $orders[$i]['supplier_article'] }}</p>
                            <p>total_price: {{ $orders[$i]['total_price'] }}</p>
                            <p>discount_percent: {{ $orders[$i]['discount_percent'] }}</p>
                            <p>warehouse_name: {{ $orders[$i]['warehouse_name'] }}</p>
                            <p>oblast: {{ $orders[$i]['oblast'] }}</p>
                        </p>
                        <hr>
                    @endfor
                </div>
            @endif
        </div>
        <div>
            <h2>Sales</h2>
            @if (count($sales) === 0)
                <p>Sales are empty</p>
            @else
                <div>
                    @for ($i = 0; $i < 3; $i++)
                        <p>
                            <p>g_number: {{ $sales[$i]['g_number'] }}</p>
                            <p>date: {{ $sales[$i]['date'] }}</p>
                            <p>total_price: {{ $sales[$i]['total_price'] }}</p>
                            <p>discount_percent: {{ $sales[$i]['discount_percent'] }}</p>
                            <p>warehouse_name: {{ $sales[$i]['warehouse_name'] }}</p>
                            <p>country_name: {{ $sales[$i]['country_name'] }}</p>
                            <p>oblast_okrug_name: {{ $sales[$i]['oblast_okrug_name'] }}</p>
                            <p>region_name: {{ $sales[$i]['region_name'] }}</p>
                        </p>
                        <hr>
                    @endfor
                </div>
            @endif
        </div>
        <div>
            <h2>Stocks</h2>
            @if (count($stocks) === 0)
                <p>Stocks are empty</p>
            @else
                <div>
                    @for ($i = 0; $i < 3; $i++)
                        <p>
                            <p>date: {{ $stocks[$i]['date'] }}</p>
                            <p>last_change_date: {{ $stocks[$i]['last_change_date'] }}</p>
                            <p>price: {{ $stocks[$i]['price'] }}</p>
                            <p>discount: {{ $stocks[$i]['discount'] }}</p>
                            <p>warehouse_name: {{ $stocks[$i]['warehouse_name'] }}</p>
                            <p>in_way_to_client: {{ $stocks[$i]['in_way_to_client'] }}</p>
                            <p>in_way_from_client: {{ $stocks[$i]['in_way_from_client'] }}</p>
                        </p>
                        <hr>
                    @endfor
                </div>
            @endif
        </div>
    </body>
</html>
