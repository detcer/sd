@extends( 'admin.category.layout' );


@section( 'table' )
	<div class="mb-3">
		<a class="btn btn-primary btn-lg" href="{{ route( 'admin.categories.create' ) }}">Добавить категорию</a>
	</div>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Название</th>
				<th>Чпу</th>
				<th>Описание</th>
				<th>Родительская категория</th>
				<th>Создано</th>
				<th><span class="fa fa-wrench"></span></th>
			</tr>
		</thead>
		<tbody>
			@foreach ( $categories as $cat )
				<tr>
					<td>{{ $cat -> title }}</td>
					<td>{{ $cat -> slug }}</td>
					<td>{{ $cat -> description }}</td>
					<td>{{ $cat -> parent_title }}</td>
					<td>{{ $cat -> created_at }}</td>
					<td>
						<a class="btn btn-sm btn-warning" href="{{ route( 'admin.categories.edit' , $cat -> id ) }}">
							<span class="fa fa-edit"></span>
						</a>
						<a class="btn btn-sm btn-danger" onclick="javascript:return confirm( 'Вы уверены что хотите удалить эту категорию ? \nПодкатегории тоже будут удалены' );" href="{{ route( 'admin.categories.destroy' , $cat -> id ) }}">
							<span class="fa fa-trash"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection