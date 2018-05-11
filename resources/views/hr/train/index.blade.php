<?php use Carbon\Carbon;?>
@extends('layouts.HRmaster')
@section('content')
  <div class="col-xs-12">
		<div class="box-content">
      @if (isset($trainers[0]))

        <h4 class="box-title">سجلات التدريب الحالية</h4>

      	<table id="example" class="table table-striped table-bordered display" style="width:100%">
  				<thead>
  					<tr>
              <th>رقم طلب التوظيف</th>
  						<th>الاسم</th>
              <th>تاريخ البداية</th>
  						<th>تاريخ النهاية</th>
              <th>الراتب</th>
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
              <th></th>
  					</tr>
  				</tfoot>
  				<tbody>
            @foreach ($trainers as $trainer)
              <tr>
                <td>{{$trainer->applicant_id}}</td>
                <td>{{$trainer->prname}}</td>
                <td>{{Carbon::parse($trainer->start_date)->toFormattedDateString()}}</td>
                <td>{{Carbon::parse($trainer->end_date)->toFormattedDateString()}}</td>
                <td>{{$trainer->salary}}</td>
                <td>
                  <button  data-remodal-target="update{{$trainer->id}}" class="btn btn-primary">تعديل</button>
                  <a style="cursor:none;text-decoration:none" href="/hr/trainers/delete/{{$trainer->id}}/{{$trainer->applicant_id}}"><button class="btn btn-danger">حذف</button></a>
                </td>
              </tr>


              <div class="remodal" data-remodal-id="update{{$trainer->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


                <div class="remodal-content">
                  <h2 style="color:#304ffe">
                    تحديث بيانات فترة التدريب
                  </h2>
                  <form action="/hr/trainers/update" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-group">
                      <label>تاريخ البداية</label>
                      <input type="date" class="form-control" value="{{$trainer->start_date}}" name="start_date" required/>
                    </div>

                    <div class="form-group">
                      <label>تاريخ النهاية</label>
                      <input type="date" class="form-control" value="{{$trainer->end_date}}" name="end_date" required/>
                    </div>

                    <div class="form-group">
                      <label>الراتب</label>
                      <input type="number" class="form-control" value="{{$trainer->salary}}" name="salary" required/>
                    </div>


                    <input type="hidden" name="applicant_id" value="{{$trainer->applicant_id}}" />
                    <input class="remodal-confirm" type="submit" value="تحديث"/>

                  </form>
                </div>

              </div>
              @endforeach
  				</tbody>
  			</table>
      @else
        <h3 style="color:#304ffe">لا يوجد بيانات تدريب...</h3>
      @endif
		</div>
	</div>

@endsection
