<div id="sidebar">
    <div id="leftSidebar">
        <div class="block" id="sidebarUser">
            <span class="blockTitle">Journal Menu</span>
            <ul class="sidemenu">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/manuscript_submission')}}">Manuscript Submission </a></li>
                <li><a href="{{url('/author_guidelines')}}">Author Guidelines</a></li>
                <li><a href="{{url('/help_desk')}}">Help Desk</a></li>
            </ul>

        </div>


    <div class="block" id="sidebarUser">
        <span class="blockTitle">Current Issue</span>
        <p align="justify"> 
        @if(isset($issueImage->image_location))
            <img id="previewImg" src="{{url('/')}}/public/storage/banner/{{$issueImage->image_location}} " width="160" height="200"  style="margin-left: 30px;margin-top: 10px;"/> 
        @else
            <img id="previewImg" src="" alt="Preview Image" style="display:none" height="200" width="150"/>                               
        @endif
        </ul>
        <br><br>
        <!-- <span class="blockTitle">Wise Words</span>
        @if(isset($wiseWord->text))
            <hp>&quot;{{$wiseWord->text}}&quot;</p>
            <p class="align-right">-- {{ $wiseWord->writer}}</p>
        @endif -->
    </div>
</div>
</div>


    <div id="sidebar">
        <div id="rightSidebar">
            <div class="block" id="sidebarUser">
                <span class="blockTitle"> &nbsp; Call For Paper</span>
                <p  margin-left="2px">
                @foreach($callPaper as $paper)                                                        
                    <p align="justify">&quot;{!! $paper->text !!}&quot;</p>
                @endforeach
                </p>
                <p>  </p>
            </div>

            <div class="block" id="sidebarUser">
                <span class="blockTitle">User</span>

                <form method="post" action="http://www.irsbd.org/user/check_user_login">
                    <table style="margin-top:10px">
                        <tr>
                            <td><label for="sidebar-username">Email</label></td>
                            <td><input type="text" id="sidebar-username" name="email" value="" size="12" maxlength="32" class="textField" style="margin-left:5px;width: 135px"/></td>
                        </tr>
                        <tr>
                            <td><label for="sidebar-password">Password</label></td>
                            <td><input type="password" id="sidebar-password" name="password" value="" size="12" class="textField" style="margin-left:5px;width: 135px"/></td>
                        </tr>

                        <tr>
                            <td colspan="2"><input type="submit" value="Login" class="button" style="margin-left: 70px;margin-top:10px"/></td>
                        </tr>
                    </table>
                </form>
            </div>

                <div class="block" id="sidebarNavigation">
                    <!-- <span class="blockTitle"> &nbsp; Translate</span> -->
                    <!-- <div id="google_translate_element"></div> -->
                        <!-- <script type="text/javascript">
                        function googleTranslateElementInit() {
                        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                        }
                        </script>
                        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->
                    </div>
                </div>
        </div>



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
