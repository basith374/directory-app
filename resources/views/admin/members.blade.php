@extends('admin.layout')

@section('content')

    <section class="content-header">
      <h1>
        Members
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    

    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Members table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            	@if(Session::has('success'))
            	<div class="alert alert-info">
            		<i class="fa fa-check"></i> {{ Session::get('success') }}
            	</div>
            	@endif


              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('scripts')
<script>
	
  	$('body').on('submit', '.delete', function() {
  		return confirm('Are you sure you want to delete this category? This could affect your website search engine ratings');
  	});

    $('#example1').DataTable({
      serverSide: true,
      ajax: {
        url: '/admin/members'
      },
      columns: [
      	{
      		data: 'image',
      		render: function(row) {
      			// if(row) {
      			// 	return '<img src="' + row + '" width="25" height="25" />';	
      			// }
      			return '';
      		}
      	},
        {data: 'user.name'},
        {data: 'user.email'},
        {
          data: 'slug',
          render: function(row) {
              var form = [
                '<form class="form-inline delete" action="categories/' + row + '" method="POST">',
              	    '<a href="categories/' + row + '/edit" class="btn btn-sm btn-primary" style="margin-right:5px;"><i class="fa fa-edit"></i> Edit</a>',
                    '{{ csrf_field() }}',
                    '<input type="hidden" name="_method" value="DELETE" >',
                    '<button type="submit" class="btn btn-sm btn-danger">',
                        '<i class="fa fa-trash"></i> Delete',
                    '</button>',
                '</form>'
              ].join('');
              return form;
          }
        }
      ]
    });
</script>
@endsection