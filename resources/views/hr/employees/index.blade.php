<?php use Carbon\Carbon;?>
@extends('layouts.HRmaster')
@section('content')
  <div class="col-xs-12">
		<div class="box-content">
        @if (isset($employees[0]))



        <h4 class="box-title">الموظفون الحاليون</h4>

      	<table id="example" class="table table-striped table-bordered display" style="width:100%">
  				<thead>
  					<tr>
  						<th>الأسم</th>
              <th>تاريخ التوظيف</th>
              <th>تاريخ بداية العقد</th>
              <th>تاريخ نهاية العقد</th>
              <th>الراتب المبدئي</th>
              <th></th>
  					</tr>
  				</thead>
  				<tfoot>
  					<tr>
              <th>الأسم</th>
              <th>تاريخ التوظيف</th>
              <th>تاريخ بداية العقد</th>
              <th>تاريخ نهاية العقد</th>
              <th>الراتب المبدئي</th>
              <th></th>
  					</tr>
  				</tfoot>
  				<tbody>
            @foreach ($employees as $employee)
              <tr>
                <td>{{$employee->name}}</td>
                <td>{{Carbon::parse($employee->employment_date)->toFormattedDateString()}}</td>
                <td>{{Carbon::parse($employee->contract_start_date)->toFormattedDateString()}}</td>
                <td>{{Carbon::parse($employee->contract_end_date)->toFormattedDateString()}}</td>
                <td>
                  <a style="cursor:none;text-decoration:none" href="/hr/employees/see/{{$employee->id}}"><button class="btn btn-success">المزيد</button></a>
                  <a style="cursor:none;text-decoration:none" href="/hr/employees/update/{{$employee->id}}"><button class="btn btn-primary">تعديل</button></a>
                  <a style="cursor:none;text-decoration:none" href="/hr/employees/delete/{{$employee->id}}"><button class="btn btn-danger">حذف</button></a>
                </td>
              </tr>
              @endforeach
  				</tbody>
  			</table>

  @else
    <h3 style="color:#304ffe">لا يوجد موظفين....</h3>
  @endif
</div>
</div>
@endsection
