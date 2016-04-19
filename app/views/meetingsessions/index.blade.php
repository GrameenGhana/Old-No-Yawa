@extends('layouts.master')




@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <i class="fa fa-users"></i> Meeting Sessions <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Meeting Sessions</li>
    </ol>
</section>
@stop

@section('content')

<section class="content invoice">

    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <section class="content">
        <div class="box">
            <div class="box-header">
            </div><!-- /.box-header -->

            <div class="box-body table-responsive">
                <table id="meetingstable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Male Attendance</th>
                            <th>Female Attendance</th>
                            <th>Location</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Started By</th>
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
        var oTable;
        $(document).ready(function() {
            oTable = $('#meetingstable').dataTable({
                "dom": "T<'clear'>lfrtip",
                "aaSorting": [[5, 'desc']],
                "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                },
                "bSortable": true,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "{{ URL::to('/getmeetings') }}"
            });
            
            var tt = new $.fn.dataTable.TableTools( oTable );
 
         $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
         
        });
    </script>

    @stop
