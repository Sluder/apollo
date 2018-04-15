@extends('layouts.base')

@section('content')
    <div class="projects">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="header">
                        <p>Projects</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('create.project') }}" class="btn">Create</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include('partials.message')

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Owner</td>
                                <td>Repository Name</td>
                                <td>Repository URL</td>
                                <td>&nbsp;</td>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse (\App\Models\Project::all() as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->repository_name }}</td>
                                <td>{{ $project->repository_owner }}</td>
                                <td>
                                    <a href="{{ $project->repository_url }}" target="_blank">{{ $project->repository_url }}</a>
                                </td>
                                <td>
                                    <button data-toggle="modal" data-target="#delete-project-{{ $project->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <a href="{{ route('edit.project', compact('project')) }}">
                                        <i class="fa fa-cog"></i>
                                    </a>
                                </td>
                            </tr>
                            @include('partials.delete-project-modal', compact('project'))
                        @empty
                            <tr class="empty">
                                <td colspan="100">No projects found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

