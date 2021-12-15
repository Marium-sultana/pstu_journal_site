@extends('front.layout.master')
@section('content')
<style>
  /* Styles for wrapping the search box */

.search-box {
    width: 100%;
    margin: 50px auto;
}

/* Bootstrap 3 text input with search icon */

.has-search .form-control-feedback {
    left: initial;
    right: 0;
    color: black;
  border-left: 1px solid;
  width: 60px
}

.has-search .form-control {
    padding-right: 12px;
    padding-left: 34px;
}
.autocomplete-items{
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-item{
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
  border-top: 1px solid #d4d4d4; 
}
</style>
<!-- Search Option Start -->
<div class="search-box">
  
  <!-- Actual search box -->
  <div class="form-group has-feedback has-search">
   
    <input type="text" class="form-control" placeholder="Search by title or author name" id = "search_input">
     <span class="glyphicon glyphicon-search form-control-feedback"></span>
  </div>
  
  <div id="myInputautocomplete-list" class="autocomplete-items">
  
    
</div>
</div>
<!-- Search Option End -->

<h1 class="title" id="page-title"> Archive </h1>
 <div class="view-content">
    <div class="item-list">
      <ul class="views-summary">
      </ul>          
    </div>
  </div>

<h3>Table of Contents</h3>
<h4 class="tocSectionTitle">Research Articles</h4>

  @foreach($paperData as $data)          
    <p align='justify'>
    <b>Title:</b> 
    <a href="{{url('/paper_detail/'.$data->id)}}"> {{$data->paper_title}}</a> 
    <br>
    <b>Author(s): </b>{{$data->author_name}}<br>          
  @endforeach
    <br>
	 
     <a href="{{url('/')}}/public/storage/papers/{{isset($data->file_location)?$data->file_location:''}}" class="file">DOWNLOAD </a>

                       
	
	
</table>
     
         
		        
    
    <script>
    $("#search_input").keyup(function() {
      var search_string = $("#search_input").val();
      //console.log(search_string);
      var base_url = {!! json_encode(url('/')) !!}
      var issueId = {!! $issueId !!}
      if(search_string != ''){
        $.ajax(
				{
					url: base_url+"/get_article_by_search",
					data: {search_string:search_string,issueId:issueId},
				  success: function(result){
            var data = JSON.parse(result);
            if(data.length < 1){
              $("#myInputautocomplete-list").html('');
            }
            console.log(data);
            var paper = '';
            $.each(data,function(k,v){
              paper += `<a href="{{url('/paper_detail/`+v.id+`')}}"><div class="autocomplete-item"> 
                <h1> `+v.paper_title+`</h1>
                <h6>Author(s): `+v.author_name+`</h6>
              </div></a>`;
            })
            $("#myInputautocomplete-list").html(paper);
 			    }
			  });
      }
      else{
        $("#myInputautocomplete-list").html('');
      }
    })
    </script>
   

@endsection