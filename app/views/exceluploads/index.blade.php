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
            @if (in_array(strtolower(Auth::user()->role), array('admin')))
            <h2 class="page-header">
                <a class="btn btn-small btn-success" href="{{ URL::to('exceluploads/upload') }}"><i class="fa fa-plus-circle"></i> Upload Excel File</a>
            </h2>
            @endif
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
                <table id="uploadstable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>File Name</th>
                            <th>No of Records(Successful)</th>
                            <th>Status</th>
                            <th>Registration Date</th>
                            <th>Uploaded By</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> </td>
                            <td>  </td>
                            <td class="expand">  </td>
                            <td>  </td>
                            <td>  </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <style type="text/css">
        table td.expand {
            width: 50%
        }
    </style>
    @stop


    @section('script')
    <script type="text/javascript">
        var oTable;
        $(document).ready(function() {
            oTable = $('#uploadstable').dataTable({
                "aaSorting": [[3, 'desc']],
                "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                },
                "bSortable": true,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "{{ URL::to('/getuploads') }}"
            });
        });
    </script>
    @stop
