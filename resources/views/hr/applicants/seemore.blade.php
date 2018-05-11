<?php use Carbon\Carbon;?>
@extends('layouts.HRmaster')
@section('content')
  <div class="row">
    <div class="col-xs-12">
  		<div class="box-content card">
  			<h4 class="box-title"><i class="fa fa-user ico"></i>معلومات</h4>
  			<div class="card-content">
  				<div class="row">
  					<div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>الاسم:</label></div>
  							<div class="col-xs-7">{{$applicant->name}}</div>
  						</div>
  					</div>
            <div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>الأشخاص الموثوقون:</label></div>
  							<div class="col-xs-7">{{$applicant->confident_people}}</div>
  						</div>
  					</div>
            <div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>العمل:</label></div>
  							<div class="col-xs-7">{{$applicant->job}}</div>
  						</div>
  					</div>
            <div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>اخر أجر:</label></div>
  							<div class="col-xs-7">{{$applicant->last_salary}}</div>
  						</div>
  					</div>
            <div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>تاريخ المقابلة:</label></div>
  							<div class="col-xs-7">{{Carbon::parse($applicant->interview_date)->toFormattedDateString()}}</div>
  						</div>
  					</div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-xs-5"><label>تاريخ الجهوزية للعمل:</label></div>
                <div class="col-xs-7">{{Carbon::parse($applicant->time_to_get_work)->toFormattedDateString()}}</div>
              </div>
            </div>


            <div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>التقييم التقني:</label></div>
                @if ($applicant->technical_rate == NULL)
                  <div class="col-xs-7">لا يوجد تقييم تقني</div>
                @else
                  <div class="col-xs-7">{{$applicant->technical_rate}}</div>
                @endif
  						</div>
  					</div>

            <div class="col-md-6">
              <div class="row">
                <div class="col-xs-5"><label>التقييم الرقمي:</label></div>
                @if ($applicant->numeric_evalution == NULL)
                  <div class="col-xs-7">لا يوجد تقييم رقمي</div>
                @else
                  <div class="col-xs-7">{{$applicant->numeric_evalution}}</div>
                @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-xs-5"><label>سيرة ذاتية:</label></div>
                <div class="col-xs-7"><a href="{{asset($applicant->cv_link)}}">اضغط هنا للتحميل!</a></div>
              </div>
            </div>

  				</div>
  			</div>
  		</div>
  	</div>

  </div>

  @if (isset($jobs[0]))
    <div class="box-content" style="margin-top:15px">
      <h4 class="box-title">الوظائف السابقة</h4>

      <table class="example table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr>
            <th>اسم الشركة</th>
            <th>الوظيفة</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>اسم الشركة</th>
            <th>الوظيفة</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($jobs as $job)
            <tr>
              <td>{{$job->company_name}}</td>
              <td>{{$job->work_type}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  @endif

  <div class="row">



        @if ($applicant->is_employee)


          @if ($applicant->is_trainer)
            <div class="col-md-4 col-xs-12">
              <button class="btn btn-success" data-remodal-target="showTrData" style="width:100%">عرض بيانات فترة التدريب</button>
            </div>
          @else
            <div class="col-md-4 col-xs-12">
              <button class="btn btn-block" style="width:100%">لا يوجد فترة تدريب لهذا الموظف</button>
            </div>
          @endif
          @if ($applicant->is_tester)
            <div class="col-md-4 col-xs-12">
              <button data-remodal-target="showTeData" class="btn btn-success" style="width:100%">عرض بيانات فترة التجريب</button>
            </div>
          @else
            <div class="col-md-4 col-xs-12">
              <button class="btn btn-block" style="width:100%">لا يوجد فترة تدريب لهذا الموظف</button>
            </div>
          @endif
          <div class="col-md-4 col-xs-12">
            <button class="btn btn-success" data-remodal-target="showEmpData" style="width:100%">عرض بيانات الموظف</button>
          </div>


        @elseif ($applicant->is_tester)
          @if ($applicant->is_trainer)
            <div class="col-md-4 col-xs-12">
              <button class="btn btn-success" data-remodal-target="showTrData" style="width:100%">عرض بيانات فترة التدريب</button>
            </div>
          @else
            <div class="col-md-4 col-xs-12">
              <button class="btn btn-block" style="width:100%">لا يوجد فترة تدريب لهذا الموظف</button>
            </div>
          @endif
          <div class="col-md-4 col-xs-12">
            <button data-remodal-target="showTeData" class="btn btn-success" style="width:100%">عرض بيانات فترة التجريب</button>
          </div>
          <div class="col-md-4 col-xs-12">
            <button class="btn btn-primary" data-remodal-target="stemp" style="width:100%">توظيف</button>
          </div>


        @else
          @if ($applicant->is_trainer)
            <div class="col-md-4 col-xs-12">
              <button data-remodal-target="showTeData" class="btn btn-success" style="width:100%">عرض بيانات فترة التجريب</button>
            </div>
          @else
            <div class="col-md-4 col-xs-12">
              <button data-remodal-target="sttr"  class="btn btn-primary" style="width:100%">بدأ فترة التدريب</button>
            </div>
          @endif
          <div class="col-md-4 col-xs-12">
            <button class="btn btn-primary" data-remodal-target="stte"  style="width:100%">بدأ فترة التجريب</button>
          </div>
          <div class="col-md-4 col-xs-12">
            <button class="btn btn-primary" data-remodal-target="stemp" style="width:100%">توظيف</button>
          </div>


        @endif
  </div>


  <div class="remodal" data-remodal-id="sttr" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


    <div class="remodal-content">
      <h2 style="color:#304ffe">
        بداية فترة التدريب
      </h2>
      <form action="/hr/trainers/start" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
        <div class="form-group">
          <label>بداية التدريب</label>
          <input type="date" class="form-control" name="start_date" required/>
        </div>

        <div class="form-group">
          <label>نهاية التدريب</label>
          <input type="date" class="form-control" name="end_date" required/>
        </div>

        <div class="form-group">
          <label>الراتب</label>
          <input type="number" class="form-control" name="salary" required/>
        </div>


        <input type="hidden" name="applicant_id" value="{{$applicant->id}}" />
        <input class="remodal-confirm" type="submit" value="Add"/>

      </form>
    </div>
  </div>
  @if (isset($train->start_date))
    <div class="remodal" data-remodal-id="showTrData" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
      <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


      <div class="remodal-content">

        <div class="col-xs-12">
      		<div class="box-content card">
      			<h4 class="box-title"><i class="fa fa-line-chart ico"></i>تفاصيل فترة التدريب</h4>
      			<div class="card-content">
      				<div class="row">
      					<div class="col-md-12">
      						<div class="row">
      							<div class="col-xs-5"><label>تاريخ البداية:</label></div>
      							<div class="col-xs-7">{{Carbon::parse($train->start_date)->toFormattedDateString()}}</div>
      						</div>
      					</div>
                <div class="col-md-12">
      						<div class="row">
      							<div class="col-xs-5"><label>تاريخ النهاية:</label></div>
      							<div class="col-xs-7">{{Carbon::parse($train->end_date)->toFormattedDateString()}}</div>
      						</div>
      					</div>
                <div class="col-md-12">
      						<div class="row">
      							<div class="col-xs-5"><label>الراتب:</label></div>
      							<div class="col-xs-7">{{$train->salary}}</div>
      						</div>
      					</div>


      				</div>
      			</div>
      		</div>
      	</div>
      </div>
    </div>
  @endif






  <div class="remodal" data-remodal-id="stte" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


    <div class="remodal-content">
      <h2 style="color:#304ffe">
        بداية فترة التجريب
      </h2>
      <form action="/hr/testers/start" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
        <div class="form-group">
          <label>تاريخ البداية</label>
          <input type="date" class="form-control" name="start_date" required/>
        </div>

        <div class="form-group">
          <label>تاريخ النهاية</label>
          <input type="date" class="form-control" name="end_date" required/>
        </div>

        <div class="form-group">
          <label>الراتب</label>
          <input type="number" class="form-control" name="salary" required/>
        </div>

        <div class="form-group">
          <label>نسبة الربح من المشروع</label>
          <input type="number" class="form-control" min="1" max="100" name="salary_project_percent" required/>
        </div>


        <input type="hidden" name="applicant_id" value="{{$applicant->id}}" />
        <input class="remodal-confirm" type="submit" value="Add"/>

      </form>
    </div>
  </div>


  @if (isset($test->start_date))
    <div class="remodal" data-remodal-id="showTeData" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
      <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


      <div class="remodal-content">

        <div class="col-xs-12">
      		<div class="box-content card">
      			<h4 class="box-title"><i class="fa fa-line-chart ico"></i>تفاصيل فترة التجريب</h4>
      			<div class="card-content">
      				<div class="row">
      					<div class="col-md-12">
      						<div class="row">
      							<div class="col-xs-5"><label>تاريخ البداية:</label></div>
      							<div class="col-xs-7">{{Carbon::parse($test->start_date)->toFormattedDateString()}}</div>
      						</div>
      					</div>
                <div class="col-md-12">
      						<div class="row">
      							<div class="col-xs-5"><label>تاريخ النهاية:</label></div>
      							<div class="col-xs-7">{{Carbon::parse($test->end_date)->toFormattedDateString()}}</div>
      						</div>
      					</div>
                <div class="col-md-12">
      						<div class="row">
      							<div class="col-xs-5"><label>الراتب:</label></div>
      							<div class="col-xs-7">{{$test->salary}}</div>
      						</div>
      					</div>

                <div class="col-md-12">
                  <div class="row">
                    <div class="col-xs-5"><label>النسبة المئوية للمشروع:</label></div>
                    <div class="col-xs-7">{{$test->salary_project_percent}}%</div>
                  </div>
                </div>


      				</div>
      			</div>
      		</div>
      	</div>
      </div>
    </div>
  @endif

  <div class="remodal" data-remodal-id="stemp" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


    <div class="remodal-content">
      <h2 style="color:#304ffe">
        توظيف
      </h2>
      <form action="/hr/employees/start" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
        <div class="form-group">
          <label>تاريخ التوظيف</label>
          <input type="date" class="form-control" name="employment_date" required/>
        </div>

        <div class="form-group">
          <label>تاريخ بداية العقد</label>
          <input type="date" class="form-control" name="contract_start_date" required/>
        </div>

        <div class="form-group">
          <label>تاريخ نهاية العقد</label>
          <input type="date" class="form-control" name="contract_end_date" required/>
        </div>

        <div class="form-group">
          <label>مدة العقد</label>
          <input type="number" class="form-control" name="contract_duration" required/>
        </div>


        <div class="form-group">
          <label>ساعات العمل اليومية</label>
          <input type="number" min="1" max="24" class="form-control" name="hours_per_day" required/>
        </div>

        <div class="form-group">
          <label>إجمالي العطل السنوية</label>
          <input type="number" class="form-control" name="absent_total" required/>
        </div>




        <div class="form-group">
          <label>الراتب المبدئي</label>
          <input type="number" class="form-control" name="start_salary" required/>
        </div>

        <div class="form-group">
          <label>الزيادة السنوية للراتب</label>
          <input type="number" class="form-control" name="salary_add_year" required/>
        </div>

        <div class="form-group">
          <label>النسبة المئوية للمشروع</label>
          <input type="number" class="form-control" min="1" max="100" name="salary_project_percent" required/>
        </div>


        <input type="hidden" name="applicant_id" value="{{$applicant->id}}" />
        <input class="remodal-confirm" type="submit" value="Add"/>

      </form>
    </div>
  </div>

  @if (isset($emp->absent_total))
    <div class="remodal" data-remodal-id="showEmpData" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
      <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


      <div class="remodal-content">

        <div class="col-xs-12">
          <div class="box-content card">
            <h4 class="box-title"><i class="fa fa-line-chart ico"></i>تفاصيل فترة التجريب</h4>
            <div class="card-content">
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-xs-5"><label>تاريخ التوظيف:</label></div>
                    <div class="col-xs-7">{{Carbon::parse($emp->employment_date)->toFormattedDateString()}}</div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-xs-5"><label>تاريخ بداية العقد:</label></div>
                    <div class="col-xs-7">{{Carbon::parse($emp->contract_start_date)->toFormattedDateString()}}</div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-xs-5"><label>تاريخ نهاية العقد:</label></div>
                    <div class="col-xs-7">{{Carbon::parse($emp->contract_end_date)->toFormattedDateString()}}</div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="row">
                    <div class="col-xs-5"><label>مدة التعاقد:</label></div>
                    <div class="col-xs-7">{{$emp->contract_duration}}</div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="row">
                    <div class="col-xs-5"><label>ساعات العمل اليومية:</label></div>
                    <div class="col-xs-7">{{$emp->hours_per_day}}</div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="row">
                    <div class="col-xs-5"><label>إجمالي العطل السنوية:</label></div>
                    <div class="col-xs-7">{{$emp->absent_total}}</div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-xs-5"><label>الراتب المبدئي:</label></div>
                    <div class="col-xs-7">{{$emp->start_salary}}</div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-xs-5"><label>الزيادة السنوية للراتب:</label></div>
                    <div class="col-xs-7">{{$emp->salary_add_year}}</div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="row">
                    <div class="col-xs-5"><label>النسبة المئوية للمشروع:</label></div>
                    <div class="col-xs-7">{{$emp->salary_project_percent}}%</div>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif


@endsection
