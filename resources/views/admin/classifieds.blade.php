@extends('admin.layout')

@section('content')

    <section class="content-header">
      <h1>
        Classifieds
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
              <h3 class="box-title">Complete classified list with search</h3>
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
                  <th>Title</th>
                  <th>Posted by</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    
@endsection

@section('scripts')
<script>
  $(function () {
  	$('body').on('submit', '.delete', function() {
  		return confirm('Are you sure you want to delete this entry?');
  	});
    $('#example1').DataTable({
      serverSide: true,
      ajax: {
        url: '/admin/classifieds'
      },
      columns: [
      	{
      		data: 'images',
      		render: function(row) {
      			if(row.length) {
      				return '<img src="' + row[0].image + '" width="25" height="25" />';	
      			}
      			return '';
      		}
      	},
        {data: 'name'},
        {data: 'owner'},
        {
        	data: 'approved',
        	render: function(row) {
        		return [
        			'<span class="text-' + (row ? 'success' : 'danger') + '">',
        				(!row ? 'Not ' : '') + 'Approved',
        			'</span>'
        		].join('');
        	}
        },
        {
          data: 'id',
          render: function(row) {
          	<?php $edit_link = "'<a href=\"classifieds/' + row + '/edit\" class=\"btn btn-sm btn-primary\" style=\"margin-right:5px;\"><i class=\"fa fa-edit\"></i> Edit</a>'";
            ?>
            console.log({{auth()->user()->userable->privilege}})
             @if(auth()->user()->userable->privilege > 2)
         		return {!! $edit_link !!};
             @else
              var form = [
                '<form class="form-inline delete" action="classifieds/' + row + '" method="POST">',
              	    {!! $edit_link . ',' !!}
                    '{{ csrf_field() }}',
                    '<input type="hidden" name="_method" value="DELETE" >',
                    '<button type="submit" class="btn btn-sm btn-danger">',
                        '<i class="fa fa-trash"></i> Delete',
                    '</button>',
                '</form>'
              ].join('');
              return form;
              @endif
          }
        }
      ]
    });
  });
</script>
@endsection