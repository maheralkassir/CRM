@extends('layouts.HRmaster')
@section('content')
  <div class="col-xs-12">
		<div class="box-content">
      @if (isset($persons[0]))

        <h4 class="box-title">البيانات الحالية</h4>

      	<table id="example" class="table table-striped table-bordered display" style="width:100%">
  				<thead>
  					<tr>
  						<th>الأسم</th>
              <th>الجنس</th>
              <th>العنوان</th>
  						<th>رقم الهاتف</th>
  						<th>رقم الموبايل</th>
  						<th>تاريخ الميلاد</th>
              <th></th>
  					</tr>
  				</thead>
  				<tfoot>
  					<tr>
              <th>الأسم</th>
              <th>الجنس</th>
              <th>العنوان</th>
  						<th>رقم الهاتف</th>
  						<th>رقم الموبايل</th>
  						<th>تاريخ الميلاد</th>
              <th></th>
  					</tr>
  				</tfoot>
  				<tbody>
            @foreach ($persons as $person)
              <tr>
                <td>{{$person->name}}</td>
                @if ($person->sex == 0)
                  <td>ذكر</td>
                @else
                  <td>أنثى</td>
                @endif
                <td>{{$person->address}}</td>
                <td>{{$person->phone}}</td>
                <td>{{$person->mobile}}</td>
                <td>{{$person->birth_date->toFormattedDateString()}}</td>
                <td>
                  <button data-remodal-target="remodal{{$person->id}}"  class="btn btn-success">طلب توظيف</button>
                  <a style="cursor:none;text-decoration:none" href="/hr/persons/see/{{$person->id}}"><button class="btn btn-success">المزيد</button></a>
                  <a style="cursor:none;text-decoration:none" href="/hr/persons/update/{{$person->id}}"><button class="btn btn-primary">تعديل</button></a>
                  <a style="cursor:none;text-decoration:none" href="/hr/persons/delete/{{$person->id}}"><button class="btn btn-danger">حذف</button></a>
                </td>
              </tr>
              <div class="remodal" data-remodal-id="remodal{{$person->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                <div class="remodal-content">
                  <h4 style="color:#304ffe">
                    إضافة طلب توظيف لـ {{$person->name}}
                  </h4>
                  <form action="/hr/applicants" method="POST"  enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label>الوظيفة</label>
                      <input type="text" class="form-control" name="job" required/>
                    </div>

                    <div class="form-group">
                      <label>الأشخاص الموثوقة</label>
                      <input type="text" class="form-control" name="confident_people" required/>
                    </div>

                    <div class="form-group">
                      <label>تاريخ المقابلة</label>
                      <input type="date" class="form-control" name="interview_date" required/>
                    </div>

                    <div class="form-group">
                      <label>تاريخ الجهوزية لبداية العمل</label>
                      <input type="date" class="form-control" name="time_to_get_work" required/>
                    </div>

                    <div class="form-group">
                      <label>اخر راتب</label>
                      <input type="number" class="form-control" name="last_salary" required/>
                    </div>

                    <div class="form-group">
                      <label>تحميل السيرة الذاتية</label>
                      <input type="file" class="form-control" name="cv_link" required/>
                    </div>

                    <input type="hidden" value="{{$person->id}}" name="person_id" />
                    <input class="remodal-confirm" type="submit" value="Add"/>
                  </form>
                </div>
              </div>
              @endforeach
  				</tbody>
  			</table>
      @endif

      <button type="button" data-remodal-target="remodal" class="btn btn-primary waves-effect waves-light">إضافة بيانات شخص جديد</button>

		</div>
	</div>


  <div class="remodal" data-remodal-id="remodal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  	<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


    <div class="remodal-content">
      <h2 style="color:#304ffe">
        إضافة شخص جديد
      </h2>
      <form action="/hr/persons" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label>الأسم</label>
          <input type="text" class="form-control" name="name" required/>
        </div>

        <div class="form-group">
          <label>الجنس</label>
          <select class="form-control" name="sex" required>
            <option value="0">ذكر</option>
            <option value="1">أنثى</option>
          </select>
        </div>


        <div class="form-group">
          <label>تاريخ الميلاد</label>
          <input type="date" class="form-control" name="birth_date" required/>
        </div>

        <div class="form-group">
          <label>العنوان</label>
          <input type="text" class="form-control" name="address" required/>
        </div>

        <div class="form-group">
          <label>رقم الهاتف</label>
          <input type="number" class="form-control" name="phone" required/>
        </div>

        <div class="form-group">
          <label>رقم الموبايل</label>
          <input type="number" class="form-control" name="mobile" required/>
        </div>

        <div class="form-group">
          <label>رقم موبايل بديل</label>
          <input type="number" class="form-control" name="replace_mobile" required/>
        </div>


        <div class="form-group">
          <label>حالة خدمة العلم</label>
          <input type="text" class="form-control" name="military_statue" required/>
        </div>

        <div class="form-group">
          <label>الحالة الاجتماعية</label>
          <input type="text" class="form-control" name="social_statue" required/>
        </div>
        <input class="remodal-confirm" type="submit" value="إضافة"/>
      </form>
  	</div>
  </div>


@endsection
