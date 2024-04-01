@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body position-relative">
                            <h5>
                                {{_('Announcements')}}
                            </h5>
                            <a class="btn btn-primary position-absolute" 
                                style="top:0.8rem;right:2rem;" href="/admin/announcement/add">
                                {{_('Add New')}}
                            </a>             
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if(count($announcements))

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{_('Title')}}</th>
                                                <th>{{_('Description')}}</th>
                                                <th>{{_('Issued')}}</th>
                                                <th>{{_('Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($announcements as $announcement)
                                                <tr>
                                                    <td>{{ $announcement->title }}</td>
                                                    <td>{{ $announcement->description }}</td>
                                                    <td>{{ $announcement->created_at->diffForHumans() }}</td>
                                                    <td>
                                                        <a href="/admin/announcement/edit/{{ $helper::encode($announcement->id) }}" class="btn btn-sm btn-primary rounded">
                                                            <i class="ti ti-pencil"></i>
                                                        </a>
                                                        <a href="/admin/announcement/delete/{{ $helper::encode($announcement->id) }}" class="btn btn-sm btn-danger rounded">
                                                            <i class="ti ti-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            @else
                                <div class="text-center">
                                    {{_('No announcements found')}}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            
            </div>

        </div>
    </div>
@endsection