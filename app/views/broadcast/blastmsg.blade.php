@extends('layouts.master')

@section('head')
@parent
{{ HTML::style('css/datatables/dataTables.bootstrap.css'); }}
@stop


@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <i class="fa fa-users"></i> Broadcast <small>Control panel</small> </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ URL::to('broadcast') }}"><i class="fa fa-users"></i> Broadcast</a></li>
        <li class="active">Create</li>
    </ol>
</section>
@stop

@section('content')

<section class="content invoice">
    {{ Form::open(array('action' => array('blastmsg')))  }}
    <div class="row">
        <div class="col-xs-12">


            <h2 class="page-header">
                <a class="btn btn-small btn-success" href="{{ URL::to('broadcast/show') }}"><i class="fa fa-arrow-circle-left"></i> Refine Searches </a>
            </h2>

            <fieldset>
                <legend>Subscribers Found :: {{ count($subs) }}</legend>
            </fieldset>

            <?php if (count($subs) != 0) { ?>
                <fieldset>
                    <legend>SMS / Message</legend>

                    <div class="form-group">
                        {{ Form::label('smsid','Sms ID') }}
                        {{ Form::text('smsid',Input::old('smsid'),array('class'=>'form-control','placeholder'=>'Enter your sms id')) }}
                    </div> 

                    <div class="form-group">
                        {{ Form::label('sms','Message') }}
                        {{ Form::textarea('sms',Input::old('sms'),array('class'=>'form-control','placeholder'=>'Enter your message here','style'=>'height:80px' ,
                                        'onKeyDown'=>'limitText(this.form.sms,this.form.countdown,100);',
                                        'onKeyUp'=>'limitText(this.form.sms,this.form.countdown,100);')) }}
                                    <font class="alert-info" size="2">(Maximum characters: 160)<br>
                                   You have <input readonly type="text" name="countdown" size="3" value="160"> characters left.</font>
                                    </div>



                                    </fieldset>
                                    </div><!-- /.col -->
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="box-footer">
                                                {{ Form::submit('Blast Message',array('class'=>'btn btn-primary')) }} 

                                            </div>
                                        </div>
                                    </div>
                                    {{ Form::close() }}

                                    @if (Session::has('message'))
                                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                                    @endif

                                <?php } else { ?>
                                    <div class="alert alert-warning"> There are no subscriber(s) found , refine your search. </div>           
                                <?php } ?>                   
                                <section class="content">

                                    <!--
                                   <fieldset>
                                       <legend>Subscribers Found :: {{ count($subs) }}</legend>
                                       
                                      
                                       
                                       <div class="box">
                                           <div class="box-header">
                                           </div>  

                                           
                                           <div class="box-body table-responsive">
                                               
                                               <table id="substable" class="table table-bordered table-striped">
                                                   <thead>
                                                       <tr>
                                                           <th>Number</th>
                                                           <th>Gender</th>
                                                           <th>Education Level</th>
                                                           <th>Registration Date</th>

                                                       </tr>
                                                   </thead>
                                                   <tbody>
                                                       
                                                       <tr>
                                                           <td>  </td>
                                                           <td>  </td>
                                                           <td>  </td>
                                                           <td>  </td>

                                                       </tr>
                                                      
                                                   </tbody>
                                               </table>
                                           </div>
                                       </div>
                                       
                                       
                                   </fieldset>
                                    
                                    -->
                                </section>
                                @stop


                                @section('script')
                                <script type="text/javascript">
                                    $(function() {


                                        $('textarea').keyup(function() {
                                            var cs = $(this).val().length;
                                            $('#characters').text(cs);
                                        });

                                    });
                                </script>

                                <script type="text/javascript">
                                    var oTable;
                                    $(document).ready(function() {
                                        oTable = $('#substable').dataTable({
                                            "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                                            "sPaginationType": "bootstrap",
                                            "oLanguage": {
                                                "sLengthMenu": "_MENU_ records per page"
                                            },
                                            "bSortable": true,
                                            "bProcessing": true,
                                            "bServerSide": true,
                                            "sAjaxSource": "{{ URL::to('/getblastclients') }}"
                                        });
                                    });
                                </script>

                                <script language="javascript" type="text/javascript">
                                    function limitText(limitField, limitCount, limitNum) {
                                        if (limitField.value.length > limitNum) {
                                            limitField.value = limitField.value.substring(0, limitNum);
                                        } else {
                                            limitCount.value = limitNum - limitField.value.length;
                                        }
                                    }
                                </script>
                                @stop


