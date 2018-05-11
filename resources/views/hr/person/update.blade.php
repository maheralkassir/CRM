<?php use Carbon\Carbon;?>

@extends('layouts.HRmaster')
@section('content')
  <h2 style="color:#304ffe">
    تعديل بيانات {{$person->name}}:
  </h2>
  <form action="/hr/persons/update/{{$person->id}}" method="POST">
    {{ csrf_field() }}
    <div class="row">

      <div class="form-group col-md-6">
        <label>الأسم</label>
        <input type="text" class="form-control" value="{{$person->name}}" name="name" required/>
      </div>

      <div class="form-group col-md-6">
        <label>الجنس</label>
        <select class="form-control" value="{{$person->sex}}" name="sex" required>
          <option value="0">ذكر</option>
          <option value="1">أنثى</option>
        </select>
      </div>


      <div class="form-group col-md-6">
        <label>تاريخ الميلاد</label>
        <input type="date" class="form-control" value="{{$person->birth_date}}" name="birth_date" required/>
      </div>

      <div class="form-group col-md-6">
        <label>العنوان</label>
        <input type="text" class="form-control" value="{{$person->address}}" name="address" required/>
      </div>

      <div class="form-group col-md-6">
        <label>رقم الهاتف</label>
        <input type="number" class="form-control" value="{{$person->phone}}" name="phone" required/>
      </div>

      <div class="form-group col-md-6">
        <label>رقم الموبايل</label>
        <input type="number" class="form-control" value="{{$person->mobile}}" name="mobile" required/>
      </div>

      <div class="form-group col-md-6">
        <label>رقم موبايل بديل</label>
        <input type="number" class="form-control" value="{{$person->replace_mobile}}" name="replace_mobile" required/>
      </div>


      <div class="form-group col-md-6">
        <label>حالة خدمة العلم</label>
        <input type="text" class="form-control" value="{{$person->military_statue}}" name="military_statue" required/>
      </div>

      <div class="form-group col-md-6">
        <label>الحالة الاجتماعية</label>
        <input type="text" class="form-control" value="{{$person->social_statue}}" name="social_statue" required/>
      </div>
    </div>

    <input class="btn btn-primary" type="submit" value="Update"/>
  </form>
  @if (isset($certs[0]))
    <div class="row" style="margin-bottom:30px">
      <div class="isotope-filter js__filter_isotope">
        <div class="col-xs-12">
          <h1  style="color:#304ffe">الشهادات الحاصل عليها {{$person->name}} :</h1>
        </div>
        @foreach ($certs as $cert)
          <div class="col-md-4 col-sm-6 col-tb-6 col-xs-12 js__isotope_item massage beauty" data-lightview-group="group">
            <a class="item-gallery lightview">
              <img src="{{asset($cert->image)}}" style="max-width:220px;max-height:360px;" alt="">
              <h2 class="title">{{$cert->name}} حصل عليها بتاريخ <strong style="color:#304ffe">{{$cert->certificate_date->toFormattedDateString()}}</strong></h2>
            </a>
            <a style="color:red;font-size:25px" href="/hr/certs/delete/{{$cert->id}}"><i class="fa fa-trash"></i></a>
          </div>
        @endforeach
      </div>
    </div>
  @endif
  <button style="display:block;margin-bottom:30px;margin-top:20px"  type="button" data-remodal-target="remodal" class="btn btn-primary waves-effect waves-light">إضافة شهادة جديدة</button>
  <div class="remodal" data-remodal-id="remodal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  	<button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>


    <div class="remodal-content">
      <h2 style="color:#304ffe">
        إضافة شهادة جديدة
      </h2>
      <form action="/hr/persons/cert" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
        <div class="form-group">
          <label>أسم الشهادة</label>
          <input type="text" class="form-control" name="name" required/>
        </div>

        <div class="form-group">
          <label>تاريخ الحصول عليها</label>
          <input type="date" class="form-control" name="certificate_date" required/>
        </div>

        <div class="form-group">
          <label>صورة عن الشهادة</label>
          <input type="file" class="form-control" name="image" required/>
        </div>
        <input type="hidden" name="person_id" value="{{$person->id}}" />
        <input class="remodal-confirm" type="submit"/>

      </form>
  	</div>
  </div>

@endsection
