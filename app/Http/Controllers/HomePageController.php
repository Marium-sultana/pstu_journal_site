<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EditorialTeam;
use App\IrsMember;
use App\Issue;
use App\UploadedPaper;
use App\WiseWord;
use App\BannerImage;
use App\CallPaper;
use App\CoverImage;
use Carbon\Carbon;
use DB;

class HomePageController extends Controller
{
    public function index()
    {
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $coverImage = CoverImage::select('id','image_location')->orderBy('created_at','desc')->first(); 
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        $issueData = Issue::select('id','issue_name','year')->where('status',1)->orderBy('created_at','desc')->first();
        $paperData = UploadedPaper::select('*')->where('issue_id',$issueData->id)->get();
        $title = '';
        $sl=1;
        foreach($paperData as $title_data){
            $title.= $sl.'. '.$title_data->paper_title.' '.' ';
            $sl++;
        }

        // dd($title);
        return view('front.home',compact('issueImage','wiseWord','callPaper','coverImage','paperData','title'));
    }

    public function manuscript()
    {
        $pageTitle= 'Manuscript Submission | International Journal of Innovative Research';
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        return view('front.manuscript_submission',compact('issueImage','wiseWord','callPaper','pageTitle'));
        
    }

    public function guidelines()
    {
        $pageTitle= 'Author Guidelines | International Journal of Innovative Research';
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');

        return view('front.author_guidelines',compact('issueImage','wiseWord','callPaper','pageTitle'));
        
    }

    public function help()
    {
        $pageTitle= 'Help Desk | International Journal of Innovative Research';
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        return view('front.help_desk',compact('issueImage','wiseWord','callPaper','pageTitle'));
        
    }

    public function member()
    { 
        $pageTitle= 'IRS Member | International Journal of Innovative Research';
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $designation_data = IrsMember::select('member_designation')->distinct()->orderByRaw( "FIELD(member_designation, 'Coordinator',
             'Publication Division','Research Division','Finance Division', 'Knowledge Sharing Division','Technical Support Division')")->get();
        $data = [];
        //$data = IrsMember::all('member_name','member_image');
        $member_info = IrsMember::all();
       foreach($member_info as $value){
           $data[$value['member_designation']][]=$value;
       }
       // dd($data['Publication Division']['member_name']);
        //dd($data['Publication Division'][0]['member_name']);
       // dd($designation,$data);
        return view('front.irs_member', compact('data','designation_data','issueImage','wiseWord','callPaper','pageTitle'));
    }

    public function editorial_team()
    {
        $pageTitle= 'Editorial Team | International Journal of Innovative Research';
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $data = EditorialTeam::all();
        //dd($data);
        return view('front.editorial_team', compact('data','issueImage','wiseWord','callPaper','pageTitle'));
    }

    public function current()
    {
       // $all_issue = [];
        //$data = ['all_issue' => $all_issue];
        //$all_paper = [];
        //$paper = ['all_paper' => $all_paper];
        $pageTitle= 'Current | International Journal of Innovative Research';
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $issueData = Issue::select('id','issue_name','year')->where('status',1)->orderBy('year','desc')->orderBy('id','desc')->first();
        //dd($issueData);
        //$paperData = UploadedPaper::all();
        $paperData = [];
        if(isset($issueData->id)){
            $paperData = UploadedPaper::select('*')->where('issue_id',$issueData->id)->get();

        }
       // dd($paperData);
        return view('front.current', compact('issueData','paperData','issueImage','wiseWord','callPaper','pageTitle'));
    }

    public function archive()
    {
       // $all_issue = [];
       // $data = ['all_issue' => $all_issue];
       $pageTitle= 'Archive | International Journal of Innovative Research';
       $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
       $callPaper = CallPaper::all('text');
       $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $issueData = Issue::select('id','issue_name','year')->where('status',1)->orderBy('year','desc')->orderBy('issue_name','desc')->get();
        $issueArray= [];
        foreach($issueData as $info){
            $issueArray[$info->year][] = $info;
        }
        //dd($issueArray);
        return view('front.archive',compact('issueArray','issueImage','wiseWord','callPaper','pageTitle'));
    }

    public function article($id)
    {
        //dd($id);
        $pageTitle= 'View Article | International Journal of Innovative Research';
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $issueData = Issue::select('id','issue_name','year')->where('id',$id)->first();
        $paperData = UploadedPaper::select('*')->where('issue_id',$id)->get();
        $issueId = $id;

        return view('front.view_article',compact('issueData','paperData','issueImage','wiseWord','callPaper','pageTitle','issueId'));
        
    }
    public function get_article_by_search(Request $request)
    {
        $search_string = $request->search_string;
        $issueId = $request->issueId;
        $paperData = DB::select("SELECT * FROM `uploaded_papers` WHERE issue_id = $issueId AND (paper_title LIKE '%$search_string%' OR author_name LIKE '%$search_string%');");
        echo json_encode($paperData);
        
    }

    public function detail($id)
    {
        $pageTitle= 'Paper Details | International Journal of Innovative Research';
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $paperDetail = UploadedPaper::select('paper_title','author_name','abstract','file_location')->where('id',$id)->first();
        return view('front.paper_detail',compact('paperDetail','issueImage','wiseWord','callPaper','pageTitle'));
        
    }
   

    public function contact()
    {
        $pageTitle= 'Contact | International Journal of Innovative Research';
        $issueImage = BannerImage::select('id','image_location')->orderBy('created_at','desc')->first();
        $wiseWord = WiseWord::select('id','text','writer')->orderBy('created_at','desc')->first();
        $callPaper = CallPaper::all('text');
        return view('front.contact',compact('issueImage','wiseWord','callPaper','pageTitle'));
    }
    
}