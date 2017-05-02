@extends('layouts.master')

@section('content')
	<div class="form-horizontal">
	{{ Form::open(['url' => '/donate', 'method' =>'POST', 'id' => 'billing-form']) }}
		<div class="form-group">
			<label class="col-md-3 col-md-offset-1 control-label"><h1> Donate </h1></label>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Name on the Card 
				<i class="fa fa-asterisk" style="color: crimson;" aria-hidden="true"></i>
			</label>
			<div class="col-md-2">
				<input type="text" name="firstname" class="form-control" placeholder="First Name">
			</div>
			<div class="col-md-2">
				<input type="text" name="lastname" class="form-control" placeholder="Last Name">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Card Number
				<i class="fa fa-asterisk" style="color: crimson;" aria-hidden="true"></i>
			</label>
			<div class="col-md-3">
				<div id="card-element">
			      <!-- a Stripe Element will be inserted here. -->
			    </div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Amount
				<i class="fa fa-asterisk" style="color: crimson;" aria-hidden="true"></i>
			</label>
			<div class="col-md-2">
				<div class="input-group">
					<span class="input-group-addon">$</span>
					<input type="number" name="amount" class="form-control">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Country
				<i class="fa fa-asterisk" style="color: crimson;" aria-hidden="true"></i>
			</label>
			<div class="col-md-3">
				<select name="country" class="form-control">
					@foreach($country as $value)
						<option value="{{ $value }}">{{ $value }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Address
				<i class="fa fa-asterisk" style="color: crimson;" aria-hidden="true"></i>
			</label>
			<div class="col-md-3">
				<textarea name="address" class="form-control" style="resize: none;"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Address 2</label>
			<div class="col-md-3">
				<textarea name="address2" class="form-control" style="resize: none;"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">City
				<i class="fa fa-asterisk" style="color: crimson;" aria-hidden="true"></i>
			</label>
			<div class="col-md-3">
				<input name="address2" class="form-control" style="resize: none;">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 col-md-offset-1">
				<pre class="alert alert-danger payment-errors" hidden="hidden"></pre>
				@if (count($errors) > 0)
				    <pre class="alert alert-danger payment-errors">
				            @foreach ($errors->all() as $error)
					            <div class="col-md-12"># {{ $error }}</div>
				            @endforeach
				    </pre>
				@endif
			</div>
		</div>
	{{ Form::close() }}
		<div class="form-group">
			<div class="col-md-2 col-md-offset-2 control-label">
				<a id="btnSubmit" class="btn btn-info">Submit</a>
			</div>
		</div>
	</div>
@stop

@section('footer')
	<script type="text/javascript" src="/js/billings.js"></script>
@stop