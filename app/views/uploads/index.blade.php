@extends('layouts.master')

@section('head')
@parent
{{ HTML::style('css/datatables/dataTables.bootstrap.css'); }}
@stop


@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <i class="fa fa-users"></i> Excel Uploads <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Excel Uploads</li>
    </ol>
</section>
@stop

@section('content')

<section class="content invoice">

    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <a class="btn btn-small btn-success" href="{{ URL::to('uploads/upload') }}"><i class="fa fa-plus-circle"></i> Upload Excel File</a>
            </h2>
        </div><!-- /.col -->
    </div>

    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <section class="content">
        <div class="box">
            <div class="box-header">
            </div><!-- /.box-header -->

            <div class="box-body table-responsive">
                <table id="substable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>File Name</th>
                            <th>File Extension</th>
                            <th>No of Records</th>
                            <th>Source</th>
                            <th>Status</th>
                            <th>Uploaded By</th>
                            <th>Registration Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($uploads as $k => $value)
                        <tr>
                            <td> {{ $value->file_name }} </td>
                            <td> {{ $value->file_extension }} </td>
                            <td> {{ $value->number_of_records }} </td>
                            <td> {{ $value->source }} </td>
                            <td> {{ $value->status }} </td>
                            <td> {{ $value->uploader->username}} </td>
                            <td> {{ date('M d, Y',strtotime($value->created_at)) }} </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @stop


    @section('script')
    <script type="text/javascript">
        $(function() {
            $('#substable').dataTable({
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false,
                "iDisplayLength": 100
            });
        });
    </script>
    @stop
