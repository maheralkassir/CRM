<?php use Carbon\Carbon;?>
@extends('layouts.HRmaster')
@section('content')
  <div class="col-xs-12">
		<div class="box-content">
      @if (isset($applicants[0]))

        <h4 class="box-title">Current Applicants</h4>

      	<table id="example" class="table table-striped table-bordered display" style="width:100%">
  				<thead>
  					<tr>
              <th>ID</th>
  						<th>الاسم</th>
              <th>العمل</th>
              <th>تاريخ الجهوزية للعمل</th>
  						<th>تاريخ المقابلة</th>
  						<th>اخر أجر</th>
              <th></th>
  					</tr>
  				</thead>
  				<tfoot>
  					<tr>
              <th>ID</th>
              <th>الاسم</th>
              <th>العمل</th>
              <th>تاريخ الجهوزية للعمل</th>
  						<th>تاريخ المقابلة</th>
  						<th>اخر أجر</th>
              <th></th>
  					</tr>
  				</tfoot>
  				<tbody>
            @foreach ($applicants as $applicant)
              <tr>
                <td>{{$applicant->id}}</td>
                <td>{{$applicant->name}}</td>

                <td>{{$applicant->job}}</td>
                <td>{{Carbon::parse($applicant->time_to_get_work)->toFormattedDateString()}}</td>
                <td>{{Carbon::parse($applicant->interview_date)->toFormattedDateString()}}</td>
                <td>{{$applicant->last_salary}}</td>

                <td>
                  <a style="cursor:none;text-decoration:none" href="/hr/applicants/see/{{$applicant->id}}"><button class="btn btn-success">المزيد</button></a>
                  <a style="cursor:none;text-decoration:none" href="/hr/applicants/update/{{$applicant->id}}"><button class="btn btn-primary">تعديل</button></a>
                  <a style="cursor:none;text-decoration:none" href="/hr/applicants/delete/{{$applicant->id}}"><button class="btn btn-danger">حذف</button></a>
                </td>
              </tr>
              @endforeach
  				</tbody>
  			</table>
      @else
        <h3 style="color:#304ffe">....لا يوجد أيّ طلبات توظيف</h3>
      @endif
		</div>
	</div>

@endsection
