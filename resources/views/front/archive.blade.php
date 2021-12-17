@extends('front.layout.master')
@section('content')



<div id="breadcrumb">
	<a href="">Home</a> &gt;
	<a href="#" class="current">Archives</a>
</div>
	<h2>Archives</h2>

<div id="content">
	<div id="issues">
		<div style="float: left; width: 100%;">															   
    <!------------------------------------------------------------------------------------------>
			@foreach($issueArray as $year=>$infoIssue)
				<h3>{{$year}}</h3>
					@foreach ($infoIssue as $issue) 							
						<div id="i" style="clear:left;">
							<h4><i class="fas fa-check-square check_box" style="margin-left: 10px;"></i><a href="{{url('/view_article/'.$issue->id)}}">{{$issue->issue_name}}</a></h4>
					@endforeach
			@endforeach
     <!-------------------------------------------------------------------------->
</div>
</div>
</div>
</div>
</div>
</div>

@endsection