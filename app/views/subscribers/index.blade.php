@extends('layouts.master')

@section('head')
@parent
{{ HTML::style('css/datatables/dataTables.bootstrap.css'); }}
@stop


@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <i class="fa fa-users"></i> Subscribers <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Subscribers</li>
    </ol>
</section>
@stop

@section('content')

<section class="content invoice">

    <div class="row">
        <div class="col-xs-12">
             @if (in_array(strtolower(Auth::user()->role), array('admin','partner')))
            <h2 class="page-header">
                <a class="btn btn-small btn-success" href="{{ URL::to('subs/create') }}"><i class="fa fa-plus-circle"></i> Add a Subcriber</a>
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
                <table id="substable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Gender</th>
                            <th>Education Level</th>
                            <th>Channel</th>
                            <th>Status</th>
                            <th>Registration Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> </td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>

                        </tr>

                    </tbody>



                </table>
            </div>
        </div>
    </section>
    @stop


    @section('script')
    <script type="text/javascript">
        $(function() {
            //$('#substable').dataTable();
        });
    </script>

    <script type="text/javascript">
        var oTable;
        $(document).ready(function() {
            oTable = $('#substable').dataTable({
                "aaSorting": [[5, 'desc']],
                "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                },
                "bSortable": true,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "{{ URL::to('/getclients') }}"
            });
        });
    </script>

    @stop
