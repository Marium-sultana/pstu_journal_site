@extends('front.layout.master')
@section('content')



<meta name="keywords" content= "IJIR"> 
<meta name="keywords" content=" International Journal of Innovative Research (IJIR)">
<meta name="description" content="International Journal of Innovative Research (IJIR) is an open-access triannual (three times in a year),
     peer-reviewed and multidisciplinary journal devoted to publication of original research articles, 
     short communication and reviews on all aspects of innovative research.
     It is published by the Innovative Research Syndicate (IRS). " />
<meta name="keywords" content= "Effect of Phosphorus on Growth, Yield and Yield Contributing Characters of Mungbean " >


<div id=""> <a name="IJIR (ISSN: ) "></a>


    <marquee behavior="scroll" direction="left"><b>{{$title}}</b></marquee>


    <h1>
        <p  style="font-size:20px;align:center" >Journal of the Patuakhali Science And Technology University  (JPSTU)  
            <span class="green"></span>
        </p>
    </h1>
    <br>  
    <p>Submit your unpublished & quality papers to JPSTU</p>
    <p align="justify"> 
    JPSTU is the official journal of Patuakhali Science and Technology University. 
    It is a half yearly, double blind peer-reviewed and open-access journal having both print 
    (1996-4501) and online (2789-3626) ISSN numbers. The peer-review process of the journal is 
    managed using an online journal management system, eJManager. JPSTU takes relatively short 
    period of time to complete the review process (see below). . 
    </p>                  
    <br>

    <div id='homepageImage'>
        <p align="justify"> 
        @if(isset($coverImage->image_location))
            <img id="previewImg" src="{{url('/')}}/public/storage/cover_image/{{$coverImage->image_location}} " width="360" height="400" /> 
            @else
                <img id="previewImg" src="" alt="Preview Image" style="display:none" height="360" width="400"/>                               
         @endif
				            
	</div>
    <br><br><br>


    <table  width=600 border="0" bordercolor="#111111" >
        <tr>
	        <td valign="top" bgcolor="#ffeeee"></td>
        </tr>
        <tr></tr>
    </table>    


    <table  width=400 border="0" bordercolor="#111111" >
        <tr>
	        <td valign="top" bgcolor="#ffeeee">
	            <b> Volume 4 Issue 2 </b>
        	</td>
        </tr>
    </table>


	<table>     
        @foreach($paperData as $data)
            <p align='justify'>
	            <b>Title:</b> 
                <a href="{{url('/')}}/public/storage/papers/{{$data->file_location}}"> {{$data->paper_title}}</a> 
            <br>
	            <b>Author(s): </b>{{$data->author_name}}<br>	
        @endforeach                        	  
    </table>
    </div></div>


<script type="text/javascript">
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
        $("#previewImg").css('display','block');

    }
</script>



@endsection