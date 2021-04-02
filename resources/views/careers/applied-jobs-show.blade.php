@extends('layouts.app')

@section('content')
<style>
    .form-group{
        padding:10px;
    }
</style>
<div class="col-lg-8 col-lg-offset-2">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{translate('Category Information')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        
          
            <div class="panel-body" style="padding:0px;">
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="name">{{translate('Job Title')}}</label>
                    <div class="col-sm-9">
                        {{@$applied_job->career->job_title}}
                    </div>
                </div>
               
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="no_of_vacancy">{{translate('Applicant Name')}}</label>
                     <div class="col-sm-9">
                        {{@$applied_job->name}}
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="no_of_vacancy">{{translate('Applicant Email')}}</label>
                     <div class="col-sm-9">
                        {{@$applied_job->email}}
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="no_of_vacancy">{{translate('Applicant Phone')}}</label>
                     <div class="col-sm-9">
                        {{@$applied_job->phone}}
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="no_of_vacancy">{{translate('Nationality')}}</label>
                     <div class="col-sm-9">
                        {{@$applied_job->nationality}}
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="no_of_vacancy">{{translate('Applicant Address')}}</label>
                     <div class="col-sm-9">
                        {{@$applied_job->address}}
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="no_of_vacancy">{{translate('Gender')}}</label>
                     <div class="col-sm-9">
                        {{@$applied_job->gender}}
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="no_of_vacancy">{{translate('Citizenship Number')}}</label>
                     <div class="col-sm-9">
                        {{@$applied_job->citizenship_no}}
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="no_of_vacancy">{{translate('Qualification')}}</label>
                     <div class="col-sm-9">
                        {{@$applied_job->qualification}}
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="no_of_vacancy">{{translate('Work Experience')}}</label>
                     <div class="col-sm-9">
                        {{@$applied_job->work_experience}}
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="no_of_vacancy">{{translate('Preferred Shift')}}</label>
                     <div class="col-sm-9">
                        {{@$applied_job->preferred_shift}}
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="no_of_vacancy">{{translate('Candidate Source')}}</label>
                     <div class="col-sm-9">
                        {{@$applied_job->candidate_source}}
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="no_of_vacancy">{{translate('Application Status')}}</label>
                     <div class="col-sm-9">
                        {{ucwords(@$applied_job->status)}}
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label" for="no_of_vacancy">{{translate('Attached Document')}}</label>
                     <div class="col-sm-9">
                        <a href="{{asset('public/'.@$applied_job->cv)}}">Attached File(cv)</a>
                    </div>
                    
                </div>
                
                
            </div>
           
       
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

@endsection
