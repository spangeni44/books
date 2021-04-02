<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Str;
use App\Career;
use App\AppliedJob;
class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $careers = Career::query();
        if ($request->has('search')){
            $sort_search = $request->search;
            $careers = $careers->where('job_title', 'like', '%'.$sort_search.'%')->orderBy('id','desc');
        }
        $careers = $careers->paginate(15);
        return view('careers.index', compact('careers', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('careers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $careers = new Career();
        $careers->job_title=@$request->job_title;
        $careers->no_of_vacancy=@$request->no_of_vacancy;
        $careers->level=@$request->level;
        $careers->description=@$request->description;
        $careers->status=@$request->status;
        if ($request->slug != null) {
            $careers->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        }
        else {
            $careers->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->job_title));
        }
        if(isset($request->meta_title)){
            $careers->meta_title=$request->meta_title;
        }else{
            $careers->meta_title=$request->job_title;
        }
        if(isset($request->meta_keywords)){
            $careers->meta_keywords=$request->meta_keywords;
        }else{
            $careers->meta_keywords=$request->job_title;
        }
        if(isset($request->meta_description)){
            $careers->meta_description=$request->meta_description;
        }else{
            $careers->meta_description=Str::limit(@$request->description,191);
        }
        
        if(isset($request->career_id)){
            $careers->id=$request->career_id;
        }
        
       if($request->hasFile('meta_image')){
            $careers->meta_image = $request->file('meta_image')->store('uploads/careers/meta_images');
        }
        $data = openJSONFile('en');
        $data[$careers->job_title] = $careers->job_title;
        saveJSONFile('en', $data);

        if($careers->save()){
            flash(translate('Job Vacancy has been inserted successfully'))->success();
            return redirect()->route('careers.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $career=Career::findOrFail($id);
        return view('frontend.career.apply-job',compact('career'));
    }
    public function showCareersForFrontend(){
        $careers=Career::where('status','active')->paginate(10);
        return view('frontend.career.job-list',compact('careers'));
    }
    public function showApplyForm(Request $request){
        $career=Career::where(['status'=>'active','slug'=>@$request->slug])->first();
        if(isset($career->id)){
            return view('frontend.career.apply-job',compact('career'));
        }else{
            flash(translate('Job Vacancy Not Found or Not Active!'))->warning();
            return redirect()->back();
            
        }
    }
    public function postJobApplication(Request $request){
       
         $applied_job=new AppliedJob();
        $request->validate(@$applied_job->getAddRules());
        $career=Career::where(['slug'=>@$request->career_slug,'status'=>'active'])->first();
        if(isset($career->id)){
           
            if(isset($applied_job->where(['citizenship_no'=>@$request->citizenship_no,'career_id'=>$request->career_id])->first()->id)){
                 flash(translate('You Already Applied For This Job!'))->warning();
                return redirect()->back();
            }else{
                $data=$request->except('_token','cv','career_slug');
                 if($request->hasFile('cv')){
                    $data['cv'] = @$request->file('cv')->storeAs('uploads/careers/appliedcv',$career->job_title.'-'.$request->name.'-'.rand(0,99).'.'.$request->file('cv')->clientExtension());
                }
                $data['career_id']=$career->id;
                $applied_job->fill($data);
                $succ=$applied_job->save();
                if($succ){
                     flash(translate('Your Job Application is Submitted Successfully.'))->success();
       
                    return redirect()->route('career');
                }
            }
        }else{
             flash(translate('Unable To Apply For This Job! Try Again Later'))->error();
            return redirect()->back();
        }
    }
    public function getAllAppliedJobs(Request $request){
        $applied_jobs=AppliedJob::orderBy('id','desc')->paginate(10);
        return view('careers.applied-job-list',compact('applied_jobs'));
    }
    public function updateJobApplicationStatus(Request $request){
         $applied_jobs = AppliedJob::findOrFail($request->id);
        if($request->check_status){
             $applied_jobs->status = 'reviewed';
        }else{
            $applied_jobs->status ='under review';
        }
        if($applied_jobs->save()){
            return 1;
        }
        return 0;
    }
    public function getJobApplicationDetail(Request $request){
        $applied_job=AppliedJob::findOrFail($request->id);
        return view('careers.applied-jobs-show',compact('applied_job'));
    }
    public function deleteJobApplication(Request $request){
        $applied_jobs = AppliedJob::findOrFail($request->id);
        AppliedJob::destroy($request->id);
        flash(translate('Job Application has been deleted successfully'))->success();
        return redirect()->route('job-application-list');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $career = Career::findOrFail(decrypt($id));
        
        return view('careers.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $careers= Career::findOrFail($id);
        
        $careers->job_title=@$request->job_title;
        $careers->no_of_vacancy=@$request->no_of_vacancy;
        $careers->level=@$request->level;
        $careers->description=@$request->description;
        $careers->status=@$request->status;
        
        if ($request->slug != null) {
            $careers->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        }
        else {
            $careers->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->job_title)).'-'.Str::random(5);
        }
        
        $data = openJSONFile('en');
        $data[$careers->job_title] = $careers->job_title;
        saveJSONFile('en', $data);
        
        if($request->hasFile('meta_image')){
            $careers->meta_image = @$request->file('meta_image')->store('uploads/careers/meta_images');
        }
        if($careers->save()){
            flash(translate('Vacancy Post has been updated successfully'))->success();
            return redirect()->route('careers.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $careers = Career::findOrFail($id);
        Career::destroy($id);
        flash(translate('Career has been deleted successfully'))->success();
        return redirect()->route('careers.index');
        
    }
     public function updateStatus(Request $request)
    {
        $career = Career::findOrFail($request->id);
        if($request->check_status){
             $career->status = 'active';
        }else{
            $career->status ='inactive';
        }
        if($career->save()){
            return 1;
        }
        return 0;
    }
}
