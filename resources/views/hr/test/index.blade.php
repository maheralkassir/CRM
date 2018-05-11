<?php use Carbon\Carbon;?>
@extends('layouts.HRmaster')
@section('content')
  <div class="col-xs-12">
		<div class="box-content">
      @if (isset($testers[0]))

        <h4 class="box-title">سجلات الموظفين قيد التجريب الحالية</h4>

      	<table id="example" class="table table-striped table-bordered display" style="width:100%">
  				<thead>
  					<tr>
              <th>رقم طلب التوظيف</th>
  						<th>الاسم</th>
              <th>تاريخ البداية</th>
  						<th>تاريخ النهاية</th>
              <th>الراتب</th>
              <th>النسبة المئوية للمشروع</th>
              <th></th>
  					</tr>
  				</thead>
  				<tfoot>
  					<tr>
              <th>رقم طلب التوظيف</th>
  						<th>الاسم</th>
              <th>تاريخ البداية</th>
  						<th>تاريخ النهاية</th>
              <th>الراتب</th>
              <th>النسبة المئوية للمشروع</th>
              <th></th>
  					</tr>
  				</tfoot>
  				<tbody>
            @foreach ($testers as $tester)
              <tr>
                <td>{{$tester->applicant_id}}</td>
                <td>{{$tester->prname}}</td>
                <td>{{Carbon::parse($tester->start_date)->toFormattedDateString()}}</td>
                <td>{{Carbon::parse($tester->end_date)->toFormattedDateString()}}</td>
                <td>{{$tester->salary}}</td>
                <td>{{$tester->salary_project_percent}}</td>
                <td>
                  <button  data-remodal-target="update{{$tester->id}}" class="btn btn-primary">تعديل</button>
                  <a style="cursor:none;text-decoration:none" href="/hr/testers/delete/{{$tester->id}}/{{$tester->applicant_id}}"><button class="btn btn-danger">حذف</button></a>
                </td>
              </tr>


              <div class="remodal" data-remodal-id="update{{$tester->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


                <div class="remodal-content">
                  <h2 style="color:#304ffe">
                    تعديل بيانات فترة التجريب
                  </h2>
                  <form action="/hr/testers/update" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-group">
                      <label>تاريخ البداية</label>
                      <input type="date" class="form-control" value="{{$tester->start_date}}" name="start_date" required/>
                    </div>

                    <div class="form-group">
                      <label>تاريخ النهاية</label>
                      <input type="date" class="form-control" value="{{$tester->end_date}}" name="end_date" required/>
                    </div>

                    <div class="form-group">
                      <label>الراتب</label>
                      <input type="number" class="form-control" value="{{$tester->salary}}" name="salary" required/>
                    </div>

                    <div class="form-group">
                      <label>النسبة المئوية للمشروع</label>
                      <input type="number" min="1" max="100" class="form-control" value="{{$tester->salary_project_percent}}" name="salary_project_percent" required/>
                    </div>


                    <input type="hidden" name="applicant_id" value="{{$tester->applicant_id}}" />
                    <input class="remodal-confirm" type="submit" value="تحديث"/>

                  </form>
                </div>

              </div>
              @endforeach
  				</tbody>
  			</table>
      @else
        <h3 style="color:#304ffe">لا يوجد بيانات تجريب....</h3>
      @endif
		</div>
	</div>

@endsection
