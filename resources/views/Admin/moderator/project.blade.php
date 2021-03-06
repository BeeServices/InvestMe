@extends('Admin.moderator.index')
    @section('content')
        <div class="container">
            <div class="row">
            <section class="col-lg-11 connectedSortable">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Projects</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th  style="width:30px">Video link</th>
                                <th>Title</th>
                                <th>Duration</th>
                                <th>Created at</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->creator->user->name }}</td>
                                    <td>{{ $project->video_link }}</td>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->duration }}</td>
                                    <td>{{ $project->created_at }}</td>
                                    <td style="width: 50px;">

                                        {{ Form::open(array('route'=>['moderator.project.destroy' , $project->id], 'class' => 'pull-right')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </section>
        </div>
        </div>

    @endsection
    @section('script')
        <script>
        function checkDelete(id) {
            if (confirm('Really delete?')) {
                $.ajax({
                    type: "DELETE",
                    url: '/<resource>/' + id,
                    success: function(result) {
                       // do something
                    }
                    });
                }
            }
        </script>
    @endsection