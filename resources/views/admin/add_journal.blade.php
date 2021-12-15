@extends('admin.layout.master')
@section('content')

<noscript>
    <div class="alert alert-block span10">
        <h4 class="alert-heading">Warning!</h4>
        <p>
            You need to have 
                <a href="#" target="_blank">JavaScript</a>
             enabled to use this site.
        </p>
    </div>
</noscript>

<div id="content" class="span10">
<!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="#">Upload Paper</a>
            </li>
        </ul>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-edit"></i>Upload Paper</h2>
                
                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
                </div>
            </div>
        <h3>
            <?php
                // $msg=$this->session->userdata('message');
                $msg = '';
                if($msg)
                {
                    // echo $msg;
                    // $this->session->unset_userdata('message');
                }
            ?>
        </h3>
           
        <div class="box-content">
            @if(count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li style="padding:10px">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

      <!---{!!Form::open(['url' => 'admin/add_journal', 'method'=>'post']) !!}-->
           <form class="form-horizontal" enctype="multipart/form-data" action="{{url('admin/add_journal')}}" method="post">
                @csrf    
                <fieldset>
                    <legend></legend>
                    <div class="control-group">
                   <!---- {!!Form::label('typeahead', 'Title',['class' => 'control-label']); !!}--->
                        <label class="control-label" for="typeahead">Title  </label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" id="typeahead"  name="paper_title">                                
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Author Name </label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="typeahead"  name="author_name">                            
                        </div>
                    </div>
                    
                     <div class="control-group">
                        <label class="control-label" for="textarea2">Abstract</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" rows="3" name="abstract"></textarea>
                        </div>
                    </div>
                  
                    <div class="control-group" >
                        <label class="control-label" for="typeahead"  >Year</label>
                        <div class="controls">
                           <select name = "year" id="year">
                           <option value="" disabled selected>Select a year....</option>
                           @foreach($issue as $value)
                                <option id = "{{$value['year']}}">{{$value['year']}}</option>
                            @endforeach
                           </select>                           
                        </div>
                    </div>

                    <div class="control-group" style="display:none" id = "issue_div">
                        <label class="control-label" for="typeahead" >Issue</label>
                        <div class="controls">
                           <select name = "issue_id" id="issue_id">
                           <option value="" disabled selected>Select a issue....</option>
                           </select>                           
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Main Manuscript </label>
                        <div class="controls">
                            <input type="file" class="span6"   name="selected_file">                            
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save </button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
                    <!-- content ends -->
</div><!--/#content.span10-->
</div><!--/fluid-row-->

<hr>
@endsection

@section('js')
                <script>
                    $(document).ready(function(){
                        console.log("Hello");
                       // $("#issue_id").hide();
                    });

                    $("#year").on('change', function(){ 
                        var year=$("#year").val();
                        if(year == ''){
                            alert("Please select a year!!!");
                            return false;
                        }
                        console.log(year);
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo URL::to('admin/getIssue');?>',
                            data:{
                            '_token': $('input[name=_token]').val(),
                            year : year
                            },
                            success: function(result){
                                console.log(result);
                                $("#issue_id").html(result);
                                $("#issue_div").show();

                                return false;
                            }
                        });
                    });
                </script>
@endsection