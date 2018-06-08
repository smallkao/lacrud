
@extends('layouts.app')
@section('title','CRUD單筆資料讀取')
@section('content')
<table class="table table-hover table-bordered">
	@foreach ($data as $indexKey => $datas)
		<tr>
			<td>{{$indexKey}}</td>
			<td>{{$datas}}</td>
		</tr>
	@endforeach
</table>
@endsection