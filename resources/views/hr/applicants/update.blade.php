<?php use Carbon\Carbon;?>

@extends('layouts.HRmaster')
@section('content')
  <h2 style="color:#304ffe">
    تحديث بيانات  {{$applicant->name}}:
  </h2>
  <form action="/hr/applicants/update/{{$applicant->id}}" method="POST"  enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">


        <div class="form-group col-md-6">
          <label>الوظيفة</label>
          <input type="text" value="{{$applicant->job}}" class="form-control" name="job" required/>
        </div>

        <div class="form-group col-md-6">
          <label>الأشخاص الموثوقون</label>
          <input type="text" value="{{$applicant->confident_people}}" class="form-control" name="confident_people" required/>
        </div>

        <div class="form-group col-md-6">
          <label>تاريخ المقابلة</label>
          <input type="date" value="{{$applicant->interview_date}}" class="form-control" name="interview_date" required/>
        </div>

        <div class="form-group col-md-6">
          <label>تاريخ الجهوزية لبداية العمل</label>
          <input type="date" value="{{$applicant->time_to_get_work}}" class="form-control" name="time_to_get_work" required/>
        </div>

        <div class="form-group col-md-6">
          <label>اخر راتب</label>
          <input type="number" value="{{$applicant->last_salary}}" class="form-control" name="last_salary" required/>
        </div>
        <div class="form-group col-md-6">
          <label>إضافة السيرة الذاتية</label>
          <input type="file" class="form-control" name="cv_link"/>
        </div>
        <div class="form-group col-md-6">
          <label>التقييم التقني</label>
          <input type="number" value="{{$applicant->technical_rate}}" class="form-control" name="technical_rate"/>
        </div>

        <div class="form-group col-md-6">
          <label>التقييم الرقمي</label>
          <input type="number" value="{{$applicant->numeric_evalution}}" class="form-control" name="numeric_evalution"/>
        </div>

    </div>
    <input class="btn btn-primary" value="تحديث" type="submit"/>
  </form>




  @if (isset($jobs[0]))
    <div class="box-content" style="margin-top:15px">
      <h4 class="box-title">الوظائف السابقة</h4>

      <table class="example table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr>
            <th>اسم الشركة</th>
            <th>الوظيفة</th>
            <th></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>اسم الشركة</th>
            <th>الوظيفة</th>
            <th></th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($jobs as $job)
            <tr>
              <td>{{$job->company_name}}</td>
              <td>{{$job->work_type}}</td>
              <td>
                <a style="cursor:none;text-decoration:none" href="/hr/applicants/lastjobs/delete/{{$job->id}}"><button class="btn btn-danger">حذف</button></a>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  @endif


  <button style="display:block;margin-bottom:30px;margin-top:20px"  type="button" data-remodal-target="remodal" class="btn btn-primary waves-effect waves-light">إضافة وظيفة سابقة</button>
  <div class="remodal" data-remodal-id="remodal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  	<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


    <div class="remodal-content">
      <h2 style="color:#304ffe">
        إضافة وظيفة سابقة
      </h2>
      <form action="/hr/applicants/lastjobs" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
        <div class="form-group">
          <label>أسم الشركة</label>
          <input type="text" class="form-control" name="company_name" required/>
        </div>

        <div class="form-group">
          <label>الوظيفة</label>
          <input type="text" class="form-control" name="work_type" required/>
        </div>


        <input type="hidden" name="applicant_id" value="{{$applicant->id}}" />
        <input class="remodal-confirm" type="submit" value="إضافة"/>

      </form>
  	</div>
  </div>

@endsection
