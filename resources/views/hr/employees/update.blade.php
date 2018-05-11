<?php use Carbon\Carbon;?>

@extends('layouts.HRmaster')
@section('content')
  <h2 style="color:#304ffe">
    تعديل بيانات {{$employee->name}}:
  </h2>
  <form action="/hr/employees/update/{{$employee->id}}" method="POST">
    {{ csrf_field() }}
    <div class="row">

      <div class="form-group col-md-6 col-xs-12">
        <label>تاريخ التوظيف</label>
        <input type="date" value="{{$employee->employment_date}}" class="form-control" name="employment_date" required/>
      </div>

      <div class="form-group col-md-6 col-xs-12">
        <label>تاريخ بداية العقد</label>
        <input type="date" value="{{$employee->contract_start_date}}" class="form-control" name="contract_start_date" required/>
      </div>

      <div class="form-group col-md-6 col-xs-12">
        <label>تاريخ نهاية العقد</label>
        <input type="date" value="{{$employee->contract_end_date}}" class="form-control" name="contract_end_date" required/>
      </div>

      <div class="form-group col-md-6 col-xs-12">
        <label>مدة العقد</label>
        <input type="number" value="{{$employee->contract_duration}}" class="form-control" name="contract_duration" required/>
      </div>

      <div class="form-group col-md-6 col-xs-12">
        <label>ساعات العمل اليومية</label>
        <input type="number" value="{{$employee->hours_per_day}}" min="1" max="24" class="form-control" name="hours_per_day" required/>
      </div>

      <div class="form-group col-md-6 col-xs-12">
        <label>إجمالي العطل السنوية</label>
        <input type="number" value="{{$employee->absent_total}}" class="form-control" name="absent_total" required/>
      </div>

      <div class="form-group col-md-6 col-xs-12">
        <label>الراتب المبدئي</label>
        <input type="number" value="{{$employee->start_salary}}" class="form-control" name="start_salary" required/>
      </div>

      <div class="form-group col-md-6 col-xs-12">
        <label>الزيادة السنوية للراتب</label>
        <input type="number" value="{{$employee->salary_add_year}}" class="form-control" name="salary_add_year" required/>
      </div>

      <div class="form-group col-md-6 col-xs-12">
        <label>الفنسبة المئوية للمشروع</label>
        <input type="number" value="{{$employee->salary_project_percent}}" class="form-control" min="1" max="100" name="salary_project_percent" required/>
      </div>

    </div>

    <input class="btn btn-primary" type="submit" value="تحديث"/>
  </form>






  @if (isset($emppos[0]))
    <div class="box-content" style="margin-top:15px">
      <h4 class="box-title">المراكز الوظيفية</h4>

      <table id="" class="example table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr>
            <th>القسم</th>
            <th>تاريخ البداية</th>
            <th></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>القسم</th>
            <th>تاريخ البداية</th>
            <th></th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($emppos as $emppo)
            <tr>
              <td>{{$emppo->department}}</td>
              <td>{{Carbon::parse($emppo->start_date)->toFormattedDateString()}}</td>
              <td>
                <button data-remodal-target="update{{$emppo->id}}" class="btn btn-primary">تعديل</button>
                <a style="cursor:none;text-decoration:none" href="/hr/employees/emppositions/delete/{{$emppo->id}}"><button class="btn btn-danger">حذف</button></a>
              </td>
            </tr>
            <div class="remodal" data-remodal-id="update{{$emppo->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
              <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


              <div class="remodal-content">
                <h2 style="color:#304ffe">
                  تعديل
                </h2>
                <form action="/hr/employees/emppositions/update/{{$emppo->id}}" method="POST" enctype="multipart/form-data">

                  {{ csrf_field() }}
                  <div class="form-group">
                    <label>القسم</label>
                    <input value="{{$emppo->department}}" type="text" class="form-control" name="department" required/>
                  </div>

                  <div class="form-group">
                    <label>تاريخ البداية</label>
                    <input value="{{$emppo->start_date}}" type="date" class="form-control" name="start_date" required/>
                  </div>

                  <input type="hidden" name="employee_id" value="{{$employee->id}}" />
                  <input class="remodal-confirm" type="submit" value="تحديث"/>

                </form>
              </div>
            </div>
            @endforeach
        </tbody>
      </table>
    </div>
  @endif


<button style="display:block;margin-bottom:30px;margin-top:20px"  type="button" data-remodal-target="addpos" class="btn btn-primary waves-effect waves-light">إضافة مركز وظيفي جديد</button>
<div class="remodal" data-remodal-id="addpos" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


  <div class="remodal-content">
    <h2 style="color:#304ffe">
      إضافة مركز وظيفي جديد
    </h2>
    <form action="/hr/employees/emppositions" method="POST" enctype="multipart/form-data">

      {{ csrf_field() }}
      <div class="form-group">
        <label>القسم</label>
        <input type="text" class="form-control" name="department" required/>
      </div>

      <div class="form-group">
        <label>تاريخ البداية</label>
        <input type="date" class="form-control" name="start_date" required/>
      </div>

      <input type="hidden" name="employee_id" value="{{$employee->id}}" />
      <input class="remodal-confirm" type="submit" value="إضافة"/>

    </form>
  </div>
</div>



@if (isset($trcrs[0]))
  <div class="box-content" style="margin-top:15px">
    <h4 class="box-title">الدورات التدريبية</h4>

    <table id="example" class="example table table-striped table-bordered display" style="width:100%">
      <thead>
        <tr>
          <th>أسم الدورة</th>
          <th>ملاحظات</th>
          <th>تاريخ البداية</th>
          <th>تاريخ النهاية</th>
          <th></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>أسم الدورة</th>
          <th>ملاحظات</th>
          <th>تاريخ البداية</th>
          <th>تاريخ النهاية</th>
          <th></th>
        </tr>
      </tfoot>
      <tbody>
        @foreach ($trcrs as $trcr)
          <tr>
            <td>{{$trcr->course_name}}</td>
            <td>{{$trcr->notes}}</td>
            <td>{{Carbon::parse($trcr->start_date)->toFormattedDateString()}}</td>
            <td>{{Carbon::parse($trcr->end_date)->toFormattedDateString()}}</td>
            <td>
              <button data-remodal-target="updatetrcr{{$trcr->id}}" class="btn btn-primary">تعديل</button>
              <a style="cursor:none;text-decoration:none" href="/hr/employees/trcrs/delete/{{$trcr->id}}"><button class="btn btn-danger">حذف</button></a>
            </td>
          </tr>
          <div class="remodal" data-remodal-id="updatetrcr{{$trcr->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
            <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


            <div class="remodal-content">
              <h2 style="color:#304ffe">
                تعديل
              </h2>
              <form action="/hr/employees/trcrs/update/{{$trcr->id}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-group">
                  <label>اسم الدورة</label>
                  <input type="text" class="form-control" name="course_name" value="{{$trcr->course_name}}" required/>
                </div>
                <div class="form-group">
                  <label>الملاحظات</label>
                  <input type="text" class="form-control" name="notes" value="{{$trcr->notes}}" required/>
                </div>

                <div class="form-group">
                  <label>تاريخ البداية</label>
                  <input type="date" class="form-control" name="start_date" value="{{$trcr->start_date}}" required/>
                </div>

                <div class="form-group">
                  <label>تاريخ النهاية</label>
                  <input type="date" class="form-control" name="end_date" value="{{$trcr->end_date}}" required/>
                </div>

                <input type="hidden" name="employee_id" value="{{$employee->id}}" />
                <input class="remodal-confirm" type="submit" value="Update"/>

              </form>
            </div>
          </div>
          @endforeach
      </tbody>
    </table>
  </div>
@endif


<button style="display:block;margin-bottom:30px;margin-top:20px"  type="button" data-remodal-target="addtrcr" class="btn btn-primary waves-effect waves-light">إضافة دورة تدريبية جديدة</button>
<div class="remodal" data-remodal-id="addtrcr" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


<div class="remodal-content">
  <h2 style="color:#304ffe">
    إضافة دورة تدريبية جديدة
  </h2>
  <form action="/hr/employees/trcrs" method="POST" enctype="multipart/form-data">

    {{ csrf_field() }}
    <div class="form-group">
      <label>اسم الدورة</label>
      <input type="text" class="form-control" name="course_name" required/>
    </div>
    <div class="form-group">
      <label>الملاحظات</label>
      <input type="text" class="form-control" name="notes" required/>
    </div>

    <div class="form-group">
      <label>تاريخ البداية</label>
      <input type="date" class="form-control" name="start_date" required/>
    </div>

    <div class="form-group">
      <label>تاريخ النهاية</label>
      <input type="date" class="form-control" name="end_date" required/>
    </div>

    <input type="hidden" name="employee_id" value="{{$employee->id}}" />
    <input class="remodal-confirm" type="submit" value="إضافة"/>

  </form>
</div>
</div>




@if (isset($vacs[0]))
  <div class="box-content" style="margin-top:15px">
    <h4 class="box-title">العطل</h4>

    <table id="example" class="example table table-striped table-bordered display" style="width:100%">
      <thead>
        <tr>
          <th>النمط</th>
          <th>مدفوعة</th>
          <th></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>النمط</th>
          <th>مدفوعة</th>
          <th></th>
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

            <td>
              <button data-remodal-target="updatevac{{$vac->id}}" class="btn btn-primary">تعديل</button>
              <a style="cursor:none;text-decoration:none" href="/hr/employees/vacations/delete/{{$vac->id}}"><button class="btn btn-danger">حذف</button></a>
            </td>
          </tr>
          <div class="remodal" data-remodal-id="updatevac{{$vac->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
            <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


            <div class="remodal-content">
              <h2 style="color:#304ffe">
                تعديل
              </h2>
              <form action="/hr/employees/vacations/update/{{$vac->id}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-group">
                  <label>النمط</label>
                  <input type="text" class="form-control" name="type" value="{{$vac->type}}" required/>
                </div>

                <div class="form-group">
                  <label>مدفوعة</label>
                  @if ($vac->is_paid)
                    <input type="checkbox" class="form-control" name="is_paid" checked/>
                  @else
                    <input type="checkbox" class="form-control" name="is_paid"/>
                  @endif
                </div>


                <input type="hidden" name="employee_id" value="{{$employee->id}}" />
                <input class="remodal-confirm" type="submit" value="تحديث"/>

              </form>
            </div>
          </div>
          @endforeach
      </tbody>
    </table>
  </div>
@endif


<button style="display:block;margin-bottom:30px;margin-top:20px"  type="button" data-remodal-target="addvac" class="btn btn-primary waves-effect waves-light">إضافة عطلة جديدة</button>
<div class="remodal" data-remodal-id="addvac" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


<div class="remodal-content">
  <h2 style="color:#304ffe">
    إضافة عطلة جديدة
  </h2>
  <form action="/hr/employees/vacations" method="POST" enctype="multipart/form-data">

    {{ csrf_field() }}
    <div class="form-group">
      <label>النمط</label>
      <input type="text" class="form-control" name="type" required/>
    </div>

    <div class="form-group">
      <label>مدفوعة</label>
      <input type="checkbox" class="form-control" name="is_paid"/>
    </div>

    <input type="hidden" name="employee_id" value="{{$employee->id}}" />
    <input class="remodal-confirm" type="submit" value="إضافة"/>

  </form>
</div>
</div>

@if (isset($sales[0]))
  <div class="box-content" style="margin-top:15px">
    <h4 class="box-title">تغيرات الراتب</h4>

    <table id="example" class="example table table-striped table-bordered display" style="width:100%">
      <thead>
        <tr>
          <th>التاريخ</th>
          <th>القسم</th>
          <th>التفاصيل</th>
          <th>الراتب</th>
          <th></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>التاريخ</th>
          <th>القسم</th>
          <th>التفاصيل</th>
          <th>الراتب</th>
          <th></th>
        </tr>
      </tfoot>
      <tbody>
        @foreach ($sales as $sale)
          <tr>
            <td>{{Carbon::parse($sale->date)->toFormattedDateString()}}</td>
            <td>{{$sale->department}}</td>
            <td>{{$sale->details}}</td>
            <td>{{$sale->salary}}</td>


            <td>
              <button data-remodal-target="updatesal{{$sale->id}}" class="btn btn-primary">تعديل</button>
              <a style="cursor:none;text-decoration:none" href="/hr/employees/salaries/delete/{{$sale->id}}"><button class="btn btn-danger">حذف</button></a>
            </td>
          </tr>
          <div class="remodal" data-remodal-id="updatesal{{$sale->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
            <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


            <div class="remodal-content">
              <h2 style="color:#304ffe">
                تعديل
              </h2>
              <form action="/hr/employees/salaries/update/{{$sale->id}}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-group">
                  <label>التاريخ</label>
                  <input type="date" class="form-control" name="date" value="{{$sale->date}}" required/>
                </div>

                <div class="form-group">
                  <label>القسم</label>
                  <input type="text" class="form-control" name="department" value="{{$sale->department}}" required/>
                </div>

                <div class="form-group">
                  <label>التفاصيل</label>
                  <input type="text" class="form-control" name="details" value="{{$sale->details}}" required/>
                </div>

                <div class="form-group">
                  <label>الراتب</label>
                  <input type="number" class="form-control" name="salary" value="{{$sale->salary}}" required/>
                </div>

                <input type="hidden" name="employee_id" value="{{$employee->id}}" />
                <input class="remodal-confirm" type="submit" value="Update"/>

              </form>
            </div>
          </div>
          @endforeach
      </tbody>
    </table>
  </div>
@endif


<button style="display:block;margin-bottom:30px;margin-top:20px"  type="button" data-remodal-target="addsalex" class="btn btn-primary waves-effect waves-light">إضافة تغير راتب</button>
<div class="remodal" data-remodal-id="addsalex" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


<div class="remodal-content">
  <h2 style="color:#304ffe">
    إضافة تغير راتب
  </h2>
  <form action="/hr/employees/salaries" method="POST" enctype="multipart/form-data">


      {{ csrf_field() }}
      <div class="form-group">
        <label>الترايخ</label>
        <input type="date" class="form-control" name="date" required/>
      </div>

      <div class="form-group">
        <label>القسم</label>
        <input type="text" class="form-control" name="department" required/>
      </div>

      <div class="form-group">
        <label>التفاصيل</label>
        <input type="text" class="form-control" name="details" required/>
      </div>

      <div class="form-group">
        <label>الراتب</label>
        <input type="number" class="form-control" name="salary" required/>
      </div>

      <input type="hidden" name="employee_id" value="{{$employee->id}}" />
    <input class="remodal-confirm" type="submit" value="إضافة"/>

  </form>
</div>
</div>
@endsection
