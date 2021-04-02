@extends('layouts.app')

@section('content')

<div class="col-lg-6 col-lg-offset-3">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{translate('Career Information')}}</h3>
        </div>

        <!--Horizontal Form-->
        <!--===================================================-->
        <form class="form-horizontal" action="{{ route('careers.store') }}" method="POST" enctype="multipart/form-data">
        	@csrf
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">{{translate('Job Title')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{translate('Job Title')}}" id="name" name="job_title" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="slug">{{translate('Slug')}}</label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="{{translate('your-slug')}}" id="slug" name="slug" class="form-control" required>
                        <small><code>http://domain.com/your-slug</code> Only a-z, numbers, hypen allowed</small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="no_of_vacancy">{{translate('No of Vacancy')}}</label>
                     <div class="col-sm-9">
                        <input type="number" min="1" id="no_of_vacancy" name="no_of_vacancy" class="form-control" required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{translate('Job Level')}}</label>
                    <div class="col-sm-9">
                        <select name="level" required class="form-control demo-select2-placeholder" required>
                            <option value="senior">{{translate('Senior')}}</option>
                            <option value="mid">{{translate('Mid')}}</option>
                            <option value="junior">{{translate('Junior')}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{translate('Status')}}</label>
                    <div class="col-sm-9">
                        <select name="status" required class="form-control demo-select2-placeholder">
                            <option value="active">{{translate('Active')}}</option>
                            <option value="inactive">{{translate('Inactive')}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{translate('Description')}}</label>
                    <div class="col-sm-9">
                        <textarea name="description" rows="8" class="form-control editor"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{translate('Meta Title')}}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="meta_title" placeholder="{{translate('Meta Title')}}">
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-3 control-label">{{translate('Meta Keywords')}}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="meta_keywords" placeholder="{{translate('Meta keywords')}}">
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-3 control-label">{{translate('Meta Description')}}</label>
                    <div class="col-sm-9">
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="meta_image">{{translate('Meta Image')}} <small>({{ translate('200x300') }})</small></label>
                    <div class="col-sm-9">
                        <input type="file" id="meta_image" name="meta_image" class="form-control" >
                    </div>
                </div>
                
            </div>
            <div class="panel-footer text-right">
                <button class="btn btn-purple" type="submit">{{translate('Save')}}</button>
            </div>
        </form>
        <!--===================================================-->
        <!--End Horizontal Form-->

    </div>
</div>

@endsection
