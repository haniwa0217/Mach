@extends('layouts.app')

@section('content')

<div class="panel-body">
    <table class="table table-striped task-table">
		<thead>
			<th>ユーザ一一覧</th>
			<th>&nbsp;</th>
		</thead>
		<tbody>
		@foreach($users as $user) 
		<tr>
            <td class="table-text"><div> {{$user->name}}</div></td>
			<!-- user Delete Button -->
			<td>
			   <form method="POST" action="{{ route('admin.delete', ['id' => $user->id]) }}">
			        {{ csrf_field() }}
                   <button type="submit" class="btn btn-danger">
			          <i class="fa fa-trash"></i>削除
			       </button>
			   </form>
			</td>
		</tr>
		@endforeach
		</tbody>
    </table>
</div>	
@endsection

<!--@foreach($users as $user) 
{{$user->name}}<br>
@endforeach
-->
