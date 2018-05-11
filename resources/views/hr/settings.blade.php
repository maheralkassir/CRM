@extends('layouts.HRmaster')
@section('content')
  <div class="col-md-9 col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-content card col-xs-push-2">
							<h4 class="box-title"><i class="fa fa-cog ico"></i>Settings</h4>

							<div class="card-content">
								<div class="row">
                  @if (isset($err))
                    <div class="alert alert-danger">
                      {{$err}}
                    </div>
                  @elseif (isset($succ))
                    <div class="alert alert-success">
                      {{$succ}}
                    </div>
                  @endif
                  <form action="/hr/settings/update/password" method="POST">
                    {{ csrf_field() }}
                    <div class="row">

                      <div class="form-group col-xs-12">
                        <label>Current Password</label>
                        <input type="password" class="form-control" name="curr" required/>
                      </div>

                      <div class="form-group col-xs-12">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="new" required/>
                      </div>

                      <div class="form-group col-xs-12">
                        <label>re-type New Password</label>
                        <input type="password" class="form-control" name="rnew" required/>
                      </div>

                    </div>

                    <input class="btn btn-primary" type="submit" value="Update"/>
                  </form>
								</div>
							</div>

						</div>

@endsection
