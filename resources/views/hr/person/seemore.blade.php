<?php use Carbon\Carbon;?>
@extends('layouts.HRmaster')

@section('content')
  <div class="row">
    <div class="col-xs-12">
  		<div class="box-content card">
  			<h4 class="box-title"><i class="fa fa-user ico"></i>معلومات حول</h4>
  			<div class="card-content">
  				<div class="row">
  					<div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>الأسم:</label></div>
  							<div class="col-xs-7">{{$person->name}}</div>
  						</div>
  					</div>
  					<div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>الجنس:</label></div>
                @if ($person->sex == 0)
                  <div class="col-xs-7">ذكر</div>
                @else
                  <div class="col-xs-7">أنثى</div>
                @endif
  						</div>
  					</div>
  					<div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>تاريخ الميلاد:</label></div>
  							<div class="col-xs-7">{{$person->birth_date->toFormattedDateString()}}</div>
  						</div>
  					</div>
  					<div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>العنوان:</label></div>
  							<div class="col-xs-7">{{$person->address}}</div>
  						</div>
  					</div>
  					<div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>رقم الهاتف:</label></div>
  							<div class="col-xs-7">{{$person->phone}}</div>
  						</div>
  					</div>
  					<div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>رقم الموبايل:</label></div>
  							<div class="col-xs-7">{{$person->mobile}}</div>
  						</div>
  					</div>
  					<div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>رقم موبايل بديل:</label></div>
  							<div class="col-xs-7">{{$person->replace_mobile}}</div>
  						</div>
  					</div>

            <div class="col-md-6">
              <div class="row">
                <div class="col-xs-5"><label>الحالة الاجتماعية:</label></div>
                <div class="col-xs-7">{{$person->social_statue}}</div>
              </div>
            </div>
            <div class="col-md-6">
  						<div class="row">
  							<div class="col-xs-5"><label>حالة خدمة العلم:</label></div>
  							<div class="col-xs-7">{{$person->military_statue}}</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>


@if (isset($certs[0]))
  <div class="row">
    <div class="isotope-filter js__filter_isotope">
      <div class="col-xs-12">
        <h1  style="color:#304ffe">الشهادات الحاصل عليها {{$person->name}}:</h1>
      </div>
      @foreach ($certs as $cert)
        <div class="col-md-4 col-sm-6 col-tb-6 col-xs-12 js__isotope_item massage beauty" data-lightview-group="group">
      		<a class="item-gallery lightview">
      			<img src="{{asset($cert->image)}}" style="max-width:220px;max-height:360px;" alt="">
      			<h2 class="title">{{$cert->name}} حصل عليها بتاريخ <strong style="color:#304ffe">{{$cert->certificate_date->toFormattedDateString()}}</strong></h2>
      		</a>
      	</div>
      @endforeach
    </div>
  </div>
@endif

@endsection
