@extends('layouts.basic')

<header>
    @yield('navbar')
</header>

<link rel="stylesheet" href="{{ asset('css/basic.css') }}">

@section("content")
<br>
<br>
<h3 class="cs-topper" style="text-align:center">Search</h3>
<div style="display: flex; justify-content: center; margin-top:10%;margin-bottom:5%">
    <form action="{{ url("search") }}" method="get" style="width: 50%; display: flex;height:7%" onsubmit="showTable(); return false;">
        <input type="search" name="search" placeholder="Search" class="form-control border-primary me-2">
        <button class="btn btn-primary text-white" type="submit" value="Search">Search</button>
        <button class="btn btn-primary text-white" type="submit" name="order_by" value="asc">
            <img src="/img/icons/down-arrow.png" style="width:25px;height:25px;">
        </button>
        <button class="btn btn-primary text-white" type="submit" name="order_by" value="desc">
            <img src="/img/icons/up-arrow.png" style="width:25px;height:25px;">
        </button>
    </form>
</div>
<br>
<br>
<br>
<div id="tableSection" style="display: none;">
    <div class="container">
        <div class="table">
            <div class="table-header">
                <div class="header__item"><a id="name" class="filter__link" href="#">Name</a></div>
                <div class="header__item"><a id="car" class="filter__link filter__link--number" href="#">Car</a></div>
                <div class="header__item"><a id="Times" class="filter__link filter__link--number" href="#">Time</a></div>
            </div>
            @foreach($response as $result)
            <a href="{{ url('/view-time', $result) }}" style="text-decoration: none; color: inherit; display: block;font-weight:bold">
            <div class="table-content">	
                <div class="table-row">
                    <div class="table-data">{{ $result->user->name }}</div>
                    <div class="table-data">{{ $result->car->brand }} {{ $result->car->model }} ({{ $result->car->year }})</div>
                    <div class="table-data">{{ $result->lap_time }}</div>
                </div>
            </div>	
            @endforeach	
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<script>
    function showTable() {
        document.getElementById('tableSection').style.display = 'block';
    }
</script>

@endsection


<style>
.table {
	width:100%;
	border:1px solid $color-form-highlight;
}

.table-header {
	display:flex;
	width:100%;
	background:#000;
	padding:($half-spacing-unit * 1.5) 0;
}

.table-row {
	display:flex;
	width:100%;
	padding:($half-spacing-unit * 1.5) 0;
}

.table-data, .header__item {
	flex: 1 1 20%;
	text-align:center;
}

.header__item {
	text-transform:uppercase;
}

.filter__link {
	color:white;
	text-decoration: none;
	position:relative;
	display:inline-block;
}

</style>