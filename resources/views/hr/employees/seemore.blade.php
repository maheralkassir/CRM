<?php use Carbon\Carbon;?>
@extends('layouts.HRmaster')

@section('content')
  <div class="row">
    <div class="col-xs-12">
  		<div class="box-content card">
  			<h4 class="box-title"><i class="fa fa-user ico"></i>تفاصيل الموظف</h4>
  			<div class="card-content">
  				<div class="row">
            <div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>الأسم:</label></div>
  							<div class="col-xs-7">{{$employee->name}}</div>
  						</div>
  					</div>

            <div class="col-md-6">
              <div class="row">
                <div class="col-xs-5"><label>الرقم التعريفي:</label></div>
                <div class="col-xs-7">{{$employee->applicant_id}}</div>
              </div>
            </div>

            <div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>تاريخ التوظيف:</label></div>
  							<div class="col-xs-7">{{Carbon::parse($employee->employment_date)->toFormattedDateString()}}</div>
  						</div>
  					</div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-xs-5"><label>تاريخ بداية العقد:</label></div>
                <div class="col-xs-7">{{Carbon::parse($employee->contract_start_date)->toFormattedDateString()}}</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-xs-5"><label>تاريخ نهاية العقد:</label></div>
                <div class="col-xs-7">{{Carbon::parse($employee->contract_end_date)->toFormattedDateString()}}</div>
              </div>
            </div>
  					<div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>مدة العقد:</label></div>
  							<div class="col-xs-7">{{$employee->contract_duration}}</div>
  						</div>
  					</div>

  					<div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>ساعات العمل الاسبوعية:</label></div>
  							<div class="col-xs-7">{{$employee->hours_per_day}}</div>
  						</div>
  					</div>
  					<div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>إجمالي العطل السنوية</label></div>
  							<div class="col-xs-7">{{$employee->absent_total}}</div>
  						</div>
  					</div>
  					<div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>الراتب المبدئي:</label></div>
  							<div class="col-xs-7">{{$employee->start_salary}}</div>
  						</div>
  					</div>

            <div class="col-md-6">
              <div class="row">
                <div class="col-xs-5"><label>الزيادة السنوية للراتب:</label></div>
                <div class="col-xs-7">{{$employee->salary_add_year}}</div>
              </div>
            </div>
            <div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>النسبة المئوية للمشروع:</label></div>
  							<div class="col-xs-7">{{$employee->salary_project_percent}}</div>
  						</div>
  					</div>

  				</div>
  			</div>
  		</div>
  	</div>
  </div>

  @if (isset($emppos[0]))
    <div class="box-content" style="margin-top:15px">
      <h4 class="box-title">المراكز الوظيفية</h4>

      <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr>
            <th>القسم</th>
            <th>تاريخ البداية</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>القسم</th>
            <th>تاريخ البداية</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($emppos as $emppo)
            <tr>
              <td>{{$emppo->department}}</td>
              <td>{{Carbon::parse($emppo->start_date)->toFormattedDateString()}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  @endif

  @if (isset($trcrs[0]))
    <div class="box-content" style="margin-top:15px">
      <h4 class="box-title">الدورات التدريبية</h4>

      <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr>
            <th>أسم الدورة</th>
            <th>ملاحظات</th>
            <th>تاريخ البداية</th>
            <th>تاريخ النهاية</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>أسم الدورة</th>
            <th>ملاحظات</th>
            <th>تاريخ البداية</th>
            <th>تاريخ النهاية</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($trcrs as $trcr)
            <tr>
              <td>{{$trcr->course_name}}</td>
              <td>{{$trcr->notes}}</td>
              <td>{{Carbon::parse($trcr->start_date)->toFormattedDateString()}}</td>
              <td>{{Carbon::parse($trcr->end_date)->toFormattedDateString()}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  @endif

  @if (isset($vacs[0]))
    <div class="box-content" style="margin-top:15px">
      <h4 class="box-title">العطل</h4>

      <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr>
            <th>النمط</th>
            <th>مدفوعة</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>النمط</th>
            <th>مدفوعة</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($vacs as $vac)
            <tr>
              <td>{{$vac->type}}</td>
              @if ($vac->is_paid)
                <td>نعم</td>
              @else
                <td>لا</td>
              @endif
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  @endif

  @if (isset($sales[0]))
    <div class="box-content" style="margin-top:15px">
      <h4 class="box-title">تغيرات الراتب</h4>
      <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr>
            <th>التاريخ</th>
            <th>القسم</th>
            <th>التفاصيل</th>
            <th>الراتب</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>التاريخ</th>
            <th>القسم</th>
            <th>التفاصيل</th>
            <th>الراتب</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($sales as $sale)
            <tr>
              <td>{{Carbon::parse($sale->date)->toFormattedDateString()}}</td>
              <td>{{$sale->department}}</td>
              <td>{{$sale->details}}</td>
              <td>{{$sale->salary}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  @endif

@endsection
