@extends('layouts.master')


@section('content-header')
<section class="content-header">
          <h1>
            Smsbox
            <small> {{$logsCount}}  messages</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Smsbox</li>
          </ol>
</section>

@stop

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<section class="content">
          <div class="row">
            <div class="col-md-3">
              
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Folders</h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li ><a href="/feedback"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">{{$inboxCount}}</span></a></li>
                    <li class="active"><a href="/feedback.sentmessages"><i class="fa fa-envelope-o"></i> Sent <span class="label label-primary pull-right">{{$sentCount}}</span></a></li>
                    <li><a href="/feedback.trashmessages"><i class="fa fa-trash-o"></i> Trash <span class="label label-primary pull-right">{{$trashCount}}</span></a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Labels</h3>
                </div>
                <div class="box-body no-padding">
                 <ul class="nav nav-pills nav-stacked">
                    <li><a href="/feedback.registration"><i class="fa fa-circle-o text-green"></i> Registration  <span class="label label-primary pull-right">{{$regCount}}</span></a></li>
                    <li><a href="/feedback.comments"><i class="fa fa-circle-o text-yellow"></i> Comments <span class="label label-primary pull-right">{{$commentsCount}}</span></a></li>
                    <li><a href="/feedback.stop"><i class="fa fa-circle-o text-light-red"></i> Stop <span class="label label-primary pull-right">{{$stopCount}}</span></a></li>
                    <li><a href="/feedback.others"><i class="fa fa-circle-o text-light-blue"></i> Others  <span class="label label-primary pull-right">{{$othersCount}}</span></a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Sent</h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  
                  <div class="table-responsive mailbox-messages">
                    <table id="logstable" class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>From</th>
                            <th>Message</th>
                            <th>Sent At</th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                        </thead>
                      <tbody>
                        <tr>
                            <td class="mailbox-name">  </td>
                            <td class="mailbox-subject">  </td>
                            <td class="mailbox-date">  </td>
                            <td class="mailbox-attachment">  </td>
                            <td class="mailbox-attachment">  </td>
                            
                        </tr>
                      
                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  
                </div>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>

    @stop


    @section('script')
   

    <script type="text/javascript">
        var oTable;
        $(document).ready(function() {
            oTable = $('#logstable').dataTable({
                "dom": "T<'clear'>lfrtip",
                "aaSorting": [[4]],
                "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                },
                 "columnDefs": [ { //this prevents errors if the data is null
                       "targets": "_all",
                       "defaultContent": ""
                } ],
                "bSortable": true,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "{{ URL::to('/getsentsynclogs') }}"
            });
            
            var tt = new $.fn.dataTable.TableTools( oTable );
 
         $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
         
        });
    </script>
    

    @stop
