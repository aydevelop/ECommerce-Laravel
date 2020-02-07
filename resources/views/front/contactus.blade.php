@extends('layouts.front')

@section('content')

<div class="row-fluid">
      	<div class="span4">
      		<div class="thumbnail content-white">
      			<div class="caption">
      				<div class="one">
		        		<h4>Customer Services</h4>
		        		<p>Phone - <a rel="nofollow" href="tel:+441244752299">+44 (0)1244 752 299</a><br>Email - <a rel="nofollow" href="mailto:sales@domain.com">sales@domain.com</a></p>

		        	</div>
      			</div>
      		</div>
      	</div>

      	<div class="span8">
      		<div class="thumbnail content-white">
      			<div class="caption">
      				<h4>Contact Us</h4>
                    <form method="POST" action="{{ url('callbackCreate') }}" >
                    @csrf
                    </form>
                    <form method="POST" action="{{ url('callbackCreate') }}" >
                      @csrf
					  <div class="control-group">
					    <label class="control-label" for="name">Name</label>
					    <div class="controls">
					      <input type="text"  value="{{ old('name') }}" name="name" id="name" placeholder="Full Name">
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label" for="phone">Phone</label>
					    <div class="controls">
					      <input type="text"  value="{{ old('phone') }}" name="phone" id="phone" placeholder="Phone">
					    </div>
					  </div>
                      <div class="control-group">
					    <div class="controls">
					      <button type="submit" class="btn btn-primary">Submit</button>
					    </div>
					  </div>
					</form>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 error">
                            <ul style="padding-left:20px; color:red">
                                @foreach($errors->all() as $error)
                                    <li> {{$error}} </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
      			</div>
      		</div>
      	</div>
      </div>

      <div class="padding-top-10"></div>

      <div class="row-fluid">
      	<div class="span12">
      		<div class="thumbnail content-white">
      			<div class="caption">
      				<iframe scrolling="no" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Staples+Center+Los+Angeles&amp;aq=&amp;vpsrc=6&amp;g=WR143SZ&amp;ie=UTF8&amp;hq=&amp;hnear=Staples+Center+Los+Angeles&amp;t=m&amp;z=16&amp;output=embed&amp;iwloc=near" marginwidth="0" marginheight="0" width="100%" height="300px" frameborder="0"></iframe>
      			</div>
      		</div>
      	</div>
      </div>


@endsection
