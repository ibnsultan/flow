@extends('layouts.app')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header position-relative">
                            <h5>
                                API Activity/History: &nbsp;
                                <span class="text-primary">{{$apiKey->name}}</span>
                            </h5>                
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table table-responsive">
                            
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection