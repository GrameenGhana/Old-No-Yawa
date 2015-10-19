@extends('layouts.master')


@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <i class="fa fa-users"></i> Voice Messages <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Voice Messages </li>
    </ol>
</section>
@stop

@section('content')

<section class="content invoice">

<div class="row">
    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    {{ $outgoingCallsCount }}
                </h3>
                <p>
                    Outgoing Calls
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-android-call"></i>
            </div>
            <a href="#" class="small-box-footer">
                <i class="fa fa-info-circle"></i> Total outgoing calls 
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-6 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
            <div class="inner">
                <h3>
                    {{ $incomingCallsCount }}
                </h3>
                <p>
                    Incoming Calls
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-android-call"></i>
            </div>
            <a href="#" class="small-box-footer">
                <i class="fa fa-info-circle"></i> Total incoming calls
            </a>
        </div>
    </div><!-- ./col -->

   
</div>


    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <section class="content">
        <div class="box">
            <div class="box-header">
                <form>
                    <div class="form-group" style=" text-align: left;
                     background: white;
                     padding-bottom: 5px;
                     padding-right: 5px;
                     padding: 5px;margin-bottom: 0px;">
                        <label>Show Logs For ...</label>
                        <select  class="from-control " id="optionselected" >
                            <option selected="selected" value="0">Both</option>
                            <option value="1">Outgoing</option>
                            <option value="2">Incoming</option>
                            


                        </select>

                    </div>
                </form>
            </div><!-- /.box-header -->


            <div class="box-body table-responsive">
                <table id="logstable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Call Date</th>
                            <th>Call Id</th>
                            <th>Voice Data</th>
                            <th>Disposition</th>
                            <th>Last Application</th>
                            <th>Duration(secs)</th>
                            <th>Campaign</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td> </td>
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
        
      $(document).ready(function() {

        oTable = $('#logstable').dataTable({
                "dom": "T<'clear'>lfrtip",
                "aaSorting": [[0, 'desc']],
                "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
                },
                "bSortable": true,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "{{ URL::to('/getvoicelogs') }}"
        });
        
         var tt = new $.fn.dataTable.TableTools( oTable );
 
         $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
         
          // onchange of year selection
    $('#optionselected').on('change', function() {
        var option = $('#optionselected').val();
        
        console.log("Option:"+option);
      

    });
    
        
        });


    </script>
    @stop
